<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $primaryKey = 'review_id';

    protected $fillable = [
        'product_id',   // ID ของผลิตภัณฑ์ที่รีวิว
        'customer_id',  // ID ของลูกค้าที่ให้รีวิว
        'rating',       // คะแนนที่ให้
        'comment',      // ความคิดเห็น
        'review_date',  // วันที่รีวิว
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'user_id');
    }

    public static function getAverageRating($productId)
    {
        return self::where('product_id', $productId)->avg('rating');
    }
}
