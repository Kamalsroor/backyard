@php
    use Illuminate\Support\Str;

@endphp
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
{{-- <html lang="{{app('l')}}" dir="{{app('dir')}}"> --}}
  <html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>@if(!empty(setting()->sitename_en)){{setting()->sitename_en}}||@endif{{!empty($title)?$title:trans('admin.dashboard')}}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />



        <link rel="stylesheet" href="{{url('frontend')}}/css/vendor/all.min.css">
        <link rel="stylesheet" href="{{url('frontend')}}/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('frontend')}}/css/vendor/owl.carousel.min.css">
        <link rel="stylesheet" href="{{url('frontend')}}/css/style-ltr.css">


        @if(!empty(setting()->icon))
        <link rel="shortcut icon" href="{{ it()->url(setting()->icon) }}" />
        @endif

        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- END CORE PLUGINS -->
      <style>
          .error{
              display: none;
          }
      </style>
    </head>
    <!-- END HEAD -->
    <body >
      
