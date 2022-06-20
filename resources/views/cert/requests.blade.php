@extends('master')
@section('content')



<div class="overflow-auto h-screen pb-24 px-4 md:px-6 bg-white shadow-md">
    <h1 class="text-4xl font-semibold text-gray-800 dark:text-white my-6">
        Certificates

        @php
        $role = Auth::user()->role;


        @endphp

        @switch($role)
        @case(2)
        (Lecturer)
        @break
        @case(3)
        (HOD)
        @break
        @case(4)
        (Librarian)
        @break
        @case(5)
        (Accountant)
        @break
        @case(6)
        (Registrar)
        @break
        @default

        @endswitch
    </h1>
    <table id="myTable" class="">
        <thead>
            <tr>
                <td>Full Name</td>
                <td>Permanent Address</td>
                <td>Telephone</td>
                <td>Email Address</td>
                <td>Date of Birth</td>
                <td>Place of Birth</td>
                <td>Award</td>
                <td>Programme</td>
                <td>Year of Admission</td>
                <td>Year of Graduation</td>
                <td>Application Date</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($collection as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->date_of_birth}}</td>
                <td>{{$item->place_of_birth}}</td>
                <td>{{$item->grade}}</td>
                <td>{{$item->programme}}</td>
                <td>{{$item->year_of_admission}}</td>
                <td>{{$item->year_of_graduation}}</td>
                <td>{{$item->form_date}}</td>
                <td>

                    <form action="/certificate/move" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="userid" value="{{$item->userid}}">
                        <input type="hidden" name="role" value="{{Auth::user()->role}}">
                        <button type="submit"
                            class="my-1 inline-block px-6 py-2 bg-green-600 text-white rounded-md">Approve</button>
                    </form>
                    <a href="/certificate/delete/{{$item->id}}"
                        class="my-1 inline-block px-6 py-2 bg-red-600 text-white rounded-md">Deny</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>

@endsection
@section('scripts')

@if (session('success'))
<div x-init="window.setTimeout(()=>{message = false},5000)" x-data="{ message: true }" x-show.transition="message"
    class="absolute z-20 bottom-2 right-2 bg-green-500 text-white px-12 py-4">
    <span>{{session('success')}}</span>
    <span class="absolute top-0 right-2 text-3xl text-white" @click="message = false">&times;</span>
</div>
@endif

<script>
    function role() {
        return {
            user: 1,
            number: 1
        }
    }

    $(document).ready( function () {
        $('#myTable').DataTable({
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0},
                { responsivePriority: 2, targets: -1},
            ]
        });
    } );
</script>
@endsection