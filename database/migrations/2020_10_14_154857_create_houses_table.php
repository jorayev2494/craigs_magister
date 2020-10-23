<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('announcement_id')->unsigned();
            $table->foreign('announcement_id')->references('id')->on('announcements')->onDelete('cascade');
            
            $table->string('total_area', 255)->nullable()->comment('Общая площадь');            
            $table->string('exchange_possibility', 255)->nullable()->comment('Возможность обмена');
            $table->string('property_type', 255)->nullable()->comment('Тип объекта');
            $table->integer('number_of_storeys')->unsigned()->nullable()->comment('Этажность');
            $table->integer('floor')->unsigned()->nullable()->comment('Этаж');
            $table->integer('quantity_rooms')->unsigned()->nullable()->comment('Количество комнат');

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
        Schema::dropIfExists('houses');
    }
}
