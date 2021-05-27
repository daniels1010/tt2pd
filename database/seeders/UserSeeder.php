<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('schools')->insert([
        //     'instrument' => 'ģitāra',
        //     'logo' => '',
        //     'email' => 'school@gmail.com',
        // ]);

        // DB::table('users')->insert([
        //     'school_id' => 1,
        //     'first_name' => 'Admins',
        //     'last_name' => 'Testeris',
        //     'type' => 1,
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('admin'),
        // ]);

        DB::table('users')->insert([
            'school_id' => 1,
            'first_name' => 'Jānis',
            'last_name' => 'Bānis',
            'type' => 3,
            'email' => 'janis@gmail.com',
            'password' => Hash::make('1234'),
        ]);

        DB::table('users')->insert([
            'school_id' => 1,
            'first_name' => 'Andris',
            'last_name' => 'Kāposts',
            'type' => 3,
            'email' => 'andris@gmail.com',
            'password' => Hash::make('1234'),
        ]);

        DB::table('users')->insert([
            'school_id' => 1,
            'first_name' => 'Andrejs',
            'last_name' => 'Burkāns ',
            'type' => 3,
            'email' => 'andrejs@gmail.com',
            'password' => Hash::make('1234'),
        ]);
    }
}
