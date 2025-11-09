


<?php $__env->startSection('content'); ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo e(__('Languages')); ?></h1>
                <?php echo $__env->yieldPushContent('breadcrumb-plugins'); ?>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
                <li class="breadcrumb-item"><?php echo e(__('Languages')); ?></li>
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
                            <h3 class="card-title mt-1"><?php echo e(__('Languages List')); ?></h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-sm box--shadow1 text-white text--small" data-toggle="modal" data-target="#myModal" ><i class="la la-plus"></i><?php echo app('translator')->get('Add New
                                    Language'); ?></a>
                                
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped data_table">
                                <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('Name'); ?></th>
                                    <th><?php echo app('translator')->get('Code'); ?></th>
                                    <th><?php echo app('translator')->get('Direction'); ?></th>
                                    <th><?php echo app('translator')->get('Default'); ?></th>
                                    <th><?php echo app('translator')->get('Actions'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    
                                    <tr>
                                        <td data-label="<?php echo app('translator')->get('Name'); ?>">
                                            <div class="user">
    
                                                <span class="name"><?php echo e(__($item->name)); ?></span>
                                            </div>
                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Code'); ?>"><strong><?php echo e(__($item->code)); ?></strong></td>
                                        <td ><strong class="text-uppercase"><?php echo e(__($item->direction)); ?></strong></td>
                                        <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                            <?php if($item->is_default == 1): ?>
                                                <span class=" badge  badge-success"><?php echo app('translator')->get('Default'); ?></span>
                                            <?php else: ?>
                                                <span class="badge  badge-warning"><?php echo app('translator')->get('Selectable'); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                                <a href="<?php echo e(route('admin.language-key', $item->id)); ?>" class="icon-btn btn--success btn btn-success btn-sm">
                                                    <i class="fas fa-code"></i>Translate
                                                </a>
    
                                                <a href="javascript:void(0)" class="icon-btn ml-1 editBtn btn btn-primary btn-sm"  data-url="<?php echo e(route('admin.language-manage-update', $item->id)); ?>" data-lang="<?php echo e(json_encode($item->only('name', 'text_align', 'is_default', 'direction'))); ?>" data-icon="">
                                                    <i class="fas fa-edit"></i>Edit
                                                </a>
    
    
                                            <?php if($item->id != 1): ?>
                                                <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 deleteBtn btn btn-danger btn-sm"   data-url="<?php echo e(route('admin.language-manage-del', $item->id)); ?>" data-toggle="modal" data-target="#deleteModal">
                                                    <i class="fas fa-trash"></i>Delete
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%"><?php echo e(__($empty_message)); ?></td>
                                    </tr>
                                <?php endif; ?>
    
                                </tbody>
                            </table><!-- table end -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>

        
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('Add New Language'); ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo e(route('admin.language-manage-store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
    
                    
    
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="font-weight-bold "><?php echo app('translator')->get('Name'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control has-error bold " id="code" name="name" placeholder="<?php echo app('translator')->get('e.g. Japaneese, Portuguese'); ?>" required>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="font-weight-bold"><?php echo app('translator')->get('Code'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control has-error bold " id="link" name="code" placeholder="<?php echo app('translator')->get('e.g. jp, pt-br'); ?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-sm-4 control-label">Direction<span class="text-danger">*</span></label>

                                <div class="col-sm-8">
                                    <select class="form-control" name="direction">
                                        <option value="ltr">LTR</option>
                                        <option value="rtl">RTL</option>
                                    </select>
                                </div>
                            </div>
    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                            <button type="submit" class="btn btn-primary" id="btn-save" value="add"><?php echo app('translator')->get('Save'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
        
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('Edit Language'); ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="inputName" class="font-weight-bold"><?php echo app('translator')->get('Name'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control has-error bold " id="code" name="name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-sm-4 control-label">Direction<span class="text-danger">*</span></label>

                                <div class="col-sm-8">
                                    <select class="form-control direction_update" name="direction">
                                            
                                    </select>
                                </div>
                            </div>
    
                            <div class="form-row form-group">
                                <div class="col-md-4">
                                    <label class="font-weight-bold"><?php echo app('translator')->get('Default Language'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <label class="switch">
                                        <input type="checkbox" name="default">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
    
                            </div>
    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                            <button type="submit" class="btn btn-primary" id="btn-save" value="add"><?php echo app('translator')->get('Update'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('Confirmation Alert'); ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form method="post" action="" >
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('delete')); ?>

                        <input type="hidden" name="delete_id" id="delete_id" class="delete_id" value="0">
                        <div class="modal-body">
                            <p class="text-muted"><?php echo app('translator')->get('Are you sure to Delete ?'); ?></p>
                        </div>
    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal"><?php echo app('translator')->get('No'); ?></button>
                            <button type="submit" class="btn btn-danger deleteButton"><?php echo app('translator')->get('Yes'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        "use strict";
        (function($){

         

            $('.editBtn').on('click', function () {
                var modal = $('#editModal');
                var url = $(this).data('url');
                var lang = $(this).data('lang');

                modal.find('form').attr('action', url);
                modal.find('input[name=name]').val(lang.name);

                modal.find('select[name=text_align]').val(lang.text_align);

                if (lang.is_default == 1) {
                    modal.find('input[name=default]').attr('checked', 'checked');
                } else {
                    modal.find('input[name=default]').removeAttr('checked');
                }

                if (lang.direction == 'rtl') {
                    $('.direction_update').html(`
                        <option value="rtl" selected>RTL</option>
                        <option value="ltr">LTR</option>
                    `);
                }else {
                    $('.direction_update').html(`
                        <option value="rtl" >RTL</option>
                        <option value="ltr" selected>LTR</option>
                    `);
                }

                modal.modal('show');
            });

            $('.deleteBtn').on('click', function () {
                var modal = $('#deleteModal');
                var url = $(this).data('url');

                console.log(url);

                modal.find('form').attr('action', url);
                modal.modal('show');
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/admin/language/index.blade.php ENDPATH**/ ?>