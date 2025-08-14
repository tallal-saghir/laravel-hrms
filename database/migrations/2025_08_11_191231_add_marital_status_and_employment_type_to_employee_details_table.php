<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMaritalStatusAndEmploymentTypeToEmployeeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_details', function (Blueprint $table) {
            $table->string('marital_status')->nullable()->after('gender');
            $table->unsignedBigInteger('employment_type_id')->nullable()->after('marital_status');

            $table->foreign('employment_type_id')
                ->references('id')
                ->on('employment_types')
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
            $table->dropForeign(['employment_type_id']);
            $table->dropColumn(['marital_status', 'employment_type_id']);
        });
    }
}
