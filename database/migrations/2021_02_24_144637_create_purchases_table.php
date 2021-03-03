<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('idSupplier')->nullable();
            $table->foreign('idSupplier')->references('id')->on('suppliers');
            $table->string('invoiceNumber');
            $table->integer('discount');
            $table->integer('ppn');
            $table->integer('total');
            $table->datetime('date');
            $table->string('status');
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
        Schema::dropIfExists('purchases');
    }
}
