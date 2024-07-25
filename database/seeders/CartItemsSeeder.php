<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartItemsSeeder extends Seeder
{
    public function run()
    {
        DB::table('cart_items')->insert([
            [
                'cartID' => 1,
                'productID' => 2,
                'cartQuantity' => 3,
                'cartPriceEach' => 250.00,
                'itemLastModified' => now(),
            ],
            [
                'cartID' => 1,
                'productID' => 3,
                'cartQuantity' => 1,
                'cartPriceEach' => 250.00,
                'itemLastModified' => now(),
            ],
            [
                'cartID' => 1,
                'productID' => 4,
                'cartQuantity' => 1,
                'cartPriceEach' => 250.00,
                'itemLastModified' => now(),
            ],
            [
                'cartID' => 2,
                'productID' => 1,
                'cartQuantity' => 2,
                'cartPriceEach' => 250.00,
                'itemLastModified' => now(),
            ],
            [
                'cartID' => 3,
                'productID' => 4,
                'cartQuantity' => 1,
                'cartPriceEach' => 250.00,
                'itemLastModified' => now(),
            ],
            [
                'cartID' => 3,
                'productID' => 5,
                'cartQuantity' => 2,
                'cartPriceEach' => 250.00,
                'itemLastModified' => now(),
            ],
        ]);
    }
}