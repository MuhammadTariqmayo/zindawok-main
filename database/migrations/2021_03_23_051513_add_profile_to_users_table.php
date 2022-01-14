<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->nullable()->after('password');
            $table->string('date_of_birth')->nullable();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('salary')->nullable();
            $table->string('about', 500)->nullable();
            $table->string('professional_skills' , 500)->nullable();
            $table->string('interpersonal_skills' , 500)->nullable();
            $table->string('future_goals')->nullable();
            $table->string('english_level')->nullable();
            $table->boolean('employment_status')->nullable()->default(0);
            $table->unsignedInteger('no_of_dependents')->nullable();
            $table->string('cnic')->nullable();
            $table->boolean('is_active')->nullable()->default(0);
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
