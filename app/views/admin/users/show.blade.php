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
                </div>
            </div>
            </form>

        </div>
        <div class="col-md-6 col-sm-8 col-xs-7">
            <div class="panel panel-default form-horizontal">
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
                        <label class="col-md-3 col-xs-5 control-label">{{ Lang::get('pagination.last_name') }}</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" value="" name="last_name" placeholder="{{ $users->last_name }}" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">{{ Lang::get('pagination.phone') }}</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" value="" name="last_name" placeholder="{{ $users->phone }}" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">{{ Lang::get('pagination.email') }}</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" value="" name="last_name" placeholder="{{ $users->email }}" class="form-control"/>
                        </div>
                    </div>
                </div>
            </div>
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