<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'product_name' => 'Bread',
                'description' => 'Good',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_name' => 'Potato',
                'description' => 'Nice',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_name' => 'Napa',
                'description' => '',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_name' => 'Minicate',
                'description' => '',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        DB::table('products')->insert($data);
    }
}
