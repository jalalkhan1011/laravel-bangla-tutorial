<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'course_name' => 'Web Development with Laravel',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_name' => 'Introduction to PHP Programming',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_name' => 'JavaScript for Beginners',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_name' => 'Advanced Vue.js',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_name' => 'Database Design & MySQL',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_name' => 'REST API Development with Laravel',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_name' => 'Frontend Development with Bootstrap & Tailwind',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_name' => 'Software Project Management Basics',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_name' => 'Object Oriented Programming in PHP',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_name' => 'Git & GitHub Version Control',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        DB::table('courses')->insert($data);
    }
}
