<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('longs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('reale_estate_id');
            $table->foreign('reale_estate_id')
            ->references('id')
            ->on('real_eestates')
            ->onDelete('cascade');
            $table->text('long');
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
        Schema::dropIfExists('longs');
    }
}
