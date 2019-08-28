<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plant_id')->nullable();
            $table->string('plant_desc')->nullable();
            $table->string('plant_code')->nullable();
            $table->string('plant_address')->nullable();
            $table->string('plant_contact')->nullable();
            $table->string('chief_email')->nullable();
            $table->string('plant_state')->nullable();
            $table->string('plant_pincode')->nullable();
            $table->string('contactName1')->nullable();
            $table->string('contactPhone1')->nullable();
            $table->string('contactEmail1')->nullable();
            $table->string('contactName2')->nullable();
            $table->string('contactPhone2')->nullable();
            $table->string('contactEmail2')->nullable();
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
        Schema::dropIfExists('plant_entries');
    }
}
