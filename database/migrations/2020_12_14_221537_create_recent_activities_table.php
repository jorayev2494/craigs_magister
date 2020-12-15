<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecentActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recent_activities', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned()->nullable();            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('announcement_id')->unsigned()->nullable();
            $table->foreign('announcement_id')->references('id')->on('announcements')->onDelete('cascade');

            // $table->bigInteger('announcement_id')->unsigned()->nullable();
            // $table->foreign('announcement_id')->references('id')->on('announcements')->onDelete('cascade');

            $table->string('status', 255)->nullable()->nullable();
            $table->string('action', 255)->nullable()->nullable();

            $table->bigInteger('from_user_id')->unsigned()->nullable();
            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');

            $table->boolean('is_viewed')->default(false);

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
        Schema::dropIfExists('recent_activities');
    }
}
