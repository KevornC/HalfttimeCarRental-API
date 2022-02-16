<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('memberID')->unsigned();
            $table->Foreign('memberID')->references('id')->on('members');
            $table->bigInteger('vehicleID')->unsigned();
            $table->Foreign('vehicleID')->references('id')->on('vehicles');
            $table->date('startDate');
            $table->date('endDate');
            $table->integer('quantity');
            $table->string('status');
            $table->string('approvedBy');
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
        Schema::dropIfExists('orders');
    }
}
