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
            $table->foreignId('question_grid_headers_id')->constrained('question_grid_headers');
            $table->foreignId('basic_competencies_id')->constrained('basic_competencies');
            $table->foreignId('study_lesson_scope_lessons_id')->constrained('study_lesson_scope_lesson');
            $table->enum('level', ['L1', 'L2', 'L3']);
            $table->enum('cognitive', ['C1', 'C2', 'C3', 'C4', 'C5', 'C6']);
            $table->string('indicator');
            $table->string('question_form');
            $table->string('question_number');
            $table->boolean('temp');
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
        Schema::dropIfExists('question_grid_rows');
    }
}
