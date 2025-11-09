<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @includeif('admin.partials.styles')
</head>

  
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 pt-5">
                        <div class="card card-primary card-outline">
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if(Session::has('success'))
                                <p class="alert alert-info">{{ Session::get('success') }}</p>
                                @endif
                                <form class="form-horizontal" action="{{ route('front.slider.overlay.submit') }}" method="POST" >
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <textarea name="slider_overlay" class="form-control summernote" id="ck" rows="6" placeholder="{{ __('Content') }}">{{ $commonsetting->slider_overlay }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                        </div>
                                        <div class="col-sm-12 mt-4">
                                        <a href="{{ route('front.cache.clear') }}" class="btn btn-info">
                                            {{ __('Clear Cache') }}
                                        </a>
                                    </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    
    </section>
    
  </div>

</div>

<!-- jQuery 3 -->
<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Overlay Scrollbars js -->
<script src="{{ asset('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- Sweetalert2 js -->
<script src="{{ asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Bootstrap Colorpicker js -->
<script src="{{ asset('assets/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Moment js -->
<script src="{{ asset('assets/admin/plugins/moment/moment.min.js') }}"></script>
<!-- Bootstrap Tagsinput js -->
<script src="{{ asset('assets/admin/plugins/bootstrap-taginput/bootstrap-tagsinput.min.js') }}"></script>
<!-- Bs-custom-file-input js -->
<script src="{{ asset('assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-menu-editor.js') }}"></script>
<!-- Bootstrap-datepicker js -->
<script src="{{ asset('assets/admin/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap-Iconpicker js -->
<script src="{{ asset('assets/admin/plugins/bootstrap-iconpicker/bootstrap-iconpicker.bundle.min.js') }}"></script>
<!-- Bootstrap-Switch js -->
<script src="{{ asset('assets/admin/plugins/bootstrap-switch/bootstrap-switch.min.js') }}"></script>
<!-- Select2 js -->
<script src="{{ asset('assets/admin/plugins/select2/select2.full.min.js') }}"></script>
<!-- Summernote js -->
<script src="{{ asset('assets/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- DataTable js -->
<script src="{{ asset('assets/admin/plugins/data-table/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/data-table/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/data-table/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/data-table/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/data-table/buttons.bootstrap4.min.js') }}"></script>



<!-- AdminLTE App -->

<!-- Custom js -->
<script src="{{ asset('assets/admin/js/custom.js') }}"></script>
<script src="{{ asset('assets/admin/js/custom2.js') }}"></script>




</body>
</html>



