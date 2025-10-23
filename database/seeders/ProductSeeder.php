<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("products")->insert([
            [
                'name' => 'Baju',
                'description' => 'Nyaman di musim kemarau',
                'price' => 10000,
                'stock' => 30,
                'image' => 'https://www.pngmart.com/files/22/T-Shirt-PNG-HD-Isolated.png',
                'category_id' => 1
            ],
            [
                'name' => 'Laptop',
                'description' => 'bisa kerja dimanapun',
                'price' => 25000,
                'stock' => 25,
                'image'=> 'https://static.vecteezy.com/system/resources/thumbnails/025/366/626/small_2x/laptop-with-blank-screen-isolate-on-transparent-background-ai-generated-png.png',
                'category_id'=> 2
            ],
            [
                'name' => 'Lays',
                'description' => 'Nikmat sambil menonton',
                'price' => 5000,
                'stock' => 20,
                'image'=> 'https://www.kindpng.com/picc/m/693-6935652_transparent-lays-potato-chips-png-png-download.png',
                'category_id'=> 3
            ],
        ]);
    }
}
