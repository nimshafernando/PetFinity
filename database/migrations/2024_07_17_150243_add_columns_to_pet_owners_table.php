<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPetOwnersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pet_owners', function (Blueprint $table) {
            $table->integer('pets_owned')->after('remember_token')->nullable();
            $table->text('referral_source')->after('pets_owned')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pet_owners', function (Blueprint $table) {
            $table->dropColumn('pets_owned');
            $table->dropColumn('referral_source');
        });
    }
}
