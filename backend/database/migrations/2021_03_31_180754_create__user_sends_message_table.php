<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSendsMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_sends_message', function (Blueprint $table) {
            $table->foreignId('msgID')->primary()->constrained('message')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('userID')->constrained('user')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_user_sends_message');
    }
}
