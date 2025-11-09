

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('User Role')); ?> </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('User Role')); ?></li>
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
                        <h3 class="card-title mt-1"><?php echo e(__('User List')); ?></h3>
                        <div class="card-tools d-flex">
                            <a href="<?php echo e(route('admin.user.add')); ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> <?php echo e(__('Add User & Role')); ?>

                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-striped table-bordered data_table">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Picture</th>
                              <th scope="col">Name</th>
                              <th scope="col">Username</th>
                              <th scope="col">Email</th>
                              <th scope="col">Role</th>
                              <th scope="col">Status</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($user->id != Auth::guard('admin')->user()->id): ?>
                                <tr>
                                  <td><?php echo e($loop->iteration); ?></td>
                                  <td>
                                    <img class="w-80" src="<?php echo e(asset('assets/admin/img/admin-user/'.$user->image)); ?>" alt="" >
                                  </td>
                                  <td><?php echo e($user->name); ?></td>
                                  <td><?php echo e($user->username); ?></td>
                                  <td><?php echo e($user->email); ?></td>
                                  <td>

                                    <?php if(empty($user->role)): ?>
                                      <span class="badge badge-danger">Owner</span>
                                    <?php else: ?>
                                      <?php echo e($user->role->name); ?>

                                    <?php endif; ?>
                                  </td>
                                  <td>
                                    <?php if($user->status == 1): ?>
                                      <span class="badge badge-success">Active</span>
                                    <?php elseif($user->status == 0): ?>
                                      <span class="badge badge-warning">Deactive</span>
                                    <?php endif; ?>
                                  </td>
                                  <td>
                                    <a class="btn btn-primary btn-sm" href="<?php echo e(route('admin.user.edit', $user->id)); ?>">
                                      <span class="btn-label">
                                        <i class="fas fa-edit"></i>
                                      </span>
                                      Edit
                                    </a>
                                    <form id="deleteform" class="deleteform d-inline-block" action="<?php echo e(route('admin.user.delete', $user->id)); ?>" method="post">
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
                              <?php endif; ?>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/admin/user/index.blade.php ENDPATH**/ ?>