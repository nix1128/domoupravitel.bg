<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;

use App\Model\Post;

use App\Model\Vote;
use Illuminate\Http\Request;

use App\Model\Hause_users;

use Illuminate\Support\Carbon;
use Intervention\Image\Image;


class PostController extends Controller
{






    public function index(Request $request)


    {


        $posts = Post::with('user','likes')->withCount(['likes', 'dislikes','comments'])->paginate(1);
        $name = $request->session()->get('name');
        $misc = array('misc');

        $user = Hause_users::where('username', $request->session()->get('name'))->first();

        if ($name) {
            return view('frontview.layouts.misc', compact('misc','user'), ['username' => $name])
                ->with('posts',$posts);
        } else {
            return view('frontview.layouts.login');
       }

    }

    public function create(Request $request)
    {

        $card = Hause_users::with('card')->first();
        $user = Hause_users::where('username', $request->session()->get('name'))->first();
        $name = $request->session()->get('name');
        $post = Post::where('id', request('post_id'))->get();



        // dd($date);
        return view('posts.create', compact('post','card','user'))->with('name',$name);

    }




    public function store(Request  $request)

    {


        $user = Hause_users::where('username', session()->get('name'))->first();
        $validation = $request->validate([
            'title' => 'required',
            'subject' => 'required',
            'body' => 'required',
            'data'=> 'required|date|after:now'
        ]);





        $date = request('data');
        $dates = Carbon::parse($date)->format('Y-m-d H:i:s');



        $post = new Post();
        $post->subject = request('subject');
        $post->title = request('title');
        $post->body = request('body');
        $post->created_for = $dates;
        $post->user()->associate($user);
        $user->posts()->save($post);




  if($validation)
        return redirect('posts')->with('success','');
   else
       return back()->with('input_error','');
        }



    public function edit()
    {

        $user = Hause_users::where('username', session()->get('name'))->first();
        $username = $user->username;
        $post = Post::where('id', request('post_id'))->first();



        //dd($post->user_id);
        if($post->user_id != $user->id)
        {
            return back()->with('post_edit_error','');
        }
        else {
            return view('posts.edit',compact('user','post','username'));
        }

        //dd($post);

    }


    public function update(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'subject' => 'required',
            'body' => 'required',
        ]);


        $user = Hause_users::where('username', session()->get('name'))->first();
        $post = Post::where('id', request('post_id'))->first();
        //$post = Post::with('id');
       //dd($post);

        if($post->user_id !== $user->id){ abort(403);}
        else {
            $post->subject = request('subject');
            $post->title = request('title');
            $post->body = request('body');
            $post->update();


            return redirect('posts')->with('renew','');

        }

    }

    public function delete(Request $request)
    {

        $user = Hause_users::where('username', session()->get('name'))->first();
        $post = Post::where('id', request('post_id'))->first();



        //dd($post->user_id);
        if($post->user_id != $user->id)
        {
            return back()->with('post_edit_error','');
        }
        else {
            $post->delete();
            return back()->with('post_deleted','');
        }

        //dd($post);

    }




}
