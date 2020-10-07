<?php

namespace App\Http\Controllers\HomeController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Hause_users;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{


    function index (Request $request){
        $user = Hause_users::all()->first();

        $name = $request->session()->get('name');
        if ($name) {
            return view('frontview.layouts.home', ['username' => $name])->with(compact('user'));
        } else {
            return view('frontview.layouts.login');
        }
    }

}
