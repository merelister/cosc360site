<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadContainsPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thread_contains_post', function (Blueprint $table) {
            $table->foreignId('threadID')->constrained('thread')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('postID')->constrained('post')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_thread_contains_post');
    }
}
