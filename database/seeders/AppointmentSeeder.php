<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;
use Carbon\Carbon;

class AppointmentSeeder extends Seeder
{
    public function run()
    {
        // Create a completed appointment for boardingcenter_id = 1
        Appointment::create([
            'petowner_id' => 1, // Replace with a valid pet owner ID
            'boardingcenter_id' => 1,
            'pet_id' => 1, // Replace with a valid pet ID
            'start_date' => Carbon::now()->subDays(10)->format('Y-m-d H:i:s'),
            'end_date' => Carbon::now()->subDays(7)->format('Y-m-d H:i:s'),
            'check_in_time' => Carbon::now()->subDays(10)->format('H:i:s'),
            'check_out_time' => Carbon::now()->subDays(7)->format('H:i:s'),
            'status' => 'completed',
            'payment_method' => 'card',
        ]);

        // Create a completed appointment for boardingcenter_id = 2
        Appointment::create([
            'petowner_id' => 1, // Replace with a valid pet owner ID
            'boardingcenter_id' => 2,
            'pet_id' => 2, // Replace with a valid pet ID
            'start_date' => Carbon::now()->subDays(8)->format('Y-m-d H:i:s'),
            'end_date' => Carbon::now()->subDays(5)->format('Y-m-d H:i:s'),
            'check_in_time' => Carbon::now()->subDays(8)->format('H:i:s'),
            'check_out_time' => Carbon::now()->subDays(5)->format('H:i:s'),
            'status' => 'completed',
            'payment_method' => 'cash',
        ]);
    }
}
