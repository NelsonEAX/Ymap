<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYmapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->text('locality', 255)->comment('Населенный пункт');
            $table->text('district', 255)->comment('Федеральный округ');
            $table->integer('population')->comment('Численность');            
            $table->text('date', 10)->comment('Дата переписи');
            $table->text('geo', 20)->comment('Координаты');
            $table->text('link', 255)->comment('Ссылка');
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
        Schema::drop('places');
    }
}
