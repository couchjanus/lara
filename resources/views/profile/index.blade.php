@extends('layouts.profile')

@section('content')

<div class="container">
    <ol class="breadcrumb">
      <li><a href="{{url('/')}}">Home</a></li>
      <li><a href="{{url('/profile')}}/{{Auth::user()->id}}">Profile</a></li>
    </ol>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Sidebar</div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">

                <div class="panel-heading">{{Auth::user()->name}}</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <h3 class="text-center">{{ucwords(Auth::user()->name)}}</h3>
                                
                                <div class="caption">
                                    <p class="text-center"><a href="{{url('/profile/edit')}}/{{Auth::user()->name}}" class="btn btn-default img-circle" role="button">Edit Profile</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-8">

                            <h4 class=""><span class="label label-default">About</span></h4>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
