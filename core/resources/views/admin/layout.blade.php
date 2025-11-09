<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $setting->website_title }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Favicon -->
	<link rel="shortcut icon" href="{{  asset('assets/front/img/'.$setting->fav_icon) }}" type="image/png">
  @includeif('admin.partials.styles')

  @if($currentLang->direction == 'rtl' )
    <style>
      .content-wrapper .form-group{
        direction: rtl;
        text-align: right
      }
      label{
        display: block;
        text-align: right
      }
      button[type=submit]{
        display: block;
        text-align: right
      }
      .custom-file-label::after{
        right: auto;
        left: 0px;
      }
      input[type=email],
      input[name=from_email]
      {
        direction: ltr;
        text-align: left
      }
      .cm-s-monokai.CodeMirror{
        direction: ltr;
        text-align: left
      }
      div.dataTables_wrapper div.dataTables_filter label{
        text-align: right
      }
    </style>
  @endif
  
</head>

<body {{ Session::has('notification') ? 'data-notification' : '' }} @if(Session::has('notification')) data-notification-message='{{ json_encode(Session::get('notification')) }} @endif' class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  
<div class="wrapper">

    @include('admin.partials.top-navbar')
    
    @include('admin.partials.side-navbar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      @yield('content')
  </div>
  <!-- /.content-wrapper -->

  @include('admin.partials.footer')

</div>
<!-- ./wrapper -->
<input type="hidden" id="main_url" value="{{ route('front.index') }}">

@php
$mainbs = [];
$mainbs['slider_overlay'] = $commonsetting->slider_overlay;
$mainbs = json_encode($mainbs);
@endphp

<script>
var mainbs = {!! $mainbs !!};
</script>
@includeif('admin.partials.scripts')

</body>
</html>
