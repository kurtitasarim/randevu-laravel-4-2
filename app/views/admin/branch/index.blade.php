@extends('admin.layouts.master')

@section('content')

<!-- Start -->
<div class="page-content-wrap">
<!-- START RESPONSIVE TABLES -->
    <div class="row">
        <div class="col-md-12">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $title }}</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-add" onclick="location.href='/admin/branch/create'"><span class="fa fa-plus"></span></a></li>
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th width="50">id</th>
                                    <th width="200">{{ Lang::get('pagination.title') }}</th>
                                    <th width="200">{{ Lang::get('pagination.phone') }}</th>
                                    <th width="120">{{ Lang::get('pagination.activeted') }}</th>
                                    <th width="150">{{ Lang::get('pagination.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($branch as $list)
                                <tr id="trow_1">
                                    <td class="text-center">{{ $list->id }}</td>
                                    <td><strong>{{ $list->name }}</strong></td>
                                    <td>{{ $list->phone}}</td>
                                    <td>{{ ($list->active==true) ? Lang::get('pagination.true'):Lang::get('pagination.false')}}</td>
                                    <td>
                                        <button class="btn btn-default btn-rounded btn-condensed btn-sm" onclick="location.href='/admin/branch/{{ $list->id }}/edit'">
                                            <span class="fa fa-pencil"></span>
                                        </button>
                                        {{ Form::open( array('action' => array('AdminBranchController@destroy', $list->id),'method' => 'DELETE','class'=>'','files'=> false,'style'=>'display: inline;') ) }}
                                        <button class="btn btn-danger btn-rounded btn-condensed btn-sm">
                                            <span class="fa fa-times"></span>
                                        </button>
                                        {{ Form::close() }}
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
<!-- END RESPONSIVE TABLES -->
</div>

@stop

@section('javascript')
        {{ HTML::script('administrator/js/plugins/datatables/jquery.dataTables.min.js') }}
@stop