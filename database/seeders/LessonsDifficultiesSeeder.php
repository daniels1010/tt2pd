<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LessonsDifficultiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lessons_difficulties')->insert([
            'difficulty_id' => 1,
            'lesson_id' => 4,
            'value' => 5,
        ]);

        DB::table('lessons_difficulties')->insert([
            'difficulty_id' => 2,
            'lesson_id' => 4,
            'value' => 8,
        ]);

        DB::table('lessons_difficulties')->insert([
            'difficulty_id' => 4,
            'lesson_id' => 1,
            'value' => 3,
        ]);
    }
}
