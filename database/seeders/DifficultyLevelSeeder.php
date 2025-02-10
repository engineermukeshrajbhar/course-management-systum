<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DifficultyLevelSeeder extends Seeder {
    public function run() {
        DB::table('difficulty_levels')->insert([
            ['level' => 'Beginner'],
            ['level' => 'Intermediate'],
            ['level' => 'Advanced'],
        ]);
    }
}

