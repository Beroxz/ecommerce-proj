<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('store_name', 255);
            $table->string('store_phone')->nullable();
            $table->text('store_description')->nullable();
            $table->string('store_address', 255);
            $table->decimal('store_rating', 3, 2)->nullable();
            $table->string('status', 45)->nullable();
            $table->string('store_image', 2000)->nullable(); // เก็บชื่อไฟล์หรือ path ของรูป
            $table->string('store_image_mime', 255)->nullable(); // เก็บ MIME type เช่น image/jpeg
            $table->integer('store_image_size')->nullable(); // ขนาดของไฟล์รูป (หน่วยเป็น byte)
            $table->timestamps();
            $table->foreignIdFor(User::class, 'created_by')->nullable();
            $table->foreignIdFor(User::class, 'updated_by')->nullable();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
