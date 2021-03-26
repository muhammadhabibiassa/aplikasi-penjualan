<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterStockInStockOutForTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stocks', function (Blueprint $table) {
            // $table->unsignedInteger('stockIn')->nullable()->change();
            // $table->unsignedInteger('stockOut')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stocks', function (Blueprint $table) {
            // $table->unsignedInteger('stockIn')->after('idItem');
            // $table->unsignedInteger('stockOut')->after('stockIn');
        });
    }
}
