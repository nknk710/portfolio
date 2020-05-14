<?php

use Illuminate\Database\Seeder;
use App\Models\Question;


class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Question::create([
                'user_id'    => $i,
                'title'      => 'これはテスト投稿のタイトル' .$i,
                'category'   => 'php',
                'body'       => 'これはテスト投稿の質問内容' .$i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
