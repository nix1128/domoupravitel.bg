<?php

namespace App\Http\Controllers\Votes;

use App\Http\Controllers\Controller;
use App\Model\Hause_users;
use App\Model\Post;
use Illuminate\Http\Request;

class Votes extends Controller
{

    public function likes(Post $post, Request $request){
        $user = Hause_users::where('username', $request->session('name')->get('name'))->first();

        $post->like($user);
        return back();

    }

    public function dislikes ( Post $post, Request $request){
        $user = Hause_users::where('username', $request->session('name')->get('name'))->first();
        $post->dislike($user);
        return back();

    }

}
