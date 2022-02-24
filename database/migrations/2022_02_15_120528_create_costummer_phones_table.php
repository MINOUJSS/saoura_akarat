<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostummerPhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costummer_phones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('costummer_id');
            $table->foreign('costummer_id')
            ->references('id')
            ->on('costummers')
            ->onDelete('cascade');
            $table->string('phone');
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
        Schema::dropIfExists('costummer_phones');
    }
}
