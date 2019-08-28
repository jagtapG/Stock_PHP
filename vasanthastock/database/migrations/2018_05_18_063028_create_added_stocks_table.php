<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddedStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('added_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->float('newaddstock', 128, 3)->nullable();
            $table->float('prvstock', 128, 3)->nullable();
            $table->string('datetime')->nullable();
            $table->string('matid')->nullable();
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
        Schema::dropIfExists('added_stocks');
    }
}
