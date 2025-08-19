<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReportingToToEmployeeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_details', function (Blueprint $table) {
            $table->unsignedBigInteger('reporting_to')->nullable()->after('employment_type_id');

            $table->foreign('reporting_to')
                  ->references('id')
                  ->on('employees')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_details', function (Blueprint $table) {
            $table->dropForeign(['reporting_to']);
            $table->dropColumn('reporting_to');
        });
    }
}
