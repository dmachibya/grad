@extends('master')

@section('content')
<div class="px-8 py-6 bg-white bg-shadown">
    <form method="POST" action="/transcript/create">
        {{ csrf_field() }}
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="username">Full Name</label>
                <input name="name" id="username" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="username">Admission</label>
                <input name="admission" id="username" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="username">Programme</label>
                <select name="course">
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
                    <option value="{{$course->id}}">{{$course->course_name}}</option>

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
                                <input type="checkbox" name="name_correct">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input type="checkbox" name="name_incorrect">

                            </td>
                        </tr>
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">2</td>
                            <td class="px-6 py-4 text-sm text-gray-500 text-left">ADMISSION NUMBER</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input type="checkbox" name="admission_correct">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input type="checkbox" name="admission_incorrect">

                            </td>
                        </tr>
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">3</td>
                            <td class="px-6 py-4 text-sm text-gray-500 text-left">DATE OF GRADUATION</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input type="checkbox" name="date_correct">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input type="checkbox" name="date_incorrect">

                            </td>
                        </tr>
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">4</td>
                            <td class="px-6 py-4 text-sm text-gray-500 text-left">PROGRAMME NAME</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input type="checkbox" name="programme_correct">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input type="checkbox" name="programme_incorrect">

                            </td>
                        </tr>
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">5</td>
                            <td class="px-6 py-4 text-sm text-gray-500 text-left">AWARD (Short Course/ Certificate /
                                Ordinary
                                Diploma / Bachelor)</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input type="checkbox" name="award_correct">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input type="checkbox" name="award_incorrect">

                            </td>
                        </tr>
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">6</td>
                            <td class="px-6 py-4 text-sm text-gray-500 text-left">GPA</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input type="checkbox" name="gpa_correct">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input type="checkbox" name="gpa_incorrect">

                            </td>
                        </tr>
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">7</td>
                            <td class="px-6 py-4 text-sm text-gray-500 text-left">AWARD GRADE / CLASS</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input type="checkbox" name="grade_correct">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input type="checkbox" name="grade_incorrect">

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
                    <li>1. I <span id="name_1"></span> hereby declare that:
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
                    <li>2. I ..........................hereby ACCEPT/DON'T ACCEPT academic certificate and transcript
                        issued to me. </li>
                    <br>
                    <br>
                    <li>3.
                        <div class="grid grid-cols-2">
                            <div>
                                Signature: .............................
                            </div>
                            <div>
                                Date: .............................
                            </div>
                        </div>

                    </li>
                </ol>
            </div>
            <div class="col-span-2">

                <input type="submit" class="px-4 py-2 bg-blue-500 text-white my-2" value="Submit">
            </div>
        </div>
    </form>
</div>
@endsection