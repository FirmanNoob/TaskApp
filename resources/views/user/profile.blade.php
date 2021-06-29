@extends('layouts.master')

@section('header2')
<link href="{{asset('template/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"> -->
@stop

@section('title' ,'Profile')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User Profile</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="animate__animated animate__fadeIn animate__delay-2s row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>User Profile <small>Activity report</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3  profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-rounded profile_img" width="220" height="220" src="{{auth()->user()->getAvatar()}}" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <h3>{{ auth()->user()->name }}</h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i> -
                                </li>

                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i> {{ auth()->user()->jabatan }}
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-external-link user-profile-icon"></i>
                                    <a href="http://www.kimlabs.com/profile/" target="_blank">-</a>
                                </li>
                            </ul>
                            <a href="/profile/{{auth()->user()->id}}/edit" class="btn btn-success text-white"><i class="fa fa-edit m-right-xs mr-2"></i>Edit Profile</a>
                            <br />

                            <!-- start skills -->
                            <h4>Skills</h4>
                            <ul class="list-unstyled user_data">
                                <li>
                                    <p>Web Applications</p>
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                    </div>
                                </li>
                                <li>
                                    <p>Website Design</p>
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                                    </div>
                                </li>
                                <li>
                                    <p>Automation & Testing</p>
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                                    </div>
                                </li>
                                <li>
                                    <p>UI / UX</p>
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                    </div>
                                </li>
                            </ul>
                            <!-- end of skills -->
                        </div>
                        <div class="col-md-9 col-sm-9 ">

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                                        <!-- start recent activity -->
                                        @php
                                        $data2 = \App\Models\Task::where('user_id',auth()->user()->id)->get()
                                        @endphp
                                        @foreach($data2 as $task)
                                        <ul class="messages">
                                            <li>
                                                <img src="{{$task->user->getAvatar()}}" class="avatar" alt="Avatar">
                                                <div class="message_date">
                                                    <h3 class="date text-info">24</h3>
                                                    <p class="month">May</p>
                                                </div>
                                                <div class="message_wrapper">
                                                    <h4 class="heading">{{$task->user->name}}</h4>
                                                    <blockquote class="message">{{$task->task}}.</blockquote>
                                                    <br />
                                                </div>
                                            </li>
                                        </ul>
                                        @endforeach
                                        <!-- end recent activity -->

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Project Name</th>
                                                    <th class="hidden-phone">Hours Spent</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $data = \App\Models\Task::where('user_id',auth()->user()->id)->get()
                                                @endphp
                                                @php $no = 1; @endphp
                                                @php
                                                $task = \App\Models\Task::all();
                                                @endphp
                                                @foreach($data as $d)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{$d->task}}</td>
                                                    <td class="hidden-phone">{{$d->created_at->diffForHumans()}}</td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- end user projects -->

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                        <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                            photo booth letterpress, commodo enim craft beer mlkshk </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer2')
<!-- bootstrap-daterangepicker -->
<script src="{{asset('template/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{asset('template/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- morris.js -->
<script src="{{asset('template/vendors/raphael/raphael.min.js')}}"></script>
<script src="{{asset('template/vendors/morris.js/morris.min.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('template/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
@stop