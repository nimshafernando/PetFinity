<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('petowner_id');
            $table->string('pet_name');
            $table->string('type'); 
            $table->string('breed');
            $table->string('age');
            $table->string('is_castrated');
            $table->string('gender');
            $table->float('weight')->nullable();
            $table->float('height')->nullable();
            $table->text('medical_conditions')->nullable();
            $table->text('dietary_restrictions')->nullable();
            $table->text('behavioral_notes')->nullable();
            $table->string('profile_picture')->nullable();
            $table->timestamps();

            $table->foreign('petowner_id')->references('id')->on('pet_owners')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
