<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('narration');
            $table->text('answerA');
            $table->text('answerB');
            $table->text('answerC');
            $table->text('answerReasonA');
            $table->text('answerReasonB');
            $table->text('answerReasonC');
            $table->integer('trueans');
            $table->integer('trueansReason');
            $table->string('questionType',1);
            $table->text('feedbackcorAns')->nullable();
            $table->text('feedbackincorAns')->nullable();
            $table->text('feedbackcorReason')->nullable();
            $table->text('feedbackincorReason')->nullable();
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
        Schema::dropIfExists('questions');
    }
};
