<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

         User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);
        DB::table('products')->insert([
            [
                'name' => 'Fancy Dress 1',
                'image' => 'storage/uploads/product2.png',
                'price' => 200
            ],
            [
                'name' => 'Fancy Dress 2',
                'image' => 'storage/uploads/product3.png',
                'price' => 250
            ],
            [
                'name' => 'Fancy Dress 3',
                'image' => 'storage/uploads/product4.png',
                'price' => 170
            ],
            [
                'name' => 'Fancy Dress 4',
                'image' => 'storage/uploads/product5.png',
                'price' => 180
            ],
            [
                'name' => 'Fancy Dress 5',
                'image' => 'storage/uploads/product6.png',
                'price' => 190
            ],
            [
                'name' => 'Fancy Dress 6',
                'image' => 'storage/uploads/product7.png',
                'price' => 200
            ],
            [
                'name' => 'Fancy Dress 7',
                'image' => 'storage/uploads/product8.png',
                'price' => 280
            ],
            [
                'name' => 'Fancy Dress 8',
                'image' => 'storage/uploads/product9.png',
                'price' => 200
            ],
            [
                'name' => 'Fancy Dress 9',
                'image' => 'storage/uploads/product10.png',
                'price' => 200
            ],
            [
                'name' => 'Fancy Dress 10',
                'image' => 'storage/uploads/product11.png',
                'price' => 200
            ],
            [
                'name' => 'Fancy Dress 11',
                'image' => 'storage/uploads/product12.png',
                'price' => 200
            ],
            [
                'name' => 'Fancy Dress 12',
                'image' => 'storage/uploads/product13.png',
                'price' => 200
            ],
            [
                'name' => 'Fancy Dress 13',
                'image' => 'storage/uploads/product14.png',
                'price' => 200
            ],
            [
                'name' => 'Fancy Dress 14',
                'image' => 'storage/uploads/product15.png',
                'price' => 200
            ],
            [
                'name' => 'Fancy Dress 15',
                'image' => 'storage/uploads/product16.png',
                'price' => 200
            ],
            [
                'name' => 'Fancy Dress 16',
                'image' => 'storage/uploads/product22.png',
                'price' => 200
            ],
            // ...
        ]);
    }
}
