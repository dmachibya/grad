@extends('master')

@section('content')
<div class="w-full bg-white px-12 py-8 shadow-lg">
    <table class="" id="myTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Admission Number</th>
                <th>Course</th>
                <th>Department</th>
                <th>Email</th>
                <th>Clearance Status</th>
                <th>Transcript Form Status</th>
                <th>Certificate Form Status</th>
                <th>Alumni Form Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)

            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->admission}}</td>
                <td>{{$item->course_name}}</td>
                <td>{{$item->department_name}}</td>
                <td>{{$item->email}}</td>
                <td>
                    @php
                    $stage = false;
                    $stage1 = false;
                    $stage2 = false;
                    $stage3 = false;

                    $clear = DB::select('select * from clearances where userid = ?',
                    [$item->id]);

                    $clear2 = DB::select('select * from transcripts where userid = ?',
                    [$item->id]);

                    $clear3 = DB::select('select * from certificates where userid = ?',
                    [$item->id]);

                    $clear3 = DB::select('select * from alumnis where userid = ?',
                    [$item->id]);

                    // $isClear = false;

                    if(count($clear)>0){
                    if($clear[0]->status != 2 && $clear[0]->step == 14){
                    // $isClear = true;
                    $stage = true;
                    }
                    if(count($clear2)>0){
                    // $isClear = true;
                    $stage1 = true;

                    }
                    if(count($clear3)>0){
                    // $isClear = true;
                    $stage2 = true;

                    }
                    if(count($clear4)>0){
                    // $isClear = true;
                    $stage2 = true;

                    }
                    }
                    @endphp

                    {{$stage ? "Finished" : "Not finished"}}

                </td>
                <td>
                    {{$stage1 ? "Finished" : "Not finished"}}
                </td>
                <td>
                    {{$stage2 ? "Finished" : "Not finished"}}
                </td>
                <td>
                    {{$stage3 ? "Finished" : "Not finished"}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


@section('scripts')
<script src="{{asset('js/print.min.js')}}"></script>

<script>

</script>
@endsection