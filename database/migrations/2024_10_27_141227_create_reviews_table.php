<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Product;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('review_id');

            // Foreign key to product
            $table->foreignId('product_id')->references('id')->on('products')
                ->constrained('products')
                ->onDelete('cascade');

            // Foreign key to customer (user)
            $table->foreignId('customer_id')->references('user_id')->on('customers')
                ->constrained('customers')
                ->onDelete('cascade');

            // Rating between 1 and 5
            $table->integer('rating')->check('rating BETWEEN 1 AND 5');

            // Review comment
            $table->text('comment')->nullable();

            // Review date
            $table->timestamp('review_date')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
