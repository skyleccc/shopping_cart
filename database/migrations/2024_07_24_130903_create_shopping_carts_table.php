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
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->id('cartID'); // This creates an unsigned big integer primary key
            $table->unsignedBigInteger('userID'); // Foreign key to users table
            $table->integer('totalQuantity');
            $table->decimal('totalAmount', 10, 2);
            $table->timestamp('cartLastModified')->useCurrent()->useCurrentOnUpdate();

            // Indexes
            $table->index('userID');

            // Foreign key constraints
            $table->foreign('userID')->references('userID')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_carts');
    }
};
