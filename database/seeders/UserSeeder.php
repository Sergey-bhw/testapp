<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user_1@example.com',
            'email' => 'user_1@example.com',
            'password' => Hash::make('password_1'),
        ]);
        DB::table('users')->insert([
            'name' => 'user_2@example.com',
            'email' => 'user_2@example.com',
            'password' => Hash::make('password_2'),
        ]);
    }
}
