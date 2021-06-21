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
            $table->text('indicator');
            $table->enum('rate', ['easy', 'medium', 'hard']);
            $table->text('question');
            $table->string('answer_a')->nullable();
            $table->string('answer_b')->nullable();
            $table->string('answer_c')->nullable();
            $table->string('answer_d')->nullable();
            $table->string('answer_e')->nullable();
            $table->text('answer_key');
            $table->string('question_number');
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
        Schema::dropIfExists('question_cards');
    }
}
