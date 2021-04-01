<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id('postID');
            $table->foreignId('threadID')->constrained('thread')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamp('postDate');
            $table->string('content');
        });
        DB::unprepared("ALTER TABLE 'post' DROP PRIMARY KEY, ADD PRIMARY KEY (  'postID' ,  'threadID' )");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
