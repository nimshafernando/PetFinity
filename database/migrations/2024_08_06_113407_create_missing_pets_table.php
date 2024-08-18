<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissingPetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missing_pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained('pets')->onDelete('cascade');
            $table->foreignId('petowner_id')->constrained('pet_owners')->onDelete('cascade');
            $table->date('last_seen_date');
            $table->time('last_seen_time');
            $table->string('last_seen_location');
            $table->double('last_seen_location_latitude');
            $table->double('last_seen_location_longitude');
            $table->text('distinguishing_features');
            $table->text('additional_info')->nullable();
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('missing_pets');
    }
}
