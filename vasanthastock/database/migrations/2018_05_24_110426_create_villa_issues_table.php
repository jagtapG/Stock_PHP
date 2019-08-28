<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillaIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villa_issues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('villano',128)->nullable();
            $table->float('qtyv',128, 3)->nullable();
            $table->string('uom',128)->nullable();
            $table->string('issue_date',128)->nullable();
            $table->string('sub_store_id', 64)->nullable();
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
        Schema::dropIfExists('villa_issues');
    }
}
