<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;



use App\Model\Vote;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Image;
use Facade\FlareClient\Http\Response;

class PDFController extends Controller
{



    public function export_pdf(Request $request)
    {
        $name = $request->session()->get('name');
        $votes = Vote::where('post_id',$request->post_id)->get();
        $post_id = $request->post_id;
        $pdf = PDF::loadView('frontview.PDF.PDFReport',array('name' => $name,'votes'=> $votes,'post_id' => $post_id))->setPaper('a4', 'portrait')
    ->setOptions([
        'enable_remote' => true,
        'chroot'  => public_path('storage/e-signatures'),
    ]);
        return $pdf->stream('VoteReport.pdf');



    }
}
