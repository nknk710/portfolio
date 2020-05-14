<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('ユーザID');// usersテーブルのidと関連付け
            $table->string('title')->comment('タイトル');
            $table->string('category')->comment('質問のカテゴリ');
            $table->string('body')->comment('質問内容');
            $table->unsignedInteger('best_answer')->nullable()->comment('ベストアンサー');// answerテーブルのidと関連付け
            $table->softDeletes();
            $table->timestamps();

            $table->index('id');
            $table->index('user_id');
            $table->index('title');
            $table->index('category');
            $table->index('body');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                
            // $table->foreign('best_answer')
            //     ->references('id')
            //     ->on('answers')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');
                
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
}
