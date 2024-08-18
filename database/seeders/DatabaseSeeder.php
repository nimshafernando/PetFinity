<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Truncate tables to avoid duplicate entries
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('sightings')->truncate();
        DB::table('missing_pets')->truncate();
        DB::table('pets')->truncate();
        DB::table('pet_owners')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call([
            PetOwnerSeeder::class,
            PetSeeder::class,
            MissingPetSeeder::class,
            SightingSeeder::class,
            
        ]);
    }
}
