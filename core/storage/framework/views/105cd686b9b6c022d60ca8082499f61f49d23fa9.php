<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo e($setting->website_title); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo e(asset('assets/front/img/'.$setting->fav_icon)); ?>" type="image/png">
  <?php if ($__env->exists('admin.partials.styles')) echo $__env->make('admin.partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php if($currentLang->direction == 'rtl' ): ?>
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
  <?php endif; ?>
  
</head>

<body <?php echo e(Session::has('notification') ? 'data-notification' : ''); ?> <?php if(Session::has('notification')): ?> data-notification-message='<?php echo e(json_encode(Session::get('notification'))); ?> <?php endif; ?>' class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  
<div class="wrapper">

    <?php echo $__env->make('admin.partials.top-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->make('admin.partials.side-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php echo $__env->yieldContent('content'); ?>
  </div>
  <!-- /.content-wrapper -->

  <?php echo $__env->make('admin.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
<!-- ./wrapper -->
<input type="hidden" id="main_url" value="<?php echo e(route('front.index')); ?>">

<?php
$mainbs = [];
$mainbs['slider_overlay'] = $commonsetting->slider_overlay;
$mainbs = json_encode($mainbs);
?>

<script>
var mainbs = <?php echo $mainbs; ?>;
</script>
<?php if ($__env->exists('admin.partials.scripts')) echo $__env->make('admin.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/admin/layout.blade.php ENDPATH**/ ?>