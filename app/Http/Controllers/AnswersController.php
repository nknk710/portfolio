<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;


class AnswersController extends Controller
{
    public function create(Request $request)
    {

        // Varidationを行う
        $this->validate($request, Answer::$rules);
        
        $id = Auth::id();

        $answer = new Answer;
        $form = $request->all();
        $form['user_id'] = $id;
        $form['question_id'] = $request->id;


        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        \Debugbar::info($form);
        // データベースに保存する
        $answer->fill($form)->save();
    
        return redirect('questions/question');
    }
}
