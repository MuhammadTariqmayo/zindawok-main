<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSalaryToJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {

            $table->unsignedBigInteger('city_id')->after('id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->unsignedBigInteger('industry_id')->after('company_id')->nullable();
            $table->foreign('industry_id')->references('id')->on('industries');
            $table->unsignedBigInteger('occupation_id')->after('shift_id')->nullable();
            $table->foreign('occupation_id')->references('id')->on('occupations');
            $table->unsignedBigInteger('sub_occupation_id')->after('occupation_id')->nullable();
            $table->foreign('sub_occupation_id')->references('id')->on('occupations');
            $table->integer('end_salary')->after('start_salary')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            //
        });
    }
}
