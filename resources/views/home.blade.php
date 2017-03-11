@extends('layouts.app2')

@section('content')

@if(Auth::user()->is_normalUser())
    gfrushukjusuihuijsin
@endif


@if(Auth::user()->is_recordManager())
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                    <img src="{{asset('folder-icon.jpg')}}" style="height: 442px; width: 500px;">
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Record management</div>

                    <div class="panel-body">

                        Select an action</br>
                        <a href="{{ url('/search_crime_records_welcome') }}"><button class="btn btn-primary btn-block">Number of Records{{' '. $record_count  }}</button></a></br></br>

                        <a href="{{ url('/add') }}"><button class="btn btn-primary btn-block">Add record</button></a></br></br>

                        <a href="{{ url('/delete_records_page') }}" class="btn btn-primary btn-block" role="button">Delete Records</a></br></br>

                        <a href="{{ url('/update_records') }}" class="btn btn-primary btn-block" role="button">Update Records</a></br></br>

                        <a href="{{ url('/get_report') }}" class="btn btn-primary btn-block" role="button">System Reports</a></br></br>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection

