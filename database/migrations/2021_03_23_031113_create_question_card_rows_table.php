<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionCardRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_card_rows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_grids_id')->constrained('question_grids');
            $table->string('indicator');
            $table->enum('rate', ['Easy', 'Medium', 'Hard']);
            $table->string('question');
            $table->text('answer_a');
            $table->text('answer_b');
            $table->text('answer_c');
            $table->text('answer_d');
            $table->text('answer_e');
            $table->string('answer_key');
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
        Schema::dropIfExists('question_card_rows');
    }
}
