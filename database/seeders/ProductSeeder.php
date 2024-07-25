<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'prodName' => 'Planet Over Profit (Black)',
                'prodDesc' => 'Made by: Nerifriel Demandaco / Frosho Visuals',
                'prodImageURL' => 'https://scontent.fceb6-1.fna.fbcdn.net/v/t39.30808-6/278950666_542332120856721_8499447007268301958_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeFTJs-iI6EKMFkJJIOofzCyRKqQGuTi4-tEqpAa5OLj6yUK5v2x4PMBYrBWBBguU48JIOLqIggO2jr35c-RJ6Ve&_nc_ohc=bPePoloFjNIQ7kNvgEOf1cX&_nc_ht=scontent.fceb6-1.fna&oh=00_AYDhgzrQnwTF-rkZZ3eNVpSgyqGV43KdaZ8RXLHhOTMN5g&oe=66A8371C',
                'prodLastModified' => now(),
            ],
            [
                'prodName' => 'Planet Over Profit (White)',
                'prodDesc' => 'Made by: Nerifriel Demandaco / Frosho Visuals',
                'prodImageURL' => 'https://scontent.fceb6-1.fna.fbcdn.net/v/t39.30808-6/278921639_542332204190046_4476405315755269806_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeGXpgMNf1hPzvzh00UGYdQr-TE6M4pE1gj5MTozikTWCEOqR3iFoJ7-npRKJ0AfCKQba3DvbARZlgz7bB3GiZn4&_nc_ohc=xioB1GX_NbEQ7kNvgHjVRb3&_nc_ht=scontent.fceb6-1.fna&oh=00_AYDV3WQUsh7DUtzyGXH1491rDCTPRfzq_XeFGX6o_lAk-A&oe=66A8321C',
                'prodLastModified' => now(),
            ],
            [
                'prodName' => 'Lion of Cebu',
                'prodDesc' => 'T-Shirt / Jacket',
                'prodImageURL' => 'https://scontent.fmnl4-7.fna.fbcdn.net/v/t1.6435-9/124168884_202666628156607_5741546778345846224_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeFdpA2IS0_m3j0gAIFg81KhKxddaSRy5hsrF11pJHLmG_xdKhlCHUrFD2TRiqRvjgyyTuJE34HzUmAJbZBnp7nC&_nc_ohc=MlLplZiIHh0Q7kNvgHTQaZ5&_nc_ht=scontent.fmnl4-7.fna&oh=00_AYD3BXJjdcc9ugDtYuL2Mn801fp-Xk_ln1zmGokXcWE1hg&oe=66C9F5B0',
                'prodLastModified' => now(),
            ],
            [
                'prodName' => 'Black Lives Matter',
                'prodDesc' => 'Polo Shirt',
                'prodImageURL' => 'https://scontent.fceb6-1.fna.fbcdn.net/v/t1.6435-9/122089687_198117251944878_9146383757261450684_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEnh6egaGv1gmnumgh0T6M8NBln41k06ig0GWfjWTTqKPX9kdJ-Cy0YO6T02nen9OGdcFvo3qxZQtzEn3sAn355&_nc_ohc=J7Y9CFUvxkAQ7kNvgFH9S89&_nc_ht=scontent.fceb6-1.fna&oh=00_AYCxHuKk_ZxIO5IdxWBLdZNN_PCdlghJJy7ce5_8sN-kww&oe=66C9CB05',
                'prodLastModified' => now(),
            ],
            [
                'prodName' => 'Ambassador Shirt 2021',
                'prodDesc' => 'T-Shirt',
                'prodImageURL' => 'https://scontent.fmnl4-2.fna.fbcdn.net/v/t1.6435-9/147907996_263495035407099_5274457421100706161_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=13d280&_nc_eui2=AeGvWgIqqVviigohrFK7Hs5YywzQ-8PMDN7LDND7w8wM3i6BTcwJBLdvt5S44SQwMo_wU--cGOi-uOSEvktwyqSF&_nc_ohc=vBrW10Mr2ToQ7kNvgH8VydQ&_nc_ht=scontent.fmnl4-2.fna&oh=00_AYCAcw-g077vbMAzI1jt1bbWTL0JKYGXp5-BmoqO3Xtvrg&oe=66C9D101',
                'prodLastModified' => now(),
            ],
        ]);
    }
}