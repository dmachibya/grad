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
        // return view("dashboard");
        $users = User::whereNotIn("users.id", [Auth::user()->id])
                ->join('roles', 'users.role', '=', 'roles.number')
                ->get();
        switch ($role) {
            case 1:
                return view("cert.dashboard_lecturer");
                break;
            case 3:
                return view("cert.dashboard_hod");
                break;
            case 4: 
                return view("cert.dashboard_library");
                break;

            case 5:
                return view("cert.dashboard_accountant");
                break;
            case 6:
                return view("cert.dashboard_registrar");
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

    public function role($id, Request $request){
        // dd($id);
        $user = User::where("id", $id)->first();
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

    public function create(Request $request){
        $certificate = new Certificate();
        $fields = ['name', 'address', 'phone', 'email', 'date_of_birth', 'place_of_birth', 'place_of_birth', 'grade', 'programme','year_of_admission', 'registration_number', 'year_of_graduation'];


        foreach ($fields as $key => $value) {
            # code...
            $certificate->$value = $request->$value;
        }

        $certificate->passport_size = "default.jpg";
        $certificate->form_date = date("Y-m-d");

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

    public function clearance_new(){
        return view("clearance_new");
    }
}
