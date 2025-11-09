

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo e(__('Footer')); ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i
                                    class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item"><?php echo e(__('Footer')); ?></li>
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
                            <h3 class="card-title"><?php echo e(__('Footer Information')); ?> </h3>
                            <div class="card-tools">
                                <div class="d-inline-block">
                                    <select class="form-control lang" id="languageSelect"
                                        data="<?php echo e(url()->current() . '?language='); ?>">
                                        <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($lang->code); ?>"
                                                <?php echo e($lang->code == request()->input('language') ? 'selected' : ''); ?>>
                                                <?php echo e($lang->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="card-body">
                            <form class="form-horizontal"
                                action="<?php echo e(route('admin.footer.update', $footerinfo->language_id)); ?>" method="POST"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label"><?php echo e(__('Footer Logo')); ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <img class="mw-400 mb-3 show-img img-demo"
                                            src="<?php echo e(asset('assets/front/img/' . $footerinfo->footer_logo)); ?>" alt="">
                                        <div class="custom-file">
                                            <label class="custom-file-label"
                                                for="footer_logo"><?php echo e(__('Choose New Image')); ?></label>
                                            <input type="file" class="custom-file-input up-img" name="footer_logo"
                                                id="footer_logo">
                                        </div>
                                        <p class="help-block text-info">
                                            <?php echo e(__('Upload 1920X600 (Pixel) Size image or Squre size image for best quality.
                                                                                                    Only jpg, jpeg, png image is allowed.')); ?>

                                        </p>
                                        <?php if($errors->has('footer_logo')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('footer_logo')); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label"><?php echo e(__('Footer BG Image')); ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <img class="mw-400 mb-3 show-img img-demo"
                                            src="<?php echo e(asset('assets/front/img/' . $footerinfo->footer_bg_image)); ?>"
                                            alt="">
                                        <div class="custom-file">
                                            <label class="custom-file-label"
                                                for="footer_bg_image"><?php echo e(__('Choose New Image')); ?></label>
                                            <input type="file" class="custom-file-input up-img" name="footer_bg_image"
                                                id="footer_bg_image">
                                        </div>
                                        <p class="help-block text-info">
                                            <?php echo e(__('Upload 1920X600 (Pixel) Size image or Squre size image for best quality.
                                                                                                    Only jpg, jpeg, png image is allowed.')); ?>

                                        </p>
                                        <?php if($errors->has('footer_bg_image')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('footer_bg_image')); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 control-label"><?php echo e(__('Footer Text')); ?><span
                                            class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control textarea" name="footer_text" placeholder="<?php echo e(__('Footer Text')); ?>"><?php echo e($footerinfo->footer_text); ?></textarea>
                                        <?php if($errors->has('footer_text')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('footer_text')); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label"><?php echo e(__('Copyright Text')); ?><span
                                            class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control summernote" name="copyright_text"
                                            placeholder="<?php echo e(__('Copyright Text')); ?>"><?php echo e($footerinfo->copyright_text); ?></textarea>
                                        <?php if($errors->has('copyright_text')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('copyright_text')); ?> </p>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/admin/footer/index.blade.php ENDPATH**/ ?>