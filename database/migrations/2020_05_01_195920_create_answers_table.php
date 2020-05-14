<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('ユーザID'); //usersテーブルのidと関連付け
            $table->unsignedInteger('question_id')->comment('質問ID'); //questionsテーブルのidと関連付け
            $table->string('answer')->comment('回答内容');
            $table->softDeletes();
            $table->timestamps();

            $table->index('id');
            $table->index('user_id');
            $table->index('question_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
