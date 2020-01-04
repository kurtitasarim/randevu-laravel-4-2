@extends('admin.layouts.master')

@section('content')

<!-- PAGE TITLE -->
<div class="page-title">
    <h2><span class="fa fa-cogs"></span>{{ $title }}</h2>
</div>
<!-- END PAGE TITLE -->

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
    <div class="row">
        <div class="col-md-12 col-sm-8 col-xs-7">

            {{ Form::open(array('action' => 'UserController@store','class' => 'form-horizontal','files'=>true)) }}
            <div class="panel panel-default">
                <div class="panel-body form-group-separated">
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">{{ Lang::get('pagination.first_name') }}</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" name="first_name" value="" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">{{ Lang::get('pagination.last_name') }}</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" name="last_name" value="" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">{{ Lang::get('pagination.email_address') }}</label>
                        <div class="col-md-9 col-xs-7">
                            <input name="email" type="text" value="" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">{{ Lang::get('pagination.password') }}</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">{{ Lang::get('pagination.re-password') }}</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Re-Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 col-xs-5">
                            <button class="btn btn-primary btn-rounded pull-right">{{ Lang::get('pagination.save') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>


</div>
<!-- END PAGE CONTENT WRAPPER -->
@stop

@section('javascript')

@stop