<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id(); // id column
            $table->unsignedBigInteger('sender_id'); // ID of the sender (could be PetOwner or PetBoardingCenter)
            $table->unsignedBigInteger('receiver_id'); // ID of the receiver (could be PetOwner or PetBoardingCenter)
            $table->text('message');
            $table->boolean('seen')->default(false);
            $table->timestamps(); // created_at and updated_at

            // No foreign key constraints
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
