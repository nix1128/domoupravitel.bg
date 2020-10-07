<?php

namespace App\Http\Controllers\Signatures;

use App\Http\Controllers\Controller;
use App\Model\Hause_users;
use App\Model\Post;
use App\Model\Vote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;



class Signature extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index(Request $request)
//    {
//
//
//
//
//        return view('frontview.signature.signature-pad.blade.php');
//    }

    public function upload(Request $request)
    {

//dd($request->user_id, $request->post_id);


        //dd($request->post_id);
//        DB::table('table1')
//            ->join('table2', 'table1.pincode', '=', 'table2.pincode')
//            ->select('table1.*', 'table2.*')
//            ->get();


        $user = Hause_users::where('username', $request->session()->get('name'))->first();
        $signed = Vote::where('post_id',$request->post_id)->where('user_id',$user->id)->first();





        $folderPath = public_path('storage/e-signatures/');
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $signature = uniqid() . '.' . $image_type;
        $file = $folderPath . $signature;
        file_put_contents($file, $image_base64);
        $signed->docusign = $signature;
        $signed->save();
        return back()->with('message', '');



        }



}
