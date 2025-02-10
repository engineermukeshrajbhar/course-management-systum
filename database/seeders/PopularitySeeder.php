<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PopularitySeeder extends Seeder {
    public function run() {
        DB::table('popularity')->insert([
            ['name' => 'Most Enrolled'],
            ['name' => 'Trending'],
            ['name' => 'Recently Viewed'],
        ]);
    }
}

