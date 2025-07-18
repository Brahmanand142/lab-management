<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Assignments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('assignments', function (Blueprint $table) {
            $table->integer('assignment_id')->primary();
            $table->string('assignment_name');
             $table->string('assignment_description');
            $table->string('assignment_type');
            $table->timestamp('submission_date');
            $table->string('subject');
            $table->string('faculty');
            $table->string('t_name');
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
        Schema::dropIfExists('assignments');
    }
}
