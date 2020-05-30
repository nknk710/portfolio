<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Question;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Bookmark extends Model
{
  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }
  public function question()
  {
    return $this->belongsTo('App\Models\Question');
  }
}
