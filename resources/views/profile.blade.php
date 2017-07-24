@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="/uploads/avatars/{{ $user->avatar }}"
                 style="width: 150px; hight: 150px; float: left; border-radius: 50%; margin-right: 25px;">
            <h2>{{ $user->name }}</h2>
            <form enctype="multipart/form-data" action="{{ url('/profile') }}" method="POST">
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <br>
                <input type="submit" class="pull-left btn btn-sm btn-primary">
            </form>
            <div class="panel panel-default" style="width: 700px; height: 600px; position: absolute; top: 180px">
                <div class="panel-body">
                    <form enctype="multipart/form-data" action="{{ url('/profile') }}" method="POST">
                        <h3>My self-summary</h3>
                        <div class="panel-body">{{ $userProfile->self_summary }}</div>
                        <input type="text" name="self_summary" style="width: 450px">
                        <input type="submit" class="pull-right btn btn-sm btn-primary">
                        <h3>My homemate should be like</h3>
                        <div class="panel-body">{{ $userProfile->homemate_preference }}</div>
                        <input type="text" name="homemate_preference" style="width: 450px">
                        <input type="submit" class="pull-right btn btn-sm btn-primary">
                        <h3>My ideal house would be like</h3>
                        <div class="panel-body">{{ $userProfile->house_preference }}</div>
                        <input type="text" name="house_preference" style="width: 450px">
                        <input type="submit" class="pull-right btn btn-sm btn-primary">
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection

