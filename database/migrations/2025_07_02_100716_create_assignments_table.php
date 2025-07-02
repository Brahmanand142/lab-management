<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
                       $table->bigIncrements('assignment_id');
            $table->string('assignment_name');
            $table->string('assignment_type');
            $table->integer('submission_date');
            $table->string('subject');
            $table->string('faculty');
            $table->string('t_name');
            $table->string('s_name');
            
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
