<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    //

    public function dashboard(){
        $role = Auth::user()->role;
        if($role == 0){
            $role = 1;
        }
        // return view("dashboard");
        $users = User::whereNotIn("users.id", [Auth::user()->id])
                ->join('roles', 'users.role', '=', 'roles.number')
                ->get();
        // dd(count($users));
        switch ($role) {
            case 2:
                return view("cert.dashboard_office");
                break;
            case 3:
                return view("cert.dashboard_office");
                break;
            case 4: 
                return view("cert.dashboard_office");
                break;

            case 5:
                return view("cert.dashboard_office");
                break;
            case 6:
                return view("cert.dashboard_office");
                break;
            case 7:
                return view("cert.dashboard_admin")->with("users", $users);
                break;
            default:
                return view("cert.dashboard_student");
                break;
        }

        return view("cert.dashboard_student");
        
        
    }

    public function role(Request $request){
        // dd($request->user_email);
        $user = User::where("email", $request->user_email)->first();
        $user->role = $request->role;
        $user->save();

        return back()->with("success", "Role changed successfully");
    }

    public function index(){
        

        $certs = Certificate::all();
        return view("cert.dashboard")->with("collection", $certs);
    }

    public function certificates(){

        $certs = Certificate::all();
        return view("cert.home")->with("collection", $certs);
    }

    public function process_certificates(){
        $role = Auth::user()->role;
        // dd("here");
        switch ($role) {
            case '2':
                return redirect("/certificate/lecturer");
                break;
            case '3':
                return redirect("/certificate/hod");
                break;
            case '4':
                return redirect("/certificate/library");
                break;
            case '5':
                return redirect("/certificate/accountant");
                break;
            case '6':
                return redirect("/certificate/registrar");
                break;   

            default:
                # code...
                break;
        }
    }

    public function create(Request $request){
        $certificate = new Certificate();
        $fields = ['name', 'address', 'phone', 'email', 'date_of_birth', 'place_of_birth', 'place_of_birth', 'grade', 'programme','year_of_admission', 'registration_number', 'year_of_graduation'];

        
        foreach ($fields as $key => $value) {
            # code...
            $certificate->$value = $request->$value;
        }
        $certificate->step = "0";
        $certificate->passport_size = "default.jpg";
        $certificate->form_date = date("Y-m-d");
        $certificate->userid = Auth::user()->id;

        $certificate->save();

        return redirect("/certificates")->with("success", "Certificate Request Successfully Sent");
    }

    public function delete($id){
        $certificate = Certificate::find($id);

        $certificate->delete();

        return redirect("/certificates")->with("success", "Deleted Successfully");
    }

    public function update($id){
        $certificate = Certificate::find($id);

        return view("cert.update")->with("item", $certificate);
    }

    public function patch($id, Request $request){
        $certificate = Certificate::find($id);

        $fields = ['name', 'address', 'phone', 'email', 'date_of_birth', 'place_of_birth', 'place_of_birth', 'grade', 'programme','year_of_admission', 'registration_number', 'year_of_graduation'];


        foreach ($fields as $key => $value) {
            # code...
            $certificate->$value = $request->$value;
        }

        $certificate->save();
        return redirect("/certificates")->with("success", "Updated Successfully");
    }

    public function who($who){
        // dd("here");
        switch ($who) {
            case 'lecturer':
                // dd("here");
                if(Auth::user()->role != 2){
                    return redirect("/")->with("success", "You have no access there");
                }
                $requests = Certificate::where("step", 0)->get();
                return view("cert.requests")->with("collection", $requests);
                break;
            case 'hod':
                    // dd("here");
                    if(Auth::user()->role != 3){
                        return redirect("/")->with("success", "You have no access there");
                    }
                    $requests = Certificate::where("step", 2)->get();
                    return view("cert.requests")->with("collection", $requests);
                    break;
            case 'library':
                // dd("here");
                if(Auth::user()->role != 4){
                    return redirect("/")->with("success", "You have no access there");
                }
                $requests = Certificate::where("step", 3)->get();
                return view("cert.requests")->with("collection", $requests);
                break;
            case 'accountant':
                // dd("here");
                if(Auth::user()->role != 5){
                    return redirect("/")->with("success", "You have no access there");
                }
                $requests = Certificate::where("step", 4)->get();
                return view("cert.requests")->with("collection", $requests);
                break;
            
            case 'registrar':
                // dd("here");
                if(Auth::user()->role != 6){
                    return redirect("/")->with("success", "You have no access there");
                }
                $requests = Certificate::where("step", 5)->get();
                return view("cert.requests")->with("collection", $requests);
                break;
    

            default:
                return redirect("/");
                break;
        }
    }

    public function move(Request $request){
        // dd($request->userid);
        $certificate = Certificate::where("userid", $request->userid)->first();
        $certificate->step = $request->role;
        $certificate->save();

        return back();
    }
}
