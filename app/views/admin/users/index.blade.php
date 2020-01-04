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
                        <li><a href="#" class="panel-add" onclick="location.href='/admin/users/create'"><span class="fa fa-plus"></span></a></li>
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
                                    <th>{{ Lang::get('pagination.first_name') }}</th>
                                    <th width="100">{{ Lang::get('pagination.last_name') }}</th>
                                    <th width="100">{{ Lang::get('pagination.email') }}</th>
                                    <th width="120">{{ Lang::get('pagination.activeted') }}</th>
                                    <th width="120">{{ Lang::get('pagination.last_login') }}</th>
                                    <th width="120">{{ Lang::get('pagination.created_at') }}</th>
                                    <th width="150">{{ Lang::get('pagination.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $user)
                                <tr id="trow_1">
                                    <td class="text-center">{{ $user->id }}</td>
                                    <td><strong>{{ $user->first_name }}</strong></td>
                                    <td>{{ $user->last_name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>{{ ($user->activated)==1 ? 'Aktif edildi':'Beklemede'}}</td>
                                    <td>{{ date("d-m-Y",strtotime($user->last_login)) }}</td>
                                    <td>{{ date("d-m-Y",strtotime($user->created_at)) }}</td>
                                    <td>

                                        <button class="btn btn-default btn-rounded btn-condensed btn-sm" onclick="location.href='/admin/users/{{ $user->id }}'">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                        <button class="btn btn-default btn-rounded btn-condensed btn-sm" onclick="location.href='/admin/users/{{ $user->id }}/edit'">
                                            <span class="fa fa-pencil"></span>
                                        </button>
                                        {{ Form::open( array('action' => array('UserController@destroy', $user->id),'method' => 'DELETE','class'=>'','files'=> false,'style'=>'display: inline;') ) }}
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