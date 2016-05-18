<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlideShare extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('slide_share')->insert(array(
            'id_search'=>'12345',
            'id_user'=>'100',
            'id_slide'=>'33256',
            'data_cautare'=>date('d-m-Y','08-10-1989'),
            'titlu'=>'titlu',
            'resursa'=>'<>www.hjghjg.tr',
            'limba'=>'ro',
            'format'=>'ppt'
            ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('slide_share')->where('id_slide','=','33256');
    }
}
