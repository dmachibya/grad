@extends('master')

@section('content')

<div class="wrapped h-full relative">
    @if (session('success'))
    <div x-init="window.setTimeout(()=>{message = false},5000)" x-data="{ message: true }" x-show.transition="message" class="absolute z-20 bottom-2 right-2 bg-green-500 text-white px-12 py-4">
        <span>{{session('success')}}</span>
        <span class="absolute top-0 right-2 text-3xl text-white" @click="message = false">&times;</span>
    </div>
    @endif
    

    <a href="/certificates/new" class="inline-block items-center px-2 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md dark:bg-gray-800 hover:bg-blue-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">
        <span>+</span>
        <span class="mx-1">New Request</span>
    </a>

   <div class="px-12 py-12 bg-white shadow-md mt-8">
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
                    <a href="/certificate/approve/{{$item->id}}" class="my-1 inline-block px-6 py-2 bg-green-600 text-white rounded-md">Approve</a>
                    <a href="/certificate/delete/{{$item->id}}" class="my-1 inline-block px-6 py-2 bg-red-600 text-white rounded-md">Delete</a>
                    <a href="/certificate/update/1" class="my-1 inline-block px-6 py-2 bg-yellow-600 text-white rounded-md">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
   </div>
    

</div>

@endsection
@section('scripts')

<script>
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