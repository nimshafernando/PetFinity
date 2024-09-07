<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->string('sender_user_type')->after('receiver_id'); // Add this column after receiver_id
        });
    }
    
    public function down()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->dropColumn('sender_user_type');
        });
    }
    
};
