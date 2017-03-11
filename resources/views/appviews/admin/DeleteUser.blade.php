@extends('layouts.app')

@section('content')
    <div class="row">
        <form class="form-horizontal" role="form" method="GET" action="{{ url('/search_users_delete')}}">
            <div class="form-group">
                <div class="col-sm-7 col-sm-offset-2">
                    <input type="search" class="form-control" id="search" name="keyword" placeholder="search user to delete" style="height:30px; ">
                </div>
                <div class="col-sm-2 ">
                    <button class="btn btn-info" type="submit" style="height:30px; width:120px">
                        <span class="glyphicon glyphicon-search" ></span> Search
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if(isset($_GET['submit']))
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-hover" id="tweets_table">
                <thead>
                <tr>
                    <th>All Users</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User type</th>
                    <th>Badge Number</th>
                </tr>
                </thead>
                @foreach($users as $user)
                    <tr id="{{$user->id}}">
                        <td><a class="btn btn-danger" href="{{url('/delete_user')}}/{{$user->id}}">Delete</a></td>
                        <td id="crime_type">{{$user->id}}</td>
                        <td id="area_committed">{{$user->name}}</td>
                        <td id="offender_name">{{$user->email}}</td>
                        <td id="offender_id">
                            @if($user->type==1)
                                Admin
                            @elseif($user->type==2)
                                Record manager
                            @else
                                Normal user
                            @endif
                        </td>
                        <td id="badge_number">{{$user->badge_number}}</td>
                    </tr>
                @endforeach
            </table>
            <div align="center">
                {{$users->links()}}
            </div>
        </div>

    @endif

    <div class="col-md-10 col-md-offset-1">
        <table class="table table-hover" id="tweets_table">
            <thead>
            <tr>
                <th>All Users</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>User type</th>
                <th>Badge Number</th>
            </tr>
            </thead>
            @foreach($users as $user)
                <tr id="{{$user->id}}">
                    <td><a class="btn btn-danger" href="{{url('/delete_user')}}/{{$user->id}}">Delete</a></td>
                    <td id="crime_type">{{$user->id}}</td>
                    <td id="area_committed">{{$user->name}}</td>
                    <td id="offender_name">{{$user->email}}</td>
                    <td id="offender_id">
                        @if($user->type==1)
                            Admin
                        @elseif($user->type==2)
                            Record manager
                        @else
                            Normal user
                        @endif
                    </td>
                    <td id="badge_number">{{$user->badge_number}}</td>
                </tr>
            @endforeach
        </table>
        <div align="center">
            {{$users->links()}}
        </div>
    </div>

@endsection