
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
        Schema::create('appointments', function (Blueprint $table) {
           
            $table->id();

            //foreign key section
            //constrained - from which table 
            $table->foreignId('boardingcenter_id')->constrained('pet_boarding_centers')->onDelete('cascade');
            $table->foreignId('petowner_id')->constrained('pet_owners')->onDelete('cascade');
            $table->foreignId('pet_id')->constrained('pets')->onDelete('cascade');
            
            $table->date('start_date');
            $table->date('end_date');
            $table->time('check_in_time');
            $table->time('check_out_time');
            $table->text('special_notes')->nullable();

            $table->string('status')->default('pending');
            $table->string('payment_status')->default('pending');
            $table->string('payment_method')->nullable();
            $table->string('declined_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};