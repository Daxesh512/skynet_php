<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/adminlte.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/custom.css')); ?>">

</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
            <img src="<?php echo e(asset('assets/front/img/')); ?>" alt="">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body text-center">
                <?php if(session()->has('alert')): ?>
                    <p class="text-danger"> <?php echo e(session('alert')); ?></p>
                <?php endif; ?>

                <p class="login-box-msg"><?php echo e(__('Login To Go Your Dashboard')); ?></p>

                <form action="<?php echo e(route('admin.auth')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" value=""
                            placeholder="<?php echo e(__('Username')); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" value=""
                            placeholder="<?php echo e(__('Password')); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block"><?php echo e(__('LOGIN')); ?></button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <!-- jQuery 3 -->
    <?php
        $mainbs = [];
        $mainbs['slider_overlay'] = $commonsetting->slider_overlay;
        $mainbs = json_encode($mainbs);
    ?>

    <script>
        var mainbs = <?php echo $mainbs; ?>;
    </script>
    <script src="<?php echo e(asset('assets/admin/js/jquery.min.js')); ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo e(asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('assets/admin/js/adminlte.min.js')); ?>"></script>

</body>

</html>
<?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/admin/login.blade.php ENDPATH**/ ?>