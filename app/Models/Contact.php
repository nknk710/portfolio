<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',    
        'email' => 'required',    
        'body' => 'required',    
    );
}
