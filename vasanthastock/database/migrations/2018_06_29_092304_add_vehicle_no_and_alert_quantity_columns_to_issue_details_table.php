<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVehicleNoAndAlertQuantityColumnsToIssueDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('issue_details', function (Blueprint $table) {
            $table->string('vehicle_no')->nullable();
            $table->string('alert_Quantity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('issue_details', function (Blueprint $table) {
            $table->dropColumn(['vehicle_no', 'alert_Quantity']);
        });
    }
}
