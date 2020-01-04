@extends('web.layouts.master')
@section('content')

        <form class="form-signin" name="query_form" action="javascript:">
            <h2 class="form-signin-heading">{{ Lang::get('pagination.welcome') }}</h2>
            <label for="inputQuery" class="sr-only">{{ Lang::get('pagination.number_of_appointments') }}</label>
            <input type="query" id="inputQuery" class="form-control" placeholder="{{ Lang::get('pagination.number_of_appointments') }}" required autofocus>
            {{ Form::token() }}
            <div class="checkbox">
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">{{ Lang::get('pagination.queries') }}</button>
        </form>
    <script type="text/javascript">
    $(document).ready(function(){
        jQuery.fn.center = function () {
            this.css("position","absolute");
            this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) +
                                                        $(window).scrollTop()) + "px");
            this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) +
                                                        $(window).scrollLeft()) + "px");
            return this;
        };
        $('div#randevu_query').center();
        // form send
        $('form[name="query_form"]').submit(function(){
            //console.log($(this).children('input#inputQuery').val());
            $.post( "{{ url('api/randevuDetails') }}", { number: $(this).children('input#inputQuery').val(), _token : $(this).children('input[name="_token"]').val() } )
            .done(function( data ){
                if(data.success)
                {
                    $('div.checkbox').html('<div class="col-md-12">'+
                        '<div class="panel panel-default form-horizontal">'+
                            '<div class="panel-body">'+
                                '<h3><span class="fa fa-info-circle"></span> Quick Info</h3>'+
                                '<p>Some quick info about this user</p>'+
                            '</div>'+
                            '<div class="panel-body form-group-separated">'+
                                '<div class="form-group">'+
                                    '<label class="col-md-6 col-xs-5 control-label">{{ Lang::get('pagination.name').' '.Lang::get('pagination.last_name') }}</label>'+
                                    '<div class="col-md-6 col-xs-7 line-height-30">'+data.name+'</div>'+
                                '</div>'+
                                '<div class="form-group">'+
                                    '<label class="col-md-6 col-xs-5 control-label">{{ Lang::get('pagination.phone') }}</label>'+
                                    '<div class="col-md-6 col-xs-7 line-height-30">'+data.phone+'</div>'+
                                '</div>'+
                                '<div class="form-group">'+
                                    '<label class="col-md-6 col-xs-5 control-label">{{ Lang::get('pagination.appointment').' '.Lang::get('pagination.Date') }}</label>'+
                                    '<div class="col-md-6 col-xs-7 line-height-30">'+data.start+'</div>'+
                                '</div>'+
                                '<div class="form-group">'+
                                    '<label class="col-md-6 col-xs-5 control-label">{{ Lang::get('pagination.appointment').' '.Lang::get('pagination.finish').' '.Lang::get('pagination.Date') }}</label>'+
                                    '<div class="col-md-6 col-xs-7 line-height-30">'+data.end+'</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>');
                }
                if(!data.success)
                {
                    $('div.checkbox').html('<div class="alert alert-danger" role="alert">'+
                                            '<strong>{{ Lang::get('pagination.error') }}</strong> {{ Lang::get('pagination.there_were_no_results') }}'+
                                            '</div>');
                }
            });
        });
    });
    </script>
@stop
