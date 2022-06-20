@extends('master')
@section('content')

<div class="overflow-auto h-screen pb-24 px-4 md:px-6 bg-white shadow-md">
    <h1 class="text-4xl font-semibold text-gray-800 dark:text-white my-6">
        Clearance Requests

    </h1>
    <table id="myTable" class="">
        <thead>
            <tr>
                <td>Full Name</td>
                <td>Email Address</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($collection as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>

                    <form action="/clearance/move" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="userid" value="{{$item->userid}}">
                        <input type="hidden" name="role" value="{{Auth::user()->role}}">
                        <input type="hidden" name="status" value="1">
                        <button type="submit"
                            class="my-1 inline-block px-6 py-2 bg-green-600 text-white rounded-md">Approve</button>
                    </form>
                    <form action="/clearance/move" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="userid" value="{{$item->userid}}">
                        <input type="hidden" name="role" value="{{Auth::user()->role}}">
                        <input type="hidden" name="status" value="2">
                        <button type="submit"
                            class="my-1 inline-block px-6 py-2 bg-red-600 text-white rounded-md">Deny</button>
                    </form>
                    {{-- <a href="/certificate/delete/{{$item->id}}"
                        class="my-1 inline-block px-6 py-2 bg-red-600 text-white rounded-md">Deny</a>
                    --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@section('scripts')
@endsection

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