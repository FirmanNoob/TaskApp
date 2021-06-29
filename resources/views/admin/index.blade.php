@extends('layouts.master')

@section('header')
<!-- <link href="/css/app.css" rel="stylesheet"> -->
<!-- PNotify -->
<link href="{{asset('template/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
<link href="{{asset('template/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
<link href="{{asset('template/vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">
<link href="{{asset('template/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('template/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('template/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('template/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('template/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
@stop
@section('title','Task Management')
@section('content')
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_content">

                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Daftar Task</a>
                    </li>
                </ul>
                @php
                $data = \App\Models\Task::where('user_id',auth()->user()->id)->get()
                @endphp
                @php
                $no = 1;
                @endphp
                <div class="tab-content" id="myTabContent">
                    @foreach($data as $task)
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h4>{{$no++}} <span class="badge badge-secondary">{{$task->task}}</span></h4>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Task Management</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link mr-1"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li>
                        <label type="submit" class="btn btn-round btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip top">{{ $qty }} Tasks</label>
                    </li>
                    <li>
                        <a href="/task/make" class="btn btn-primary btn-round">Tambah Task</a>
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

                <p>Silahkan Input Task Yang Ingin Dikerjakan</p>

                <div class="table-responsive">
                    <table id="data_task" class="table table-striped table-sortable jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th>
                                    <input type="checkbox" id="check-all" class="flat">
                                </th>
                                <th class="column-title">Task </th>
                                <!-- <th class="column-title">Team Member </th> -->
                                <th class="column-title">Project Progress </th>
                                <th class="column-title">Team Member</th>
                                <th class="column-title">Due_date </th>
                                <th class="column-title">Status</th>
                                <th class="column-title">CreatedBy </th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                                <th class="bulk-actions" colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="container">
                            @foreach($data_task as $task)
                            <tr class="draggable even pointer" draggable="true">
                                <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records">
                                </td>
                                <td>
                                    <a>{{ $task->task }}</a>
                                    <br />
                                    <small>Created {{ $task->created_at }}</small>
                                </td>
                                <!-- <td>
                                    <ul class="list-inline">
                                        <li>
                                            <img src="{{$task->user->getAvatar()}}" class="avatar" alt="Avatar">
                                        </li>
                                    </ul>
                                </td> -->
                                <td>
                                    <?php
                                    $progress = 20;

                                    if ($task->status == "Done") {
                                        $progress = 100;
                                    } elseif ($task->status == "Half") {
                                        $progress = 50;
                                    }
                                    ?>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{$progress}}%" aria-valuenow="{{$progress}}" aria-valuemin="0" aria-valuemax="100">{{$progress}}%</div>
                                    </div>
                                    <!-- <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{$task->progress}}%" aria-valuenow="{{$task->progress}}" aria-valuemin="0" aria-valuemax="100">{{$task->progress}}%</div>
                                    </div> -->
                                </td>
                                <td>{{ $task['name'] }}</td>
                                <td>{{ $task['due_date'] }}</td>
                                <td>
                                    <a href="/task/{{$task->id}}/delete" class="btn btn-primary btn-round panel_toolbox">{{$task->status}}</a>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li>
                                            <img src="{{$task->user->getAvatar()}}" class="avatar" alt="Avatar">
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <a href="/task/{{$task->id}}/detail" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                    <a href="/task/{{$task->id}}/edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                    <a href="/task/{{$task->id}}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@stop

@section('footer')
<script src="{{asset('drag/drag.js')}}"></script>
<script src="{{asset('drag/sort.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#data_task').DataTable();
    });
</script>
<!-- PNotify -->
<script src="{{asset('template/vendors/pnotify/dist/pnotify.js')}}"></script>
<script src="{{asset('template/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
<script src="{{asset('template/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>
<script src="{{asset('template/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('template/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('template/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('template/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('template/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('template/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('template/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('template/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('template/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('template/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('template/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('template/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
@stop
@section('footer6')

@stop