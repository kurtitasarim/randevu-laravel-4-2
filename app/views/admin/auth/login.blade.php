<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
    <!-- META SECTION -->
    <title>{{ Config::get('app.ProjectName'); }} | {{ $title }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="{{ url('administrator/favicon.ico') }}" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    {{ HTML::style('administrator/css/theme-default.css',array('rel'=>'stylesheet','id'=>'theme')) }}
    <!-- EOF CSS INCLUDE -->
</head>
<body>

<div class="login-container login-v2">
    <div class="login-box animated fadeInDown">
        <div class="login-body">
            <div class="login-title">
                <ul style="font-size:10pt;color:red;">
                @if ( ! empty( $errors ) )
                    @foreach ( $errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                @endif
                </ul>
                @if( Session::has('message') )
                    {{ Session::get('message') }}
                @else
                    {{ Lang::get('pagination.welcome')}} {{ Lang::get('pagination.please_login')}}.
                @endif
            </div>
            {{ Form::open(array('url'=>'/admin/login','class'=>'form-horizontal','method'=>'POST')) }}
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="fa fa-user"></span>
                            </div>
                            <input type="text" class="form-control" name="email" placeholder="{{ Lang::get('pagination.email')}}"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="fa fa-lock"></span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="{{ Lang::get('pagination.password')}}"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <a href="#">{{ Lang::get('pagination.forgot_your_password')}}</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="#">{{ Lang::get('pagination.create_an_account')}}</a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-lg btn-block">{{ Lang::get('pagination.login_button')}}</button>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
        <div class="login-footer">
            <div class="pull-left">
                &copy; 2015 {{ Config::get('app.Developer'); }}
            </div>
            <div class="pull-right">
                <a href="#">{{ Lang::get('pagination.about')}}</a> |
                <a href="#">{{ Lang::get('pagination.privacy')}}</a> |
                <a href="#">{{ Lang::get('pagination.contact_us')}}</a>
            </div>
        </div>
    </div>

</div>

</body>
</html>






