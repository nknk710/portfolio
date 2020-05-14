<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;


class QuestionController extends Controller
{
    public function add()
    {
        return view('questions.create');
    }
    
    public function create(Request $request)
    {

        \Debugbar::info($request);
  
        // 以下を追記
        // Varidationを行う
        $this->validate($request, Question::$rules);

        $question = new Question;
        $form = $request->all();

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        // データベースに保存する
        $question->fill($form);
        $question->save();

        return view('questions.post_done');
    }
    
    

}
