<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id(); // This will create an auto-incrementing unsigned big integer primary key column named "id"
            $table->unsignedBigInteger('cartID'); // Foreign key to shopping_carts table
            $table->unsignedBigInteger('productID'); // Foreign key to products table
            $table->integer('cartQuantity');
            $table->decimal('cartPriceEach', 10, 2);
            $table->timestamp('itemLastModified')->useCurrent()->useCurrentOnUpdate();

            // Indexes
            $table->index('cartID');
            $table->index('productID');

            // Foreign key constraints
            $table->foreign('cartID')->references('cartID')->on('shopping_carts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('productID')->references('prodID')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
};
