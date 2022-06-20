@extends('master')

@section('content')
@php
$clearance = DB::select('select * from clearances where userid = ?', [Auth::user()->id])
@endphp

@if (count($clearance)>=1)
Your request is being processed
@else
<p>You have not initiated clearance. </p>
<p>Click the button below to start clearance process</p>
<form action="/clearance/start" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="userid" value="{{Auth::user()->id}}">
    <input type="submit"
        class="inline-block items-center px-8 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-green-600 rounded-md dark:bg-gray-800 hover:bg-green-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700"
        value="Start">
</form>
@endif
</a>

@endsection