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
        Schema::create('subdistricts', function (Blueprint $table) {
            $table->id(); // ฟิลด์ id
            $table->foreignId('district_id')->constrained()->onDelete('cascade'); // ฟิลด์ district_id อ้างอิงถึงตาราง districts
            $table->string('zip_code'); // รหัสไปรษณีย์
            $table->string('abbrv')->unique(); // ตัวย่อของตำบล
            $table->string('name_th'); // ชื่อตำบล (ภาษาไทย)
            $table->string('name_en'); // ชื่อตำบล (ภาษาอังกฤษ)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subdistricts');
    }
};
