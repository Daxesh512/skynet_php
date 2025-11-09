

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('Contact Page')); ?> </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('Contact Page')); ?></li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><?php echo e(__('Contact Info')); ?></h3>
                                <div class="card-tools">
                                    <div class="d-inline-block mr-4">
                                        <select class="form-control form-control-sm lang" id="languageSelect" data="<?php echo e(url()->current() . '?language='); ?>">
                                            <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($lang->code); ?>" <?php echo e($lang->code == request()->input('language') ? 'selected' : ''); ?> ><?php echo e($lang->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo e(route('admin.contact_page_update', $contact_setting->language_id)); ?>" method="POST" >
                                    <?php echo csrf_field(); ?>
                                   

                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label"><?php echo e(__('Phone Number')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  data-role="tagsinput" name="number" placeholder="<?php echo e(__('Phone Number')); ?>" value="<?php echo e($contact_setting->number); ?>">
                                            <p class="help-block text-info"><?php echo e(__('The first entered number will show in the header top menu & Service Page.')); ?>

                                            <?php if($errors->has('number')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('number')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label"><?php echo e(__('Email Address')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  data-role="tagsinput" name="email" placeholder="<?php echo e(__('Email Address')); ?>" value="<?php echo e($contact_setting->email); ?>">
                                            <p class="help-block text-info"><?php echo e(__('The first entered email will show in the header top menu.')); ?>

                                            <?php if($errors->has('email')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('email')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label"><?php echo e(__('WhatsApp Number')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="whatsapp" placeholder="<?php echo e(__('WhatsApp Number')); ?>" value="<?php echo e($contact_setting->whatsapp); ?>">
                                            <?php if($errors->has('whatsapp')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('whatsapp')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label"><?php echo e(__('Office Location')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="address" placeholder="<?php echo e(__('Office Location')); ?>" value="<?php echo e($contact_setting->address); ?>">
                                            <?php if($errors->has('address')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('address')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label"><?php echo e(__('Opening Hours')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="opening_hours" placeholder="<?php echo e(__('Opening Hours')); ?>" value="<?php echo e($contact_setting->opening_hours); ?>">
                                            <?php if($errors->has('opening_hours')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('opening_hours')); ?> </p>
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
                            <!-- /.card-body -->
                        </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/admin/contact/index.blade.php ENDPATH**/ ?>