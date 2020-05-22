<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use DB;


class QuestionController extends Controller
{
    public function add()
    {
        return view('questions.create');
    }
    
    public function home()
    {
        $questions = Question::all();
        return view('home', ['questions' => $questions]);
    }
    
    public function index(Request $request)
    {
      $cond_title = $request->cond_title;
      $category = $request->category;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $questions = Question::where('title', 'LIKE', '%$cond_title%')->get();
          $questions = $questions->where('category', $category);
      } else {
          // それ以外はカテゴリーの一致した質問を取得する
          $questions = Question::all();
          $questions = $questions->where('category', $category);
      }
      return view('questions.index', ['questions' => $questions, 'cond_title' => $cond_title]);
    }
    
    public function private_question(Request $request)
    {
        $id = $request->id;
        $questions = Question::where('user_id', $id)->get();
        return view('users.question', ['questions' => $questions]);
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
        $question = Question::find($request->id);
        $answers = Answer::where('question_id', $request->id)->get();
        \Debugbar::info($answers);
        return view('questions/question',['question' => $question, 'answers' => $answers]);
    }
    
    public function edit(Request $request)
    {
        // Question Modelからデータを取得する
        $question = Question::find($request->id);
        if (empty($question)) {
            abort(404);    
        }
        return view('questions.edit', ['question' => $question]);
    }
    
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Question::$rules);
        // Question Modelからデータを取得する
        $question = Question::find($request->id);
        // 送信されてきたフォームデータを格納する
        $question_form = $request->all();
        unset($question_form['_token']);
        
        \Debugbar::info($question_form);

        // 該当するデータを上書きして保存する
        $question->fill($question_form)->save();
      
        return view('questions.post_done', ['question' => $question]);
    }
    
    public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $question = Question::find($request->id);
        // 削除する
        $question->delete();
        return view('questions.delete_done');
    }

    
    

}
