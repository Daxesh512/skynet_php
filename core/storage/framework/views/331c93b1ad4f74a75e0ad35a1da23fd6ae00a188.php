

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('Mail Subscribers')); ?> </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('Mail Subscribers')); ?></li>
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
                        <h3 class="card-title mt-1"><?php echo e(__('Send Mail')); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            <form class="" action="<?php echo e(route('admin.subscribers.sendmail')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="">Subject <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="subject" value="" placeholder="Enter subject of E-mail">
                                            <?php if($errors->has('subject')): ?>
                                              <p class="text-danger mb-0"><?php echo e($errors->first('subject')); ?></p>
                                            <?php endif; ?>
                                          </div>
                                          <div class="form-group">
                                            <label for="">Message <span class="text-danger">*</span></label>
                                            <textarea name="message" class="summernote" data-height="150"></textarea>
                                            <?php if($errors->has('message')): ?>
                                              <p class="text-danger mb-0"><?php echo e($errors->first('message')); ?></p>
                                            <?php endif; ?>
                                          </div>
                                          <button type="submit" class="btn btn-primary">
                                            Send Mail <i class="far fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </div>

                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/admin/newsletter/mail.blade.php ENDPATH**/ ?>