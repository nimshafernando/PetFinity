<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $tasks = [
            ['name' => 'Feeding', 'description' => 'Feed the pet according to the provided schedule.'],
            ['name' => 'Walking', 'description' => 'Take the pet for a walk at least twice a day.'],
            ['name' => 'Grooming', 'description' => 'Groom the pet according to owner instructions.'],
            ['name' => 'Medication', 'description' => 'Administer any required medication.'],
            ['name' => 'Playtime', 'description' => 'Engage the pet in play activities.'],
            ['name' => 'Health Check', 'description' => 'Perform a general health check.'],
            ['name' => 'Rest Time', 'description' => 'Ensure the pet has adequate rest time.'],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
