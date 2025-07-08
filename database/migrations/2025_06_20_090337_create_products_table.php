<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2)->nullable(); // for coupon-based discount
            $table->boolean('stock_status')->default(true); // true = in stock
            $table->text('details')->nullable();
            $table->json('faqs')->nullable(); // array of question/answer
            $table->json('images')->nullable(); // array of image filenames
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
