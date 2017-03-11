@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                    <img src="{{asset('avatar.png')}}" style="height: 400px; width: 400px;">
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Administrative functions</div>

                    <div class="panel-body">

                        <a href="{{ url('/search_users_view') }}"><button class="btn btn-primary btn-block"> Number of Users {{$user_count}}</button></a></br></br>

                        <a href="{{ url('/delete_view') }}" class="btn btn-primary btn-block" role="button">Delete User</a></br></br>

                        <a href="{{ url('/update_view') }}" class="btn btn-primary btn-block" role="button">Update User</a></br></br>

                        <a href="{{ url('/patrol') }}" class="btn btn-primary btn-block" role="button">Manage Patrol</a></br></br>

                        <a href="{{ url('/search_crime_records_welcome') }}"><button class="btn btn-primary btn-block">Querry crime database</button></a></br></br>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection