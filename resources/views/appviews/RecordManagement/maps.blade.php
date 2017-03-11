@extends('layouts.app')

@section('content')
        <title>Simple Map</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
        <style>
            /* Always set the map height explicitly to define the size of the div
             * element that contains the map. */
            #map {
                height: 85%;
            }
            /* Optional: Makes the sample page fill the window. */
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
        </style>
        <div class="col-md-2">
            <legend>Legend</legend>
            <div class = "container">
                <ul class="list-group col-md-2"style="color: whitesmoke; font-size: 10px;">
                    <li class="list-group-item" style="background-color: #007FFF; height: 30px; padding: 5px 15px;">Homicide</li>
                    <li class="list-group-item" style="background-color: #0000FF; height: 30px; padding: 5px 15px;">Rape</li>
                    <li class="list-group-item" style="background-color: #00FFFF; height: 30px; padding: 5px 15px;">Robbery</li>
                    <li class="list-group-item" style="background-color: #00FF00; height: 30px; padding: 5px 15px;">Aggrevated Assault</li>
                    <li class="list-group-item" style="background-color: #FF00FF; height: 30px; padding: 5px 15px;">Motor Vehicle theft</li>
                    <li class="list-group-item" style="background-color: #190019; height: 30px; padding: 5px 15px;">Arson</li>
                    <li class="list-group-item" style="background-color: #FFA500; height: 30px; padding: 5px 15px;">Forgery</li>
                    <li class="list-group-item" style="background-color: #332100; height: 30px; padding: 5px 15px;">Fraud</li>
                    <li class="list-group-item" style="background-color: #FF0000; height: 30px; padding: 5px 15px;">Vandalism</li>
                    <li class="list-group-item" style="background-color: #330000; height: 30px; padding: 5px 15px;">Weapons</li>
                    <li class="list-group-item" style="background-color: #FFFF00; height: 30px; padding: 5px 15px;">Prostitution</li>
                    <li class="list-group-item" style="background-color: #2F4F4F; height: 30px; padding: 5px 15px;">Sex Offences</li>
                    <li class="list-group-item" style="background-color: #5F9F9F; height: 30px; padding: 5px 15px;">Drug Abuse Violation</li>
                    <li class="list-group-item" style="background-color: #683A5E; height: 30px; padding: 5px 15px;">Driving Under the Influence</li>
                    <li class="list-group-item" style="background-color: #2E0854; height: 30px; padding: 5px 15px;">Curfew & loitering offences</li>
                    <li class="list-group-item" style="background-color: #001900; height: 30px; padding: 5px 15px;">Burglary</li>
                </ul>
            </div>
        </div>
        <div id="map" class="col-md-10"></div>
{{--//Script for the map--}}
<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -1.1026, lng: 37.0132},
            zoom: 16
        });
        var drawingManager = new google.maps.drawing.DrawingManager({
            drawingMode: google.maps.drawing.OverlayType.MARKER,
            drawingControl: true,
            drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_CENTER,
                drawingModes: ['marker', 'circle', 'polygon', 'polyline', 'rectangle']
            },
            markerOptions: {icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'},
            circleOptions: {
                fillColor: '#ffff00',
                fillOpacity: 0,
                strokeWeight: 5,
                clickable: false,
                editable: true,
                zIndex: 1
            }
        });
        drawingManager.setMap(map);

        $.get( "markers", function( data ) {
            console.log(data.data)
            for (var i = 0; i < data.data.length; i++) {

                var location = new google.maps.LatLng(data.data[i]['latitude'], data.data[i]['longitude']);
                var area = data.data[i]['area_committed']

                var pinColor = data.data[i]['marker_color'];
                var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
                        new google.maps.Size(21, 34),
                        new google.maps.Point(0,0),
                        new google.maps.Point(10, 34));
                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    draggable: false,
                    animation: google.maps.Animation.DROP,
                    title: area,
                    icon: pinImage,
                });
            }
        });
    }
    google.maps.event.addDomListener(window, 'load', initMap);
</script>
@endsection