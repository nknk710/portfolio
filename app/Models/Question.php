<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\User;
use App\Models\Answer;


class Question extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required','max100',
        'category' => 'required',
        'body' => 'required',
    );
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }


}
