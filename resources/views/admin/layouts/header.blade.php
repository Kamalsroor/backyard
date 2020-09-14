<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{app('l')}}" dir="{{app('dir')}}">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>{{!empty($title)?$title:trans('admin.dashboard')}}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <link href="{{url('design/admin_panel')}}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/bootstrap/css/bootstrap{{app('direction')}}.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch{{app('direction')}}.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{url('design/admin_panel')}}/assets/global/css/components{{app('direction')}}.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/css/plugins{{app('direction')}}.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->


        @if(session('theme') == 1)
         <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{url('design/admin_panel')}}/assets/layouts/layout4/css/layout{{app('direction')}}.min.css" id="stylelink1" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/layouts/layout4/css/themes/default{{app('direction')}}.min.css" id="stylelink2" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{url('design/admin_panel')}}/assets/layouts/layout4/css/custom{{app('direction')}}.min.css"  id="stylelink3" rel="stylesheet" type="text/css" />
        @elseif(session('theme') == 2)
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{url('design/admin_panel')}}/assets/layouts/layout/css/layout{{app('direction')}}.min.css" id="stylelink1" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/layouts/layout/css/themes/default{{app('direction')}}.min.css" id="stylelink2" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{url('design/admin_panel')}}/assets/layouts/layout/css/custom{{app('direction')}}.min.css"  id="stylelink3" rel="stylesheet" type="text/css" />

        @elseif(session('theme') == 3)

        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{url('design/admin_panel')}}/assets/layouts/layout2/css/layout{{app('direction')}}.min.css" id="stylelink1" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/layouts/layout2/css/themes/default{{app('direction')}}.min.css" id="stylelink2" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{url('design/admin_panel')}}/assets/layouts/layout2/css/custom{{app('direction')}}.min.css"  id="stylelink3" rel="stylesheet" type="text/css" />

        @else
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{url('design/admin_panel')}}/assets/layouts/layout4/css/layout{{app('direction')}}.min.css" id="stylelink1" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/layouts/layout4/css/themes/default{{app('direction')}}.min.css" id="stylelink2" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{url('design/admin_panel')}}/assets/layouts/layout4/css/custom{{app('direction')}}.min.css"  id="stylelink3" rel="stylesheet" type="text/css" />
        @endif

        <script src="{{url('design/admin_panel')}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT STYLES -->
        @if(!empty(setting()->icon))
        <link rel="shortcut icon" href="{{ it()->url(setting()->icon) }}" />
        @endif
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- END CORE PLUGINS -->

        <link href="{{ url("design/admin_panel/assets/global/plugins/datatables/datatables.min.css") }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{url("design/admin_panel")}}/assets/global/css/components-rtl.min.css">
        <link rel="stylesheet" href="{{url("design/admin_panel")}}/assets/global/css/plugins-rtl.min.css">
        <link href="{{ url("design/admin_panel/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css") }}" rel="stylesheet" type="text/css" />
        @if(app("l") != 'ar')
        <link href="{{ url("design/admin_panel/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css") }}" rel="stylesheet" type="text/css" />
        @endif

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
        <style type="text/css">
            .table-responsive{
                padding-top:70px;
            }
            
.form-group-item .g-items {
  margin-bottom: 20px;
}

.form-group-item .g-items .item {
  border: solid 1px #c4cdd5;
  border-top: 0px;
  padding: 0px 15px;
}

.form-group-item .g-items .item .form-control {
  margin-bottom: 10px;
}

.form-group-item .g-items .item .form-control:last-child {
  margin-bottom: 0px;
}

.form-group-item .g-items .item > .row > div {
  padding: 10px;
  border-right: 1px solid #c4cdd5;
}

.form-group-item .g-items .item > .row > div:last-child {
  border-right: 0px;
}

.form-group-item .g-items .item textarea.full-h {
  height: 100%;
}

.form-group-item .g-more {
  display: none;
}

.form-group-item label {
  display: block;
  min-height: 20px;
}

.form-group-item .g-items-header {
  font-weight: bold;
  border: solid 1px #c4cdd5;
  padding: 10px;
  text-align: center;
}

.form-group-item .g-lang {
  padding: 10px 5px 10px;
  border: solid 1px #ccc;
  position: relative;
  margin-top: 20px;
  margin-bottom: 30px;
}

.form-group-item .g-lang:last-child {
  margin-bottom: 0;
}

.form-group-item .g-lang .title-lang {
  font-size: 13px;
  position: absolute;
  top: -20px;
  background: #ccc;
  padding: 0px 20px;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  left: -1px;
}
        </style>
    </head>
    <!-- END HEAD -->
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
