<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('avatar')->default('default.jpg');
            $table->string('email', 255)->unique()->index();
            $table->string('phone', 225)->nullable();
            $table->string('password');
            $table->string('rate')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('location_country_id')->unsigned()->nullable();
            $table->foreign('location_country_id')->references('id')->on('countries')->onDelete('cascade');
            
            $table->bigInteger('location_city_id')->unsigned()->nullable();
            $table->foreign('location_city_id')->references('id')->on('cities')->onDelete('cascade');
            
            $table->boolean('email_confirmed')->default(false);
            $table->boolean('active')->default(false);
            $table->dateTime('unblock_date')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->longText('about')->nullable();
            $table->string('remember_token', 255)->nullable()->default(null);
            $table->timestamp('last_login')->nullable()->default(null);
            $table->timestamp('last_activity')->nullable()->default(null);
            // $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
