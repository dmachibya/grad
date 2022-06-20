@extends('master')
@section('content')

<div class="overflow-auto h-screen pb-24 px-4 md:px-6">
    <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
        @if (Auth::user())
        Welcome {{Auth::user()->name}}
        @endif
    </h1>

    @php
    $req = DB::select('select * from certificates where userid = ?', [Auth::user()->id]);
    if(count($req)>=1){
    $status = "processed";
    }else {
    $status = "no";
    }
    @endphp
    @if ($status == "no")
    <h2 class="text-md text-gray-600">
        This is Graduates' information system. To begin request a Certificate Below
    </h2>
    <div class="flex my-6 items-center w-full space-y-4 md:space-x-4 md:space-y-0 flex-col md:flex-row">
        <a href="/certificates/new"
            class="inline-block items-center px-2 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md dark:bg-gray-800 hover:bg-blue-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">
            <span>+</span>
            <span class="mx-1">Request Certificate</span>
        </a>
        @else
        <h2 class="text-md text-green-600 my-4">
            Your request is being processed, you will notified.
        </h2>
        @endif


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