<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Model\Hause_users;
use Illuminate\Http\Request;



class SearchController extends Controller
{
    function index(Request $request)
    {


        $request->validate([
            'search' => 'required|string|max:255',
        ]);
        $search = $request->search;
       $username = Hause_users::where('username', $request->session()->get('name'))->first();

        $users = Hause_users::where('first_last_name','LIKE','%'.$search.'%')->where('Email', 'LIKE', '%'.$search.'%')->get();
        if (count($users) > 0 && !is_null($request) )
            return view('frontview.layouts.searchResults')->with(compact('users','search','username'));
    else{

    } return view('frontview.layouts.searchResults')->with(compact('users','search','username'));



    }
}
