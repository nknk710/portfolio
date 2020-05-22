<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\User;
use App\Models\Question;


class Answer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    
    protected $guarded = array('id');

    public static $rules = array(
        'answer' => 'required'
    );

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function questions()
    {
        return $this->belongsTo(Question::class);
    }
    
}
