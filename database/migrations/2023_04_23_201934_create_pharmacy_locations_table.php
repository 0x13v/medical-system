<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pharmacy_locations', function (Blueprint $table) {
            $table->id();
            $table->integer('area_id');
            $table->integer('priority');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pharmacy_locations');
    }
};
