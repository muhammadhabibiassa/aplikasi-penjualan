<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('idCategory')->nullable();
            $table->foreign('idCategory')->references('id')->on('categories');
            $table->unsignedInteger('idBrand')->nullable();
            $table->foreign('idBrand')->references('id')->on('brands');
            $table->string('name');
            $table->integer('sellingPrice');
            $table->integer('purchasePrice');
            $table->integer('quantity');
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
        Schema::dropIfExists('items');
    }
}
