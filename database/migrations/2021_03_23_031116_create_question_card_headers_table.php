<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionCardHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_card_headers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teachers_id')->constrained('teachers');
            $table->foreignId('grade_generalizations_id')->constrained('grade_generalizations');
            $table->string('question_form');
            $table->string('school_year');


            // $table->integer('number');
            // $table->text('reference_book_1');
            // $table->text('reference_book_2');
            // $table->text('question');
            // $table->string('key');
            // $table->text('answer_a');
            // $table->text('answer_b');
            // $table->text('answer_c');
            // $table->text('answer_d');
            // $table->text('answer_e');
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
        Schema::dropIfExists('question_card_headers');
    }
}
