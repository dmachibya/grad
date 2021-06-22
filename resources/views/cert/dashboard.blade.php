@extends("master")

@section("content")

<h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
@if (Auth::user())
    Welcome {{Auth::user()->name}}
@endif
</h1>
<h2 class="text-md text-gray-600">
This is Graduates' information system. To begin request a Certificate Below
</h2>
<div class="flex my-6 items-center w-full space-y-4 md:space-x-4 md:space-y-0 flex-col md:flex-row">
    <a href="/certificates/new" class="inline-block items-center px-2 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md dark:bg-gray-800 hover:bg-blue-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">
        <span>+</span>
        <span class="mx-1">New Request8</span>
    </a>
</div>

@endsection