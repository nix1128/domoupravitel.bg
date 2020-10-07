<?php

namespace App\Http\Controllers\userController;
use App\Model\Hause_users;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


class profileEdit extends Controller
{



    function profileEdit(Request $request)
    {



        $user = Hause_users::where('username', $request->session()->get('name'))->first();





        $name = $request->session()->get('name');
        if (!$name){
            return view('frontview.layouts.login');
        }
        return view('frontview.layouts.profile',['user' => $user])
            ->with('username', $name);
    }



    function update(Request $request)
    {
        $name = $request->session()->get('name');
        $user = Hause_users::where('username', $request->session()->get('name'))->first();


//        dd($card->card->image);

        $request->validate([
            'image' => 'sometimes|file|image|max:2048|mimes:jpg,jpeg,png,gif',

            'email' => 'not_regex:/^.+$/i',
            //'tel' => 'regex:/(08)/',
            //'adr' => 'regex:/^.+@.+$.+#/i',
            //'password' => 'min:6',
             //'town' => 'string'

        ],
            [
                'image.image' => 'Неподдържан формат, сниката трябва да е jpg, jpeg, png, gif',
                'image.sometimes' => 'липсва снимка',
                'image.max' => 'Снимката надхвърля 2MB',



            ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $image_resize = Image::make($image)->fit(180, 200);

            $user->card->update(['image' => $image->store('images', 'public')]);
            $image_resize->save(public_path('storage/' . $user->card->image, 90));

            // dd($image_resize);
            return back()->with('message', '');

        }


        //dd($user->card->user_id);
        $user->fill(['email' => request('Email')]);
        $user->save();

//dd($user->card->adr);

        if ($user->card->adr === '' && $user->card->adr === null ) {
            $user->card->fill(['adr' => request('Address')]);
        } else {
            $user->card->update(['adr' => request('Address')]);
        }if ($user->card->city === '' && $user->card->city === null ) {
            $user->card->fill(['city' => request('town')]);
        } else {
            $user->card->update(['city' => request('town')]);
        }
        if ($user->card->kvar === '' && $user->card->kvar === null ) {
            $user->card->fill(['kvar' => request('kvar')]);
        } else {
            $user->card->update(['kvar' => request('kvar')]);
        }if ($user->phone === null) {
            $user->phone->phone->create(['phone' => request('tel')]);
        } else {
            $user->phone->update(['phone' => request('tel')]);
        }
        return redirect('profile')->with($name)->with('success','');
    }

            function delete(Request $request)

            {
                 $user = Hause_users::where('username', $request->session()->get('name'))->first();
                $image_path = public_path('storage/' . $user->card->image);  // Value is not URL but directory file path
                if(File::exists($image_path)) {
                    File::delete($image_path);

                }
                $update ['image'] = $user->card->image = null;
                $user->card->update($update);


                return back();

            }


    function profile_delete(Request $request)

    {
        $user = Hause_users::where('username', $request->session()->get('name'))->first();
        $user->phone()->delete();
        $user->card()->delete();
        $user->posts()->delete();

        $user->delete();
        return redirect('/');

    }



}
