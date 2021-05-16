<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionGridHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_grid_headers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teachers_id')->constrained('teachers'); // Who is the owner
            $table->foreignId('profiles_id')->constrained('profiles');
            $table->foreignId('studies_id')->constrained('studies');
            $table->foreignId('grade_generalizations_id')->constrained('grade_generalizations');
            $table->string('type');
            $table->string('school_year', 100);
            $table->enum('semesters', ['Ganjil', 'Genap']);
            $table->string('curriculum');
            $table->boolean('temp');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_grid_headers');
    }
}
