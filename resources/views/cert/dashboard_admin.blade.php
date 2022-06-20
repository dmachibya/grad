@extends('master')
@section('content')
<div class="overflow-auto h-screen pb-24 px-4 md:px-6">
    <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
        Admin Dashboard

    </h1>

    @yield('content_admin')


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