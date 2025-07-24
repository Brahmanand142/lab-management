<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFacultyIdToLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up(): void
    {
         Schema::table('labs', function (Blueprint $table) {
            // Laravel 6 compatible way to add a foreign key
            $table->unsignedBigInteger('faculty_id')->nullable()->after('status'); // Create the column
            $table->foreign('faculty_id') // Define the foreign key constraint
                  ->references('id')
                  ->on('faculties')
                  ->onDelete('set null'); // Matches the onDelete('set null') from before
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down():void
    { 
         Schema::table('labs', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['faculty_id']); // This array syntax is correct for named foreign keys
            // Then drop the column
            $table->dropColumn('faculty_id');
        });
    }
}
