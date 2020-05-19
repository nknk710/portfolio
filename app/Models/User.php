<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'user_name', 'introduction', 'profile_image', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function followers()
    {
        return $this->belongsToMany(self::class, 'relations', 'followed_id', 'following_id');
    }

    public function follows()
    {
        return $this->belongsToMany(self::class, 'relations', 'following_id', 'followed_id');
    }
    
    public function questions()
    {
      return $this->hasMany('App\Question');

    }
    
    public function bookmarks()
    {
      return $this->hasMany('App\Bookmark');

    }
    
    public function getAllUsers(Int $user_id)
    {
        return $this->Where('id', '<>', $user_id)->paginate(5);
    }
    
    protected $guarded = array('id');

    public static $rules = array(
        'user_name' => 'required','max50'
    );
    
    // フォローする
    public function follow(Int $user_id) 
    {
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing(Int $user_id) 
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->first(['id']);
    }

    // フォローされているか
    public function isFollowed(Int $user_id) 
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['id']);
    }

}
