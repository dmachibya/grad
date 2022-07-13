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

        // dd($role);
        switch ($role) {
            case '3':
                return redirect("/clearance/hod");
                // return "here";
                break;
            case 15:
                return redirect("/clearance/hod");
                // return "here";
                break;
            case 16:
                return redirect("/clearance/hod");
                // return "here";
                break;
            case '17':
                return redirect("/clearance/hod");
                // return "here";
                break;
            case '18':
                return redirect("/clearance/hod");
                // return "here";
                break;
            case '19':
                return redirect("/clearance/hod");
                // return "here";
                break;
            case '20':
                return redirect("/clearance/hod");
                // return "here";
                break;
            case '21':
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
            case '22':
                return redirect("/clearance/lab-manager");
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

                // dd(Auth::user()->role);
                if (
                    Auth::user()->role == 0 || Auth::user()->role == 1 ||
                    Auth::user()->role == 4 || Auth::user()->role == 5 ||
                    Auth::user()->role == 6 ||
                    Auth::user()->role == 7 || Auth::user()->role == 8 ||
                    Auth::user()->role == 9 ||
                    Auth::user()->role == 10 ||
                    Auth::user()->role == 11 ||
                    Auth::user()->role == 12 ||
                    Auth::user()->role == 13 ||
                    Auth::user()->role == 14 ||
                    Auth::user()->role == 2
                ) {
                    return redirect("/clearance/process");
                }

                $dept = 1;
                if (Auth::user()->role == '15') {
                    $dept = 1;
                } else if (Auth::user()->role == '16') {
                    $dept = 2;
                } else if (Auth::user()->role == '17') {
                    $dept = 3;
                } else if (Auth::user()->role == '18') {
                    $dept = 4;
                } else if (Auth::user()->role == '19') {
                    $dept = 5;
                } else if (Auth::user()->role == '20') {
                    $dept = 7;
                } else if (Auth::user()->role == '21') {
                    $dept = 8;
                }



                $requests = Clearance::where("step", 0)->join("users", "clearances.userid", "=", "users.id")->where("users.department", $dept)->get();

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
            case 'lab-manager':
                // dd("here");
                if (Auth::user()->role != 22) {
                    return redirect("/clearance/process");
                }
                $requests = Clearance::where("step", 9)->join("users", "clearances.userid", "=", "users.id")->get();

                return view("cert.clear")->with("collection", $requests);
                break;
            case 'classmaster':
                // dd("here");
                if (Auth::user()->role != 10) {
                    return redirect("/clearance/process");
                }
                $requests = Clearance::where("step", 22)->join("users", "clearances.userid", "=", "users.id")->get();

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
        $step = Auth::user()->role;
        if (Auth::user()->role == '15') {
            $step = 3;
        } else if (Auth::user()->role == '16') {
            $step = 3;
        } else if (Auth::user()->role == '17') {
            $step = 3;
        } else if (Auth::user()->role == '18') {
            $step = 3;
        } else if (Auth::user()->role == '19') {
            $step = 3;
        } else if (Auth::user()->role == '20') {
            $step = 3;
        } else if (Auth::user()->role == '21') {
            $step = 3;
        }
        $clear->step = $step;
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

        return view("output_clearance");
    }
}
