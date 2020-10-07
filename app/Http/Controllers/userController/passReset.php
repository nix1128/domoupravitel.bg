<?php

namespace App\Http\Controllers\userController;

use App\Model\Hause_users;
use App\Model\PasswordReset;

use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;



class passReset extends Controller
{

    function show (){
        return view ('frontview.layouts.passReset');

    }



    function passReset (Request $request){

        //You can add validation login here
        $user = Hause_users::where('Email', '=', request('email'))->first();

//Check if the user exists
        if (!$user) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);

        }

//Create Password Reset Token
          passwordReset::where ('email')->insert([
            'email' => request('email'),
            'token' => Str::random(60),
            'created_at' => Carbon::now(),

        ]);

//Get the token just created above
        $tokenData = passwordReset::where('email','=', request('email'))->first();



        if ($this->sendResetEmail($request->email, $tokenData->token)) {
            return redirect()->back()->with('message');
        } else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }
//            }
//        return redirect()->back()->with("message","Email sent");
        }



    public function sendResetEmail($email, $token)
    {
//Retrieve the user from the database
        $user = Hause_users::where('email', $email)->select('username', 'email')->first();


//Generate, the password reset link. The token generated is embedded in the link

        $link = url('password/reset/' . $token . '?email=' . urlencode($user->email));

        Mail::raw($link, function ($message) use($link) {
            $message->from('admin@domoupravitel.bg');
            $message->to(request('email'))
                ->subject("Смяна на парола")

                ->setBody('<h3>Hi, this is your reset link <a href=""></a></h3>', 'text/html'); // for HTML rich messages


            return redirect()->back()->with('message', trans('A reset link has been sent to your email address.'));
        });
    }





    public function showPasswordResetForm(Request $request, $token )
    {

        $email = $request->email;

        $tokenData = passwordReset::where('token', $request->token)->first();

        if (!$tokenData) return redirect()->back()->withErrors('error','Token invalid');
        //redirect them anywhere you want if the token does not exist.



        return view('frontview.layouts.reset')->with($token,$email);


    }


    public function resetPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'password' => 'required|confirmed|min:6',
            'password.same'=> 'same:password'



        ], [
//lang error change

            'password.size' => 'Паролата трябва да е поне 6 знака',
            'password.same' => 'Паролата трябва да съвпада',


        ]);

        //check if input is valid before moving on
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $password = $request->password;

// Validate the token
        $tokenData = passwordReset::get('token', $request->token)->first();
        $tokenEmail = passwordReset::where('email','like',request('email'))->first();

       //dd($tokenEmail);
// Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) return view('frontview.layouts.reset')->withErrors('token','token is wrong');

        $user = Hause_users::where('Email', $tokenEmail->email)->first();


        if ( !$user ) return redirect()->to('home'); //or wherever you want


//Hash and update the new password
        $user->password = Hash::make($password);
        $user->update(); //or $user->save();


        //login the user immediately they change password successfully


        //Delete the token
        $delEmail = passwordReset::where('email','like',request('email'))->first();
        $delEmail->delete();
//

//        //Send Email Reset Success Email
//        if ($this->sendSuccessEmail($tokenData->email)) {
//            return view('index');
//        } else {
//            return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
//        }

        return redirect()->to('home');
    }

}
