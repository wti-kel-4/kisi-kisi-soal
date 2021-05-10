<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyLessonScopeLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_lesson_scope_lesson', function (Blueprint $table) {
            $table->id();
            $table->foreignId('studies_id')->constrained('studies');
            $table->foreignId('lessons_id')->constrained('lessons');
            $table->foreignId('lesson_scopes_id')->constrained('scope_lessons');
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
        Schema::dropIfExists('study_lesson_scope_lesson');
    }
}
