<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabaseGodelLotto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draws', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('announce_time');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->enum('status', ['opened', 'closed']);
            $table->integer('sets_quantity');
            $table->unsignedInteger('movie_id');
            $table->unsignedInteger('creator_id');
            $table->unsignedInteger('location_id');
        });

        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('original_title');
            $table->string('title');
            $table->string('poster');
            $table->text('description');
            $table->dateTime('release_date');
            $table->string('trailer');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name');
            $table->string('password');
            $table->string('email');
            $table->unsignedInteger('location_id');
            $table->enum('role', ['user', 'admin']);
        });

        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('lucky_number');
            $table->tinyInteger('is_winner');
            $table->unsignedInteger('draw_id');
        });

        Schema::create('location', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('alias');
        });

        Schema::create('messageTemplates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('draws');
    }
}
