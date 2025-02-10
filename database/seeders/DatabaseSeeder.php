<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\CategorySeeder;
use Database\Seeders\CourseFormatSeeder;
use Database\Seeders\DifficultyLevelSeeder;
use Database\Seeders\PopularitySeeder;
use Database\Seeders\CourseFilterSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            CourseFormatSeeder::class,
            DifficultyLevelSeeder::class,
            PopularitySeeder::class,
            CourseFilterSeeder::class,
        ]);
    }
}
