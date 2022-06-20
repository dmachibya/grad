<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clearance;
use Illuminate\Support\Facades\Auth;

class ClearanceController extends Controller
{
    //
    public function index()
    {
        $clearances = Clearance::where('userid', Auth::user()->id)->get();
        if (count($clearances) >= 1) {
            return redirect("/clearance/new");
        }
        return view("clearance_begin");
    }
    public function clearance_new()
    {
        return view("clearance_new");
    }
    public function clearance_start(Request $request)
    {
        $clearance = new Clearance();
        $clearance->userid = $request->userid;
        $clearance->save();


        return back();
    }
    public function process()
    {
        $role = Auth::user()->role;
        // dd("here");
        switch ($role) {
            case '3':
                return redirect("/clearance/hod");
                // return "here";
                break;
            case '8':
                return redirect("/clearance/hod_gst");
                break;
            case '9':
                return redirect("/clearance/workshop");
                break;
            case '10':
                return redirect("/clearance/classmaster");
                break;
            case '11':
                return redirect("/clearance/sports");
                break;
            case '12':
                return redirect("/clearance/cateress");
                break;
            case '13':
                return redirect("/clearance/waden_matron");
                break;
            case '14':
                return redirect("/clearance/bursar");
                break;
            case '6':
                return redirect("/clearance/registrar");
                break;
            case '4':
                return redirect("/clearance/librarian");
                break;

            default:
                # code...
                return redirect("/");
                break;
        }
    }
    public function who($who)
    {
        // dd("here");
        switch ($who) {
            case 'hod':
                // dd(Auth::user()->role);

                if (Auth::user()->role != 3) {
                    return redirect("/clearance/process");
                }
                $requests = Clearance::where("step", 0)->join("users", "clearances.userid", "=", "users.id")->get();

                // foreach ($requests as $key => $value) {
                //     if($value->)
                // }
                return view("cert.clear")->with("collection", $requests);
                break;
            case 'hod_gst':
                // dd("here");
                if (Auth::user()->role != 8) {
                    return redirect("/clearance/process");
                }
                $requests = Clearance::where("step", 3)->join("users", "clearances.userid", "=", "users.id")->get();

                return view("cert.clear")->with("collection", $requests);
                break;
            case 'workshop':
                // dd("here");
                if (Auth::user()->role != 9) {
                    return redirect("/clearance/process");
                }
                $requests = Clearance::where("step", 8)->join("users", "clearances.userid", "=", "users.id")->get();

                return view("cert.clear")->with("collection", $requests);
                break;
            case 'classmaster':
                // dd("here");
                if (Auth::user()->role != 10) {
                    return redirect("/clearance/process");
                }
                $requests = Clearance::where("step", 9)->join("users", "clearances.userid", "=", "users.id")->get();

                return view("cert.clear")->with("collection", $requests);
                break;

            case 'librarian':
                // dd("here");
                if (Auth::user()->role != 4) {
                    return redirect("/clearance/process");
                }
                $requests = Clearance::where("step", 10)->join("users", "clearances.userid", "=", "users.id")->get();

                return view("cert.clear")->with("collection", $requests);
                break;
            case 'sports':
                // dd("here");
                if (Auth::user()->role != 11) {
                    return redirect("/clearance/process");
                }
                $requests = Clearance::where("step", 4)->join("users", "clearances.userid", "=", "users.id")->get();

                return view("cert.clear")->with("collection", $requests);
                break;
            case 'cateress':
                // dd("here");
                if (Auth::user()->role != 12) {
                    return redirect("/clearance/process");
                }
                $requests = Clearance::where("step", 11)->join("users", "clearances.userid", "=", "users.id")->get();

                return view("cert.clear")->with("collection", $requests);
                break;
            case 'waden_matron':
                // dd("here");
                if (Auth::user()->role != 13) {
                    return redirect("/clearance/process");
                }
                $requests = Clearance::where("step", 12)->join("users", "clearances.userid", "=", "users.id")->get();

                return view("cert.clear")->with("collection", $requests);
                break;
            case 'registrar':
                // dd("here");
                if (Auth::user()->role != 6) {
                    return redirect("/clearance/process");
                }
                $requests = Clearance::where("step", 13)->join("users", "clearances.userid", "=", "users.id")->get();

                return view("cert.clear")->with("collection", $requests);
                break;
            case 'bursar':
                // dd("here");
                if (Auth::user()->role != 14) {
                    return redirect("/clearance/process");
                }
                $requests = Clearance::where("step", 6)->join("users", "clearances.userid", "=", "users.id")->get();

                return view("cert.clear")->with("collection", $requests);
                break;


            default:
                return redirect("/");
                break;
        }
    }

    public function move(Request $request)
    {
        // dd($request->userid);
        $clear = Clearance::where("userid", ($request->userid))->first();
        // $clear->userid = $request->userid;
        $clear->step = $request->role;
        // $clear->remarks = $request->remarks;
        $clear->status = $request->status;
        $clear->save();

        return back();
    }

    public function add_remarks(Request $request)
    {
        // $clear 
    }

    public function output()
    {
        $clear = Clearance::where("userid", Auth::user()->id)->where("step", 14)->get();

        if (count($clear) < 1) {
            return redirect("/");
        }

        return view("other.output");
    }
}
