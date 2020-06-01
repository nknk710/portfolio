<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;
use DB;
use Storage;

class QuestionController extends Controller
{
    public function add()
    {
        return view('questions.create');
    }
    
    public function home()
    {
        $questions = Question::orderBy('created_at','desc')->get();
        return view('home', ['questions' => $questions]);
    }
    
    public function new_question()
    {
        $questions = Question::orderBy('created_at','desc')->paginate(10);
        return view('questions.new_question', ['questions' => $questions]);
    }
    
    public function index(Request $request)
    {

        $cond_title = $request->cond_title;
        $category = $request->category;
        $query = Question::query();
        $sort = $request->sort;
        if($request->sort) {
            if($request->sort == 'asc') {
                $query->orderBy('created_at','asc');
            }elseif($request->sort == 'desc') {
                $query->orderBy('created_at','desc');
            }
        }else{
            $query->orderBy('created_at','desc');
        }
        // 検索するテキストが入力されている場合のみ
        if(!empty($cond_title)) {
            $query->where('title', 'like', '%'.$cond_title.'%');
        }
        if(!empty($category)) {
            $query->where('category', $category);
        }
        $questions = $query->paginate(10);
        return view('questions.index', ['questions' => $questions, 'cond_title' => $cond_title, 'category' => $category, 'sort' => $sort]);
    }
    
    public function private_question(Request $request)
    {
        $user_id = $request->id;
        $query = Question::query();
        $query->orderBy('created_at','desc');
        $query->where('user_id', $user_id);
        $questions = $query->paginate(10);
        return view('users.question', ['questions' => $questions, 'user_id' => $user_id]);
    }
    
    public function create(Request $request)
    {

        // Varidationを行う
        $this->validate($request, Question::$rules);
        
        $id = Auth::id();

        $question = new Question;
        $form = $request->all();
        $form['user_id'] = $id;


        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        // データベースに保存する
        $question->fill($form)->save();
    
        return view('questions.post_done',['question' => $question]);
    }
    
    public function show(Request $request){
        $question = Question::find($request->id);
        $answers = Answer::orderBy('created_at','desc')->where('question_id', $request->id)->get();
        // $bookmark = $question->bookmarks->where('user_id', Auth::user()->id)->exists();
        $bookmark = $question->bookmarks->where('user_id', Auth::user()->id)->first();
        return view('questions.question',['question' => $question, 'answers' => $answers, 'bookmark'=>$bookmark]);
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
        
        // 該当するデータを上書きして保存する
        $question->fill($question_form)->save();
      
        return view('questions.post_done', ['question' => $question]);
    }
    
    public function delete(Request $request)
    {
        // 該当するQuestion Modelを取得
        $question = Question::find($request->id);
        // 削除する
        $question->delete();
        return view('questions.delete_done');
    }

    public function best_answer(Request $request)
    {
        // Question Modelからデータを取得する
        $question = Question::find($request->question_id);
        // 送信されてきたフォームデータを格納する
        $best_answer = Answer::find($request->answer_id);
        
        // 該当するデータを上書きして保存する
        $question->best_answer = $best_answer;
        $question->save();
      
        return redirect('questions/question', ['best_answer' => $question]);
    }

}
