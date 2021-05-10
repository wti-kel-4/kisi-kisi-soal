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
            $table->foreignId('profiles_id')->constrained('profiles');
            $table->foreignId('studies_id')->constrained('studies');
            $table->foreignId('grades_id')->constrained('grades');
            $table->string('school_year', 100);
            $table->enum('semesters', ['Ganjil', 'Genap']);
            $table->string('curriculum');

            // $table->foreignId('teachers_id')->constrained('teachers');
            // $table->enum('type', ['PTS', 'PAT', 'PKK']);
            // $table->foreignId('studies_id')->constrained('studies');
            // $table->integer('time_allocation');
            // $table->integer('total');
            // $table->string('form');
            // $table->foreignId('basic_competencies_id')->constrained('basic_competencies');
            // $table->foreignId('grade_specializations_id')->constrained('grade_specializations');
            // $table->text('indicator');
            // $table->foreignId('lessons_id')->constrained('lessons');
            // $table->integer('sorting_number');
            // $table->integer('start_number');
            // $table->integer('end_number');
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
        Schema::dropIfExists('question_grid_headers');
    }
}
