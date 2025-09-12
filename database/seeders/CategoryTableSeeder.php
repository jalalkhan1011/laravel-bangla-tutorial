<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
            [
                'category_name'=>'Food',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_name'=>'Medicine',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_name'=>'Rice',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ];
        DB::table('categories')->insert($data);
    }
}
