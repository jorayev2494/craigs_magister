<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email', 255)->unique()->index();
            $table->string('avatar')->default('default.jpg');
            // $table->string('phone', 225)->nullable();
            $table->string('password');
            
            $table->bigInteger('role_id')->unsigned()->default(1);
            $table->foreign('role_id')->references('id')->on('admin_roles')->onDelete('cascade');

            $table->bigInteger('location_country_id')->unsigned()->nullable();
            $table->foreign('location_country_id')->references('id')->on('countries')->onDelete('cascade');
            
            $table->bigInteger('location_city_id')->unsigned()->nullable();
            $table->foreign('location_city_id')->references('id')->on('cities')->onDelete('cascade');
            
            // $table->timestamp('email_verified_at')->nullable();
            $table->boolean('email_confirmed')->default(false);
            $table->boolean('active')->default(false)->index();
            $table->string('remember_token', 255)->nullable()->default(null);
            $table->timestamp('last_login')->nullable()->default(null);
            $table->timestamp('last_activity')->nullable()->default(null);
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
        Schema::dropIfExists('admins');
    }
}
