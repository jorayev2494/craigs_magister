<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('announcement_id')->unsigned();
            $table->foreign('announcement_id')->references('id')->on('announcements')->onDelete('cascade');
            
            $table->string('marka', 255)->nullable()->comment('Марка');            
            $table->string('model', 255)->nullable()->comment('Модель');
            $table->string('year', 255)->nullable()->comment('год');
            
            $table->string('engine', 225)->nullable()->default('Двигатель');
            $table->string('color', 225)->nullable()->default('Цвет');
            $table->string('transmission', 225)->nullable()->default('Коробка передач');
            $table->string('drive_unit', 225)->nullable()->default('привод');
            $table->boolean('exchange')->default(false);
            
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
        Schema::dropIfExists('cars');
    }
}
