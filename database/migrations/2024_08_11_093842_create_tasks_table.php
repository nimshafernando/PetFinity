<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Seed default tasks
        DB::table('tasks')->insert([
            ['name' => 'Feeding', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Walking', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Grooming', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Medication', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Playtime', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Health Check', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
