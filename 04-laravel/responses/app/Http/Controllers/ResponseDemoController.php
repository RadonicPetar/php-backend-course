<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
class ResponseDemoController extends Controller
{
    public function simple()
    {
        return response('Pozdrav iz response objekta',200);
    }

    public function headers()
    {
        return response('Response sa headerima',200)
            ->header('X-Course','Laravel Responses')
            ->header('X-Version','12');
    }

    public function products()
    {
        return view('proizvodi',[
            'products'=>['Kruh','Mlijeko','Sir']
        ]);
    }

    public function json()
    {
        return response()->json([
            'status'=>'success',
            'message'=>'Podaci učitani',
            'products'=>['Kruh','Mlijeko','Sir']
        ]);
    }

    public function downloadPage()
    {
        return view('download');
    }

    public function downloadfile()
    {
        $datum = Carbon::now();
        $file = $datum->format("d.m.Y_H.i.s");
        Storage::disk('local')->put($file.'.txt','Ovo je sadržaj zapisan u '.$datum->format("d.m.Y H:i:s.u"));
        return response()->download(storage_path('app/private/'.$file.'.txt'));
        //return response()->download(storage_path('app/test.txt'));

    }

    public function redirectDemo()
    {
        return redirect()->route('download.page');
    }
}
