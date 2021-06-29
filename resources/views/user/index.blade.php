@extends('layouts.master')

@section('header4')
<link href="{{asset('template/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
<link href="{{asset('template/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
<link href="{{asset('template/vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">
@stop
@section('title','User Management')
@section('content')
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>User Management </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up mr-1"></i></a>
                    </li>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#exampleModallist">
                        Tambah
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModallist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/listuser/create" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group{{$errors->has('role') ? ' has-error': ''}}">
                                            <label for="exampleFormControlSelect1">Role</label>
                                            <select name="role" class="form-control" id="exampleFormControlSelect1">
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                            @if($errors->has('role'))
                                            <span class="help-block">{{$errors->first('role')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group{{$errors->has('name') ? ' has-error': '' }}">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('name')}}">
                                            @if($errors->has('name'))
                                            <span class="help-block">{{$errors->first('name')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group{{$errors->has('email') ? ' has-error': ''}}">
                                            <label for="exampleInputPassword1">Email</label>
                                            <input name="email" type="text" class="form-control" id="exampleInputPassword1" value="{{old('email')}}">
                                            @if($errors->has('email'))
                                            <span class="help-block">{{$errors->first('email')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group{{$errors->has('jabatan') ? ' has-error': ''}}">
                                            <label for="exampleFormControlSelect1">Jabatan</label>
                                            <select name="jabatan" class="form-control" id="exampleFormControlSelect1">
                                                <option value="Front End Developer">Front End Dev</option>
                                                <option value="Back End Devoper">Back End Dev</option>
                                                <option value="Develoment Operation">Development Operation</option>
                                                <option value="Quality Assurance">Quality Assurance</option>
                                                <option value="System Analyst">System Analyst</option>
                                                <option value="Scrum Master">Scrum Master</option>
                                                <option value="UX">UI/UX Desain</option>
                                                <option value="Product Owner">Product Owner</option>
                                            </select>
                                            @if($errors->has('jabatan'))
                                            <span class="help-block">{{$errors->first('jabatan')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group{{$errors->has('password') ? ' has-error': ''}}">
                                            <label for="exampleInputPassword1">password</label>
                                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" value="{{old('password')}}">
                                            @if($errors->has('password'))
                                            <span class="help-block">{{$errors->first('password')}}</span>
                                            @endif
                                        </div>

                                        <div class="input-group{{$errors->has('avatar') ? ' has-error': ''}} mb-3">
                                            <input name="avatar" type="file" class="form-control" id="inputGroupFile02">
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                            @if($errors->has('avatar'))
                                            <span class="help-block">{{$errors->first('avatar')}}</span>
                                            @endif
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display: block;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role</th>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th>jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($data_user as $user)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{ $user['role'] }}</td>
                            <td>{{ $user['name']}}</td>
                            <td>
                                <ul class="list-inline">
                                    <li>
                                        <img src="{{$user->getAvatar()}}" class="avatar" alt="Avatar">
                                    </li>
                                </ul>
                            </td>
                            <td>{{$user['email']}}</td>
                            <td>{{$user['jabatan']}}</td>
                            <td>
                                <a href="/listuser/{{$user->id}}/view" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                <a href="/listuser/{{$user->id}}/edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                <a href="/listuser/{{$user->id}}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@stop

@section('footer4')
<script src="{{asset('template/vendors/pnotify/dist/pnotify.js')}}"></script>
<script src="{{asset('template/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
<script src="{{asset('template/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>
@stop