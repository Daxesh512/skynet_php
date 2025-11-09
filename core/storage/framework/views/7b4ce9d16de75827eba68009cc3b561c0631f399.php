

<?php $__env->startSection('content'); ?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?php echo e(__('User Role')); ?> </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i
                class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
          <li class="breadcrumb-item"><?php echo e(__('User Role')); ?></li>
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
            <h3 class="card-title mt-1"><?php echo e(__('Add User & Role')); ?></h3>
            <div class="card-tools">
              <a href="<?php echo e(route('admin.user.index')); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-angle-double-left"></i> <?php echo e(__('Back')); ?>

              </a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <div class="row justify-content-center">
                  <div class="col-lg-8">
                    <form  class="" action="<?php echo e(route('admin.user.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label class="col-sm-12 control-label"><?php echo e(__('Image')); ?> <span class="text-danger">*</span></label>
        
                            <div class="col-sm-12">
                                <img class="mw-400 mb-3 show-img img-demo" src="<?php echo e(asset('assets/admin/img/img-demo.jpg')); ?>" alt="">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="image"><?php echo e(__('Choose Image')); ?></label>
                                    <input type="file" class="custom-file-input up-img" name="image" id="image">
                                </div>
                                <p class="help-block text-info"><?php echo e(__('Upload 70X70 (Pixel) Size image for best quality.
                                    Only jpg, jpeg, png image is allowed.')); ?>

                                </p>
                                <?php if($errors->has('image')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('image')); ?> </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label for="">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo e(old('name')); ?>">
                                <?php if($errors->has('name')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('name')); ?> </p>
                                <?php endif; ?>
                              </div>
                            </div>
                          </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label for="">Username <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="username" placeholder="Enter username" value="<?php echo e(old('username')); ?>">
                              <?php if($errors->has('username')): ?>
                                  <p class="text-danger"> <?php echo e($errors->first('username')); ?> </p>
                              <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label for="">Email <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="email" placeholder="Enter email" value="<?php echo e(old('email')); ?>">
                              <?php if($errors->has('email')): ?>
                                  <p class="text-danger"> <?php echo e($errors->first('email')); ?> </p>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
              
                       
              
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label for="">Password <span class="text-danger">*</span></label>
                              <input type="password" class="form-control" name="password" placeholder="Enter password" value="<?php echo e(old('password')); ?>">
                              <?php if($errors->has('password')): ?>
                                  <p class="text-danger"> <?php echo e($errors->first('password')); ?> </p>
                              <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label for="">Re-type Password <span class="text-danger">*</span></label>
                              <input type="password" class="form-control" name="password_confirmation" placeholder="Enter your password again" value="<?php echo e(old('password_confirmation')); ?>">
                              <?php if($errors->has('password_confirmation')): ?>
                                  <p class="text-danger"> <?php echo e($errors->first('password_confirmation')); ?> </p>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
              
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label for="">Role <span class="text-danger">*</span></label>
                                <select class="form-control" name="role">
                                    <option value="" selected="" disabled="">Select a Role</option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select> 
                                <?php if($errors->has('role')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('role')); ?> </p>
                                <?php endif; ?>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-12 control-label"><?php echo e(__('Status')); ?><span
                                class="text-danger">*</span></label>
        
                            <div class="col-sm-12">
                              <select class="form-control" name="status">
                                <option value="0"><?php echo e(__('Deactive')); ?></option>
                                <option value="1"><?php echo e(__('Active')); ?></option>
                              </select>
                              <?php if($errors->has('status')): ?>
                              <p class="text-danger"> <?php echo e($errors->first('status')); ?> </p>
                              <?php endif; ?>
                            </div>
                          </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                            </div>
                        </div>
              
                      </form>
                  </div>
              </div>
              

          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/admin/user/add.blade.php ENDPATH**/ ?>