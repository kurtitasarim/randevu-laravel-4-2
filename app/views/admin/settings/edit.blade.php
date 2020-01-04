@extends('admin.layouts.master')

@section('content')
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ Lang::get('pagination.pageEdit') }}</h3>
                    </div>
                    <div class="panel-body">
                    {{ Form::open( array('action' => array('AdminSettingsController@update', $settings_id),'method'=>'PUT','class'=>'form-horizontal','files'=> false) ) }}
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.system').' '.Lang::get('pagination.language') }}</label>
                            <div class="col-md-10">
                                {{ Form::select('language', array('tr' => 'Türkçe', '' => 'Deutsch', 'en' => 'England'), $settings->language, array('class'=>'form-control select')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.mail_send') }}</label>
                            <div class="col-md-10">
                                {{ Form::select('mail_gonderim', array('true' => Lang::get('pagination.true'), 'false' => Lang::get('pagination.false')), $settings->mail_gonderim, array('class'=>'form-control select')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.visitors_appointment') }}</label>
                            <div class="col-md-10">
                                {{ Form::select('visitors_appointment', array('true' => Lang::get('pagination.true'), 'false' => Lang::get('pagination.false')), $settings->visitors_appointment, array('class'=>'form-control select')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.staff_assignment') }}</label>
                            <div class="col-md-10">
                                {{ Form::select('staff_assignment', array('true' => Lang::get('pagination.true'), 'false' => Lang::get('pagination.false')), $settings->staff_assignment, array('class'=>'form-control select')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.appointment_alert') }}</label>
                            <div class="col-md-10">
                                {{ Form::select('appointment_alert', array('true' => Lang::get('pagination.true'), 'false' => Lang::get('pagination.false')), $settings->appointment_alert, array('class'=>'form-control select')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.home_back_color') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="home_back_color" class="form-control color no-alpha" value="@if(empty($settings->home_back_color)) 0 @else{{$settings->home_back_color}}@endif" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.color_marker') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="color_marker" class="form-control color no-alpha" value="@if(empty($settings->color_marker)) 0 @else{{$settings->color_marker}}@endif" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.max_appointment') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="max_appointment" class="form-control" value="@if(empty($settings->max_appointment)) 0 @else{{$settings->max_appointment}}@endif" maxlength="2"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.title') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="title" class="form-control" value="{{ $settings->title }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.company_name') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="firma_adi" class="form-control" value="{{ $settings->firma_adi }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.email') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="email" class="form-control" value="{{ $settings->email }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.phone') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="phone" class="mask_phone form-control" value="{{ $settings->phone }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.fax') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="fax" class="mask_phone form-control" value="{{ $settings->fax }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.address') }}</label>
                            <div class="col-md-10">
                                <textarea name="adres" class="form-control">{{ $settings->adres }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">FaceBook</label>
                            <div class="col-md-10">
                                <input type="text" name="facebook" class="form-control" value="{{ $settings->facebook }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Twitter</label>
                            <div class="col-md-10">
                                <input type="text" name="twitter" class="form-control" value="{{ $settings->twitter }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Likedin</label>
                            <div class="col-md-10">
                                <input type="text" name="likedin" class="form-control" value="{{ $settings->likedin }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Google</label>
                            <div class="col-md-10">
                                <input type="text" name="google" class="form-control" value="{{ $settings->google }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <button class="btn btn-info btn-block">{{ Lang::get('pagination.save') }}</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger btn-block">{{ Lang::get('pagination.canceled') }}</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
    <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->
@stop

@section('javascript')
        {{ HTML::script('administrator/js/plugins/summernote/summernote.js') }}
        {{ HTML::script('administrator/js/plugins/bootstrap/bootstrap-select.js') }}
        {{ HTML::script('administrator/js/plugins/icheck/icheck.min.js') }}
        {{ HTML::script('administrator/js/plugins/fileinput/fileinput.min.js') }}
        {{ HTML::script('administrator/js/plugins/maskedinput/jquery.maskedinput.min.js') }}
        {{ HTML::script('administrator/js/plugins/colorselect/colors.js') }}
        {{ HTML::script('administrator/js/plugins/colorselect/jqColorPicker.js') }}
        {{ HTML::script('administrator/js/plugins/colorselect/index.js') }}
        <script type="text/javascript">
        $(document).ready(function(){
            var feMasked = function(){
            if($("input[class^='mask_']").length > 0){
               // $("input.mask_tin").mask('99-9999999');
                //$("input.mask_ssn").mask('999-99-9999');
                //$("input.mask_date").mask('9999-99-99');
                //$("input.mask_product").mask('a*-999-a999');
                $("input.mask_phone").mask('(999) 999-99-99');
            }
            }
            feMasked();
        });
        </script>
@stop