<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseFormatSeeder extends Seeder {
    public function run() {
        DB::table('course_formats')->insert([
            ['format' => 'Video'],
            ['format' => 'Text-based'],
            ['format' => 'Interactive/Live'],
        ]);
    }
}

