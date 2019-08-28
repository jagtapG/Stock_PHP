<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGrossAndTareAndNetweightAndUomAndVehiclnoAndQuantityAndStoreColumnsToMaterialEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('material_entries', function (Blueprint $table) {
            $table->float('gross',128, 3)->nullable();
            $table->float('tare',128, 3)->nullable();
            $table->float('netweight',128, 3)->nullable();
            $table->string('uom',128)->nullable();
            $table->string('vehicleno',128)->nullable();
            $table->float('quantity',128, 3)->nullable();
            $table->string('store',128)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('material_entries', function (Blueprint $table) {
            //
        });
    }
}
