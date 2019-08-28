<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('material_id')->nullable();
            $table->string('material_date')->nullable();
            $table->string('issue_place')->nullable();
            $table->string('villa_number')->nullable();
            $table->string('uom')->nullable();
            $table->string('type')->nullable();
            $table->float('stock', 128, 3)->nullable();
            $table->float('add_quantity', 128, 3)->nullable();
            $table->float('subtract_quantity', 128, 3)->nullable();
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
        Schema::dropIfExists('issue_details');
    }
}
