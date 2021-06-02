<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('files')->insert([
        //     'school_id' => 1,
        //     'name' => 'Pirmais fails',
        //     'url' => 'https://www.youtube.com/embed/w4a2ge9N31E',
        // ]);

        // DB::table('lessons')->insert([
        //     'school_id' => 1,
        //     'author_id' => 4,
        //     'file_id' => 1,
        //     'title' => 'Otrā nodarbība',
        //     'description' => 'Šī ir otrā testa nodarbība. Bliežam!',
        //     'poster_url' => 'https://i.ibb.co/1QF7bhw/missing-picture.jpg',
        //     'created_at' => date('Y-m-d H:i:s'),
        // ]);

        DB::table('user_lessons')->insert([
            'school_id' => 1,
            'user_id' => 3,
            'lesson_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
