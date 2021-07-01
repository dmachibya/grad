<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Department;

class DepartmentController extends Controller
{
    //
    public function create(Request $request)
    {
        // dd("here");
        $request->validate([
            'department_name' => 'required|max:255'
        ]);
        Department::create([
            'department_name' => $request->department_name
        ]);

        return back()->with("success", "Department Added Successfully");
    }

    public function delete($id)
    {
        $model = Department::find($id);
        $model->delete();

        return back()->with("success", "Deleted Successfully");
    }
}
