<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetBoardingCentersTable extends Migration
{
    public function up()
    {
        Schema::create('pet_boarding_centers', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('password');
            $table->string('city');
            $table->string('street_name');
            $table->string('postal_code');
            $table->string('operating_hours');
            $table->string('special_amenities')->nullable();
            $table->string('socialmedia_links')->nullable();
            $table->string('photos')->nullable();
            $table->string('joining_goals')->nullable();
            $table->date('registered_date')->default(now()); // Current date will be stored automatically
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->rememberToken();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pet_boarding_centers');
    }
}
