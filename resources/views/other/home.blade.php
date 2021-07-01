@extends('cert.dashboard_admin')

@section('content')
    <div class="my-4">
        <a href="/admin/users" class="inline-block px-6 py-2 bg-blue-500 text-white rounded-md">Users</a>
        <a href="/admin/courses" class="inline-block px-6 py-2 bg-green-500 text-white rounded-md">Courses</a>
        <a href="/admin/departments" class="inline-block px-6 py-2 bg-yellow-500 text-white rounded-md">Departments</a>
        <a href="/admin/tokens" class="inline-block px-6 py-2 bg-purple-500 text-white rounded-md">Tokens</a>

    </div>
@endsection