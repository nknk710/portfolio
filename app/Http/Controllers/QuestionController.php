<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;


class QuestionController extends Controller
{
    public function add()
    {
        return view('questions.create');
    }
    
    public function create(Request $request)
    {

        // Varidationを行う
        $this->validate($request, Question::$rules);
        
        $id = Auth::id();

        $question = new Question;
        $form = $request->all();
        $form['user_id'] = $id;

        \Debugbar::info($form);

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        // データベースに保存する
        $question->fill($form)->save();
    
        return view('questions.post_done',['question' => $question]);
    }
    
    public function show(Request $request){
        $question = Question::find($request->user_id);
        return view('questions/question',['question' => $question]);
    }
    
    

}
