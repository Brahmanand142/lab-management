<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJessyModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jessy_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
             
        $table->string('name');
        $table->string('email');
        $table->string('namer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jessy_models');
    }
}
