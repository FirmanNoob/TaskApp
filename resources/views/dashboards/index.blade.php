@extends('layouts.master')
@section('title','Dashboard')
@section('content')
<div class="right_col" role="main">
  <!-- top tiles -->
  <div class="">
    <div class="row" style="display: inline-block;">
      <div class="top_tiles">
        @php
        $count = \App\Models\Task::where('user_id',auth()->user()->id)->count()
        @endphp
        <div class="animated flipInY col-lg-12 col-md-12 col-sm-6 ">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-tasks"></i></div>
            <div class="count">{{$count}}</div>
            <h3>Total Task</h3>
            <p>Jumlah Task Yang Diinput</p>
          </div>
        </div>

      </div>
    </div>
    <!-- /top tiles -->

    <br />

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="col-md-6 col-sm-6 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>To Do List <small>Sample tasks</small></h2>
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

              <div class="">
                <ul class="to_do">
                  @foreach($data as $data)
                  <li>
                    <p>
                      <input type="checkbox" class="flat"> {{$data->task}}
                    </p>
                    <br>
                    <a href="/task/{{$data->id}}/delete" class="btn btn-danger btn-sm btn-round right">Delete</a>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 ">
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
      </div>
    </div>
  </div>
  @stop

  <!-- @section('footer3')
  <script src="{{asset('js/script.js')}}"></script>
  @stop -->