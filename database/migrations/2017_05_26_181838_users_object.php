<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersObject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_objects', function(Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->integer('object_id')->unsigned()->index();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('object_id')->references('id')->on('objects')->onDelete('cascade')->onUpdate('cascade');

            $table->unique(['user_id', 'object_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_objects');
    }
}
