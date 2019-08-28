<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('material_id')->nullable();
            $table->string('material_name')->nullable();
            $table->string('material')->nullable();
            $table->string('material_description')->nullable();
            $table->string('material_group')->nullable();
            $table->string('material_location')->nullable();
            $table->float('material_gross', 64, 3)->nullable();
            $table->float('material_tare', 64, 3)->nullable();
            $table->float('material_netweight', 64, 3)->nullable();
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
        Schema::dropIfExists('material_details');
    }
}
