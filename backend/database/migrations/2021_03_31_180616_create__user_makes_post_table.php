<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMakesPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_makes_post', function (Blueprint $table) {
            $table->foreignId('postID')->constrained('post')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('threadID')->constrained('thread')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('_user_makes_post');
    }
}
