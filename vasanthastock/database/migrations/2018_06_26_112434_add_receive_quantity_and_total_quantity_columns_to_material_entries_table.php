<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReceiveQuantityAndTotalQuantityColumnsToMaterialEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('material_entries', function (Blueprint $table) {
            $table->float('receive_quantity', 128, 3)->nullable();
            $table->float('total_quantity', 128, 3)->nullable();
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
            $table->dropColumn(['receive_quantity', 'total_quantity']);
        });
    }
}
