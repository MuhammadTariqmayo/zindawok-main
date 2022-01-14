<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoutMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scout_mails', function (Blueprint $table) {
            $table->id();
            $table->string('company-name');
            $table->integer('company-id');
            $table->integer('job-id');
            $table->string('job-title');
            $table->integer('user-id');
            $table->string('user-name');
            $table->text('message');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('scout_mails');
    }
}
