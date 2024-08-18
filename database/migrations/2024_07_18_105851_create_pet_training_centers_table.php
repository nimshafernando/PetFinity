<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pet_training_centers', function (Blueprint $table) {
            $table->id();
                $table->string('business_name');
                $table->string('email')->unique();
                $table->string('phone_number');
                $table->string('password');
                $table->string('city');
                $table->string('street_name');
                $table->string('postal_code');
                $table->text('training_specialization')->nullable();
                $table->string('preferred_environment')->nullable();
                $table->text('types_of_pets_trained')->nullable();
                $table->string('socialmedia_links')->nullable();
                $table->string('photos')->nullable();
                $table->string('joining_goals')->nullable();
            $table->date('registered_date')->default(now()); // Current date will be stored automatically
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pet_training_centers');
    }
};
