<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLatLongNullableInMissingPetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('missing_pets', function (Blueprint $table) {
            // Make latitude and longitude columns nullable
            $table->double('last_seen_location_latitude')->nullable()->change();
            $table->double('last_seen_location_longitude')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('missing_pets', function (Blueprint $table) {
            // Reverse the changes
            $table->double('last_seen_location_latitude')->nullable(false)->change();
            $table->double('last_seen_location_longitude')->nullable(false)->change();
        });
    }
}
