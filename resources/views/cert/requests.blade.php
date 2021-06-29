<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/alpine.min.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.dataTables.min.css')}}">

    <style>
        .dataTables_length select {
            width: 70px;
        }
    </style>
</head>
<body>
    
<main class="bg-gray-100 dark:bg-gray-800 h-screen overflow-hidden relative">
    <div class="flex items-start justify-between">
        <div class="h-screen hidden lg:block shadow-lg relative w-80">
            <div class="bg-white h-full dark:bg-gray-700">
                <div class="flex items-center justify-start pt-6 ml-8">
                    <p class="font-bold dark:text-white text-xl">
                        Graduate Information System 
                    </p>
                </div>
                <nav class="mt-6">
                    <div>
                        <a class="w-full text-gray-800 dark:text-white flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start border-l-4 border-purple-500" href="/">
                            <span class="text-left">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1472 992v480q0 26-19 45t-45 19h-384v-384h-256v384h-384q-26 0-45-19t-19-45v-480q0-1 .5-3t.5-3l575-474 575 474q1 2 1 6zm223-69l-62 74q-8 9-21 11h-3q-13 0-21-7l-692-577-692 577q-12 8-24 7-13-2-21-11l-62-74q-8-10-7-23.5t11-21.5l719-599q32-26 76-26t76 26l244 204v-195q0-14 9-23t23-9h192q14 0 23 9t9 23v408l219 182q10 8 11 21.5t-7 23.5z">
                                    </path>
                                </svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Home
                            </span>
                        </a>
                        <a class="w-full text-gray-400 flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start hover:text-gray-800 border-l-4 border-transparent" href="/process/certificates">
                            <span class="text-left">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1070 1178l306-564h-654l-306 564h654zm722-282q0 182-71 348t-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z">
                                    </path>
                                </svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Certificate Requests
                                
                            </span>
                        </a>
                        <a class="w-full text-gray-400 flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start hover:text-gray-800 border-l-4 border-transparent" href="/process/clearances">
                            <span class="text-left">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1070 1178l306-564h-654l-306 564h654zm722-282q0 182-71 348t-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z">
                                    </path>
                                </svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Clearance
                                
                            </span>
                        </a>
                        
                    </div>
                </nav>
            </div>
        </div>
        <div class="flex flex-col w-full md:space-y-4">
            <header class="w-full h-20 z-40 flex items-center justify-between bg-white  pb-4 shadow-md">
                <div class="block lg:hidden ml-6">
                    <button class="flex p-2 items-center rounded-full bg-white shadow text-gray-500 text-md">
                        <svg width="20" height="20" class="text-gray-400" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1664 1344v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="relative z-20 flex flex-col justify-end h-full px-3 md:w-full">
                    <div class="relative p-1 flex items-center w-full space-x-4 justify-end" x-data="{user : false}">
                        
                        <span class="w-1 h-8 rounded-lg bg-gray-200">
                        </span>
                        <a href="#" class="block relative">
                            <img alt="profil" src="{{asset('/img/1.jpg')}}" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                        </a>
                        <button class="flex items-center text-gray-500 dark:text-white text-md"  @click="user = true">
                            @php
                                if(Auth::user()){
                                    echo Auth::user()->name;
                                }
                            @endphp
                            <svg width="20" height="20" class="ml-2 text-gray-400" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1408 704q0 26-19 45l-448 448q-19 19-45 19t-45-19l-448-448q-19-19-19-45t19-45 45-19h896q26 0 45 19t19 45z">
                                </path>
                            </svg>
                            
                        </button>
                        <div class="absolute -bottom-10 right-2 z-30" x-show="user" @click.away="user = false">
                            <a href="/logout" class="px-4 py-2 bg-gray-300 rounded-lg">Log Out</a>
                        </div>
                    </div>
                </div>
            </header>
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
                                    <button type="submit" class="my-1 inline-block px-6 py-2 bg-green-600 text-white rounded-md">Approve</button>
                                </form>
                                <a href="/certificate/delete/{{$item->id}}" class="my-1 inline-block px-6 py-2 bg-red-600 text-white rounded-md">Deny</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</main>

@if (session('success'))
    <div x-init="window.setTimeout(()=>{message = false},5000)" x-data="{ message: true }" x-show.transition="message" class="absolute z-20 bottom-2 right-2 bg-green-500 text-white px-12 py-4">
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
</body>
</html>