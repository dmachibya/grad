<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumniController extends Controller
{
    //
    public function create(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'admission' => 'required',
                'programme' => 'required',
                'level' => 'required',
                'address' => 'required',
                'country' => 'required',
                'gender' => 'required',
                'date_of_birth' => 'required',
                'email' => 'required',
                'job_title' => 'required',
                'employment' => 'required',
                'phone' => 'required',
                'employment_country' => 'required',
            ],
        );

        // dd($request->userid);
        if ($request->userid != null) {
            $alumni = Alumni::where("userid", $request->userid)->first();
        } else {
            $alumni = new Alumni();
        }

        $alumni->userid = Auth::user()->id;
        $alumni->name = $request->name;
        $alumni->email = $request->email;
        $alumni->email2 = $request->email2;
        $alumni->anything = $request->anything;
        $alumni->level = $request->level;
        $alumni->programme = $request->programme;
        $alumni->admission = $request->admission;
        $alumni->address = $request->address;
        $alumni->address2 = $request->address2;
        $alumni->country = $request->country;
        $alumni->gender = $request->gender;
        $alumni->date_of_birth = $request->date_of_birth;
        $alumni->job_title = $request->job_title;
        $alumni->employment = $request->employment;
        $alumni->employment_country = $request->employment_country;
        $alumni->phone = $request->phone;
        $alumni->phone2 = $request->phone2;
        $alumni->save();

        return redirect("/dashboard");
    }
}
