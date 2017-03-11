@extends('layouts.app')

@section('content')
    @if(Auth::check() && Auth::user()->is_admin())
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                create Patrol
            </div>
            <div class="panel-body" style="height: 500px;">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/patrol_create')}}">
                    {{ csrf_field() }}

                <div class="form-group{{ $errors->has('badge_number') ? ' has-error' : '' }}">
                    <select id="first-disabled2" class="selectpicker col-md-12" name="badge_number[]" multiple data-hide-disabled="true" data-size="5">
                        @foreach($users as $user)
                        <option value="{{$user->badge_number}}">
                            {{$user->badge_number}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('badge_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('badge_number') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('dispatch_time') ? ' has-error' : '' }}">
                    <label for="patrol_time">Dispatch date</label>
                            <div class="input-group date form_datetime col-md-12" data-date="{{\Carbon\Carbon::now()}}" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="dtp_input1">
                                <input class="form-control" size="16" type="text" value="" name="dispatch_time" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                            </div>
                            <input type="hidden" id="dtp_input1" value="" /><br/>
                    @if ($errors->has('dispatch_time'))
                        <span class="help-block">
                            <strong>{{ $errors->first('dispatch_time') }}</strong>
                        </span>
                    @endif
                </div>
                    <div class="form-group {{ $errors->has('dispatch_time') ? ' has-error' : '' }}">
                        <label for="patrol_area">Patrol area</label><br/>
                        <button data-target="#us6-dialog" class="btn btn-info btn-block" data-toggle="modal">Click to select location</button>
                        <div id="us6-dialog" class="modal fade">
                            <div class="modal-dialog" style="height: 400px; max-height: 100%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Location picker</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div style="width: 550px">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Location:</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="us3-address" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Radius:</label>

                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="us3-radius" />
                                                </div>
                                            </div>
                                            <div id="us3" style="width: 100%; height: 400px;"></div>
                                            <div class="clearfix">&nbsp;</div>
                                            <div class="m-t-small">
                                                <label class="p-r-small col-sm-1 control-label">Latitude:</label>

                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" style="width: 110px" id="us3-lat" />
                                                </div>
                                                <label class="p-r-small col-sm-2 control-label">Longitude:</label>

                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" style="width: 110px" id="us3-lon" />
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="setValues()">Save changes</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <input type="text" class="form-control" id="location" name="location" placeholder="" readonly>
                        @if ($errors->has('location'))
                            <span class="help-block">
                            <strong>{{ $errors->first('location') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('latitude') ? ' has-error' : '' }}">
                        <label for="latutude">Latitude</label>
                        <input type="string" class="form-control" id="form-latitude" name="latitude" placeholder="" readonly>
                        @if ($errors->has('location'))
                            <span class="help-block">
                            <strong>{{ $errors->first('latitude') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('longitude') ? ' has-error' : '' }}">
                        <label for="longitude"> Longitude</label>
                        <input type="string" class="form-control" id="form-longitude" name="longitude" placeholder="" readonly>
                        @if ($errors->has('longitude'))
                            <span class="help-block">
                            <strong>{{ $errors->first('longitude') }}</strong>
                        </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default btn-success btn-block"> Create Patrol</button>

                </form>
            </div>
        </div>
    </div>
    @endif
    @if(Auth::check() && Auth::user()->is_normalUser())
        <div class="col-md-5">
            <h3 align="center">Patrols</h3>

            <img src="{{asset('patrol.png')}}" style="height: 400px; width: 400px;">

        </div>
    @endif

    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 align="center">Click on a patrol for more info</h4>
            </div>
            <div class="panel-body" style="overflow-y:scroll; overflow-x:hidden; height: 500px;">
                @foreach($patrols as $patrol)
                        <a href="{{ url('/patrol_map/'. $patrol->id) }}" style="text-decoration: none; color: black;">
                            <div class="box">
                            <legend>{{$patrol->dispatch_time}}</legend>
                            {{$patrol->location}}
                            </br>
                            @foreach($patrol->police as $police)
                            {{$user_model->get_by_badge($police->badge_number)}}
                            {{$police->badge_number}}
                            </br>
                            @endforeach
                            </div>
                        </a>
                @endforeach
            </div>
        </div>
    </div>


    <script>
        function setValues() {
            // Set the latitude
            $('#form-latitude').val($('#us3-lat').val());

            // Set longitude
            $('#form-longitude').val($('#us3-lon').val());

            //set area committted
            $('#location').val($('#us3-address').val());

            //close modal
            $('#us6-dialog').modal('hide');
        }

        $('#us6-dialog').on('shown.bs.modal', function(){
            $('#us3').locationpicker({
                location: {
                    latitude: -1.102554,
                    longitude: 37.013193
                },
                radius: 300,
                inputBinding: {
                    latitudeInput: $('#us3-lat'),
                    longitudeInput: $('#us3-lon'),
                    radiusInput: $('#us3-radius'),
                    locationNameInput: $('#us3-address')
                },
                enableAutocomplete: true,
                markerIcon: 'http://localhost/stuff/crime_map/public/map-marker-2-48.png'
            });
        });
        $('.form_datetime').datetimepicker({
            //language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });
        $('.form_date').datetimepicker({
            language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });
        $('.form_time').datetimepicker({
            language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 1,
            minView: 0,
            maxView: 1,
            forceParse: 0
        });

    </script>

    <script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyBYk-wmK8-C1e-hDgsUg3ZLn05aQLeIhg0&libraries=places'></script>

@endsection
