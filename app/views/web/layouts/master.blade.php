<!DOCTYPE html>
<html lang="{{ $settings->language }}">
<head>
    <title>{{ $settings->title }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="{{ url('web/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<style type="text/css">
html{
    background-color: {{ $settings->home_back_color }};
    font-family: "Times New Roman", Georgia, Serif;
}
body {
    background-color: {{ $settings->home_back_color }};
}
.form-signin {
  max-width: 430px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
  font-size:13pt;
  text-align: center;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="query"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.panel.panel-default {
    border-top-color: #F5F5F5;
    border-top-width: 1px;
}
.panel {
    float: left;
    width: 100%;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    border: 0px;
    border-top: 2px solid #E5E5E5;
    margin-bottom: 20px;
    position: relative;
    -moz-box-shadow: 0px 1px 1px 0px rgba(0, 0, 0, 0.2);
    -webkit-box-shadow: 0px 1px 1px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 1px 1px 0px rgba(0, 0, 0, 0.2);
}
.form-group-separated {
    border-top: 1px dashed #D5D5D5;
}
.form-horizontal .form-group {
    margin-left: 0px;
    margin-right: 0px;
}
.form-group-separated .form-group {
    border-bottom: 1px dashed #D5D5D5;
    margin-bottom: 0px;
}
.form-group-separated .form-group [class^="col-md-"]:first-child {
    border-left: 0px;
}
.form-group-separated .form-group [class^="col-md-"] {
    border-left: 1px dashed #D5D5D5;
    padding: 12px 10px;
}
.form-horizontal .control-label {
    line-height: 30px;
    padding-top: 0px;
}
.form-group-separated.panel-body, .form-group-separated.modal-body {
    padding: 0px;
}
.panel .panel-body {
    padding: 15px;
    position: relative;
}
.panel .panel-heading, .panel .panel-footer, .panel .panel-body {
    float: left;
    width: 100%;
}
.line-height-30 {
    line-height: 30px;
    font-size: 9pt;
}
.footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 60px;
    background-color: #f5f5f5;
}
.container .text-muted {
    margin: 20px 0;
}
.text-muted {
    color: #777;
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    color: #434a54;
    padding: 0px;
    margin: 0px;
}
h3, .h3 {
    margin-bottom: 10px;
    font-size: 18px;
    font-weight: 600;
}
label {
    font-weight: 600;
    font-size: 9pt;
}
p {
    font-size: 9pt;
}
</style>
</head>
<body>
<div class="container" id="randevu_query">
    @yield('content')
</div>
<footer class="footer">
  <div class="container">
    <p class="text-muted">
        {{ Lang::get('pagination.phone') }} : {{ $settings->phone }}    |
        {{ Lang::get('pagination.fax') }}   : {{ $settings->fax }}      |
        {{ Lang::get('pagination.email') }} : {{ $settings->email }}
    </p>
  </div>
</footer>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ url('web/js/bootstrap.min.js') }}"></script>
</body>
</html>