

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
                        <h3 class="card-title mt-1"><?php echo e(__('Role List')); ?></h3>
                        <div class="card-tools d-flex">
                            <a href="<?php echo e(route('admin.role.add'). '?language=' . $currentLang->code); ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> <?php echo e(__('Add')); ?>

                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-striped table-bordered data_table">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Permissions</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($role->name); ?></td>
                                <td>
                                  <a class="btn btn-info btn-sm" href="<?php echo e(route('admin.role.permissions.manage', $role->id)); ?>">
                                    <span class="btn-label">
                                      <i class="fas fa-edit"></i>
                                    </span>
                                    Manage
                                  </a>
                                </td>
                                <td>
                                  <a class="btn btn-primary btn-sm editbtn" href="<?php echo e(route('admin.role.edit', $role->id)); ?>">
                                    <span class="btn-label">
                                      <i class="fas fa-edit"></i>
                                    </span>
                                    Edit
                                  </a>
                                  <form id="deleteform" class="deleteform d-inline-block" action="<?php echo e(route('admin.role.delete', $role->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-danger btn-sm deletebtn" id="delete">
                                      <span class="btn-label">
                                        <i class="fas fa-trash"></i>
                                      </span>
                                      Delete
                                    </button>
                                  </form>
                                </td>
                              </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/admin/role/index.blade.php ENDPATH**/ ?>