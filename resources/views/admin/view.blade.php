@extends('layouts.master')
@section('title','User Management')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User Profile</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="x_panel">
                <div class="x_content">

                    <div class="clearfix"></div>

                    <div class="col-md-6 col-sm-6  profile_details">
                        <div class="well profile_view">
                            <div class="col-sm-12">
                                <h4 class="brief"><i>Digital Strategist</i></h4>
                                <div class="left col-md-7 col-sm-7">
                                    <h2>{{$data->name}}</h2>
                                    <p><strong>About: </strong> {{$data->jabatan}} </p>
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-building"></i> Address: {{$data->email}}</li>
                                        <li><i class="fa fa-phone"></i> Phone #: </li>
                                    </ul>
                                </div>
                                <div class="right col-md-5 col-sm-5 text-center">
                                    <img src="{{$data->getAvatar()}}" alt="" class="img-circle img-fluid">
                                </div>
                            </div>
                            <div class=" profile-bottom text-center">
                                <div class=" col-sm-6 emphasis">
                                    <p class="ratings">
                                        <a>4.0</a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star-o"></span></a>
                                    </p>
                                </div>
                                <div class=" col-sm-6 emphasis">
                                    <button type="button" class="btn btn-success btn-sm"> <i class="fa fa-user">
                                        </i> <i class="fa fa-comments-o"></i> </button>
                                    <button type="button" class="btn btn-primary btn-sm">
                                        <i class="fa fa-user"> </i> View Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <a href="/listuser" class="btn btn-round btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
@stop