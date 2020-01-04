@extends('admin.layouts.master')

@section('content')
    <!-- Start -->
    <div class="page-content-wrap">

    <!-- START WIDGETS -->
    <div class="row">
        <div class="col-md-3">

            <!-- START WIDGET SLIDER -->
            <div class="widget widget-default widget-carousel">
                <div class="owl-carousel" id="owl-example">
                    <div>
                        <div class="widget-title">{{ Lang::get('pagination.register_appointment') }}</div>
                        <div class="widget-subtitle">&nbsp;</div>
                        <div class="widget-int">{{ $randevuCount }}</div>
                    </div>
                    <div>
                        <div class="widget-title">{{ Lang::get('pagination.completed').' '.Lang::get('pagination.register_appointment') }}</div>
                        <div class="widget-subtitle">&nbsp;</div>
                        <div class="widget-int">{{ $randevuCompletionCount }}</div>
                    </div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
            <!-- END WIDGET SLIDER -->

        </div>
        <div class="col-md-3">

            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='#';">
                <div class="widget-item-left">
                    <span class="fa fa-envelope"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">0</div>
                    <div class="widget-title">&nbsp;</div>
                    <div class="widget-subtitle"></div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
            <!-- END WIDGET MESSAGES -->

        </div>
        <div class="col-md-3">

            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon  widget-carousel" onclick="location.href='#';">
                <div class="owl-carousel" id="owl-example">
                    <div>
                        <div class="widget-item-left">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count">{{ Lang::get('pagination.registered_users') }}</div>
                            <div class="widget-title">{{ $user->count() }}</div>
                            <div class="widget-subtitle">On your website</div>
                        </div>
                        <div class="widget-controls">
                            <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END WIDGET REGISTRED -->

        </div>
        <div class="col-md-3">

            <!-- START WIDGET CLOCK -->
            <div class="widget widget-danger widget-padding-sm">
                <div class="widget-big-int plugin-clock">00:00</div>
                <div class="widget-subtitle plugin-date">Loading...</div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
                <div class="widget-buttons widget-c3">
                    <div class="col">
                        <a href="#"><span class="fa fa-clock-o"></span></a>
                    </div>
                    <div class="col">
                        <a href="#"><span class="fa fa-bell"></span></a>
                    </div>
                    <div class="col">
                        <a href="#"><span class="fa fa-calendar"></span></a>
                    </div>
                </div>
            </div>
            <!-- END WIDGET CLOCK -->
        </div>
    </div>
    <!-- END WIDGETS -->
    <!-- Content -->
    <div class="row">
        <div class="col-md-12">
            <div id="alert_holder"></div>
            <div class="calendar">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
    </div>
    <div class="gizli_pencere col-md-8" style="display:none; z-index:99;">
        <div class="col-md-8">
            <!-- START VALIDATIONENGINE PLUGIN -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>{{ Lang::get('pagination.appointment_write') }}</h3>
                    <form id="validate randevu_form" name="randevu_al" role="form" class="form-horizontal" action="javascript:">
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ Lang::get('pagination.name').' '.Lang::get('pagination.last_name') }}:</label>
                            <div class="col-md-8">
                                <input name="name_firstname" type="text" class="validate[required,maxSize[50]] form-control"/>
                                <span class="help-block">Required, max size = 50</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ Lang::get('pagination.phone') }}:</label>
                            <div class="col-md-8">
                                <input name="phone" type="text" class="validate[required,minSize[7],maxSize[15]] form-control" id="password"/>
                                <span class="help-block">Required, min size = 7, max size = 15</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ Lang::get('pagination.number_of_person') }}:</label>
                            <div class="col-md-8">
                                <input name="number_of_people" type="number" class="validate[required,custom[integer],min[1],max[50]] form-control" value="1"/>
                                <span class="help-block">Number Of People</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ Lang::get('pagination.action_to_be_taken') }}:</label>
                            <div class="col-md-8">
                                <textarea name="process" class="validate[required,min[18],max[500]] form-control"></textarea>
                                <span class="help-block">Required, integer, min value = 18, max = 500</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ Lang::get('pagination.branch') }}:</label>
                            <div class="col-md-8">
                                <select name="branch" class="validate[required] select" id="formGender">
                                    <option value="">Choose option</option>
                                    @foreach($branch as $bran)
                                        <option value="{{ $bran->id }}">{{ $bran->name }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block">Required</span>
                            </div>
                        </div>
                        <!-- Personel Atama -->
                        @if($settings->staff_assignment=="true")
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ Lang::get('pagination.staff_assignment') }}:</label>
                            <div class="col-md-8">
                                <select name="staff" class="validate[required] select" id="formStaff">
                                    <option value="">Choose option</option>
                                    @foreach($user as $person)
                                        <option value="{{ $person->id }}">{{ $person->first_name }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block">Required</span>
                            </div>
                        </div>
                        @endif
                        <!-- Personel Atama Son -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ Lang::get('pagination.choose_color') }}:</label>
                            <div class="col-md-8">
                                <select name="color" class="validate[required] select" id="formColor">
                                    <option value="blue" style="background-color: blue">{{ Lang::get('pagination.blue') }}</option>
                                    <option value="red" style="background-color: red">{{ Lang::get('pagination.red') }}</option>
                                    <option value="orange" style="background-color: orange">{{ Lang::get('pagination.orange') }}</option>
                                    <option value="green" style="background-color: green">{{ Lang::get('pagination.green') }}</option>
                                </select>
                                <span class="help-block">Required</span>
                            </div>
                        </div>
                        <div class="form-group" style="display: block">
                            <label class="col-md-4 control-label">Randevu Tarihi:</label>
                            <div class="col-md-8">
                                <div class="col-md-7">
                                    <input name="start_date" type="text" class="form-control datepicker" value="">
                                </div>
                                <div class="col-md-5">
                                    <input name="start_time" type="text" class="form-control timepicker24"/>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-7">
                                    <input name="end_date" type="text" class="form-control datepicker" value=""/>
                                </div>
                                <div class="col-md-5">
                                    <input name="end_time" type="text" class="form-control timepicker24"/>
                                </div>
                                <span class="help-block">Required, date YYYY-MM-DD</span>
                            </div>
                        </div>
                        <div class="btn-group pull-right">
                            <button class="btn btn-primary" type="button" onClick="$('div.gizli_pencere').hide();">{{ Lang::get('pagination.canceled') }}</button>
                            <button class="btn btn-primary" type="submit">{{ Lang::get('pagination.save') }}</button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- END VALIDATIONENGINE PLUGIN -->

        </div>
    </div>
    <!-- Detaylı Gösterimm -->
    <div class="gizli_detay col-md-8" style="display:none; z-index:99;">
        <div class="col-md-8">
            <!-- START VALIDATIONENGINE PLUGIN -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>{{ Lang::get('pagination.appointment_details') }}</h3>
                    <form id="validate detay_form" name="randevu_detay" role="form" class="form-horizontal" action="javascript:">
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ Lang::get('pagination.name').' '.Lang::get('pagination.last_name') }}:</label>
                            <div class="col-md-8">
                                <input name="name_firstname" type="text" class="validate[required,maxSize[50]] form-control"/>
                                <span class="help-block">Required, max size = 50</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ Lang::get('pagination.phone') }}:</label>
                            <div class="col-md-8">
                                <input name="phone" type="text" class="validate[required,minSize[7],maxSize[15]] form-control" id="password"/>
                                <span class="help-block">Required, min size = 7, max size = 15</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ Lang::get('pagination.number_of_person') }}:</label>
                            <div class="col-md-8">
                                <input name="number_of_people" type="number" class="validate[required,custom[integer],min[1],max[50]] form-control"/>
                                <span class="help-block">Number Of People</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ Lang::get('pagination.action_to_be_taken') }}:</label>
                            <div class="col-md-8">
                                <textarea name="process" class="validate[required,min[18],max[500]] form-control"></textarea>
                                <span class="help-block">Required, integer, min value = 18, max = 500</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ Lang::get('pagination.transaction') }}:</label>
                            <div class="col-md-8">
                                <textarea name="transaction" class="validate[required,min[18],max[1500]] form-control"></textarea>
                                <span class="help-block">Required, integer, min value = 18, max = 1500</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ Lang::get('pagination.branch') }}:</label>
                            <div class="col-md-8">
                                <select name="branch" id="formBranch">
                                    <option value="">Choose option</option>
                                    @foreach($branch as $bran)
                                        <option value="{{ $bran->id }}">{{ $bran->name }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block">Required</span>
                            </div>
                        </div>
                        <!-- Personel Atama -->
                        @if($settings->staff_assignment=="true")
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ Lang::get('pagination.staff_assignment') }}:</label>
                            <div class="col-md-8">
                                <select name="staff" class="" id="formStaff">
                                    <option value="">Choose option</option>
                                    @foreach($user as $person)
                                        <option value="{{ $person->id }}">{{ $person->first_name }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block">Required</span>
                            </div>
                        </div>
                        @endif
                        <!-- Personel Atama Son -->

                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ Lang::get('pagination.amount') }}:</label>
                            <div class="col-md-8">
                                <input name="amount" type="text" class="validate[required] form-control" id="amount" value="0"/>
                                <span class="help-block">Required</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ Lang::get('pagination.discount') }}:</label>
                            <div class="col-md-8">
                                <input name="discount" type="text" class="validate[required] form-control" id="discount" value="0"/>
                                <span class="help-block">Required</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ Lang::get('pagination.total') }}:</label>
                            <div class="col-md-8">
                                <input name="total" type="text" class="validate[required] form-control" id="total" value="0" readonly/>
                                <span class="help-block">Required</span>
                            </div>
                        </div>
                        <input type="hidden" name="ids" id="ids" value=""/>
                        <div class="btn-group pull-right">
                            <button class="btn btn-primary" type="button" onClick="$('div.gizli_detay').hide();">{{ Lang::get('pagination.canceled') }}</button>
                            <button class="btn btn-primary" type="submit">{{ Lang::get('pagination.save') }}</button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- END VALIDATIONENGINE PLUGIN -->

        </div>
    </div>
    <!-- Detaylı Gösterimm -->


@stop

    @section('javascript')
        <!-- START THIS PAGE PLUGINS-->
        {{ HTML::script('administrator/js/plugins/icheck/icheck.min.js') }}
        {{ HTML::script('administrator/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}
        {{ HTML::script('administrator/js/plugins/scrolltotop/scrolltopcontrol.js') }}
        {{ HTML::script('administrator/js/plugins/morris/raphael-min.js') }}
        {{ HTML::script('administrator/js/plugins/rickshaw/d3.v3.js') }}
        {{ HTML::script('administrator/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}
        {{ HTML::script('administrator/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}
        {{ HTML::script('administrator/js/plugins/bootstrap/bootstrap-datepicker.js') }}
        {{ HTML::script('administrator/js/plugins/bootstrap/bootstrap-select.js') }}
        {{ HTML::script('administrator/js/plugins/validationengine/languages/jquery.validationEngine-en.js') }}
        {{ HTML::script('administrator/js/plugins/validationengine/jquery.validationEngine.js') }}
        {{ HTML::script('administrator/js/plugins/owl/owl.carousel.min.js') }}
        {{ HTML::script('administrator/js/plugins/moment.min.js') }}
        {{ HTML::script('administrator/js/plugins/fullcalendar/fullcalendar.min.js') }}
        {{ HTML::script('administrator/js/demo_dashboard.js') }}
        {{ HTML::script('administrator/js/plugins/datatables/jquery.dataTables.min.js') }}
        {{ HTML::script('administrator/js/plugins/maskedinput/jquery.maskedinput.min.js') }}
        {{ HTML::script('administrator/js/plugins/bootstrap/bootstrap-datepicker.js') }}
        {{ HTML::script('administrator/js/plugins/bootstrap/bootstrap-timepicker.min.js') }}
        <!-- END THIS PAGE PLUGINS-->
        <script type="text/javascript">
            $("body").ready(function(){
                //fiyat hesapla
                $('input[name="amount"]').keyup(function(e){
                    var key = e.which ? e.which : event.keyCode;
                    if(key == 110 || key == 188){
                      e.preventDefault();
                      var value = $(this).val();
                      $(this).val(value.replace(",","."));
                    }
                    var miktar      =   $(this).val();
                    var indirim     =   $('input[name="discount"]').val();
                    var toplam      =   $('input[name="total"]');
                    toplam.val(parseFloat(miktar)-parseFloat(indirim));
                    //console.log(parseInt(miktar)+parseInt(indirim));
                });
                $('input[name="discount"]').keyup(function(e){
                    var key = e.which ? e.which : event.keyCode;
                    if(key == 110 || key == 188){
                      e.preventDefault();
                      var value = $(this).val();
                      $(this).val(value.replace(",","."));
                    }
                    var indirim     =   $(this).val();
                    var miktar      =   $('input[name="amount"]').val();
                    var toplam      =   $('input[name="total"]');
                    toplam.val(parseFloat(miktar)-parseFloat(indirim));
                    //console.log(parseInt(miktar)+parseInt(indirim));
                });
                //masked input
                var feMasked = function(){
                    if($("input[class^='mask_']").length > 0){
                       // $("input.mask_tin").mask('99-9999999');
                        //$("input.mask_ssn").mask('999-99-9999');
                        //$("input.mask_date").mask('9999-99-99');
                        //$("input.mask_product").mask('a*-999-a999');
                        //$("input.mask_phone").mask('99 (999) 999-99-99');
                        //$("input.mask_phone_ext").mask('99 (999) 999-9999? x99999');
                        $("input.mask_amount").mask('99.999.999');
                        //$("input.mask_percent").mask('99%');
                    }
                }//END Masked Inputs
                //windows center
                jQuery.fn.center = function () {
                    this.css("position","absolute");
                    this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) +
                                                                $(window).scrollTop()) + "px");
                    this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) +
                                                                $(window).scrollLeft()) + "px");
                    return this;
                };
                $('div.gizli_pencere').center();
                $('div.gizli_detay').center();
                //form kontrol
                $.formKontrol = function(){
                    $('form[role="form"]').submit(function(){
                        console.log('girdi');
                    });
                }
                //calender
                 var fullCalendar = function(){
                 var calendar = function(){
                     if($("#calendar").length > 0){
                         function prepare_external_list(){
                             $('#external-events .external-event').each(function() {
                                     var eventObject = {title: $.trim($(this).text())};
                                     $(this).data('eventObject', eventObject);
                                     $(this).draggable({
                                             zIndex: 999,
                                             revert: true,
                                             revertDuration: 0
                                     });
                             });
                         }
                         var date = new Date();
                         var d = date.getDate();
                         var m = date.getMonth();
                         var y = date.getFullYear();
                         prepare_external_list();
                         var calendar = $('#calendar').fullCalendar({
                             header: {
                                 left: 'prev,next today',
                                 center: 'title',
                                 right: 'month,agendaWeek,agendaDay'
                             },
                             defaultView: 'agendaWeek',
                             editable: true,
                             eventSources: {url: "{{ url('admin/api/randevuList') }}" },
                             droppable: true,
                             allDayDefault : false,
                             axisFormat: 'H:mm',
                                  timeFormat: {
                                       agenda: '{H:mm}'
                                  },
                             selectable: true,
                             selectHelper: true,
                             dayClick: function(date, jsEvent, view) {
                                 console.log(jsEvent);
                                 if (view.name != 'month')
                                     return;

                                 if (view.name == 'month') {
                                     $('#calendar').fullCalendar('changeView', 'agendaDay');
                                     $('#calendar').fullCalendar('gotoDate', date);
                                 }
                                 return;
                             },
                             select: function(start, end, jsEvent, view) {
                             //console.log(start.format())
                             var start          =   start.format();
                             var startSplit     =   start.split('T');
                             var end            =   end.format();
                             var endSplit       =   end.split('T');
                             //console.log(startSplit[0]);
                             if( view.name == "mont" || view.name != "agendaDay" && view.name != "agendaWeek" )
                                return;
                             //$('input[name="start_date"]').val(startSplit[0]);
                             //console.log(new Date(Date.parse(startSplit[0],'dd-mm-yyyy')));
                             $('input[name="start_date"]').datepicker({format: 'dd-mm-yyyy'}).datepicker("setDate",new Date(Date.parse(startSplit[0],'dd-mm-yyyy')));
                             //$('input[name="start_time"]').val(startSplit[1]);
                             $('input[name="start_time"]').timepicker('setTime', startSplit[1]);
                             $('input[name="end_date"]').datepicker({format: 'dd-mm-yyyy'}).datepicker("setDate",new Date(Date.parse(endSplit[0],'dd-mm-yyyy')))
                             $('input[name="end_time"]').timepicker('setTime', endSplit[1]);
                             //console.log(new Date(start).toString()+' '+end);
                             $('div.gizli_pencere').show();
                             $('form[name="randevu_al"]').on('click','button[type="submit"]',function(event){
                                //console.log(start+' '+end);
                                //console.log('girdi');
                                event.preventDefault();
                                $.ajax({
                                    type    : 'POST',
                                    url     : "{{ url('admin/api/randevuInsert') }}",
                                    data    : $('form[name="randevu_al"]').serialize(),
                                    cache   : false,
                                    success : function(data)
                                    {
                                        //console.log(data);return; 
                                        if(data.success)
                                        {
                                            calendar.fullCalendar('renderEvent',
                                            {
                                                ids : data.ids,
                                                title: $('input[name="name_firstname"]').val(),
                                                start: start,
                                                end: end,
                                                color: $('select[name="color"]').val()
                                            },
                                            true
                                            );
                                        }

                                        $('form[name="randevu_al"]').find(':input,textarea').val('');
                                        location.reload();
                                        //$('div.gizli_pencere').hide();
                                    return false; 
                                    }
                                });
                                });
                             },
                             eventResizeStart: function (event, jsEvent, ui, view) {
                                     console.log('RESIZE START ' + event.title);

                                 },
                                 eventResizeStop: function (event, jsEvent, ui, view) {
                                     console.log('RESIZE STOP ' + event.title);

                                 },
                                 eventResize: function (event, dayDelta, minuteDelta, revertFunc, jsEvent, ui, view) {
                                    var starts  =  event.start.format();
                                    var ends    =  event.end.format();
                                    //console.log('ids : '+event.ids+', start_date :'+ start+', end_date :'+ end);return;
                                    $.post( "{{ url('admin/api/randevuDateUpdate') }}", { ids: '22', start_date: starts, end_date: ends } )
                                    .done(function( data ){
                                        if(data.success)
                                        {
                                            //$('#calendar').fullCalendar('removeEvents',event._id);
                                            alert('{{ Lang::get('pagination.updated_success') }}!')
                                        }
                                    });
                                 },
                            columnFormat: {
                              month: 'dddd / MMMM / YYYY',    // Mon
                              week: 'ddd d / M', // Mon 9/7
                              day: 'D { dddd } / M' 
                            }, 
                            eventRender: function(event, element) {
                                    element.append( "<span class='closeon'>X</span>" );
                                    element.find(".closeon").click(function() {
                                    var cnf = confirm('{{ Lang::get('pagination.confirm_delete_event')  }}');
                                    if(cnf)
                                    {
                                        //console.log($(this).siblings('div.fc-content').children('span.fc-id').html());
                                        $.post( "{{ url('admin/api/randevuDelete') }}", { ids : $(this).siblings('div.fc-content').children('span.fc-id').html() } )
                                        .done(function( data ){
                                        //console.log(data);return;
                                        //$('#calendar').fullCalendar('removeEvents',event._id);
                                            if(data.success)
                                            {
                                                $('#calendar').fullCalendar('removeEvents',event._id);
                                            }
                                        });
                                    }
                                    });
                                },
                                eventClick: function(event){
                                    //alert(event.ids);
                                    $.post( "{{ url('admin/api/randevuDetails') }}", { ids : event.ids } )
                                    .done(function( data ){
                                    //console.log(event.ids);return;
                                        if(data.success)
                                        {
                                            $('form[name="randevu_detay"]').find('input[name="name_firstname"]').val(data.name_surname);
                                            $('form[name="randevu_detay"]').find('input[name="phone"]').val(data.phone);
                                            $('form[name="randevu_detay"]').find('input[name="number_of_people"]').val(data.number_people);
                                            $('form[name="randevu_detay"]').find('textarea[name="process"]').val(data.action_to_be_taken);
                                            $('form[name="randevu_detay"]').find('select[name="branch"] option[value="'+data.branch+'"]').attr('selected',true);
                                            $('form[name="randevu_detay"]').find('select[name="branch"]').attr('class','select');
                                            $('form[name="randevu_detay"]').find('select[name="staff"] option[value="'+data.staff+'"]').attr('selected','selected');
                                            $('form[name="randevu_detay"]').find('input[name="ids"]').val(event.ids);

                                            if(data.completion != 0)
                                            {
                                                $('form[name="randevu_detay"]').find('input[name="amount"]').val(data.amount);
                                                $('form[name="randevu_detay"]').find('input[name="discount"]').val(data.discount);
                                                $('form[name="randevu_detay"]').find('input[name="total"]').val(data.total);
                                                $('form[name="randevu_detay"]').find('textarea[name="transaction"]').val(data.transaction);
                                                $('form[name="randevu_detay"]').find('button[type="submit"]').hide();

                                            } else {
                                                $('form[name="randevu_detay"]').find('input[name="amount"]').val(0);
                                                $('form[name="randevu_detay"]').find('input[name="discount"]').val(0);
                                                $('form[name="randevu_detay"]').find('input[name="total"]').val(0);
                                                $('form[name="randevu_detay"]').find('button[type="submit"]').show();
                                            }
                                            $('div.gizli_detay').show();
                                        }
                                    });
                                }
                         });
                     }
                 }

                 return {
                     init: function(){
                         calendar();
                     }
                 }
                 }();
                fullCalendar.init();
                feMasked();
                //detay kaydet
                $('form[name="randevu_detay"]').submit(function(){
                    //console.log(start+' '+end);
                    //console.log('girdi');
                    $.post( "{{ url('admin/api/randevuUpdate') }}", $('form[name="randevu_detay"]').serialize()).done(function( data ) {
                        //console.log(data);
                        if(data.success)
                        {
                            $('form[name="randevu_detay"]').trigger("reset"),
                            $('form[name="randevu_detay"]').find(":input,textarea").val(''),
                            $('form[name="randevu_detay"]').find("option").val("-1"),
                            $('div.gizli_detay').hide();
                        }
                    });
                });
            });
        </script>
    @stop