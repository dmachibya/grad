@extends('cert.dashboard_admin')


@section('content')
    <div class="mt-20 bg-white shadow-md px-12 py-8">
        <table id="myTable" class="">
                    <thead>
                        <tr>
                            <td>Full Name</td>
                            <td>Email Address</td>
                            <td>Role</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                        <tr>
                            <td>{{$item->name}} :: {{$item->email}}</td>
                            <td>
                                {{$item->email}}
                            </td>
                            <td x-data="{ role: false }">
                               <form action="/admin/role" method="POST" x-show.transition="role">
                               {{csrf_field()}}
                                    <input type="hidden" name="user_email" value="{{$item->email}}">
                                    <select name="role" id="role">
                                        <option value="1">Student</option>
                                        <option value="2">Lecturer</option>
                                        <option value="3">HOD</option>
                                        <option value="4">Librarian</option>
                                        <option value="5">Accountant</option>
                                        <option value="6">Registrar</option>
                                        <option value="7">Admin</option>
                                    </select>
                                    <button type="submit" class="bg-blue-500 px-6 py-2 rounded-lg text-white">Change</button>
                                </form>

                                <div x.show.transition="!role">
                                    {{$item->role_name}} <sup class="text-blue-500 cursor-pointer" @click="role = true">Change</sup>
                                </div>
                            </td>
                            <td>
                                <a href="/certificate/delete/{{$item->id}}" class="my-1 inline-block px-6 py-2 bg-red-600 text-white rounded-md">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>
@endsection

@section('scripts')
    
@endsection