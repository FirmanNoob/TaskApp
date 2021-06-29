@extends('layouts.master')

@section('title','Task Management')
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
                    <form class="form-label-left input_mask" action="/task/{{$data->id}}/update" method="POST">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Task <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <textarea class="form-control" name="task" rows="3" placeholder="Your Task...">{{$data->task}}</textarea>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Progress </label>
                            <div class="col-md-2 col-sm-9 ">
                                <input type="number" class="form-control" name="progress">
                            </div>
                        </div> -->
                        <div class=" form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Due Date <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" name="due_date" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="{{$data->due_date}}">
                                <script>
                                    function timeFunctionLong(input) {
                                        setTimeout(function() {
                                            input.type = 'text';
                                        }, 60000);
                                    }
                                </script>
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Status </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="status" placeholder="Disabled Input" value="{{$data->status}}">
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Status </label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="status" id="status" class="form-control" value="{{$data->status}}">
                                    <option value="Start">Start</option>
                                    <option value="Half">Half</option>
                                    <option value="Done">Done</option>
                                </select>
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