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
        Schema::create('districts', function (Blueprint $table) {
            $table->id(); // ฟิลด์ id
            $table->foreignId('province_id')->constrained()->onDelete('cascade'); // ฟิลด์ province_id อ้างอิงถึงตาราง provinces
            $table->string('code')->unique(); // รหัสอำเภอ
            $table->string('abbrv')->unique(); // ตัวย่ออำเภอ
            $table->string('name_th'); // ชื่ออำเภอ (ภาษาไทย)
            $table->string('name_en'); // ชื่ออำเภอ (ภาษาอังกฤษ)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
