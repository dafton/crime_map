@extends('layouts.app')

@section('content')

        <div class="col-md-5">
            <legend>Patrol Details </legend>
            <h2>Location</h2>
            <h4>{{$patrol->location}}</h4>
            <h2>Dispatch Date</h2>
            <h4>{{$patrol->dispatch_time}}</h4>
            <h2>Dispatched Officers</h2>
            @foreach($patrol->police as $police)
                    <h4>
                        <p>
                            {{$user_model->get_by_badge($police->badge_number)}}
                            {{$police->badge_number}}
                        </p>
                    </h4>
            </br>
            @endforeach
        </div>
        <div class="col-md-7">
                <legend>Patrol Map</legend>
            <div class="panel-body">
                <div id="map" class="col-md-12" style="height:500px;"></div>
            </div>

        </div>

    <script>
        function initMap() {
            var id = {{$patrol->id}}
            $.get( "/patrol_markers/"+id, function( data ) {
                var location = new google.maps.LatLng(data.data.latitude, data.data.longitude);
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: location,
                    zoom: 16
                });
                console.log(data.data)
                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    draggable: false,
                    animation: google.maps.Animation.DROP,
                });

                var circle = new google.maps.Circle({
                    map: map,
                    radius: 400,
                    fillColor: '#AA0000'
                });
                circle.bindTo('center', marker, 'position');
            });

        }
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>


@endsection