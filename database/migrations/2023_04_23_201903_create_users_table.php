<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('gender');
            $table->string('password');
            $table->date('date_of_birth');
            $table->string('image')->nullable();
            $table->string('phone_number');
            $table->string('national_id');
            $table->integer('area_id');
            $table->string('street_name');
            $table->integer('building_number');
            $table->integer('floor_number')->nullable();
            $table->integer('flat_number')->nullable();
            $table->boolean('is_main');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
