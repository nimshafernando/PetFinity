<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;
use Carbon\Carbon;

class AcceptedAppointmentSeeder extends Seeder
{
    public function run()
    {
        // Create an accepted appointment for boardingcenter_id = 1
        Appointment::create([
            'petowner_id' => 1, // Replace with a valid pet owner ID
            'boardingcenter_id' => 1,
            'pet_id' => 1, // Replace with a valid pet ID
            'start_date' => Carbon::now()->subDays(3)->format('Y-m-d H:i:s'),
            'end_date' => Carbon::now()->subDay()->format('Y-m-d H:i:s'),
            'check_in_time' => Carbon::now()->subDays(3)->format('H:i:s'),
            'check_out_time' => Carbon::now()->subDay()->format('H:i:s'),
            'status' => 'accepted',
            'payment_method' => 'card',
        ]);

        // Create an accepted appointment for boardingcenter_id = 2
        Appointment::create([
            'petowner_id' => 1, // Replace with a valid pet owner ID
            'boardingcenter_id' => 2,
            'pet_id' => 2, // Replace with a valid pet ID
            'start_date' => Carbon::now()->subDays(4)->format('Y-m-d H:i:s'),
            'end_date' => Carbon::now()->subDay()->format('Y-m-d H:i:s'),
            'check_in_time' => Carbon::now()->subDays(4)->format('H:i:s'),
            'check_out_time' => Carbon::now()->subDay()->format('H:i:s'),
            'status' => 'accepted',
            'payment_method' => 'cash',
        ]);
    }
}
