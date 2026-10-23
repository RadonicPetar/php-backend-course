<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class RequestDemoController extends Controller
{
    public function basic(Request $request)
    {
        return response()->json([
            'url'=>$request->url(),
            'method'=>$request->method(),
            'ime'=>$request->query('ime')
        ]);
    }

    public function student(Request $request, int $id)
    {
        if($request->query('faks')===null){
            $faks = "";
        }
        else
            {
                $faks = $request->query('faks');
            }
        return response()->json([
            'student_id'=>$id,
            'url'=>$request->url(),
            'fakultet'=>$faks
        ]);
    }

    public function middlewareDemo(){
        return 'Middleware je zapisao IP adresu';
    }

    public function headers(Request $request){
        return response()->json([
            'user_agent'=>$request->header('User-Agent')
        ]);
    }

    public function showContact(){
        return view('contact');
    }

    public function saveContact(Request $request)
    {
        return response()->json([
            'status'=>'success',
            'ime'=>$request->input('ime')
        ], 201)->header('X-Course','Laravel Requests');
    }

    public function age(Request $request){
        $ime = $request->input('ime');
        $age = Carbon::parse($request->input('datum_rodjenja'))->age;
        return response()->json([
            'ime'=>$ime,
            'godine'=>$age
        ]);
    }
}
