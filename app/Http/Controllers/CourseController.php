<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Course;
use App\Models\User;
use App\Models\Department;

class CourseController extends Controller
{
    //
    public function index()
    {
        $models = Course::all();
        return view("other.courses")->with("collection", $models);
    }
    public function departments()
    {
        $models = Department::all();
        return view("other.department")->with("collection", $models);
    }

    public function home()
    {
        return view("other.home");
    }

    public function users()
    {
        $users = User::whereNotIn("users.id", [Auth::user()->id])
            ->join('roles', 'users.role', '=', 'roles.number')
            ->get();
        return view("other.users")->with("users", $users);
    }

    public function create(Request $request)
    {
        // dd("here");
        $request->validate([
            'course_name' => 'required|max:255',
            'department' => 'required|max:255'
        ]);
        Course::create([
            'department' => $request->department,
            'course_name' => $request->course_name
        ]);

        return back()->with("success", "Department Added Successfully");
    }

    public function delete($id)
    {
        $model = Course::find($id);
        $model->delete();

        return back()->with("success", "Deleted Successfully");
    }
}
