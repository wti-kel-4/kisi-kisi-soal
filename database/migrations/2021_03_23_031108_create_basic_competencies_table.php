<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicCompetenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_competencies', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->foreignId('studies_id')->constrained('studies');
            $table->foreignId('grade_specializations_id')->constrained('grade_specializations');
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
        Schema::dropIfExists('basic_competencies');
    }
}
