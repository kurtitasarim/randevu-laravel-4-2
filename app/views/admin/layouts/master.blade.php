<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META SECTION -->
    <title>{{ Config::get('app.ProjectName'); }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="{{ asset('administrator/favicon.ico') }}" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    {{ HTML::style('administrator/css/theme-dark.css',array('id'=>'theme')) }}
    <!-- EOF CSS INCLUDE -->
</head>
<body>
<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <div class="page-sidebar">
        @include('admin.layouts.navigation')
    </div>
    <!-- END PAGE SIDEBAR -->

    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
            <!-- TOGGLE NAVIGATION -->
            <li class="xn-icon-button">
                <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
            </li>
            <!-- END TOGGLE NAVIGATION -->
            <!-- SEARCH -->
            <li class="xn-search">
                <form role="form">
                    <input type="text" name="search" placeholder="Search..."/>
                </form>
            </li>
            <!-- END SEARCH -->
            <!-- POWER OFF -->
            <li class="xn-icon-button pull-right last">
                <a href="#"><span class="fa fa-power-off"></span></a>
                <ul class="xn-drop-left animated zoomIn">
                    <li><a href="{{URL::to('logout')}}" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> {{ Lang::get('pagination.Sign_Out') }}</a></li>
                </ul>
            </li>
            <!-- END POWER OFF -->
            <!-- MESSAGES --
            <li class="xn-icon-button pull-right">
                <a href="#"><span class="fa fa-comments"></span></a>
                <div class="informer informer-danger">4</div>
                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>
                        <div class="pull-right">
                            <span class="label label-danger">4 new</span>
                        </div>
                    </div>
                    <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-online"></div>
                            {{ HTML::image('administrator/assets/images/users/user2.jpg','',array('class'=>'pull-left')) }}
                            <span class="contacts-title">P-Card</span>
                            <p>Praesent placerat tellus id augue condimentum</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-away"></div>
                            {{ HTML::image('administrator/assets/images/users/user.jpg','',array('class'=>'pull-left')) }}
                            <span class="contacts-title">Dmitry Ivaniuk</span>
                            <p>Donec risus sapien, sagittis et magna quis</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-away"></div>
                            {{ HTML::image('administrator/assets/images/users/user3.jpg','',array('class'=>'pull-left')) }}
                            <span class="contacts-title">Nadia Ali</span>
                            <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-offline"></div>
                            {{ HTML::image('administrator/assets/images/users/user6.jpg','',array('class'=>'pull-left')) }}
                            <span class="contacts-title">Darth Vader</span>
                            <p>I want my money back!</p>
                        </a>
                    </div>
                    <div class="panel-footer text-center">
                        <a href="#">Show all messages</a>
                    </div>
                </div>
            </li>
            <!-- END MESSAGES -->
            <!-- TASKS --
            <li class="xn-icon-button pull-right">
                <a href="#"><span class="fa fa-tasks"></span></a>
                <div class="informer informer-warning">3</div>
                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>
                        <div class="pull-right">
                            <span class="label label-warning">3 active</span>
                        </div>
                    </div>
                    <div class="panel-body list-group scroll" style="height: 200px;">
                        <a class="list-group-item" href="#">
                            <strong>Phasellus augue arcu, elementum</strong>
                            <div class="progress progress-small progress-striped active">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                            </div>
                            <small class="text-muted">P-Card, 25 Sep 2015 / 50%</small>
                        </a>
                        <a class="list-group-item" href="#">
                            <strong>Aenean ac cursus</strong>
                            <div class="progress progress-small progress-striped active">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
                            </div>
                            <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2015 / 80%</small>
                        </a>
                        <a class="list-group-item" href="#">
                            <strong>Lorem ipsum dolor</strong>
                            <div class="progress progress-small progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>
                            </div>
                            <small class="text-muted">P-Card, 23 Sep 2015 / 95%</small>
                        </a>
                        <a class="list-group-item" href="#">
                            <strong>Cras suscipit ac quam at tincidunt.</strong>
                            <div class="progress progress-small">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                            </div>
                            <small class="text-muted">P-Card, 21 Sep 2015 /</small><small class="text-success"> Done</small>
                        </a>
                    </div>
                    <div class="panel-footer text-center">
                        <a href="pages-tasks.html">Show all tasks</a>
                    </div>
                </div>
            </li>
            <!-- END TASKS -->
            <!-- LANG BAR --
            <li class="xn-icon-button pull-right">
                <a href="#"><span class="flag flag-gb"></span></a>
                <ul class="xn-drop-left xn-drop-white animated zoomIn">
                    <li><a href="#"><span class="flag flag-gb"></span> English</a></li>
                    <li><a href="#"><span class="flag flag-de"></span> Deutsch</a></li>
                    <li><a href="#"><span class="flag flag-cn"></span> Chinese</a></li>
                </ul>
            </li>
            <!-- END LANG BAR -->
        </ul>
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">{{ Lang::get('pagination.Dashboard') }}</li>
            <li class="">{{ Request::segment(1); }}</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
            @yield('content')
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> {{ Lang::get('pagination.logout') }} !</div>
            <div class="mb-content">
                <p>{{ Lang::get('pagination.exists') }}</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="{{URL::to('logout')}}" class="btn btn-success btn-lg">{{ Lang::get('pagination.yes') }}</a>
                    <button class="btn btn-default btn-lg mb-control-close">{{ Lang::get('pagination.no') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->
<!-- START PRELOADS -->
<audio id="audio-alert" src="{{ URL::to('administrator/audio/alert.mp3') }}" preload="auto"></audio>
<audio id="audio-fail" src="{{ URL::to('administrator/audio/fail.mp3') }}" preload="auto"></audio>
<!-- END PRELOADS -->
<!-- START PLUGINS -->
{{ HTML::script('administrator/js/plugins/jquery/jquery.min.js') }}
{{ HTML::script('administrator/js/plugins/jquery/jquery-ui.min.js') }}
{{ HTML::script('administrator/js/plugins/bootstrap/bootstrap.min.js') }}
<!-- END PLUGINS -->
    @yield('javascript')
<!-- START TEMPLATE -->
{{ HTML::script('administrator/js/plugins.js') }}
{{ HTML::script('administrator/js/actions.js') }}
<!-- END TEMPLATE -->
<!-- END SCRIPTS -->
</body>
</html>






