<?php

namespace App\Model;



use App\Phone;

use App\User_card;

use Illuminate\Database\Eloquent\Model;






class Hause_users extends Model
{


    protected $guarded = [];
    protected $table = 'users';
    public $timestamps = true;


    public function phone()
    {
        return $this->hasOne(Phone::class, 'user_id'  );
    }

    public function card()
    {

        return $this->hasOne(User_card::class ,'user_id' );
    }


    public function posts()
    {

        return $this->hasMany(Post::class,'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'user_id' );
    }

    public function votes(){
        return $this->hasMany(Vote::class,'user_id' );
    }




}
