<?php

namespace App\Http\Controllers\userController;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Model\Hause_users;

use Illuminate\Support\Facades\Storage;
use App\User_card;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Phone;








class regController extends Controller
{


    function registration()
    {
        return view('frontview.layouts.register');
    }


    public function validation(Request $request)
    {
        $request->validate([
            'first_last_name' => 'required|string|max:255',
            'username' => 'filled|unique:users',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6',
            'retype_password' => 'same:password'


        ], [
//lang error change

            'first_last_name.required' => 'Моля, полъпнете правилно "Име и Фамилия"',

            'username.filled' => 'Попълнете "Псевдоним" ',
                'username.unique' => 'Съществуващ псевдоним, моля, изберете уникален ',
                'email.email' => 'Попълнете имейл',
                'email.unique' => 'Съществуващ мейл',
                'password.required' => 'Въведете парола',
                 'password.size' => 'Паролата трябва да е поне 6 знака',
                'retype_password.same' => 'Паролата трябва да съвпада',

        ]


    );




        if ($request == false ) {
// return in $error in defaultBlade with added input
            return redirect()->route('registration')->withInput($request)->withErrors($request);
        } else {
            return ($this->store($request));
        }
    }

    function store(Request $request)
    {
               $array = ['ov','ev','in','ов','ев','ин'];
        $male = Storage::url('male.jpeg');
        $female = Storage::url('female.jpeg');

        $user = new Hause_users();
               $user->username = request('username');
               $user->Email = request('email');
        $user->password = Hash::make(request('password'));
        $user->First_Last_Name = request('first_last_name');

        if(Str::endsWith($user->First_Last_Name ,$array))
                    $user->sex = 1;

        if($user->sex == 0){
            $user->base_image = $female;

        }else {
            $user->base_image = $male;
              }
        $user ->api_token = Str::random(60);
               $user->save();



        $phone = new Phone();
        $user->phone()->create(['user_id'=> $phone]);



        $user_card = new User_card();
        $user->card()->create([
            'user_id'=>$user_card

        ]);
        return redirect('login')->with('status', 'Успешна регистрация!Моля, влезте в профила си!');




           }




}