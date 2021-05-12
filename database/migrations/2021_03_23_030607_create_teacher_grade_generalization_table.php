<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherGradeGeneralizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_grade_generalization', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teachers_id')->constrained('teachers');
            $table->foreignId('grade_generalizations_id')->constrained('grade_generalizations');
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
        Schema::dropIfExists('teacher_grade_generalization');
    }
}
