<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionGridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_grids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teachers_id')->constrained('teachers');
            $table->enum('type', ['PTS', 'PAT', 'PKK']);
            $table->foreignId('studies_id')->constrained('studies');
            $table->integer('time_allocation');
            $table->integer('total');
            $table->string('school_year', 100);
            $table->string('form');
            $table->foreignId('basic_competencies_id')->constrained('basic_competencies');
            $table->foreignId('grade_specializations_id')->constrained('grade_specializations');
            $table->text('indicator');
            $table->integer('sorting_number');
            $table->integer('start_number');
            $table->integer('end_number');
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
        Schema::dropIfExists('question_grids');
    }
}
