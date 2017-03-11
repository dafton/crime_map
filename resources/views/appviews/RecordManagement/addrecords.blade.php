@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Record management</div>

                    <div class="panel-body">

                        <form class="form-vertical" role="form" method="POST" action="{{ url('/add-record') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('crime_type') ? ' has-error' : '' }}">
                                <label for="crime_type"> Crime type</label>
                                <select class="form-control" name="crime_type">
                                   @foreach($crime_types as $crime_type)
                                       <option value="{{$crime_type->id}}">
                                           {{$crime_type->crime_type}}
                                       </option>
                                   @endforeach
                                </select>
                                @if ($errors->has('crime_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('crime_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('time_committed') ? ' has-error' : '' }}">
                                <label for="time_committed">Time Committed</label>
                                <div class="input-group date form_datetime col-md-12" data-date="{{\Carbon\Carbon::now()}}" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="dtp_input1" ma>
                                    <input class="form-control" size="16" type="text" value="" name="time_committed" readonly>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                </div>
                                <input type="hidden" id="dtp_input1" value="" /><br/>
                                @if ($errors->has('time_committed'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('time_committed') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('area_committed') ? ' has-error' : '' }}">
                                <label for="area_committed"> Area committed</label><br/>
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
                                <input type="text" class="form-control" id="area_committed" name="area_committed" readonly >
                                @if ($errors->has('area_committed'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('area_committed') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('latitude') ? ' has-error' : '' }}">
                                <label for="latitude">Latitude</label>
                                <input type="string" class="form-control" id="form-latitude" name="latitude" readonly>
                                @if ($errors->has('latitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('longitude') ? ' has-error' : '' }}">
                                <label for="latitude"> Longitude</label>
                                <input type="string" class="form-control" id="form-longitude" name="longitude" readonly>
                                @if ($errors->has('longitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('longitude') }}</strong>
                                </span>
                                @endif
                            </div>
                            <button type="button" data-toggle="collapse" class="btn btn-default btn-info btn-block"  data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                click here if offender is present</button>
                            <div class="form-group">
                                <div id="collapseExample" class="collapse">
                                <label for="offender_name"> Offender name</label>
                                <input type="string" class="form-control" id="offender_name" name="offender_name">
                                <label for="offender_id">Offender ID</label>
                                <input type="string" class="form-control" id="offender_id" name="offender_id">
                            </div>
                            </div>
                            <button type="submit" class="btn btn-default btn-success btn-block"> Save Record</button>
                        </form>
                    </div>
                </div>
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
            $('#area_committed').val($('#us3-address').val());

            //close modal
            $('#us6-dialog').modal('hide');
        }
        function toggleFields(){
            $('#fields, #contact-btn').toggle();
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
            showMeridian: 1,
            maxDate : 'now'
        });
        $('.form_date').datetimepicker({
            language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0,
            maxDate : 'now'
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
            forceParse: 0,
            maxDate : 'now'

        });
        $('#datetimepicker').datetimepicker('setStartDate', '2012-01-01');
        $('#datetimepicker').datetimepicker('setEndDate', 'now');
    </script>
    <script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyBYk-wmK8-C1e-hDgsUg3ZLn05aQLeIhg0&libraries=places'></script>
@endsection
