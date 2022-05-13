<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnlikedListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unliked_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_to_find_id');
            $table->foreign('order_to_find_id')
            ->references('id')
            ->on('order_to_find_reale_estates')
            ->onDelete('cascade');
            $table->unsignedBigInteger('reale_estate_id');
            $table->foreign('reale_estate_id')
            ->references('id')
            ->on('real_eestates')
            ->onDelete('cascade');
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
        Schema::dropIfExists('unliked_lists');
    }
}
