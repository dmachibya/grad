@extends('master')

@section('content')
<div x-data="{ modal: false }">
    <div href="/admin/courses"
        class="inline-block px-6 py-2 bg-green-500 text-white rounded-sm hover:bg-green-400 cursor-pointer my-4"
        @click="modal = true">New Course</div>

    <div class="px-8 py-6 bg-white bg-shadown">
        <table id="myTable" class="">
            <thead>
                <tr>
                    <td>S/N</td>
                    <td>Course</td>
                    <td>Department</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($collection as $key=>$item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->course_name}}</td>
                    <td>
                        @php
                        $row = DB::select('select * from departments where id = ?', [$item->department]);
                        if(count($row)>0){
                        $dept = $row[0]->department_name;
                        }else {
                        $dept = "";
                        // $dept = "noo: ".$item->department;
                        }
                        @endphp
                        {{$dept}}
                    </td>

                    <td>

                        <form action="/admin/course/delete/{{$item->id}}"" method=" post">
                            {{ csrf_field() }}
                            <button type="submit"
                                class="my-1 inline-block px-6 py-2 bg-red-600 text-white rounded-md">Delete</button>
                        </form>
                        {{-- <a href="/admin/courses/delete/{{$item->id}}"
                            class="my-1 inline-block px-6 py-2 bg-red-600 text-white rounded-md">Delete</a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>
    <div class="fixed bt-300 inset-0 z-40" x-show="modal" @click="modal = false"></div>
    <div class="fixed z-50 top-10 left-1/4 w-1/2 p-12 bg-white shadow-lg" x-show.transition="modal">
        <div class="close text-4xl font-bold text-red-400 cursor-pointer absolute right-4 top-2" @click="modal = false">
            &times;</div>
        <h1 class="font-bold text-2xl">New Course</h1>
        <form action="/admin/course/create" method="POST">
            {{ csrf_field() }}
            <div class="my-4">
                <label for="course_name">Course Name</label>
                <input type="text" name="course_name" class="px-4 py-2 block w-full rounded-md">
            </div>
            <div class="my-4">
                <label for="department" class="block">Department</label>
                <select name="department" id="">
                    @php
                    $departments = DB::select('select * from departments');
                    if(count($departments)>0){

                    foreach ($departments as $key => $value) {
                    # code...
                    $hasData = true;
                    }
                    }else {
                    $hasData = false;
                    }
                    @endphp
                    @if ($hasData)
                    @foreach ($departments as $department)
                    <option value="{{$department->id}}">{{$department->department_name}}</option>

                    @endforeach
                    @endif
                    {{-- <option value="1">ICT</option> --}}
                    {{-- <option value="2">ICT 2</option> --}}
                </select>
            </div>
            <div class="my-4">
                <button class="px-6 py-2 bg-green-500 text-white rounded-sm float-right w-full block">Add
                    Course</button>
            </div>
        </form>
    </div>
</div>
@endsection