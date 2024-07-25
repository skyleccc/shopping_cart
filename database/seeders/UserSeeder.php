<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'rbarria',
                'password' => bcrypt('123456'),
                'userFname' => 'Rameses',
                'userLname' => 'Barria',
                'userType' => 'user',
                'userLastModified' => now(),
            ],
            [
                'username' => 'jdiputado',
                'password' => bcrypt('1234567'),
                'userFname' => 'Janritch',
                'userLname' => 'Diputado',
                'userType' => 'user',
                'userLastModified' => now(),
            ],
            [
                'username' => 'jantonio',
                'password' => bcrypt('12345678'),
                'userFname' => 'Justin',
                'userLname' => 'Antonio',
                'userType' => 'user',
                'userLastModified' => now(),
            ],
        ]);
    }
}