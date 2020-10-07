<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HauseUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->bigincrements('id')->unique();
            $table->string('first_last_name');
            $table->boolean('sex')->default(0);
            $table->string('base_image')->nullable();
            $table->string('password');
            $table->string('username');
            $table->string('Email');
            $table->timestamps();


        });

        Schema::table('users', function ($table) {
            $table->string('api_token', 60)->after('password')

                ->nullable()
                ->default(null);
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
