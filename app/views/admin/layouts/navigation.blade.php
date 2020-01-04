<!-- START X-NAVIGATION -->
<ul class="x-navigation">
    <li class="xn-logo" style="display:none;">
        <a href="#">{{ Config::get('app.ProjectName'); }}</a>
        <a href="#" class="x-navigation-control"></a>
    </li>
    <li class="xn-profile">
        <a href="#" class="profile-mini">
            {{ HTML::image('administrator/assets/images/users/avatar.jpg','',array('class'=>'')) }}
        </a>
        <div class="profile">
            <div class="profile-image">
                {{ HTML::image('administrator/assets/images/users/avatar.jpg','',array('class'=>'')) }}
            </div>
            <div class="profile-data">
                <div class="profile-data-name">{{ Sentry::getUser()->first_name.' '.Sentry::getUser()->last_name }}</div>
                <div class="profile-data-title"></div>
            </div>
            <div class="profile-controls" style="display:none;">
                <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
                <a href="#" class="profile-control-right"><span class="fa fa-envelope"></span></a>
            </div>
        </div>
    </li>
    <li class="xn-title">{{ Lang::get('pagination.Navigation') }}</li>
    <li class="@if(Route::current()->getName()=="admin...index") active @endif">
        <a href="/admin/"><span class="fa fa-desktop"></span> <span class="xn-text">{{ Lang::get('pagination.Dashboard') }}</span></a>
    </li>
    <li class="@if(Request::is('admin/users') || Request::is('admin/users/*')) active @endif">
        <a href="/admin/users"><span class="fa fa-users"></span> <span class="xn-text">{{ Lang::get('pagination.users') }}</span></a>
    </li>
    <li class="xn-openable @if(Request::is('admin/settings') || Request::is('admin/branch')) active @endif">
        <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">{{ Lang::get('pagination.actions') }}</span></a>
        <ul>
            <li class="@if(Request::is('admin/settings') || Request::is('admin/settings/*')) active @endif">
                <a href="/admin/settings"><span class="fa fa-cogs"></span> <span class="xn-text">{{ Lang::get('pagination.settings') }}</span></a>
            </li>
            <li class="@if(Request::is('admin/branch') || Request::is('admin/branch/*')) active @endif">
                <a href="/admin/branch"><span class="fa fa-cogs"></span> <span class="xn-text">{{ Lang::get('pagination.branch').' '.Lang::get('pagination.actions') }}</span></a>
            </li>
            <li class="@if(Request::is('admin/appointmentList') || Request::is('admin/appointment/*')) active @endif">
                <a href="/admin/appointment"><span class="fa fa-cogs"></span> <span class="xn-text">{{ Lang::get('pagination.appointment').' '.Lang::get('pagination.list') }}</span></a>
            </li>
        </ul>
    </li>
    <!--
    <li class="xn-openable">
        <a href="#"><span class="fa fa-gear"></span> <span class="xn-text">{{ Lang::get('pagination.settings') }}</span></a>
        <ul>
            <li><a href="/settings">{{ Lang::get('pagination.settings') }}</a></li>
            <li><a href="#">{{ Lang::get('pagination.paymentType') }}</a></li>
        </ul>
    </li>
    -->
</ul>
<!-- END X-NAVIGATION -->
