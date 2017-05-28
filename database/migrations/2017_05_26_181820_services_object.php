<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServicesObject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_objects', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('service_id')->unsigned()->index();
            $table->integer('object_id')->unsigned()->index();
            $table->integer('class')->unsigned()->nullable();
            $table->float('price');

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('object_id')->references('id')->on('objects')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_objects');
    }
}
