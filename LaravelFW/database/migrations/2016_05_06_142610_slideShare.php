<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SlideShare extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide_share',function($table){
            $table->integer('id_search');
            $table->integer('id_user');
            $table->integer('id_slide');
            $table->timestamp('data_cautare');
            $table->text('titlu');
            $table->text('resursa');
            $table->string('limba');
            $table->string('format');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
