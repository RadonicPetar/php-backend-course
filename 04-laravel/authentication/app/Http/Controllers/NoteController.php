<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Gate;

class NoteController extends Controller
{

    public function index(){
        $notes = auth()->user()->notes()->latest()->get();

        return view('notes.index',compact('notes'));
    }
    public function show(Note $note){

        //Gate::authorize('view',$note);
        if(Gate::denies('view',$note)){
            return response()->view('errors.custom',[
                'code'=>403,
                'message'=>'Niste ovlašteni vidjeti ovu bilješku'
            ],403);
        }

         return view('notes.show',
            compact('note')
        );
    }
    
}
