@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 align="center">Querry crime database</h3><br>
            <div class="col-md-12">
                        @if(\Illuminate\Support\Facades\Auth::user())
                            <div class="row">
                                <form class="form-horizontal" role="form" method="GET" action="{{ url('/search_crime_records_welcome')}}">
                                    <div class="form-group">
                                        <div class="col-sm-7 col-sm-offset-2">
                                            <input type="search" class="form-control" id="search" name="keyword" placeholder="search crime database" style="height:40px; ">
                                        </div>
                                        <div class="col-sm-2 ">
                                            <button class="btn btn-info" type="submit" style="height:40px; width:120px">
                                                <span class="glyphicon glyphicon-search" ></span> Search
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif

            @if(isset($records))
                <div class="col-md-12">
                    <table class="table table-hover" id="records_table">
                        <thead>
                        <tr>
                            <th>Crime Type</th>
                            <th>Area Committed</th>
                            <th>Offender Name</th>
                            <th>Offender ID</th>
                            <th>Time Committed</th>
                        </tr>
                        </thead>
                        @foreach($records as $record)
                            <tr id="{{$record->id}}">
                                <td id="crime_type">{{$record->crime_type}}</td>
                                <td id="area_committed">{{$record->area_committed}}</td>
                                <td id="offender_name">{{$record->offender_name}}</td>
                                <td id="offender_id">{{$record->offender_id}}</td>
                                <td id="time_committed">{{$record->time_committed}}</td>
                            </tr>
                        @endforeach
                    </table>
                    <div align="center">
                        {{ $records->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
    </div>
    </div>
@endsection
