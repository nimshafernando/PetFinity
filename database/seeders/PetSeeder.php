<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pet;
use App\Models\PetOwner;

class PetSeeder extends Seeder
{
    public function run()
    {
        $petOwner = PetOwner::first();

        if ($petOwner && !Pet::where('pet_name', 'Buddy')->exists()) {
            Pet::create([
                'petowner_id' => $petOwner->id,
                'pet_name' => 'Buddy',
                'type' => 'Dog',
                'breed' => 'Labrador',
                'age' => '3 years',
                'is_castrated' => 'Yes',
                'gender' => 'Male',
                'weight' => 30,
                'height' => 60,
                'medical_conditions' => 'None',
                'dietary_restrictions' => 'None',
                'behavioral_notes' => 'Friendly',
            ]);
        }
    }
}
