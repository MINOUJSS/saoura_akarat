<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashierTracesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashier_traces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('amount'); 
            $table->text('type');// سحب أو إضافة
            $table->text('reason'); //سبب الحركة
            $table->integer('admin');
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
        Schema::dropIfExists('cashier_traces');
    }
}
