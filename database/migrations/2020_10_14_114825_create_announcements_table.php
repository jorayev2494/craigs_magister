<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();

            $table->string('title', 255);
            $table->longText('description');
            // $table->string('type', 255);
            $table->string('price', 255);
            $table->string('price_per', 255);
            $table->boolean('is_price_contractual')->default(false);
            
            $table->string('status', 255);
            $table->longText('status_cancelled_description')->nullable();   
            $table->longText('status_blocked_description')->nullable(); 
            $table->string('rate')->nullable();
            
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            
            // $table->bigInteger('body_id');

            // $table->bigInteger('concrete_id')->unsigned();
            // $table->foreign('concrete_id')->references('id')->on('concretes')->onDelete('cascade');

            $table->bigInteger('creator_id')->unsigned();
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('location', 255)->nullable();

            $table->bigInteger('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            
            $table->bigInteger('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->string('location_google_latitude', 255)->nullable();
            $table->string('location_google_longitude', 255)->nullable();
            
            $table->json('images');
            $table->string('video', 255)->nullable();

            $table->integer('viewed')->unsigned()->default(0);
            $table->dateTime('unblock_date')->nullable();
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
        Schema::dropIfExists('announcements');
    }
}
