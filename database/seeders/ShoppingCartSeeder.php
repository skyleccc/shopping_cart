<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoppingCartSeeder extends Seeder
{
    public function run()
    {
        DB::table('shopping_carts')->insert([
            [
                'totalQuantity' => 5,
                'totalAmount' => 1250.00,
                'userID' => 1,
                'cartLastModified' => now(),
            ],
            [
                'totalQuantity' => 2,
                'totalAmount' => 500.00,
                'userID' => 2,
                'cartLastModified' => now(),
            ],
            [
                'totalQuantity' => 3,
                'totalAmount' => 750.00,
                'userID' => 3,
                'cartLastModified' => now(),
            ],
        ]);
    }
}