

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo e(__('Admin Profile')); ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item"><?php echo e(__('Admin Profile')); ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e(__('Update Admin Profile')); ?> </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="<?php echo e(route('admin.updateProfile')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Image')); ?> <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <img class="w-100 mb-3 img-demo show-img" src="<?php echo e(asset('assets/admin/img/admin-user/'.$admin->image)); ?>" alt="">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="image"><?php echo e(__('Choose New Image')); ?></label>
                                        <input type="file" class="custom-file-input  up-img" name="image" id="image">
                                    </div>
                                    <p class="help-block text-info"><?php echo e(__('Upload 70X70 (Pixel) Size image for best quality. 
                                        Only jpg, jpeg, png image is allowed.')); ?>

                                    </p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Full Name')); ?> <span
                                    class="text-danger">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="<?php echo e($admin->name); ?>" placeholder="<?php echo e(__('Full Name')); ?>">
                                    <?php if($errors->has('name')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('name')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-2 control-label"><?php echo e(__('Username')); ?><span
                                    class="text-danger">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" value="<?php echo e($admin->username); ?>" placeholder="<?php echo e(__('Username')); ?>">
                                    <?php if($errors->has('username')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('username')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 control-label"><?php echo e(__('Email')); ?><span
                                    class="text-danger">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" value="<?php echo e($admin->email); ?>" placeholder="<?php echo e(__('Email')); ?>">
                                    <?php if($errors->has('email')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('email')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
    </div>


</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/admin/profile/editprofile.blade.php ENDPATH**/ ?>