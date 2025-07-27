<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignSubmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_submits', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
           $table->varchar('student_name');
            $table->integer('student_id');
            $table->varchar('assignment_title');
            $table->varchar('subject_name');
            $table->varchar('lab_name');
            $table->varchar('teacher_name');
            $table->varchar('due_date');
            $table->varchar('assignment_files');
            $table->varchar('comments');
            $table->varchar('html_code');
            $table->varchar('css_code');
            $table->varchar('js_code');
            $table->varchar('feedback');
            $table->varchar('feedback_timestamp');
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
        Schema::dropIfExists('assign_submits');
    }
}
