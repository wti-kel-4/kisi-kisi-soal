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
            $table->foreignId('question_card_headers_id')->constrained('question_card_headers');
            $table->foreignId('question_grids_id')->constrained('question_grids');
            $table->string('indicator');
            $table->enum('rate', ['easy', 'medium', 'hard']);
            $table->string('question');
            $table->text('answer_a');
            $table->text('answer_b');
            $table->text('answer_c');
            $table->text('answer_d');
            $table->text('answer_e');
            $table->string('answer_key');
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
        Schema::dropIfExists('question_cards');
    }
}
