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
        Schema::table('pet_boarding_centers', function (Blueprint $table) {
            $table->decimal('price_per_night', 8, 2)->nullable()->after('animal_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pet_boarding_centers', function (Blueprint $table) {
            $table->dropColumn('price_per_night');
        });
    }
};
