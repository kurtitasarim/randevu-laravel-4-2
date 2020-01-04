@extends('admin.layouts.master')

@section('content')

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
@if ( ! empty( $errors ) )
<div class="row">
    <div class="col-md-12">
    @foreach ( $errors->all() as $error )
        <div class="alert alert-warning" role="alert">{{ $error }}</div>
    @endforeach
    </div>
</div>
@endif
@if( Session::has('message') )
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-warning" role="alert">{{ Session::get('message') }}</div>
    </div>
</div>
@endif

<div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ Lang::get('pagination.edit') }}</h3>
                    </div>
                    <div class="panel-body">
                    {{ Form::open( array('action' => array('AdminBranchController@update', $branch->id),'method'=>'PUT','class'=>'form-horizontal','files'=> false) ) }}
                    <div class="panel panel-default">
                                    <div class="panel-body form-group-separated">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-5 control-label">{{ Lang::get('pagination.title') }}</label>
                                            <div class="col-md-9 col-xs-7">
                                                <input type="text" name="name" value="{{ $branch->name }}" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-5 control-label">{{ Lang::get('pagination.phone') }}</label>
                                            <div class="col-md-9 col-xs-7">
                                                <input type="text" name="phone" value="{{ $branch->phone }}" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-5 control-label">{{ Lang::get('pagination.address') }}</label>
                                            <div class="col-md-9 col-xs-7">
                                                <textarea name="address" class="form-control">{{ $branch->address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-5 control-label">{{ Lang::get('pagination.activeted') }}</label>
                                            <div class="col-md-9 col-xs-7">
                                                {{ Form::select('active',array(true=>Lang::get('pagination.true'),false=>Lang::get('pagination.false')),$branch->active, array('class'=>'form-control select','id'=>'payment_type')) }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 col-xs-5">
                                                <button class="btn btn-primary btn-rounded pull-right">{{ Lang::get('pagination.save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    {{ Form::close() }}
                </div>

            </div>
        </div>

    </div>
    <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->
<!-- END PAGE CONTENT WRAPPER -->
@stop

@section('javascript')
    {{ HTML::script('administrator/js/plugins/bootstrap/bootstrap-select.js') }}
@stop