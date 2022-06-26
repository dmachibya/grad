@extends('master')

@section('content')
@php
$alumni = DB::select('select * from alumnis where userid = ?',
[Auth::user()->id]);


$hasFilled = false;
if(count($alumni)>0){
$hasFilled = true;
// echo "found---";
}

@endphp
@if ($hasFilled)
<h1 class="text-2xl font-bold">NB: You have filled this form, you now can print or update it</h1>
<button type="button" class=" my-4 px-6 py-2 rounded-md bg-green-500 text-white hover:bg-green-400"
    onclick="printJS({ printable: 'printJS-form', type: 'html', header: 'Alumni Form' })">
    Print Form
</button>
@endif

<h1 class="text-4xl text-center">Alumni Form</h1>
<div class="px-8 py-6 bg-white bg-shadown pb-48">
    <form method="POST" id="printJS-form" action="/alumni/create">
        {{ csrf_field() }}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li class="text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if ($hasFilled)
        <input type="hidden" name="userid" value="{{$alumni[0]->userid}}">
        @endif

        <h2 class="font-bold text-3xl">
            General Information
        </h2>
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="name">Full Name</label>
                <input value="{{$hasFilled ? $alumni[0]->name : ''}}" name="name" id="username" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="admission">Admission</label>
                <input value="{{$hasFilled ? $alumni[0]->admission : ''}}" name="admission" id="username" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="username">Programme</label>
                <select name="programme">
                    @php

                    $courses = DB::select('select * from courses');
                    if(count($courses)>0){

                    foreach ($courses as $key => $value) {
                    # code...
                    $hasData = true;
                    }
                    }else {
                    $hasData = false;
                    }
                    @endphp
                    @if ($hasData)
                    @foreach ($courses as $course)
                    <option {{ $hasFilled ? $alumni[0]->programme == $course->course_name
                        ? "selected" : "" : ""}} value="{{$course->course_name}}">{{$course->course_name}}
                    </option>

                    @endforeach
                    @endif
                </select>
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="level">Level</label>
                <select name="level">
                    <option {{ $hasFilled ? $alumni[0]->level == " 0" ? "selected" : "" : ""}} value="0">Short Course
                    </option>
                    <option {{ $hasFilled ? $alumni[0]->level == " 1" ? "selected" : "" : ""}} value="1">1</option>
                    <option {{ $hasFilled ? $alumni[0]->level == " 2" ? "selected" : "" : ""}} value="2">2</option>
                    <option {{ $hasFilled ? $alumni[0]->level == " 3" ? "selected" : "" : ""}} value="3">3</option>
                    <option {{ $hasFilled ? $alumni[0]->level == " 4" ? "selected" : "" : ""}} value="4">4</option>
                    <option {{ $hasFilled ? $alumni[0]->level == " 5" ? "selected" : "" : ""}} value="5">5</option>
                    <option {{ $hasFilled ? $alumni[0]->level == " 6" ? "selected" : "" : ""}} value="6">6</option>
                    <option {{ $hasFilled ? $alumni[0]->level == " 7-1" ? "selected" : "" : ""}} value="7-1">7-1
                    </option>
                    <option {{ $hasFilled ? $alumni[0]->level == " 7-2" ? "selected" : "" : ""}} value="7-2">7-2
                    </option>
                    <option {{ $hasFilled ? $alumni[0]->level == " 8" ? "selected" : "" : ""}} value="8">8</option>
                </select>
            </div>
            <div class="col-span-2 grid  grid-cols-1 sm:grid-cols-3">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="gender">Gender</label>
                    <select name="gender">
                        <option {{ $hasFilled ? $alumni[0]->gender == " male" ? "selected" : "" : ""}} value="male">Male
                        </option>
                        <option {{ $hasFilled ? $alumni[0]->gender == " female" ? "selected" : "" : ""}} value="female">
                            Female</option>
                    </select>
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="gender">Date</label>
                    <input type="date" value="{{$hasFilled ? $alumni[0]->date_of_birth : ''}}" name="date_of_birth"
                        id="">
                </div>

            </div>


            <h2 class="col-span-2 font-bold text-3xl">
                Address Information
            </h2>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="email">Email Address</label>
                <input name="email" id="email" value="{{$hasFilled ? $alumni[0]->email : ''}}" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="email2">Alternative Email</label>
                <input name="email2" id="email2" value="{{$hasFilled ? $alumni[0]->email2 : ''}}" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="address">Residential Address 1</label>
                <input name="address" id="address" value="{{$hasFilled ? $alumni[0]->address : ''}}" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="address2">Residential Address 2</label>
                <input name="address2" id="address2" value="{{$hasFilled ? $alumni[0]->address2 : ''}}" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="country">Country</label>
                <input name="country" value="{{$hasFilled ? $alumni[0]->country : ''}}" id="country" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="phone">Mobile No.</label>
                <input name="phone" id="phone" value="{{$hasFilled ? $alumni[0]->phone : ''}}" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="phone2">Alternate Mobile No.</label>
                <input value="{{$hasFilled ? $alumni[0]->phone : ''}}" name="phone2" id="phone2" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>


            <h2 class="col-span-2 font-bold text-3xl">
                Employment Information
            </h2>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="employment">Employment</label>
                <input name="employment" value="{{$hasFilled ? $alumni[0]->employment : ''}}" id="employment"
                    type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="job_title">Current Job Title</label>
                <input name="job_title" id="job_title" type="text" value="{{$hasFilled ? $alumni[0]->job_title : ''}}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="employment_country">Country</label>
                <input name="employment_country" id="employment_country"
                    value="{{$hasFilled ? $alumni[0]->employment_country : ''}}" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
            <div class="col-span-2">
                <label class="text-gray-700 dark:text-gray-200" for="anything">Anything to Specify</label>
                <textarea name="anything" class="w-full" rows="4">
                @if ($hasFilled)
                    {{$alumni[0]->anything}}
                @endif
                </textarea>
            </div>

            <div class="col-span-2">

                <input type="submit" class="px-4 py-2 bg-blue-500 text-white my-2" value="{{$hasFilled ? " Update"
                    : 'Submit' }}">
            </div>
        </div>
    </form>
</div>
@endsection


@section('scripts')
<script src="{{asset('js/print.min.js')}}"></script>
@endsection