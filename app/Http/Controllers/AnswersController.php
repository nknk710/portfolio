<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Storage;


class AnswersController extends Controller
{
    public function create(Request $request)
    {

        // Varidationを行う
        $this->validate($request, Answer::$rules);
        
        $id = Auth::id();
        $question = $request->id;

        $answer = new Answer;
        $form = $request->all();
        $form['user_id'] = $id;
        $form['question_id'] = $request->id;


        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        // データベースに保存する
        $answer->fill($form)->save();
    
        return redirect(route('show_question', ['id' => $question]));
    }
    
    public function add(Request $request)
    {
        $question_id = Answer::find($request->id);
        $question_id = $question_id->question_id;
        $question = Question::find($question_id);

        $question['best_answer'] = $request->id;

        // 該当するデータを上書きして保存する
        $question->save();

        return redirect(route('show_question', ['id' => $question]));
    }
    
    public function delete(Request $request)
    {
        // 該当するAnswer Modelを取得
        $answer = Answer::find($request->id);
        $question = $answer->question_id;
        // 削除する
        $answer->delete();
        return redirect(route('show_question', ['id' => $question]));
    }
}
