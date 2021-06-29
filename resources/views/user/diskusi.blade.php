@extends('layouts.master')

@section('title','Diskusi Group')
@section('content')

<div class="right_col" role="main" style="min-height: 662px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Chat Management</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Chat Management</h2>
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
                    <form action="/discussion/create" method="POST">
                        {{csrf_field()}}
                        <div class="x_content">
                            @foreach($message as $pesan)
                            <div class="row">
                                <div class="right col-md-12 col-sm-5">
                                    <img src="{{$pesan->user->getAvatar()}}" width="60px" alt="" class="img-circle img-fluid">
                                    <h4><cite title="Source Title">{{$pesan->user->name}}</cite>
                                    </h4>
                                    <div class="x_content bs-example-popovers">
                                        <div class="alert alert-info alert-dismissible " role="alert">
                                            <strong>{{$pesan['chat']}}</strong>
                                        </div>
                                        <small>Created {{$pesan['created_at']}}</small>

                                    </div>

                                </div>
                            </div>
                            @endforeach
                            <div class="input-group">
                                <input type="text" name="chat" class="form-control">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">Go!</button>
                                </span>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop