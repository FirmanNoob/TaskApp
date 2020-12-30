@extends('layouts.master')

@section('header')
<!-- <link href="/css/app.css" rel="stylesheet"> -->
<!-- PNotify -->
<link href="{{secure_asset('template/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
<link href="{{secure_asset('template/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
<link href="{{secure_asset('template/vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">
@stop

@section('content')
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_content">

                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                        synth. Cosby sweater eu banh mi, qui irure terr.
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                        booth letterpress, commodo enim craft beer mlkshk aliquip
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                        booth letterpress, commodo enim craft beer mlkshk
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Table design <small>Custom design</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link mr-1"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li>
                        <label type="submit" class="btn btn-round btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip top">3 Tasks</label>
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

                <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>

                <div class="table-responsive">
                    <table class="table table-striped table-sortable jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th>
                                    <input type="checkbox" id="check-all" class="flat">
                                </th>
                                <th class="column-title">Invoice </th>
                                <th class="column-title">Invoice Date </th>
                                <th class="column-title">Order </th>
                                <th class="column-title">Status</th>
                                <th class="column-title">Status </th>
                                <th class="column-title">Amount </th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                                <th class="bulk-actions" colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                        </thead>

                        <tbody class=" container">
                            <tr class="draggable even pointer" draggable="true">
                                <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records">
                                </td>
                                <td class=" ">121000040</td>
                                <td class=" ">May 23, 2014 11:47:56 PM </td>
                                <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
                                <td class=" ">
                                    <button class="btn btn-success source" onclick="new PNotify({
                                  title: 'Regular Success',
                                  text: 'That thing that you were trying to do worked!',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });">Success</button>
                                </td>
                                <td class=" ">Paid</td>
                                <td class="a-right a-right ">$7.45</td>
                                <td class=" last"><a href="#">View</a>
                                </td>
                            </tr>
                            <tr class="draggable odd pointer" draggable="true">
                                <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records">
                                </td>
                                <td class=" ">121000039</td>
                                <td class=" ">May 23, 2014 11:30:12 PM</td>
                                <td class=" ">121000208 <i class="success fa fa-long-arrow-up"></i>
                                </td>
                                <td class=" ">
                                    <button class="btn btn-success source" onclick="new PNotify({
                                  title: 'Regular Success',
                                  text: 'That thing that you were trying to do worked!',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });">Success</button>
                                </td>
                                <td class=" ">Paid</td>
                                <td class="a-right a-right ">$741.20</td>
                                <td class=" last"><a href="#">View</a>
                                </td>
                            </tr>
                            <tr class="draggable odd pointer" draggable="true">
                                <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records">
                                </td>
                                <td class=" ">121000045</td>
                                <td class=" ">May 23, 2014 11:30:15 PM</td>
                                <td class=" ">1210002011 <i class="success fa fa-long-arrow-up"></i>
                                </td>
                                <td class=" ">
                                    <button class="btn btn-success source" onclick="new PNotify({
                                  title: 'Regular Success',
                                  text: 'That thing that you were trying to do worked!',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });">Success</button>
                                </td>
                                <td class=" ">Paid</td>
                                <td class="a-right a-right ">$741.11</td>
                                <td class=" last"><a href="#">View</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
<script src="{{secure_asset('drag/drag.js')}}"></script>
<script src="{{secure_asset('drag/sort.js')}}"></script>
<!-- PNotify -->
<script src="{{secure_asset('template/vendors/pnotify/dist/pnotify.js')}}"></script>
<script src="{{secure_asset('template/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
<script src="{{secure_asset('template/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>
@stop