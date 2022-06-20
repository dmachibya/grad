<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Graduate Information System</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/alpine.min.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/buttons.dataTables.min.css')}}">



</head>

<body>

    <main class="bg-gray-100 dark:bg-gray-800 h-screen overflow-hidden relative">
        <div class="flex items-start justify-between">
            <div class="h-screen overflow-auto hidden lg:block shadow-lg relative w-80">
                <div class="bg-white h-full dark:bg-gray-700">
                    <div class="flex items-center justify-start pt-6 ml-8">
                        <p class="font-bold dark:text-white text-xl">
                            Graduate Information System
                        </p>
                    </div>
                    <nav class="mt-6">
                        <div>
                            <a class="w-full text-gray-800 dark:text-white flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start border-l-4 border-purple-500"
                                href="/">
                                <span class="text-left">
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 1792 1792"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1472 992v480q0 26-19 45t-45 19h-384v-384h-256v384h-384q-26 0-45-19t-19-45v-480q0-1 .5-3t.5-3l575-474 575 474q1 2 1 6zm223-69l-62 74q-8 9-21 11h-3q-13 0-21-7l-692-577-692 577q-12 8-24 7-13-2-21-11l-62-74q-8-10-7-23.5t11-21.5l719-599q32-26 76-26t76 26l244 204v-195q0-14 9-23t23-9h192q14 0 23 9t9 23v408l219 182q10 8 11 21.5t-7 23.5z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="mx-2 text-sm font-normal">
                                    Home
                                </span>
                            </a>

                            {{-- if admin --}}
                            @if (Auth::user()->role != "1")

                            <a class="w-full text-gray-400 flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start hover:text-gray-800 border-l-4 border-transparent"
                                href="/clearance/process">
                                <span class="text-left">
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 1792 1792"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1728 608v704q0 92-66 158t-158 66h-1216q-92 0-158-66t-66-158v-960q0-92 66-158t158-66h320q92 0 158 66t66 158v32h672q92 0 158 66t66 158z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    Clearance process
                                </span>
                            </a>
                            <a class="w-full text-gray-400 flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start hover:text-gray-800 border-l-4 border-transparent"
                                href="/process/certificates">
                                <span class="text-left">
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 1792 1792"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1728 608v704q0 92-66 158t-158 66h-1216q-92 0-158-66t-66-158v-960q0-92 66-158t158-66h320q92 0 158 66t66 158v32h672q92 0 158 66t66 158z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    Certificate requests
                                </span>
                            </a>
                            <a class="w-full text-gray-400 flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start hover:text-gray-800 border-l-4 border-transparent"
                                href="/users">
                                <span class="text-left">
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 2048 1792"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M580 461q0-41-25-66t-66-25q-43 0-76 25.5t-33 65.5q0 39 33 64.5t76 25.5q41 0 66-24.5t25-65.5zm743 507q0-28-25.5-50t-65.5-22q-27 0-49.5 22.5t-22.5 49.5q0 28 22.5 50.5t49.5 22.5q40 0 65.5-22t25.5-51zm-236-507q0-41-24.5-66t-65.5-25q-43 0-76 25.5t-33 65.5q0 39 33 64.5t76 25.5q41 0 65.5-24.5t24.5-65.5zm635 507q0-28-26-50t-65-22q-27 0-49.5 22.5t-22.5 49.5q0 28 22.5 50.5t49.5 22.5q39 0 65-22t26-51zm-266-397q-31-4-70-4-169 0-311 77t-223.5 208.5-81.5 287.5q0 78 23 152-35 3-68 3-26 0-50-1.5t-55-6.5-44.5-7-54.5-10.5-50-10.5l-253 127 72-218q-290-203-290-490 0-169 97.5-311t264-223.5 363.5-81.5q176 0 332.5 66t262 182.5 136.5 260.5zm592 561q0 117-68.5 223.5t-185.5 193.5l55 181-199-109q-150 37-218 37-169 0-311-70.5t-223.5-191.5-81.5-264 81.5-264 223.5-191.5 311-70.5q161 0 303 70.5t227.5 192 85.5 263.5z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    Graduates
                                </span>
                            </a>

                            {{-- /not admin --}}
                            @else
                            <a class="w-full text-gray-400 flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start hover:text-gray-800 border-l-4 border-transparent"
                                href="/clearance">
                                <span class="text-left">
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 1792 1792"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1728 608v704q0 92-66 158t-158 66h-1216q-92 0-158-66t-66-158v-960q0-92 66-158t158-66h320q92 0 158 66t66 158v32h672q92 0 158 66t66 158z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    Clearance
                                </span>
                            </a>
                            <a class="w-full text-gray-400 flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start hover:text-gray-800 border-l-4 border-transparent"
                                href="/transcript">
                                <span class="text-left">
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 1792 1792"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1728 608v704q0 92-66 158t-158 66h-1216q-92 0-158-66t-66-158v-960q0-92 66-158t158-66h320q92 0 158 66t66 158v32h672q92 0 158 66t66 158z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    Transcript Form
                                </span>
                            </a>
                            <a class="w-full text-gray-400 flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start hover:text-gray-800 border-l-4 border-transparent"
                                href="/certificates">
                                <span class="text-left">
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 1792 1792"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1728 608v704q0 92-66 158t-158 66h-1216q-92 0-158-66t-66-158v-960q0-92 66-158t158-66h320q92 0 158 66t66 158v32h672q92 0 158 66t66 158z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    Certificate request
                                </span>
                            </a>
                            <a class="w-full text-gray-400 flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start hover:text-gray-800 border-l-4 border-transparent"
                                href="/alumni">
                                <span class="text-left">
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 1792 1792"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1728 608v704q0 92-66 158t-158 66h-1216q-92 0-158-66t-66-158v-960q0-92 66-158t158-66h320q92 0 158 66t66 158v32h672q92 0 158 66t66 158z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    Alumni Details
                                </span>
                            </a>

                            @endif

                        </div>
                    </nav>
                </div>
            </div>
            <div class="flex flex-col w-full md:space-y-4">
                <header class="w-full h-20 z-40 flex items-center justify-between bg-white  pb-4 shadow-md">
                    <div class="block lg:hidden ml-6">
                        <button class="flex p-2 items-center rounded-full bg-white shadow text-gray-500 text-md">
                            <svg width="20" height="20" class="text-gray-400" fill="currentColor"
                                viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1664 1344v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="relative z-20 flex flex-col justify-end h-full px-3 md:w-full">
                        <div class="relative p-1 flex items-center w-full space-x-4 justify-end"
                            x-data="{user : false}">

                            <span class="w-1 h-8 rounded-lg bg-gray-200">
                            </span>
                            <a href="#" class="block relative">
                                <img alt="profil" src="{{asset('/img/1.jpg')}}"
                                    class="mx-auto object-cover rounded-full h-10 w-10 " />
                            </a>
                            <button class="flex items-center text-gray-500 dark:text-white text-md"
                                @click="user = true">
                                @php
                                if(Auth::user()){
                                echo Auth::user()->name;
                                }
                                @endphp
                                <svg width="20" height="20" class="ml-2 text-gray-400" fill="currentColor"
                                    viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1408 704q0 26-19 45l-448 448q-19 19-45 19t-45-19l-448-448q-19-19-19-45t19-45 45-19h896q26 0 45 19t19 45z">
                                    </path>
                                </svg>

                            </button>
                            <div class="absolute -bottom-10 right-2 z-30" x-show="user" @click.away="user = false">
                                <a href="/logout" class="px-4 py-2 bg-gray-300 rounded-lg">Log Out</a>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="h-screen overflow-auto">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    @yield('scripts')

    @if (session('success'))
    <div x-init="window.setTimeout(()=>{message = false},5000)" x-data="{ message: true }" x-show.transition="message"
        class="absolute z-20 bottom-2 right-2 bg-green-500 text-white px-12 py-4">
        <span>{{session('success')}}</span>
        <span class="absolute top-0 right-2 text-3xl text-white" @click="message = false">&times;</span>
    </div>
    @endif

    <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/jszip.min.js')}}"></script>
    <script src="{{asset('js/pdfmake.min.js')}}"></script>
    <script src="{{asset('js/vfs_fonts.js')}}"></script>
    <script src="{{asset('js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('js/buttons.print.min.js')}}"></script>
    <script src="{{asset('js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('js/dataTables.fixedHeader.min.js')}}"></script>
    <script>
        function role() {
            return {
                user: 1,
                number: 1
            }
        }
    
       $(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#example thead tr')
    .clone(true)
    .addClass('filters')
    .appendTo('#example thead');
    
    var table = $('#myTable').DataTable({
    orderCellsTop: true,
    fixedHeader: true,
    initComplete: function () {
    var api = this.api();
    
    // For each column
    api
    .columns()
    .eq(0)
    .each(function (colIdx) {
    // Set the header cell to contain the input element
    var cell = $('.filters th').eq(
    $(api.column(colIdx).header()).index()
    );
    var title = $(cell).text();
    $(cell).html('<input type="text" placeholder="' + title + '" />');
    
    // On every keypress in this input
    $(
    'input',
    $('.filters th').eq($(api.column(colIdx).header()).index())
    )
    .off('keyup change')
    .on('change', function (e) {
    // Get the search value
    $(this).attr('title', $(this).val());
    var regexr = '({search})'; //$(this).parents('th').find('select').val();
    
    var cursorPosition = this.selectionStart;
    // Search the column for that value
    api
    .column(colIdx)
    .search(
    this.value != ''
    ? regexr.replace('{search}', '(((' + this.value + ')))')
    : '',
    this.value != '',
    this.value == ''
    )
    .draw();
    })
    .on('keyup', function (e) {
    e.stopPropagation();
    
    $(this).trigger('change');
    $(this)
    .focus()[0]
    .setSelectionRange(cursorPosition, cursorPosition);
    });
    });
    },
    });
    });
    </script>



</body>

</html>