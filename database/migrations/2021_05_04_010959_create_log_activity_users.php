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
            $table->foreignId('question_grid_headers_id')->nullable()->constrained('question_grid_headers');
            $table->foreignId('question_card_headers_id')->nullable()->constrained('question_card_headers');
            $table->enum('action',['make','update','remove','used']);
            $table->foreignId('users_id')->constrained('users');
            $table->foreignId('used_for_users_id')->nullable()->constrained('users');
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
        Schema::dropIfExists('log_activity_users');
    }
}
