<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('term');
            $table->string('session');
            $table->mediumText('image')->nullable();
            $table->bigInteger('u_id')->unsigned();
          //  $table->bigInteger('student_id')->unsigned();

          //  $table->foreign('user_id')->references('id')->on('users');
          //  $table->foreign('student_id')->references('user_id')->on('students');
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
        Schema::dropIfExists('results');
    }
}
