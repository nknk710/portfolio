<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class Question extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'category', 'body'
    ];
    
    public function user()
    {
        return $this->belongsTo('User::class');
    }

    public function answers()
    {
        return $this->hasMany('Answer::class');
    }


}
