<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'dn212516@dal.ca',
            'username' => 'Admin',
            'password' => Hash::make('Red55Sky'),
            'city' => 'Halifax',
            'user_type' => 'Admin',
        ]);

        DB::table('profiles')->insert([
            'user_id' => '1',
            'title' => 'Admin Profile',
        ]);
    }
}
