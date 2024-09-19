<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin')->insert([
            'name' => 'Admin',
            'email' => 'admin@petfinity.com',
            'password' => Hash::make('admin123'), // Hash the password
        ]);
    }
}
