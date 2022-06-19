<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranscriptController extends Controller
{
    //
    public function new_form(){
        return view("transcript_form");
    }
}
