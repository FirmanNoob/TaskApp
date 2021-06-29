@extends('layouts.master')
@section('title','Dokumen')
@section('content')
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Recent Activities <small>Sessions</small></h2>
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
                <div class="dashboard-widget-content">

                    <ul class="list-unstyled timeline widget">
                        @php
                        $task = \App\Models\Task::where('user_id', auth()->user()->id)->get();
                        @endphp
                        @foreach($task as $task)
                        <li>
                            <div class="block">
                                <div class="block_content">
                                    <h2 class="title">
                                        <a>Who's doing the task</a>
                                    </h2>
                                    <div class="byline">
                                        <span>{{$task->created_at->diffForHumans()}}</span> by <a>{{$task->user->name}}</a>
                                    </div>
                                    <p class="excerpt">{{$task->task}}<a>Read&nbsp;More</a>
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
    @stop