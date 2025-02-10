<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseFilterSeeder extends Seeder {
    public function run() {
        DB::table('course_filters')->insert([
            ['filter_name' => 'Best Selling'],
            ['filter_name' => 'New Releases'],
            ['filter_name' => 'Top Rated'],
        ]);
    }
}

