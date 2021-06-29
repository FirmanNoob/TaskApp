@extends('layouts.master')

@section('title','User Management')
@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2> Edit Task </h2>
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
                    <br>
                    <form class="form-label-left input_mask" action="/listuser/{{$data->id}}/update" method="POST">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Role</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select class="form-control" disabled>
                                    <option value="">{{$data['role']}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Name </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="name" placeholder="Disabled Input" value="{{$data->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Email </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="email" placeholder="Isikan Email" disabled value="{{$data->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Role</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="jabatan" class="form-control">
                                    @foreach($jabatan as $jabatan)
                                    <option value="{{$jabatan->jabatan}}">{{$jabatan['jabatan']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Password </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="password" class="form-control" name="password" placeholder="Masukan Password..." value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Password </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="file" class="form-control" name="avatar" placeholder="Masukan Password..." value="{{$data->password}}">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group row">
                            <div class="col-md-9 col-sm-9  offset-md-3">
                                <a href="/task" type="button" class="btn btn-primary">Cancel</a>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@stop