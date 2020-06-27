<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
          //  $table->string('s_name');
            $table->string('p_name');
            $table->string('reg_no');
            $table->string('sex');
            $table->date('dob');
            //$table->string('name');
           // $table->string('class');
            //$table->string('email', 50)->unique()->nullable();
            $table->string('lg');
            $table->string('nation');
            //$table->string('national_id', 50)->nullable();
            $table->string('phone');
            $table->string('state');
            $table->string('add');
            $table->date('reg_date');
            $table->string('s_class');
           // $table->string('s_email');
           // $table->mediumText('s_image')->nullable();
            //$table->string('photo', 200)->nullable();


              $table->bigInteger('user_id')->unsigned();
              $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             // $table->primary('user_id');
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
        Schema::dropIfExists('students');
    }
}
