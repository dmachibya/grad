@extends('master')
@section('content')

<div class="overflow-auto h-screen pb-24 px-4 md:px-6 bg-white shadow-md">
    <h1 class="text-4xl font-semibold text-gray-800 dark:text-white my-6">

        @switch(Auth::user()->role)
        @case(2)
        {{$personel = "Lecturer"}}
        @break
        @case(3)
        {{$personel = "HOD"}}
        @break
        @case(4)
        {{$personel = "Librarian"}}
        @break
        @case(5)
        {{$personel = "Accountant"}}
        @break
        @case(6)
        {{$personel = "Registrar"}}
        @break
        @case(7)
        {{$personel = "Admin"}}
        @break

        @default
        {{$personel = "User"}}

        @endswitch
        Dashboard
    </h1>
    <a href="/process/certificates" class="inline-block px-6 py-2 bg-blue-500 text-white rounded-md">Certificate
        Requests</a>
    <a href="/clearance/process" class="inline-block px-6 py-2 bg-green-500 text-white rounded-md">Clearance
        Requests</a>


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