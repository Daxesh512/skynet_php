

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('Role')); ?> </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('Role')); ?></li>
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
                        <h3 class="card-title mt-1"><?php echo e(__('Add Role Permissions')); ?></h3>
                        <div class="card-tools d-flex">
                            <a href="<?php echo e(route('admin.role.index')); ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-angle-double-left"></i> <?php echo e(__('Back')); ?>

                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="<?php echo e(route('admin.role.permissions.update', $role->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php
                            $permissions = $role->permissions;
                            if (!empty($role->permissions)) {
                              $permissions = json_decode($permissions, true);
                              // dd($permissions);
                            }
                          ?>
          
                            <div class="row">
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permissions[]" value="Website Customization" id="p1"  <?php if(is_array($permissions) && in_array('Website Customization', $permissions)): ?> checked <?php endif; ?>>
                                        <label for="p1">
                                            Website Customization
                                        </label>
                                      </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permissions[]" value="General Setting" id="p11"  <?php if(is_array($permissions) && in_array('General Setting', $permissions)): ?> checked <?php endif; ?>>
                                        <label for="p11">
                                            General Setting
                                        </label>
                                      </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permissions[]" value="Ecommerce" id="p111"  <?php if(is_array($permissions) && in_array('Ecommerce', $permissions)): ?> checked <?php endif; ?>>
                                        <label for="p111">
                                            Ecommerce
                                        </label>
                                      </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permissions[]" value="Home" id="p2"  <?php if(is_array($permissions) && in_array('Home', $permissions)): ?> checked <?php endif; ?>>
                                        <label for="p2">
                                            Home
                                        </label>
                                      </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permissions[]" value="Inner Page" id="p22"  <?php if(is_array($permissions) && in_array('Inner Page', $permissions)): ?> checked <?php endif; ?>>
                                        <label for="p22">
                                            Inner Page
                                        </label>
                                      </div>
                                </div>
                               
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permissions[]" value="Quote" id="p5"  <?php if(is_array($permissions) && in_array('Quote', $permissions)): ?> checked <?php endif; ?>>
                                        <label for="p5">
                                            Quote
                                        </label>
                                      </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permissions[]" value="Gallery" id="p6"  <?php if(is_array($permissions) && in_array('Gallery', $permissions)): ?> checked <?php endif; ?>>
                                        <label for="p6">
                                            Gallery
                                        </label>
                                      </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permissions[]" value="Job" id="p7"  <?php if(is_array($permissions) && in_array('Job', $permissions)): ?> checked <?php endif; ?>>
                                        <label for="p7">
                                            Job
                                        </label>
                                      </div>
                                </div>
                            
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permissions[]" value="Blog" id="p99"  <?php if(is_array($permissions) && in_array('Blog', $permissions)): ?> checked <?php endif; ?>>
                                        <label for="p99">
                                            Blog
                                        </label>
                                      </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permissions[]" value="Role Management" id="p90"  <?php if(is_array($permissions) && in_array('Role Management', $permissions)): ?> checked <?php endif; ?>>
                                        <label for="p90">
                                            Role Management
                                        </label>
                                      </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permissions[]" value="Subscribers" id="p10"  <?php if(is_array($permissions) && in_array('Subscribers', $permissions)): ?> checked <?php endif; ?>>
                                        <label for="p10">
                                            Subscribers
                                        </label>
                                      </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permissions[]" value="Users Management" id="p112"  <?php if(is_array($permissions) && in_array('Users Management', $permissions)): ?> checked <?php endif; ?>>
                                        <label for="p112">
                                            Users Management
                                        </label>
                                      </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permissions[]" value="Dynamic Page" id="p12"  <?php if(is_array($permissions) && in_array('Dynamic Page', $permissions)): ?> checked <?php endif; ?>>
                                        <label for="p12">
                                            Dynamic Page
                                        </label>
                                      </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permissions[]" value="Language" id="p13"  <?php if(is_array($permissions) && in_array('Language', $permissions)): ?> checked <?php endif; ?>>
                                        <label for="p13">
                                            Language
                                        </label>
                                      </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permissions[]" value="Clear Cache" id="p14"  <?php if(is_array($permissions) && in_array('Clear Cache', $permissions)): ?> checked <?php endif; ?>>
                                        <label for="p14">
                                            Clear Cache
                                        </label>
                                      </div>
                                </div>
                            </div>
                            <div class="form-group row mt-5">
                                <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/admin/role/permission.blade.php ENDPATH**/ ?>