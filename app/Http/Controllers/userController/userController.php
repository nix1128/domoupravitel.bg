<?php

namespace App\Http\Controllers\userController;

use App\Http\Controllers\Controller;
use App\Model\Hause_users;
use App\Model\Post;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;






class userController extends Controller
{



    function others (Request $request)
    {
        $user  = Hause_users::where('username',$request->session()->get('name'))->first();
        $name = $request->session()->get('name');

        if ($name) {
            return view('frontview.layouts.others', ['others' => [' one', ' two', ' three', ' four']],['username'=>$name])->with(compact('user'));
        } else {
            return view ('frontview.layouts.login');
        }
    }

    function landing (){
        return view ('frontview.layouts.landing',[]);

        }


   function logout(Request $request) {

       Session::flush();
       Session::forget('name');
       return redirect('/');
   }




    function hausemasters (Request $request){

        $name = $request->session()->get('name');
        $user = Hause_users::all();

        $card = Hause_users::where('username', $request->session()->get('name'))->first();
        if ($name) {
        return view ('frontview.layouts.hausemaster', ['user'=> $user],['username'=>$name])->with(compact('card'));
        }else {
            return view('frontview.layouts.login');
        }
     }




    function contacts (){
        $card = Hause_users::with('card')->first();
        $user  = Hause_users::all()->first();
        return view ('frontview.layouts.userView',  ['contacts' => ['Home','About','Contacts','Misc','Others']])->with(compact('card','user'));
    }





    function about(Request $request){
        $user  = Hause_users::where('username', $request->session()->get('name'))->first();
        $name = $request->session()->get('name');
        if ($name) {
        return view ('frontview.layouts.about',  ['about' => ['about us','About you','...Them','..and the Others']],
            ['username'=>$name])->with(compact('user'));
    }
        else {
            return view('frontview.layouts.login');
        }
    }

}
