<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mat_id',64)->nullable();
            $table->string('mat_po_txt',128)->nullable();
            $table->string('material',128)->nullable();
            $table->string('material_desc',128)->nullable();
            $table->string('mat_crtd_dt',128)->nullable();
            $table->string('st_bin',128)->nullable();
            $table->string('mtype',128)->nullable();
            $table->string('bun',128)->nullable();
            $table->string('old_material',128)->nullable();
            $table->string('matl_group',128)->nullable();
            $table->string('st_loc',128)->nullable();
            $table->string('prod_hierarchy',128)->nullable();
            $table->string('prod_hierarchy_desc',128)->nullable();
            $table->string('plant_id',64)->nullable();
            $table->string('plant',128)->nullable();
            $table->float('Mov_avg_price')->nullable();
            $table->float('stock',128,3)->nullable();
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
        Schema::dropIfExists('material_entries');
    }
}
