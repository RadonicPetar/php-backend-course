<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AuthDemoController extends Controller
{
    public function profile()
    {
        return view('authdemo.profile',
        [
            'user'=>auth()->user()
        ]);
    }

    public function admin()
    {
        // if(auth()->user()->email !== 'admin@testmail.com'){
        //     abort(403,'Zabrana');
        // }
        Gate::authorize('admin-access');

        return view('authdemo.admin');
    }
}
