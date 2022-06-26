@extends('master')

@section('content')
@php
$transcript = DB::select('select * from transcripts where userid = ?',
[Auth::user()->id]);


$hasFilled = false;
if(count($transcript)>0){
$hasFilled = true;
// echo "found---";
}
@endphp
@if ($hasFilled)
<h1 class="text-2xl font-bold">NB: You have filled this form, you now can print it only</h1>
<button type="button" class=" my-4 px-6 py-2 rounded-md bg-green-500 text-white hover:bg-green-400"
    onclick="printJS({ printable: 'printJS-form', type: 'html', header: 'Alumni Form' })">
    Print Form
</button>
@endif
<div class="px-8 py-6 bg-white bg-shadown" x-data="{name:'{{$hasFilled ? $transcript[0]->name : ''}}'}">
    <form method="POST" action="/transcript/create" id="printJS-form">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li class="text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{ csrf_field() }}
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                @if ($hasFilled)
                {{-- Values; --}}

                @endif

                <label class="text-gray-700 dark:text-gray-200" for="username">Full Name</label>
                <input name="name" @if ($hasFilled) disabled @endif type="text"
                    value="{{$hasFilled ? $transcript[0]->name : ''}}" x-model="name"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="username">Admission</label>
                <input name="admission" @if($hasFilled) disabled @endif
                    value="{{$hasFilled ? $transcript[0]->admission : ''}}" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="username">Programme</label>
                <select @if($hasFilled) disabled @endif name="programme">
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
                    <option {{ $hasFilled ? $transcript[0]->programme == $course->course_name
                        ? "selected" : "" : ""}} value="{{$course->course_name}}">{{$course->course_name}}
                    </option>

                    @endforeach
                    @endif
                </select>
            </div>

            <div class="col-span-2 border-b border-gray-200 shadow">
                <table class="w-full text-center">
                    <thead class="bg-gray-50">
                        <th class="px-6 py-2 text-xs text-gray-500">S/N</th>
                        <th class="px-6 py-2 text-xs text-gray-500 text-left">ITEM</th>
                        <th class="px-6 py-2 text-xs text-gray-500">CORRECT</th>
                        <th class="px-6 py-2 text-xs text-gray-500">NOT CORRECT</th>
                    </thead>
                    <tbody class="bg-white">
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">1</td>
                            <td class="px-6 py-4 text-sm text-gray-500 text-left">NAME AS PER CSEE*</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input @if($hasFilled)disabled @endif type="radio" name="check_csee" @if($hasFilled)
                                    @if($transcript[0]->check_csee == 1) checked @endif @endif
                                value="1">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input @if($hasFilled)disabled @endif type="radio" @if($hasFilled)
                                    @if($transcript[0]->check_csee == 0) checked @endif @endif
                                name="check_csee" value="0">

                            </td>
                        </tr>
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">2</td>
                            <td class="px-6 py-4 text-sm text-gray-500 text-left">ADMISSION NUMBER</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input @if($hasFilled)disabled @endif type="radio" name="admission_check"
                                    @if($hasFilled) @if($transcript[0]->admission_check == 1) checked @endif @endif
                                value="1">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input @if($hasFilled)disabled @endif type="radio" name="admission_check"
                                    @if($hasFilled) @if($transcript[0]->admission_check == 0) checked @endif @endif
                                value="0">

                            </td>
                        </tr>
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">3</td>
                            <td class="px-6 py-4 text-sm text-gray-500 text-left">DATE OF GRADUATION</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input @if($hasFilled)disabled @endif type="radio" name="date_check" @if($hasFilled)
                                    @if($transcript[0]->date_check == 1) checked @endif @endif
                                value="1">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input @if($hasFilled)disabled @endif type="radio" name="date_check" @if($hasFilled)
                                    @if($transcript[0]->date_check == 0) checked @endif @endif
                                value="0">

                            </td>
                        </tr>
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">4</td>
                            <td class="px-6 py-4 text-sm text-gray-500 text-left">PROGRAMME NAME</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input @if($hasFilled)disabled @endif type="radio" name="programme_check"
                                    @if($hasFilled) @if($transcript[0]->programme_check == 1) checked @endif @endif
                                value="">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input @if($hasFilled)disabled @endif type="radio" name="programme_check"
                                    @if($hasFilled) @if($transcript[0]->programme_check == 0) checked @endif @endif
                                value="0">

                            </td>
                        </tr>
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">5</td>
                            <td class="px-6 py-4 text-sm text-gray-500 text-left">AWARD (Short Course/ Certificate /
                                Ordinary
                                Diploma / Bachelor)</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input @if($hasFilled)disabled @endif type="radio" name="award_check" @if($hasFilled)
                                    @if($transcript[0]->award_check == 1) checked @endif @endif
                                value="1">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input @if($hasFilled)disabled @endif type="radio" @if($hasFilled)
                                    @if($transcript[0]->award_check == 0) checked @endif @endif
                                name="award_check" value="0">

                            </td>
                        </tr>
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">6</td>
                            <td class="px-6 py-4 text-sm text-gray-500 text-left">GPA</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input @if($hasFilled)disabled @endif type="radio" name="gpa_check" @if($hasFilled)
                                    @if($transcript[0]->gpa_check == 1) checked @endif @endif
                                value="1">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input @if($hasFilled)disabled @endif type="radio" name="grade_check" @if($hasFilled)
                                    @if($transcript[0]->gpa_check == 0) checked @endif @endif
                                value="0">

                            </td>
                        </tr>
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">7</td>
                            <td class="px-6 py-4 text-sm text-gray-500 text-left">AWARD GRADE / CLASS</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input @if($hasFilled)disabled @endif type="radio" name="grade_check" @if($hasFilled)
                                    @if($transcript[0]->grade_check == 1) checked @endif @endif
                                value="1">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input @if($hasFilled)disabled @endif type="radio" name="grade_check" @if($hasFilled)
                                    @if($transcript[0]->grade_check == 0) checked @endif @endif
                                value="0">

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-span-2">
                <h2 class="font-bold text-3xl">
                    Declaration
                </h2>
                <ol>
                    <li>1. I <span class="name_1 font-bold" x-text="name"></span> hereby declare that:
                        <ol type="a">
                            <li>a) The details finished above are true and correct to the best of my knowledge and
                                belief.</li>
                            <li>b) I am aware that, if any of the foregoing information is incorrect for whatever
                                reason, based on this declaration,the college SHALL NOT issue any certificate as
                                replacemate. </li>
                            <li>c) I am aware that, it is my responsibility to verify that the information printed on
                                the certificate and Academics transcript are correct before receipt. </li>
                        </ol>
                    </li>
                    <br>
                    <li>2. I <span class="name_1 font-bold" x-text="name"></span> hereby ACCEPT/DON'T ACCEPT academic
                        certificate and
                        transcript
                        issued to me. </li>
                    <br>
                    <br>
                    <li>3.
                        <div class="grid grid-cols-2">
                            <div>
                                Signature: .............................
                            </div>

                        </div>
                        <br>
                        <div>
                            Date: .............................
                        </div>

                    </li>
                </ol>
            </div>
            <div class="col-span-2 pb-24">

                @if(!$hasFilled)
                <input @if($hasFilled) disabled @endif type="submit" class="px-4 py-2 bg-blue-500 text-white my-2"
                    value="Submit">
                @endif
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/print.min.js')}}"></script>
@endsection