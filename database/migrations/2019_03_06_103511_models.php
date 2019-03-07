<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Models extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->unique();
            $table->string('color',20);
            $table->year('year_of_manufacturer',4);
            $table->string('registration_number',10)->unique();
            $table->string('note',50);
            $table->string('count',4);
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
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
        //
        Schema::dropIfExists('models');
    }
}
