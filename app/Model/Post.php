<?php

namespace App\Model;



//use App\User;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;



       class Post extends  Model
{


    protected $fillable = ['title', 'body'];
    protected $guarded = [];
    public $timestamps = true;




    public function user()
    {
        return $this->belongsTo(Hause_users::class, 'user_id'  );
    }

    public function like($user, $liked = true )
    {


        $this->votes()->updateOrCreate([

            'user_id'=> $user->id,

        ],[
            'liked' => $liked
        ]);
            }





    public function dislike($user )
    {
        return $this->like($user, false);
    }





    public function likes()
    {

        return $this->hasMany(Vote::class)->where('liked', true);
    }

    public function dislikes()
    {
        return $this->hasMany(Vote::class)->where('liked', false);
    }



    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function votes(){
        return $this->hasMany(Vote::class );
    }

}
