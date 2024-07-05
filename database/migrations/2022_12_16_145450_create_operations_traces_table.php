<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTracesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations_traces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reale_estate_id');
            $table->string('reale_estate_type');
            $table->string('order_id');
            $table->string('price');
            $table->string('tax');            
            $table->string('transaction');
            $table->date('exp_date')->nullable();            
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
        Schema::dropIfExists('operations_traces');
    }
}
