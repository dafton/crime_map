@extends('layouts.app')

@section('content')
    <div class="row">
        <form class="form-horizontal" role="form" method="GET" action="{{ url('/search_crime_records_update')}}">
            <div class="form-group">
                <div class="col-sm-7 col-sm-offset-2">
                    <input type="search" class="form-control" id="search" name="keyword" placeholder="search record to edit" style="height:30px; ">
                </div>
                <div class="col-sm-2 ">
                    <button class="btn btn-info" type="submit" style="height:30px; width:120px">
                        <span class="glyphicon glyphicon-search" ></span> Search
                    </button>
                </div>
            </div>
        </form>>
    </div>
    @if(isset($_POST['submit']))
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-hover" id="records_table">
                <thead>
                <tr>
                    <th>All Records</th>
                    <th>Crime Type</th>
                    <th>Area Committed</th>
                    <th>Offender Name</th>
                    <th>Offender ID</th>
                    <th>Time Committed</th>
                </tr>
                </thead>
                @foreach($records as $record)
                    <tr id="{{$record->id}}">
                        <td><a class="btn btn-info" href="{{url('/edit')}}/{{$record->id}}">Edit</a></td>
                        <td id="crime_type">{{$record->crime_type}}</td>
                        <td id="area_committed">{{$record->area_committed}}</td>
                        <td id="offender_name">{{$record->offender_name}}</td>
                        <td id="offender_id">{{$record->offender_id}}</td>
                        <td id="time_committed">{{$record->time_committed}}</td>
                    </tr>
                @endforeach
            </table>
            {<div align="center">
                {{ $records->links() }}
            </div>
        </div>
    @endif

    <div class="col-md-10 col-md-offset-1">
        <table class="table table-hover" id="records_table">
            <thead>
            <tr>
                <th>All Records</th>
                <th>Crime Type</th>
                <th>Area Committed</th>
                <th>Offender Name</th>
                <th>Offender ID</th>
                <th>Time Committed</th>
            </tr>
            </thead>
            @foreach($records as $record)
                <tr id="{{$record->id}}">
                    <td><a class="btn btn-info" href="{{url('/edit')}}/{{$record->id}}">Edit</a></td>
                    <td id="crime_type">{{$record->crime_type}}</td>
                    <td id="area_committed">{{$record->area_committed}}</td>
                    <td id="offender_name">{{$record->offender_name}}</td>
                    <td id="offender_id">{{$record->offender_id}}</td>
                    <td id="time_committed">{{$record->time_committed}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div align="center">
        {{ $records->links() }}
    </div>
@endsection
