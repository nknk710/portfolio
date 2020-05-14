<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    public function questions()
    {
      return $this->hasMany('Question::class');

    }

}
