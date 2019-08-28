<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUseOfMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('use_of_materials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mat_use_date')->nullable();
            $table->float('qty_req', 128, 3)->nullable();
            $table->string('place_of_use')->nullable();
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
        Schema::dropIfExists('use_of_materials');
    }
}
