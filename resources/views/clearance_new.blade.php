@extends('master')

@section('content')
<div id="printJS-form" class="overflow-auto px-4 md:px-6">
    <h1 class="text-4xl font-semibold text-gray-800 dark:text-white my-2">
        Clearance Form

    </h1>




    <div class="w-full bg-white px-12 py-8 shadow-lg">
        <table class="table-fixed w-full">
            <thead class="border-b border-solid border-gray-300 py-4 font-bold">
                <td class="w-1/6">S/No.</td>
                <td class="w-2/6">Responsible Officer</td>
                <td class="w-2/6"></td>
                <td class="w-1/6">Status</td>
            </thead>
            <tbody>
                <tr class="bg-gray-200 py-2">
                    <td class="w-1/6">1</td>
                    <td class="w-2/6">Head of Department</td>
                    <td class="w-2/6">
                        @php
                        $clear = DB::select('select * from clearances where userid = ?',
                        [Auth::user()->id]);

                        if(count($clear)>0){
                        $step = $clear[0]->step;
                        $status = $clear[0]->status;
                        $isClear = true;
                        }
                        // dd("more");
                        // }else {
                        // // dd("less");
                        // DB::insert('insert into clearances (userid, step, status) values (?, ?, ?)',
                        // [Auth::user()->id, '0', '1']);
                        // $step = 0;//;
                        // $status = 0;
                        // $isClear = false;
                        // }


                        $hod_accepted = [3,4,8,5,6,7,9,10,11,12,13,14];
                        // $clearHOD = "Unprocessed";
                        $clearHOD = "Not approved";

                        foreach ($hod_accepted as $key => $value) {
                        # code...
                        if($value == $step){
                        $clearHOD = "Approved";
                        }

                        }
                        if($step == 3 && $status == 2){
                        $clearHOD = "Denied";
                        }

                        // if($)
                        // }

                        @endphp

                        @if ($isClear)
                        {{$clear[0]->remarks}}
                        @endif
                    </td>
                    <td class="w-1/6">
                        {{$clearHOD}}
                    </td>
                </tr>
                {{-- head of department general --}}
                <tr class="bg-gray-200 py-2">
                    <td class="w-1/6">2</td>
                    <td class="w-2/6">Head of Department GST</td>
                    <td class="w-2/6">


                    </td>
                    <td class="w-1/6">
                        @php
                        $hodgst_accepted = [4,8,5,6,7,9,10,11,12,13,14];
                        $clearHODGST = "Unprocessed";
                        // $clearHOD = "Not approved";

                        foreach ($hodgst_accepted as $key => $value) {
                        # code...
                        if($value == $step){
                        $clearHODGST = "Approved";
                        }
                        }

                        if($step == 8 && $status == 2){
                        $clearHODGST = "Denied";
                        }
                        @endphp

                        {{$clearHODGST}}

                    </td>
                </tr>
                {{-- workshop manager --}}
                <tr class="bg-gray-200 py-2">
                    <td class="w-1/6">3</td>
                    <td class="w-2/6">Workshop Managers Concerned</td>
                    <td class="w-2/6">

                    </td>
                    <td class="w-1/6">
                        @php
                        $hod_workshop_accepted = [4,6,9,10,11,12,13,14];
                        $clear_workshop = "Unprocessed";

                        foreach ($hod_workshop_accepted as $key => $value) {
                        # code...
                        if($value == $step){
                        $clear_workshop = "Approved";
                        }
                        }
                        if($step == 9 && $status == 2){
                        $clear_workshop = "Denied";
                        }
                        @endphp

                        {{$clear_workshop}}
                    </td>
                </tr>

                {{-- workshop manager --}}
                <tr class="bg-gray-200 py-2">
                    <td class="w-1/6">4</td>
                    <td class="w-2/6">Classmaster </td>
                    <td class="w-2/6">

                    </td>
                    <td class="w-1/6">
                        @php
                        $clear_class_accepted = [4,6,10,11,12,13,14];
                        $clear_class = "Unprocessed";

                        foreach ($clear_class_accepted as $key => $value) {
                        # code...
                        if($value == $step){
                        $clear_class = "Approved";
                        }
                        }
                        if($step == 10 && $status == 2){
                        $clear_class = "Denied";
                        }
                        @endphp

                        {{$clear_class}}
                    </td>
                </tr>
                {{-- workshop manager --}}
                <tr class="bg-gray-200 py-2">
                    <td class="w-1/6">5</td>
                    <td class="w-2/6">Librarian </td>
                    <td class="w-2/6">

                    </td>
                    <td class="w-1/6">
                        @php
                        $librarian_accepted = [4,6,11,12,13,14];
                        $clear_librarian = "Unprocessed";

                        foreach ($librarian_accepted as $key => $value) {
                        # code...
                        if($value == $step){
                        $clear_librarian = "Approved";
                        }
                        }
                        if($step == 4 && $status == 2){
                        $clear_librarian = "Denied";
                        }
                        @endphp

                        {{$clear_librarian}}
                    </td>
                </tr>
                {{-- workshop manager --}}
                <tr class="bg-gray-200 py-2">
                    <td class="w-1/6">6</td>
                    <td class="w-2/6">Sports Master </td>
                    <td class="w-2/6">

                    </td>
                    <td class="w-1/6">
                        @php
                        $sports_accepted = [6,11,12,13,14];
                        $clear_sports = "Unprocessed";

                        foreach ($sports_accepted as $key => $value) {
                        # code...
                        if($value == $step){
                        $clear_sports = "Approved";
                        }
                        }
                        if($step == 11 && $status == 2){
                        $clear_sports = "Denied";
                        }
                        @endphp

                        {{$clear_sports}}
                    </td>
                </tr>

                {{-- workshop manager --}}
                <tr class="bg-gray-200 py-2">
                    <td class="w-1/6">7</td>
                    <td class="w-2/6">Cateress </td>
                    <td class="w-2/6">

                    </td>
                    <td class="w-1/6">
                        @php
                        $cateress = [6,12,13,14];
                        $clear_cateress = "Unprocessed";

                        foreach ($cateress as $key => $value) {
                        # code...
                        if($value == $step){
                        $clear_cateress = "Approved";
                        }
                        }
                        if($step == 12 && $status == 2){
                        $clear_cateress = "Denied";
                        }
                        @endphp

                        {{$clear_cateress}}
                    </td>
                </tr>

                {{-- workshop manager --}}
                <tr class="bg-gray-200 py-2">
                    <td class="w-1/6">8</td>
                    <td class="w-2/6">Waden/Matron</td>
                    <td class="w-2/6">

                    </td>
                    <td class="w-1/6">
                        @php
                        $waden = [6,13,14];
                        $clear_waden = "Unprocessed";

                        foreach ($waden as $key => $value) {
                        # code...
                        if($value == $step){
                        $clear_waden = "Approved";
                        }
                        }
                        if($step == 13 && $status == 2){
                        $clear_waden = "Denied";
                        }
                        @endphp

                        {{$clear_waden}}
                    </td>
                </tr>
                {{-- workshop manager --}}
                <tr class="bg-gray-200 py-2">
                    <td class="w-1/6">9</td>
                    <td class="w-2/6">Registrar</td>
                    <td class="w-2/6">

                    </td>
                    <td class="w-1/6">
                        @php
                        $registrar = [6,14];
                        $clear_registrar = "Unprocessed";

                        foreach ($registrar as $key => $value) {
                        # code...
                        if($value == $step){
                        $clear_registrar = "Approved";
                        }
                        }
                        if($step == 6 && $status == 2){
                        $clear_registrar = "Denied";
                        }
                        @endphp

                        {{$clear_registrar}}
                    </td>
                </tr>
                {{-- workshop manager --}}
                <tr class="bg-gray-200 py-2">
                    <td class="w-1/6">10</td>
                    <td class="w-2/6">Bursar</td>
                    <td class="w-2/6">

                    </td>
                    <td class="w-1/6">
                        @php
                        $bursar = [14];
                        $clear_bursar = "Unprocessed";

                        foreach ($bursar as $key => $value) {
                        # code...
                        if($value == $step){
                        $clear_bursar = "Approved";
                        }
                        }
                        if($step == 14 && $status == 2){
                        $clear_bursar = "Denied";
                        }
                        @endphp

                        {{$clear_bursar}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@php
$last = [14];
$clear_end = "Unprocessed";

foreach ($last as $key => $value) {
# code...
if($value == $step){
$clear_end = "Approved";
}
}
if($step == 14 && $status == 2){
$clear_sports = "Denied";
}
@endphp

@if ($clear_end == "Approved")
<button type="button" class=" my-4 mx-12 px-6 py-2 rounded-md bg-green-500 text-white hover:bg-green-400"
    onclick="printJS({ printable: 'printJS-form', type: 'html', header: 'Clearance Form' })">
    Print Form
</button>
@endif

@endsection

@section('scripts')
@if (session('success'))
<div x-init="window.setTimeout(()=>{message = false},5000)" x-data="{ message: true }" x-show.transition="message"
    class="absolute z-20 bottom-2 right-2 bg-green-500 text-white px-12 py-4">
    <span>{{session('success')}}</span>
    <span class="absolute top-0 right-2 text-3xl text-white" @click="message = false">&times;</span>
</div>
@endif
<script src="{{asset('js/print.min.js')}}"></script>

@endsection