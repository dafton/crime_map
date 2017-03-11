@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">

                        @if(Auth::user()->is_admin())
                            <div class="row">
                                <form class="form-horizontal" role="form" method="GET" action="{{ url('/search_users')}}">
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-1">
                                            <input type="search" class="form-control" id="search" name="keyword" placeholder="search user" style="height:30px; ">
                                        </div>
                                        <div class="col-sm-2 ">
                                            <button class="btn btn-info" type="submit" style="height:30px; width:120px">
                                                <span class="glyphicon glyphicon-search" ></span> Search
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif

            @if(isset($users))
                <div class="col-md-10 col-md-offset-1">
                    <table class="table table-hover" id="user_table">
                        <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User type</th>
                            <th>Badge Number</th>
                        </tr>
                        </thead>
                        @foreach($users as $user)
                            <tr id="{{$user->id}}">
                                <td id="id">{{$user->id}}</td>
                                <td id="name">{{$user->name}}</td>
                                <td id="email">{{$user->email}}</td>
                                <td id="email">
                                    @if($user->type==1)
                                        Admin
                                    @elseif($user->type==2)
                                        Record manager
                                    @else
                                        Normal user
                                    @endif
                                </td>
                                <td id="badgenumber">{{$user->badge_number}}</td>
                            </tr>
                        @endforeach
                    </table>
                    <div align="center">
                        {{$users->links()}}
                    </div>
                </div>
            @endif
        </div>
    </div>
    </div>
@endsection