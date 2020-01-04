@extends('admin.layouts.master')

@section('content')
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
<!-- START RESPONSIVE TABLES -->
    <div class="row">
        <div class="col-md-12">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"></h3>
                    @if ( ! empty( $errors ) )
                        @foreach ( $errors->all() as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    @endif
                    @if( Session::has('message') )
                        {{ Session::get('message') }}
                    @endif
                </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>{{ Lang::get('pagination.name').' '.Lang::get('pagination.last_name') }}</th>
                                    <th>{{ Lang::get('pagination.staff') }}</th>
                                    <th>{{ Lang::get('pagination.branch') }}</th>
                                    <th>{{ Lang::get('pagination.start_date') }}</th>
                                    <th>{{ Lang::get('pagination.end_date') }}</th>
                                    <th>{{ Lang::get('pagination.number_of_appointments') }}</th>
                                    <th>{{ Lang::get('pagination.total') }}</th>
                                    <th>{{ Lang::get('pagination.completion') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($list) > 0)
                                    @foreach($list as $randevu)
                                        <tr @if($randevu->completion) class="danger" @else class="warning" @endif onclick="location.href='{{ url('admin/appointment/'.$randevu->id) }}'">
                                            <td>{{ $randevu->id}}</td>
                                            <td>{{ $randevu->name_surname}}</td>
                                            <td>@if(isset($randevu->Staff[0])) {{ $randevu->Staff[0]->first_name }} @endif</td>
                                            <td>@if(isset($randevu->Branch[0])) {{ $randevu->Branch[0]->name }} @endif</td>
                                            <td>{{ date("d-m-Y H:i:s", strtotime($randevu->start_date)) }}</td>
                                            <td>{{ date("d-m-Y H:i:s", strtotime($randevu->end_date)) }}</td>
                                            <td>{{ $randevu->number_of_appointments }}</td>
                                            <td>{{ $randevu->total }}</td>
                                            <td>{{ $randevu->completion==true ? Lang::get('pagination.completed') : Lang::get('pagination.waiting') }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9">Randevu Bulunamadı</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END DEFAULT DATATABLE -->
            </div>
        </div>

    </div>
    <!-- END PAGE CONTENT WRAPPER -->
@stop
@section('javascript')
    {{ HTML::script('administrator/js/plugins/datatables/jquery.dataTables.min.js') }}
@stop
