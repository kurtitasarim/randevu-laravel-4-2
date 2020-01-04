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

    <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-5">

            <form action="#" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-body form-group-separated">
                    @if($users->image)
                        <div class="text-center" id="user_image">
                            <img src="{{ url('web/upload/users_image/'.$users->image) }}" class="img-thumbnail"/>
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="col-md-12 col-xs-12">
                            <a href="#" class="btn btn-primary btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_photo">Change Photo</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">#ID</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" value="{{ $users->id }}" class="form-control" disabled/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">{{ Lang::get('pagination.email_address') }}</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" value="{{ $users->email }}" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 col-xs-12">
                            <a href="#" class="btn btn-danger btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_password">{{ Lang::get('pagination.Change_password') }}</a>
                        </div>
                    </div>

                </div>
            </div>
            </form>

        </div>
        <div class="col-md-6 col-sm-8 col-xs-7">

            {{ Form::open( array('action' => array('UserController@update', $users->id),'method'=>'PUT','class'=>'form-horizontal','files'=> false) ) }}
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3><span class="fa fa-pencil"></span>{{ Lang::get('pagination.profile').' '.Lang::get('pagination.edit') }}</h3>
                </div>
                <div class="panel-body form-group-separated">
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">{{ Lang::get('pagination.first_name') }}</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" value="" name="first_name" placeholder="{{ $users->first_name }}" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">{{ Lang::get('pagination.phone') }}</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" value="" name="last_name" placeholder="{{ $users->phone }}" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">{{ Lang::get('pagination.other_phone') }}</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" value="" name="last_name" placeholder="{{ $users->other_phone }}" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">{{ Lang::get('pagination.email') }}</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" value="" name="last_name" placeholder="{{ $users->email }}" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">{{ Lang::get('pagination.activeted') }}</label>
                        <div class="col-md-9 col-xs-7">
                        {{ Form::select('users_activated',array(true=>'Aktif',false=>'Pasif'),$users->activated, array('class'=>'form-control select','id'=>'payment_type')) }}
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::hidden('islem','bilgileriGuncelle') }}
            {{ Form::close() }}
        </div>

        <div class="col-md-3">
            <div class="panel panel-default form-horizontal">
                <div class="panel-body">
                    <h3><span class="fa fa-info-circle"></span>{{ Lang::get('pagination.Quick_Info') }}</h3>
                    <p>{{ Lang::get('pagination.Some_quick_info') }}</p>
                </div>
                <div class="panel-body form-group-separated">
                    <div class="form-group">
                        <label class="col-md-4 col-xs-5 control-label">{{ Lang::get('pagination.Last_visit') }}</label>
                        <div class="col-md-8 col-xs-7 line-height-30">{{ date('h:i d-m-Y', strtotime($users->last_login)) }}</div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-xs-5 control-label">{{ Lang::get('pagination.created') }}</label>
                        <div class="col-md-8 col-xs-7 line-height-30">{{ date('h:i d-m-Y', strtotime($users->created_at)) }}</div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-xs-5 control-label">Groups</label>
                        <div class="col-md-8 col-xs-7">administrators, managers, team-leaders, developers</div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Change Password -->
    {{ Form::open( array('action' => array('UserController@update', $users->id),'method'=>'PUT','class'=>'','files'=> true) ) }}
    <div class="modal animated fadeIn" id="modal_change_photo" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="smallModalHead">Change photo</h4>
                </div>
                <div class="modal-body form-horizontal form-group-separated">
                    <div class="form-group">
                        <label class="col-md-4 control-label">New Photo</label>
                        <div class="col-md-4">
                            <input type="file" class="fileinput btn-info" name="defaultImage" id="cp_photo" data-filename-placement="inside" title="Select file"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" id="save" value="{{ Lang::get('pagination.change') }}"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ Lang::get('pagination.close') }}</button>
                </div>
            </div>
        </div>
    </div>
    {{ Form::hidden('islem','resmiGuncelle') }}
    {{ Form::close() }}
    {{ Form::open( array('action' => array('UserController@update', $users->id),'method'=>'PUT','class'=>'','files'=> true) ) }}
    <div class="modal animated fadeIn" id="modal_change_password" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="smallModalHead">{{ Lang::get('pagination.Change_password') }}</h4>
                </div>
                <div class="modal-body form-horizontal form-group-separated">
                    <div class="form-group">
                        <label class="col-md-3 control-label">{{ Lang::get('pagination.password') }}</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">{{ Lang::get('pagination.re-password') }}</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password_confirmation"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" id="save" value="{{ Lang::get('pagination.change') }}"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ Lang::get('pagination.close') }}</button>
                </div>
            </div>
        </div>
    </div>
    {{ Form::hidden('islem','sifreGuncelle') }}
    {{ Form::close() }}
    <!-- Change Password -->

</div>
<!-- END PAGE CONTENT WRAPPER -->

@stop

@section('javascript')

    {{ HTML::script('administrator/js/plugins/bootstrap/bootstrap-select.js') }}
    {{ HTML::script('administrator/js/plugins/fileinput/fileinput.min.js') }}
    {{ HTML::script('administrator/js/plugins/bootstrap/bootstrap-file-input.js') }}
    <script type="text/javascript">
        $('input[name=password_confirmation]').keyup(function(){
            var pass    =   $('input[name=password]').val();
            console.log($(this).val()+ ' - '+pass);
            if(pass==$(this).val())
            {
                $('input#save').removeAttr('disabled','enable');
            } else {
                //console.log('error');
                $('input#save').attr('disabled','disabled');
            }
        });
    </script>
@stop