<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterItemIdForPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('purchase_details', function (Blueprint $table) {
        //     $table->unsignedInteger('purchaseId')->after('id')->index();
        //     $table->foreign('purchaseId')->references('id')->on('purchases')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('purchase_details', function (Blueprint $table) {
        //     $table->dropForeign(['purchaseId']);
        // });
    }
}
