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



    @php
    $stage = 0;
    $clear = DB::select('select * from clearances where userid = ?',
    [Auth::user()->id]);

    $clear2 = DB::select('select * from transcripts where userid = ?',
    [Auth::user()->id]);

    $clear3 = DB::select('select * from certificates where userid = ?',
    [Auth::user()->id]);

    // $isClear = false;

    if(count($clear)>0){
    if($clear[0]->status != 2 && $clear[0]->step == 14){
    // $isClear = true;
    $stage = 1;
    }
    if(count($clear2)>0){
    // $isClear = true;
    $stage = 2;

    }
    if(count($clear3)>0){
    // $isClear = true;
    $stage = 3;

    }
    }
    @endphp



    <h2 class="text-md text-gray-600">
        This is Graduates' Information system. Choose what yo want below
    </h2>
    <div class="flex my-6 items-center w-full space-y-4 md:space-x-4 md:space-y-0 flex-col md:flex-row">
        @if ($stage == 0)
        <a href="/clearance"
            class="inline-block items-center px-2 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-green-600 rounded-md dark:bg-gray-800 hover:bg-green-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">
            <span class="mx-1">Clearance form</span>
        </a>
        <button disabled class="bg-gray-300 text-gray-400 px-4 py-2 rounded-md cursor-default">
            <span class="mx-1">Transcript Form</span>
        </button>
        <button disabled class="bg-gray-300 text-gray-400 px-4 py-2 rounded-md cursor-default">
            <span class="mx-1">Request Certificate</span>
        </button>

        <button disabled class="bg-gray-300 text-gray-400 px-4 py-2 rounded-md cursor-default">
            <span class="mx-1">Alumni Form</span>
        </button>


        @endif


        @if ($stage == 1)
        <a href="/clearance"
            class="inline-block items-center px-2 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-green-600 rounded-md dark:bg-gray-800 hover:bg-green-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">
            <span class="mx-1">Clearance form</span>
        </a>
        <a href="/transcript"
            class="inline-block items-center px-2 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-yellow-600 rounded-md dark:bg-yellow-800 hover:bg-yellow-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">
            <span class="mx-1">Transcript form</span>
        </a>
        <button disabled class="bg-gray-300 text-gray-400 px-4 py-2 rounded-md cursor-default">
            <span class="mx-1">Request Certificate</span>
        </button>

        <button disabled class="bg-gray-300 text-gray-400 px-4 py-2 rounded-md cursor-default">
            <span class="mx-1">Alumni Form</span>
        </button>
        @endif

        @if ($stage == 2)
        <a href="/clearance"
            class="inline-block items-center px-2 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-green-600 rounded-md dark:bg-gray-800 hover:bg-green-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">
            <span class="mx-1">Clearance form</span>
        </a>
        <a href="/transcript"
            class="inline-block items-center px-2 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-yellow-600 rounded-md dark:bg-yellow-800 hover:bg-yellow-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">
            <span class="mx-1">Transcript form</span>
        </a>
        <a href="/certificates/new"
            class="inline-block items-center px-2 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md dark:bg-gray-800 hover:bg-blue-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">
            <span>+</span>
            <span class="mx-1">Request Certificate</span>
        </a>
        <button disabled class="bg-gray-300 text-gray-400 px-4 py-2 rounded-md cursor-default">
            <span class="mx-1">Alumni Form</span>
        </button>
        @endif

        @if ($stage == 3)
        <a href="/clearance"
            class="inline-block items-center px-2 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-green-600 rounded-md dark:bg-gray-800 hover:bg-green-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">
            <span class="mx-1">Clearance form</span>
        </a>
        <a href="/transcript"
            class="inline-block items-center px-2 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-yellow-600 rounded-md dark:bg-yellow-800 hover:bg-yellow-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">
            <span class="mx-1">Transcript form</span>
        </a>
        <a href="/certificates/new"
            class="inline-block items-center px-2 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md dark:bg-gray-800 hover:bg-blue-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">
            <span>+</span>
            <span class="mx-1">Request Certificate</span>
        </a>
        <a href="/alumni"
            class="inline-block items-center px-2 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-600 rounded-md dark:bg-indigo-800 hover:bg-indigo-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">
            <span class="mx-1">Alumni Form</span>
        </a>
        @endif

    </div>



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
@if (session('warning'))
<div x-init="window.setTimeout(()=>{message = false},5000)" x-data="{ message: true }" x-show.transition="message"
    class="absolute z-20 bottom-2 right-2 bg-red-500 text-white px-12 py-4">
    <span>{{session('warning')}}</span>
    <span class="absolute top-0 right-2 text-3xl text-white" @click="message = false">&times;</span>
</div>
@endif
@endsection