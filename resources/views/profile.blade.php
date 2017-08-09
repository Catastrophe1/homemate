@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="{{ asset('storage/avatars/'.$user->avatar) }}"
                 class="img-circle" alt="avt"
                 style="width: 150px; height: 150px; float: left; margin-right: 25px;"
                 data-toggle="modal" data-target="#exampleModal" 
                 data-toggle="tooltip" data-placement="top" title="Click To Change Avatar">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form enctype="multipart/form-data" action="{{ url('/profile/avatar') }}" method="POST">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel">Update Your Avatar</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <br>
                                    <input type="file" name="avatar" class="form-control">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <h2>{{ $user->name }}</h2>
            <ul class="list-inline">
                <li><h3><small>
                @if ($userInfo->gender == 1)
                    Female
                @elseif($userInfo->gender == 2)
                    Male
                @elseif($userInfo->gender == 0)
                    Gender
                @endif
                </small></h3></li>
                <li>•</li>
                <li><h3><small>{{ $userInfo->province }}</small></h3></li>
                <li>
                    <a href="{{ url('/settings') }}">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </li>
            </ul>   
            <div class="panel panel-default" style="width: 500px; height: 600px; position: absolute; top: 180px">
                <div class="panel-body">  
                    <form enctype="multipart/form-data" action="{{ url('/profile') }}" method="POST">
                        <div class="panel-body">
                        <ul class="list-inline">
                            <li><h3>My self-summary</h3></li>
                            <li><span class="glyphicon glyphicon-pencil" style="color: #6E60B6" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample"></span></li>
                        </ul>    
                            <div class="collapse" id="collapseExample1">
                                <textarea class="form-control" name="self_summary" rows="3">{{ $userProfile->self_summary }}</textarea>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <br>
                                <input type="submit" class="pull-left btn btn-primary">
                            </div>
                        <p class="text-left">{{ $userProfile->self_summary }}</p>
                        </div>
                        <div class="panel-body">
                        <ul class="list-inline">
                            <li><h3>My homemate should be like</h3></li>
                            <li><span class="glyphicon glyphicon-pencil" style="color: #6E60B6" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample"></span></li>
                        </ul>    
                            <div class="collapse" id="collapseExample2">
                                <textarea class="form-control" name="homemate_preference" rows="3">{{ $userProfile->homemate_preference }}</textarea>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <br>
                                <input type="submit" class="pull-left btn btn-primary">
                            </div>
                        <p class="text-left">{{ $userProfile->homemate_preference }}</p>
                        </div>
                        <div class="panel-body">
                        <ul class="list-inline">
                            <li><h3>My self-summary</h3></li>
                            <li><span class="glyphicon glyphicon-pencil" style="color: #6E60B6" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample"></span></li>
                        </ul>    
                            <div class="collapse" id="collapseExample3">
                                <textarea class="form-control" name="house_preference" rows="3">{{ $userProfile->house_preference }}</textarea>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <br>
                                <input type="submit" class="pull-left btn btn-primary">
                            </div>
                        <p class="text-left">{{ $userProfile->house_preference }}</p>
                        </div>
                    </form>
                </div>
            </div> 
            <div class="panel panel-default" style="width: 250px; height: 600px; position: absolute; right: 0px; top: 180px">
                <div class="panel-body">
                    <form enctype="multipart/form-data" action="{{ url('/profile/info') }}" method="POST">
                        <h4 style="position: absolute; top: 32px">My contact information</h4>
                        <h5 style="position: relative; top: 50px">(Reveals to others only when they've friended you.)</h5>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection

