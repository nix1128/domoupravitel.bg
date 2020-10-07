<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Model\Comment;
use App\Model\Hause_users;
use App\Model\Post;
use Illuminate\Http\Request;

class Comments extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {


        $card = Hause_users::with('card')->first();
        $user = Hause_users::where('username',session()->get('name'))->first();
        $post = Post::where('id','=',request('post_id'))->first();


      $valid = $request->validate([

          'comment' => 'required',

      ]);

        $comment = new Comment();
        $comment->content = request('comment');
        $comment->user()->associate($user);
        $post->comments()->save($comment);

        $comment = new Comment();
        $comment->content = request('comment');
        $comment->post_id = request('post_id');
        $comment->comment()->associate($comment);

        if($valid)

        return back()->with('added','')->with(compact('card'));
        else
            return back()->with('comment_error','');

    }


    function delete($id){
        $user = Hause_users::where('username',session()->get('name'))->first();
        $comment = Comment::find($id);

        if($comment->user_id !== $user->id  ) {return back()->with('wrong_user','');
        }else

        $comment->delete();
        return back()->with('deleted','');
        //dd($comment);



    }





}
