<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $table = 'sellers';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'store_name',           // ชื่อร้าน
        'store_phone',          // เบอร์โทรศัพท์ร้าน
        'store_description',    // รายละเอียดร้าน
        'store_address',        // ที่อยู่ร้าน
        'store_rating',         // คะแนนร้าน
        'status',               // สถานะ
        'store_image',          // ชื่อไฟล์รูป
        'store_image_mime',     // MIME type ของรูป
        'store_image_size',     // ขนาดของไฟล์รูป
        'created_by',           // ID ของผู้สร้าง
        'updated_by',           // ID ของผู้ปรับปรุง
    ];

    // ความสัมพันธ์กับผู้ใช้ (ผู้สร้างและผู้ปรับปรุง)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // public function reviews()
    // {
    //     return $this->hasMany(SellerReview::class, 'seller_id');
    // }
}
