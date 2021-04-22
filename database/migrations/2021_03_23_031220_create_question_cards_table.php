<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_grids_id')->constrained('question_grids');
            $table->integer('number');
            $table->text('reference_book_1');
            $table->text('reference_book_2');
            $table->text('question');
            $table->string('key');
            $table->text('answer_a');
            $table->text('answer_b');
            $table->text('answer_c');
            $table->text('answer_d');
            $table->text('answer_e');
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
        Schema::dropIfExists('question_cards');
    }
}