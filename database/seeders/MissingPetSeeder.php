<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MissingPet;
use App\Models\Pet;

class MissingPetSeeder extends Seeder
{
    public function run()
    {
        $pet = Pet::first();
        $petOwner = $pet ? $pet->petOwner : null;

        if ($pet && $petOwner && !MissingPet::where('last_seen_location', 'Colombo')->exists()) {
            MissingPet::create([
                'pet_id' => $pet->id,
                'petowner_id' => $petOwner->id,
                'last_seen_location' => 'Colombo',
                'last_seen_location_latitude' => 6.9271,
                'last_seen_location_longitude' => 79.8612,
                'last_seen_date' => now(),
                'additional_info' => 'Wearing a red collar',
                'distinguishing_features' => 'White spot on the back',
            ]);
        }
    }
}
