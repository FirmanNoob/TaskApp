@extends('layouts.master')
@section('titlec','Task Management')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Task Detail <small> design</small></h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>New Partner Contracts Consultancy</h2>
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

                        <div class="col-md-9 col-sm-9  ">
                            @php
                            $task = \App\Models\Task::where('user_id', auth()->user()->id)->count();
                            @endphp
                            <ul class="stats-overview">
                                <li>
                                    <span class="name"> Total Task </span>
                                    <span class="value text-success"> {{$task}} </span>
                                </li>
                                <li class="hidden-phone">
                                    <span class="name"> Estimated project duration </span>
                                    <span class="value text-success"> 20 </span>
                                </li>
                            </ul>
                            <br />

                            <div id="mainb" style="height:350px;"></div>

                            <div>

                                <h4>Recent Activity</h4>

                                <!-- end of user messages -->
                                <ul class="messages">
                                    <li>
                                        <img src="{{$data->user->getAvatar()}}" class="avatar" alt="Avatar">
                                        <div class="message_date">
                                            <h3 class="date text-info">24</h3>
                                            <p class="month">May</p>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">{{$data->user->name}}</h4>
                                            <blockquote class="message">{{$data->task}}</blockquote>
                                            <br />
                                            <!-- <p class="url">
                                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                            </p> -->
                                        </div>
                                    </li>
                                </ul>
                                <!-- end of user messages -->


                            </div>


                        </div>

                        <!-- start project-detail sidebar -->
                        <div class="col-md-3 col-sm-3  ">

                            <section class="panel">

                                <div class="x_title">
                                    <h2>Project Description</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <h3 class="green"><i class="fa fa-paint-brush"></i> Gentelella</h3>

                                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
                                    <br />

                                    <div class="project_detail">

                                        <p class="title">Client Company</p>
                                        <p>Deveint Inc</p>
                                        <p class="title">Project Leader</p>
                                        <p>Tony Chicken</p>
                                    </div>
                                    <br>

                                    <div class="text-center mtop20">
                                        <a href="/task" class="btn btn-sm btn-primary">Back</a>
                                    </div>
                                </div>

                            </section>

                        </div>
                        <!-- end project-detail sidebar -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer5')
<script src="{{asset('template/vendors/echarts/dist/echarts.min.js')}}"></script>
@stop