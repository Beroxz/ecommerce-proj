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
        Schema::table('provinces', function (Blueprint $table) {
            $table->string('code')->unique()->after('id'); // รหัสจังหวัด
            $table->string('abbrv')->unique()->after('code'); // ตัวย่อจังหวัด
            $table->string('name_th')->unique()->after('abbrv'); // ชื่อจังหวัด (ภาษาไทย)
            $table->string('name_en')->unique()->after('name_th'); // ชื่อจังหวัด (ภาษาอังกฤษ)
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
