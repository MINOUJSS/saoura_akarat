<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earnings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('operation_id');
            $table->foreign('operation_id')
            ->references('id')
            ->on('operations')
            ->onDelete('cascade');
            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id')
            ->references('id')
            ->on('invoices')
            ->onDelete('cascade');
            $table->string('earning');
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
        Schema::dropIfExists('earnings');
    }
}
