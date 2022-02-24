<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEestatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_eestates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->string('realestate_type');
            $table->integer('rooms');
            $table->integer('baths');
            $table->integer('etages');
            $table->integer('facad');
            $table->integer('furnished');
            $table->integer('property');
            $table->integer('transaction');
            $table->integer('garage');
            $table->text('google_map_code');
            $table->text('description');
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
        Schema::dropIfExists('real_eestates');
    }
}
