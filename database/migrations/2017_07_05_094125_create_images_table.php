<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('image');
            $table->integer('post_id')->unsigned(); 
            $table->foreign('post_id')->references('id')->on('posts');

            $table->timestamps();

        });


        //Schema::table('images', function($table) { $table->foreign('post_id')->references('id')->on('posts'); });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('images');
    }
}
//$table->foreign('category_id')->references('id')->on('categories');
