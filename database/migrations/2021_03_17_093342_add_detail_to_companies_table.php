<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('founded')->nullable();
            $table->string('services')->nullable();
            $table->integer('employees')->nullable();
            $table->string('website_url')->nullable();
            $table->string('logo')->nullable();
            $table->string('cover')->nullable();
            $table->string('about',500)->nullable();
            $table->boolean('is_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
}
