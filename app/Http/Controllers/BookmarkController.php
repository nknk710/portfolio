<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Question;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;
use DB;


class BookmarkController extends Controller
{
    public function add(Request $request)
    {
        $question = Question::find($request->id);
        $user_id = Auth::id();
        $question_id = $request->id;
        $bookmark = new Bookmark;
      
        $bookmark['user_id'] = $user_id;
        $bookmark['question_id'] = $question_id;
        $bookmark->save();
        
        return view('bookmarks.add',['question' => $question]);
    }
    
    public function index()
    {
        $id = Auth::user()->id;
        $query = Bookmark::query();
        $query->where('user_id',$id);
        $bookmarks = $query->paginate(3);
        
        \Debugbar::info($bookmarks);
        return view('users.bookmark', ['bookmarks' => $bookmarks]);
    }
    
    public function delete(Request $request)
    {
        // 該当するBookmark Modelを取得
        $bookmark = Bookmark::query();
        $bookmark->where('user_id',Auth::user()->id);
        $bookmark->where('question_id',$request->id);
        // 削除する
        $bookmark->delete();
        return redirect('users/bookmark');
    }
}
