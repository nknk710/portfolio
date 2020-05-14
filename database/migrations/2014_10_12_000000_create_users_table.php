<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('氏名');
            $table->string('email')->unique()->comment('メールアドレス');
            $table->string('user_name')->nullable()->comment('アカウント名');
            $table->string('introduction')->nullable()->comment('自己紹介') ;
            $table->string('profile_image')->nullable()->comment('プロフィール画像');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            
            $table->index('id');
            $table->index('user_name');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
