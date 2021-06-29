<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clearance;
use Illuminate\Support\Facades\Auth;

class ClearanceController extends Controller
{
    //

    public function clearance_new(){
        return view("clearance_new");
    }
    public function clearance_start(Request $request){
        $clearance = new Clearance();
        $clearance->userid = $request->userid;
        $clearance->save();

        return back();
    }

    public function who($who){
        // dd("here");
        switch ($who) {
            case 'lecturer':
                // dd("here");
                if(Auth::user()->role != 2){
                    return redirect("/")->with("success", "You have no access there");
                }
                $requests = Clearance::where("step", 0)->join("users", "clearances.userid","=","users.id")->get();

                // foreach ($requests as $key => $value) {
                //     if($value->)
                // }
                return view("cert.clear")->with("collection", $requests);
                break;
            case 'hod':
                    // dd("here");
                    if(Auth::user()->role != 3){
                        return redirect("/")->with("success", "You have no access there");
                    }
                    $requests = Clearance::where("step", 2)->join("users", "clearances.userid","=","users.id")->get();

                    return view("cert.clear")->with("collection", $requests);
                    break;
            case 'library':
                // dd("here");
                if(Auth::user()->role != 4){
                    return redirect("/")->with("success", "You have no access there");
                }
                $requests = Clearance::where("step", 3)->join("users", "clearances.userid","=","users.id")->get();

                return view("cert.clear")->with("collection", $requests);
                break;
            case 'accountant':
                // dd("here");
                if(Auth::user()->role != 5){
                    return redirect("/")->with("success", "You have no access there");
                }
                $requests = Clearance::where("step", 4)->join("users", "clearances.userid","=","users.id")->get();

                return view("cert.clear")->with("collection", $requests);
                break;
            
            case 'registrar':
                // dd("here");
                if(Auth::user()->role != 6){
                    return redirect("/")->with("success", "You have no access there");
                }
                $requests = Clearance::where("step", 5)->join("users", "clearances.userid","=","users.id")->get();

                return view("cert.clear")->with("collection", $requests);
                break;
    

            default:
                return redirect("/");
                break;
        }
    }

    public function move(Request $request){
        // dd($request->userid);
        $clear = new Clearance();
        $clear->userid = $request->userid;
        $clear->step = $request->role;
        // $clear->remarks = $request->remarks;
        $clear->status = $request->status;
        $clear->save();

        return back();
    }

    public function add_remarks(Request $request){
        // $clear 
    }
}
