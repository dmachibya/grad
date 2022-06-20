<?php

namespace App\Http\Controllers;

use App\Models\Transcript;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TranscriptController extends Controller
{
    //

    public function index()
    {
        $stage = 0;
        $clear = DB::select(
            'select * from clearances where userid = ?',
            [Auth::user()->id]
        );

        // $isClear = false;

        if (count($clear) > 0) {
            if ($clear[0]->status != 2 && $clear[0]->step == 14) {
                // $isClear = true;
                $stage = 1;
            }
        }
        if ($stage == 0) {
            return redirect("/dashboard")->with("warning", "you need to complete all prior processes first");
        }

        return redirect("/transcript/new");
    }
    public function new_form()
    {
        return view("transcript_form");
    }
    public function index2()
    {
        $stage = 0;
        $clear = DB::select(
            'select * from certificates where userid = ?',
            [Auth::user()->id]
        );

        // $isClear = false;

        if (count($clear) > 0) {
            $stage = 1;
        }

        if ($stage == 0) {
            return redirect("/dashboard")->with("warning", "you need to complete all prior processes first");
        }

        return redirect("/alumni/new");
    }
    public function new_form2()
    {
        return view("alumni_form");
    }

    public function create(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'admission' => 'required',
                'programme' => 'required',
                'check_csee' => 'required',
                'admission_check' => 'required',
                'date_check' => 'required',
                'programme_check' => 'required',
                'award_check' => 'required',
                'gpa_check' => 'required',
                'grade_check' => 'required',
            ],
        );
        $transcript = new Transcript();
        $transcript->userid = Auth::user()->id;
        $transcript->name = $request->name;
        $transcript->admission = $request->admission;
        $transcript->programme = $request->programme;
        $transcript->check_csee = $request->check_csee;
        $transcript->admission_check = $request->admission_check;
        $transcript->date_check = $request->date_check;
        $transcript->programme_check = $request->programme_check;
        $transcript->award_check = $request->award_check;
        $transcript->gpa_check = $request->gpa_check;
        $transcript->grade_check = $request->grade_check;
        $transcript->printed = "1";
        $transcript->save();

        return redirect('/dashboard')->with("success", "Action completed successfully");
    }
}
