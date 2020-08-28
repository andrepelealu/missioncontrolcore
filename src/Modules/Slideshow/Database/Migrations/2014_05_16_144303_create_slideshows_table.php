<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlideshowsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('slideshows', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('published')->default(false);
            $table->timestamps();
            $table->softdeletes();
        });
    }


    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('slideshows');
    }
}
