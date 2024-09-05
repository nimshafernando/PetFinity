<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id');
            $table->foreignId('receiver_id');
            $table->enum('sender_type', ['pet_owner', 'pet_boarding_center']);
            $table->enum('receiver_type', ['pet_owner', 'pet_boarding_center']);
            $table->foreignId('appointment_id')->constrained('appointments')->onDelete('cascade');
            $table->text('message');
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
