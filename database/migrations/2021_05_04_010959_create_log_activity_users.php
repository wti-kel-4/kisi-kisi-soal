<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogActivityUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_activity_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_grids_id')->constrained('question_grids')->nullable();
            $table->foreignId('question_cards_id')->constrained('question_cards')->nullable();
            $table->enum('action',['make','update','remove','used']);
            $table->foreignId('users_id')->constrained('users');
            $table->foreignId('used_for_users_id')->constrained('users')->nullable();
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
        Schema::dropIfExists('log_activity_users');
    }
}
