@extends('cert.dashboard_admin')

@section('content')
    <div x-data="{ modal: false }">
        <div href="/admin/courses" class="inline-block px-6 py-2 bg-green-500 text-white rounded-sm hover:bg-green-400 cursor-pointer my-4" @click="modal = true">New Department</div>

    <div class="px-8 py-6 bg-white bg-shadown">
         <table id="myTable" class="">
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <td>Department</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collection as $key=>$item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->department_name}}</td>
                            
                            <td>
                                
                                <form action="/admin/department/delete/{{$item->id}}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="my-1 inline-block px-6 py-2 bg-red-600 text-white rounded-md">Delete</button>
                                </form>
                                {{-- <a href="/admin/department/edit/{{$item->id}}" class="my-1 inline-block px-6 py-2 bg-yellow-500 text-white rounded-md">Deny</a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

        
    </div>
    <div class="fixed bt-300 inset-0 z-40" x-show="modal" @click="modal = false"></div>
    <div class="fixed z-50 top-10 left-1/4 w-1/2 p-12 bg-white shadow-lg" x-show.transition="modal">
        <div class="close text-4xl font-bold text-red-400 cursor-pointer absolute right-4 top-2" @click="modal = false" >&times;</div>
        <h1 class="font-bold text-2xl">New Department</h1>
        <form action="/admin/department/create" method="POST">
            {{ csrf_field() }}
            <div class="my-4">
                <label for="department_name">Department Name</label>
                <input type="text" name="department_name" class="px-4 py-2 block w-full rounded-md">
            </div>
            <div class="my-4">
                <button class="px-6 py-2 bg-green-500 text-white rounded-sm float-right w-full block">Add Department</button>
            </div>
        </form>
    </div>
    </div>
@endsection