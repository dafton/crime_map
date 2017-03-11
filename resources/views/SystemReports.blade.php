@extends('layouts.app2')

@section('content')
    <div class="col-md-6">
        <legend>Major Crime Hotspots</legend>
        <ul class="list-group">
        @foreach($hotspots as $hotspot)
                <a href="#" class="list-group-item">{{$hotspot->area_committed}}<span class="badge">{{$hotspot->area_count}}</span></a>
        @endforeach
        </ul>

        <legend>Top Frequent Crimes</legend>
        <ul class="list-group">
            @foreach($raw_crimes as $crime)
                <a href="#" class="list-group-item">{{$crime->crime_type}}<span class="badge">{{$crime->crime_count}}</span></a>
            @endforeach
        </ul>

    </div>
    <div class="col-md-6">
        <legend>Most dangerous months</legend>
        <ul class="list-group">
            @foreach($dates as $date)
                <a href="#" class="list-group-item">
                    @if($date->month == 12)
                        {{'December'}}
                    @elseif($date->month == 11)
                        {{'November'}}
                    @elseif($date->month == 10)
                        {{'October'}}
                    @elseif($date->month == 9)
                        {{'September'}}
                    @elseif($date->month == 8)
                        {{'August'}}
                    @elseif($date->month == 7)
                        {{'July'}}
                    @elseif($date->month == 6)
                        {{'June'}}
                    @elseif($date->month == 5)
                        {{'May'}}
                    @elseif($date->month == 4)
                        {{'April'}}
                    @elseif($date->month == 3)
                        {{'March'}}
                    @elseif($date->month == 2)
                        {{'February'}}
                    @elseif($date->month == 1)
                        {{'January'}}
                    @endif
                    <span class="badge">{{$date->time_count}}</span></a>
            @endforeach
        </ul>
    </div>


@endsection