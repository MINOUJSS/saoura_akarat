<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderToFindRealeEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_to_find_reale_estates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('type');
            $table->string('rooms')->nullable();
            $table->string('baths')->nullable();
            $table->string('etages')->nullable();
            $table->string('etage_number')->nullable();
            $table->string('facad')->nullable();
            $table->string('furnished')->nullable();
            $table->string('property')->nullable();
            $table->string('transaction')->nullable();
            //$table->integer('garage');
            // $table->text('price')->nullable();
            $table->string('wilaya')->nulable();
            $table->string('dayra')->nullable();;
            $table->string('baladia')->nullable();
            // $table->text('address')->nullable();
            // $table->text('google_map_code')->nullable();
            $table->text('description')->nullable();
            $table->integer('statu')->default(0);
            // $table->text('rolls')->nullable();
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
        Schema::dropIfExists('order_to_find_reale_estates');
    }
}
