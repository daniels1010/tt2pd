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
        DB::table('files')->insert([
            'name' => 'Pirmais fails',
            'url' => 'https://www.youtube.com/embed/w4a2ge9N31E',
            'poster_url' => 'Purla/uz/bildi',
        ]);

        DB::table('lessons')->insert([
            'school_id' => 1,
            'author_id' => 4,
            'file_id' => 1,
            'title' => 'Pirmā nodarbība',
            'description' => 'Šī ir pirmā testa nodarbība. Bliežam!',
            'poster_url' => 'https://i.ibb.co/1QF7bhw/missing-picture.jpg',
        ]);
    }
}
