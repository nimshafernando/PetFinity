<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PetOwner;

class PetOwnerSeeder extends Seeder
{
    public function run()
    {
        if (!PetOwner::where('email', 'johndoe@example.com')->exists()) {
            PetOwner::create([
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'johndoe@example.com',
                'phone_number' => '1234567890',
                'password' => bcrypt('password'),
            ]);
        }
    }
}
