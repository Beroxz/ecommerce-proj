<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // เพิ่มคอลัมน์ seller_id
            $table->unsignedBigInteger('seller_id')->nullable()->after('price');

            // ตั้งค่า foreign key เชื่อมกับ user_id ในตาราง sellers
            $table->foreign('seller_id')->references('user_id')->on('sellers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // ลบ foreign key และคอลัมน์ seller_id เมื่อ rollback
            $table->dropForeign(['seller_id']);
            $table->dropColumn('seller_id');
        });
    }
};
