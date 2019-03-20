<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id');
            //$table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->integer('user_id');
<<<<<<< HEAD
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
=======
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['user_id', 'book_id']);
>>>>>>> 48d15ba78920f854034ed2a5a43e2e48e42462e8
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribes');
    }
}
