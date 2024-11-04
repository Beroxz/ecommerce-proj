<?php

namespace App\Http\Controllers\Api;

use App\Enums\AddressType;
use App\Enums\CustomerStatus;
use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\OrderResource;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Traits\ReportTrait;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    use ReportTrait;

    public function activeCustomers()
    {
        return Customer::where('status', CustomerStatus::Active->value)->count();
    }

    public function activeProducts()
    {
        $userRole = auth()->user()->role;
        $query = Product::where('published', '=', 1);

        if ($userRole == 1) {
            return $query->count();
        } else {
            $userId = auth()->user()->id;
            $query->where('seller_id', $userId);
        }

        return $query->count();
    }


    public function paidOrders()
    {
        $userRole = auth()->user()->role;
        $fromDate = $this->getFromDate();
        $query = Order::query()->where('status', OrderStatus::Paid->value);

        // ถ้าผู้ใช้เป็น admin, นับคำสั่งซื้อทั้งหมดที่มีสถานะ Paid
        if ($userRole == 1) {
            if ($fromDate) {
                $query->where('created_at', '>', $fromDate);
            }
        } else {
            // ถ้าผู้ใช้เป็น seller, นับคำสั่งซื้อที่สร้างโดย seller นั้นเท่านั้น
            $userId = auth()->user()->id;
            if ($fromDate) {
                $query->where('created_at', '>', $fromDate);
            }
            $query->where('seller_id', $userId);
        }

        return $query->count();
    }

    public function totalIncome()
    {
        $userRole = auth()->user()->role;
        $fromDate = $this->getFromDate();
        $query = Order::query()->where('status', OrderStatus::Paid->value);

        // ถ้าผู้ใช้เป็น admin, ให้รวมคำสั่งซื้อทั้งหมด
        if ($userRole == 1) {
            if ($fromDate) {
                $query->where('created_at', '>', $fromDate);
            }
        } else {
            // ถ้าผู้ใช้เป็น seller, ให้รวมคำสั่งซื้อที่สร้างโดย seller นั้นเท่านั้น
            $userId = auth()->user()->id;
            if ($fromDate) {
                $query->where('created_at', '>', $fromDate);
            }
            $query->where('seller_id', $userId);
        }

        return round($query->sum('total_price'));
    }


    public function ordersByCountry()
    {
        $fromDate = $this->getFromDate();
        $query = Order::query()
            ->select(['c.name', DB::raw('count(orders.id) as count')])
            ->join('users', 'created_by', '=', 'users.id')
            ->join('customer_addresses AS a', 'users.id', '=', 'a.customer_id')
            ->join('countries AS c', 'a.country_code', '=', 'c.code')
            ->where('status', OrderStatus::Paid->value)
            ->where('a.type', AddressType::Billing->value)
            ->groupBy('c.name');

        if ($fromDate) {
            $query->where('orders.created_at', '>', $fromDate);
        }

        return $query->get();
    }

    // public function ordersByState()
    // {
    //     $fromDate = $this->getFromDate();
    //     $query = Order::query()
    //         ->select([
    //             DB::raw('LOWER(a.state) as state_name'),
    //             DB::raw('count(orders.id) as count'),
    //             'users.name as user_name'
    //         ])
    //         ->join('users', 'orders.created_by', '=', 'users.id')
    //         ->join('customer_addresses AS a', 'users.id', '=', 'a.customer_id')
    //         ->where('status', OrderStatus::Paid->value)
    //         ->where('a.type', AddressType::Billing->value)
    //         ->groupBy('state_name', 'user_name')
    //         ->orderBy('count', 'DESC');

    //     if ($fromDate) {
    //         $query->where('orders.created_at', '>', $fromDate);
    //     }

    //     return $query->get();
    // }

    public function ordersByState()
    {
        $fromDate = $this->getFromDate();

        // ดึงข้อมูล provinces จากตาราง countries
        $country = DB::table('countries')->where('code', 'tha')->first();
        $thailandProvinces = json_decode($country->states, true);

        $query = Order::query()
            ->select([
                DB::raw('LOWER(a.state) as state_key'),
                DB::raw('count(orders.id) as count'),
                'users.name as user_name'
            ])
            ->join('users', 'orders.created_by', '=', 'users.id')
            ->join('customer_addresses AS a', 'users.id', '=', 'a.customer_id')
            ->where('status', OrderStatus::Paid->value)
            ->where('a.type', AddressType::Billing->value)
            ->groupBy('state_key', 'user_name')
            ->orderBy('count', 'DESC');

        if ($fromDate) {
            $query->where('orders.created_at', '>', $fromDate);
        }

        // ดึงข้อมูลจาก query
        $results = $query->get();

        // แปลง key ของจังหวัดเป็นชื่อ
        $results->transform(function ($item) use ($thailandProvinces) {
            $item->state_name = $thailandProvinces[$item->state_key] ?? 'Unknown';
            return $item;
        });

        return $results;
    }

    public function latestCustomers()
    {
        $userRole = auth()->user()->role;

        // ถ้าเป็น admin (role == 1) ให้ดึงข้อมูลลูกค้าล่าสุดทั้งหมด
        if ($userRole == 1) {
            return Customer::query()
                ->select(['id', 'first_name', 'last_name', 'u.email', 'phone', 'u.created_at'])
                ->join('users AS u', 'u.id', '=', 'customers.user_id')
                ->where('status', CustomerStatus::Active->value)
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
        } else {
            // ถ้าไม่ใช่ admin (seller) ให้ดึงข้อมูลลูกค้าที่มีคำสั่งซื้อ
            return Customer::query()
                ->select(['id', 'first_name', 'last_name', 'u.email', 'phone', 'u.created_at'])
                ->join('users AS u', 'u.id', '=', 'customers.user_id')
                ->where('status', CustomerStatus::Active->value)
                ->whereHas('orders', function ($query) {
                    $query->where('seller_id', auth()->user()->id);
                })
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
        }
    }

    public function latestOrders()
    {
        $userRole = auth()->user()->role;

        // ถ้าเป็น admin (role == 1) ให้ดึงคำสั่งซื้อทั้งหมดที่มีสถานะ Paid
        if ($userRole == 1) {
            return OrderResource::collection(
                Order::query()
                    ->select([
                        'o.id',
                        'o.total_price',
                        'o.created_at',
                        DB::raw('COUNT(oi.id) AS items'),
                        'c.user_id',
                        'c.first_name',
                        'c.last_name'
                    ])
                    ->from('orders AS o')
                    ->join('order_items AS oi', 'oi.order_id', '=', 'o.id')
                    ->join('customers AS c', 'c.user_id', '=', 'o.created_by')
                    ->where('o.status', OrderStatus::Paid->value)
                    ->limit(10)
                    ->orderBy('o.created_at', 'desc')
                    ->groupBy('o.id', 'o.total_price', 'o.created_at', 'c.user_id', 'c.first_name', 'c.last_name')
                    ->get()
            );
        } else {
            // ถ้าไม่ใช่ admin (เช่น seller) ให้ดึงคำสั่งซื้อตาม seller_id ของผู้ใช้
            return OrderResource::collection(
                Order::query()
                    ->select([
                        'o.id',
                        'o.total_price',
                        'o.created_at',
                        DB::raw('COUNT(oi.id) AS items'),
                        'c.user_id',
                        'c.first_name',
                        'c.last_name'
                    ])
                    ->from('orders AS o')
                    ->join('order_items AS oi', 'oi.order_id', '=', 'o.id')
                    ->join('customers AS c', 'c.user_id', '=', 'o.created_by')
                    ->where('o.status', OrderStatus::Paid->value)
                    ->where('o.seller_id', auth()->user()->id)
                    ->limit(10)
                    ->orderBy('o.created_at', 'desc')
                    ->groupBy('o.id', 'o.total_price', 'o.created_at', 'c.user_id', 'c.first_name', 'c.last_name')
                    ->get()
            );
        }
    }
}
