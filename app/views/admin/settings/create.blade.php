@extends('admin.layouts.master')

@section('content')
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $title }}</h3>
                    </div>
                    <div class="panel-body">
                    {{ Form::open(array('action' => 'AdminSettingsController@store','class' => 'form-horizontal','id'=>'settingsCreate','files'=>false)) }}
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.title') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="title" class="form-control" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.keywords') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="keywords" class="form-control" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.description') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="description" class="form-control" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.phone') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="phone" class="mask_phone form-control" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.fax') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="fax" class="mask_phone form-control" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ Lang::get('pagination.address') }}</label>
                            <div class="col-md-10">
                                <textarea name="adres" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">FaceBook</label>
                            <div class="col-md-10">
                                <input type="text" name="fabeook" class="form-control" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Twitter</label>
                            <div class="col-md-10">
                                <input type="text" name="twitter" class="form-control" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Likedin</label>
                            <div class="col-md-10">
                                <input type="text" name="likedin" class="form-control" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Google</label>
                            <div class="col-md-10">
                                <input type="text" name="google" class="form-control" value=""/>
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
        <script type="text/javascript">
        $(document).ready(function(){
            $('form#settingsCreate').submit(function(){
                if(!confirm('Bu ayarları kaydetmeniz halinde diğer ayarlarınız sıfırlanacaktır!'))
                {
                    return false;
                }
            });
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