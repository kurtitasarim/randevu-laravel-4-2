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

<div class="registration-container">
    <div class="registration-box animated fadeInDown">
        <div class="registration-logo"></div>
        <div class="registration-body">
            <div class="registration-title"><strong>{{ Lang::get('pagination.Registration') }}</strong></div>
            <div class="registration-subtitle">
                @if ( ! empty( $errors ) )
                    @foreach ( $errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                @endif
                    @if( Session::has('message') )
                        {{ Session::get('message') }}
                    @endif
            </div>
            {{ Form::open(array('url'=>'/register','class'=>'form-horizontal','method'=>'POST')) }}
                <h4>{{ Lang::get('pagination.personelInfo') }}</h4>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="first_name" placeholder="{{ Lang::get('pagination.firstname') }}"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="last_name" placeholder="{{ Lang::get('pagination.lastname') }}"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="email" placeholder="E-mail"/>
                    </div>
                </div>

                <h4>{{ Lang::get('pagination.authentication') }}</h4>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="username" placeholder="{{ Lang::get('pagination.username') }}"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="password" class="form-control" name="password" placeholder="{{ Lang::get('pagination.password') }}"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="{{ Lang::get('pagination.re-password') }}"/>
                    </div>
                </div>

                <div class="form-group push-up-30">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-link btn-block">{{ Lang::get('pagination.already_have_account') }}?</a>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-danger btn-block">{{ Lang::get('pagination.sign_up_button') }}</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="registration-footer">
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






