<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function requestInfo(Request $request){
        return response()->json([
            'url'=>$request->url(),
            'path'=>$request->path(),
            'method'=>$request->method(),
            'ip'=>$request->ip(),
            'user_agent'=>$request->userAgent(),
        ]);
    }
}
