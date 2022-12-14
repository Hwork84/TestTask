<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('1'),
            'is_admin' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'User@gmail.com',
            'password' => Hash::make('2'),
            'is_admin' => 0
        ]);
    }
}
