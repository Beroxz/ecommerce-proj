<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SellerRequest;
use App\Enums\SellerStatus;
use App\Http\Resources\SellerListResource;
use App\Http\Resources\SellerResource;
use App\Models\Seller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = request('per_page', 10);
        $search = request('search', '');
        $sortField = request('sort_field', 'updated_at');
        $sortDirection = request('sort_direction', 'desc');

        $query = Seller::query()->orderBy("sellers.$sortField", $sortDirection);

        if ($search) {
            $query->where(DB::raw("CONCAT(hostSeller_name, ' ', hostSeller_last_name)"), 'like', "%{$search}%")
                ->orWhere('store_name', 'like', "%{$search}%")
                ->orWhere('store_phone', 'like', "%{$search}%");
        }

        $paginator = $query->paginate($perPage);

        return SellerListResource::collection($paginator);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Seller $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        return new SellerResource($seller);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Seller       $seller
     * @return \Illuminate\Http\Response
     */
    public function update(SellerRequest $request, Seller $seller)
    {
        $sellerData = $request->validated();
        $sellerData['updated_by'] = $request->user()->id;
        $sellerData['status'] = $sellerData['status'] ? SellerStatus::Active->value : SellerStatus::Disabled->value;

        DB::beginTransaction();
        try {
            $seller->update($sellerData);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::critical(__METHOD__ . ' method does not work. ' . $e->getMessage());
            throw $e;
        }

        DB::commit();

        return new SellerResource($seller);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Seller $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        $seller->delete();

        return response()->noContent();
    }
}
