

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo e(__('Permalink')); ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item"><?php echo e(__('Permalink')); ?></li>
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
                        <h3 class="card-title"><?php echo e(__('Update Permalink')); ?> </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="<?php echo e(route('admin.permalinks.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </svg>
                                        <div class="ml-3">
                                            You can change the main slug. You can't translate slug for every language. Slug will change only for Frontend.
                                        </div>
                                      </div>
                                </div>
                            </div>
                       
                            <div class="row">
                               
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label  class="d-block control-label">Page Name : About</label>
                                            <div class="d-block">
                                                <input class="form-control" name="about_slug" value="<?php echo e($permalink->about_slug); ?>">
                                                <span class="text-info mt-1 d-block">Full Path : <?php echo e(url('/')); ?>/<?php echo e($permalink->about_slug); ?></span>
                                                <?php if($errors->has('about_slug')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('about_slug')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label  class="d-block control-label">Page Name : Service</label>
                                            <div class="d-block">
                                                <input class="form-control" name="service_slug" value="<?php echo e($permalink->service_slug); ?>">
                                                <span class="text-info mt-1 d-block">Full Path : <?php echo e(url('/')); ?>/<?php echo e($permalink->service_slug); ?></span>
                                                <?php if($errors->has('service_slug')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('service_slug')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label  class="d-block control-label">Page Name : Portfolio</label>
                                            <div class="d-block">
                                                <input class="form-control" name="portfolio_slug" value="<?php echo e($permalink->portfolio_slug); ?>">
                                                <span class="text-info mt-1 d-block">Full Path : <?php echo e(url('/')); ?>/<?php echo e($permalink->portfolio_slug); ?></span>
                                                <?php if($errors->has('portfolio_slug')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('portfolio_slug')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label  class="d-block control-label">Page Name : Package</label>
                                            <div class="d-block">
                                                <input class="form-control" name="package_slug" value="<?php echo e($permalink->package_slug); ?>">
                                                <span class="text-info mt-1 d-block">Full Path : <?php echo e(url('/')); ?>/<?php echo e($permalink->package_slug); ?></span>
                                                <?php if($errors->has('package_slug')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('package_slug')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label  class="d-block control-label">Page Name : Team</label>
                                            <div class="d-block">
                                                <input class="form-control" name="team_slug" value="<?php echo e($permalink->team_slug); ?>">
                                                <span class="text-info mt-1 d-block">Full Path : <?php echo e(url('/')); ?>/<?php echo e($permalink->team_slug); ?></span>
                                                <?php if($errors->has('team_slug')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('team_slug')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label  class="d-block control-label">Page Name : FAQ</label>
                                            <div class="d-block">
                                                <input class="form-control" name="faq_slug" value="<?php echo e($permalink->faq_slug); ?>">
                                                <span class="text-info mt-1 d-block">Full Path : <?php echo e(url('/')); ?>/<?php echo e($permalink->faq_slug); ?></span>
                                                <?php if($errors->has('faq_slug')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('faq_slug')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label  class="d-block control-label">Page Name : Gallery</label>
                                            <div class="d-block">
                                                <input class="form-control" name="gallery_slug" value="<?php echo e($permalink->gallery_slug); ?>">
                                                <span class="text-info mt-1 d-block">Full Path : <?php echo e(url('/')); ?>/<?php echo e($permalink->gallery_slug); ?></span>
                                                <?php if($errors->has('gallery_slug')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('gallery_slug')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label  class="d-block control-label">Page Name : Career</label>
                                            <div class="d-block">
                                                <input class="form-control" name="career_slug" value="<?php echo e($permalink->career_slug); ?>">
                                                <span class="text-info mt-1 d-block">Full Path : <?php echo e(url('/')); ?>/<?php echo e($permalink->career_slug); ?></span>
                                                <?php if($errors->has('career_slug')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('career_slug')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label  class="d-block control-label">Page Name : Blog</label>
                                            <div class="d-block">
                                                <input class="form-control" name="blog_slug" value="<?php echo e($permalink->blog_slug); ?>">
                                                <span class="text-info mt-1 d-block">Full Path : <?php echo e(url('/')); ?>/<?php echo e($permalink->blog_slug); ?></span>
                                                <?php if($errors->has('blog_slug')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('blog_slug')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label  class="d-block control-label">Page Name : Product</label>
                                            <div class="d-block">
                                                <input class="form-control" name="product_slug" value="<?php echo e($permalink->product_slug); ?>">
                                                <span class="text-info mt-1 d-block">Full Path : <?php echo e(url('/')); ?>/<?php echo e($permalink->product_slug); ?></span>
                                                <?php if($errors->has('product_slug')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('product_slug')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label  class="d-block control-label">Page Name : Contact</label>
                                            <div class="d-block">
                                                <input class="form-control" name="contact_slug" value="<?php echo e($permalink->contact_slug); ?>">
                                                <span class="text-info mt-1 d-block">Full Path : <?php echo e(url('/')); ?>/<?php echo e($permalink->contact_slug); ?></span>
                                                <?php if($errors->has('contact_slug')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('contact_slug')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label  class="d-block control-label">Page Name : Gete A Quote</label>
                                            <div class="d-block">
                                                <input class="form-control" name="quote_slug" value="<?php echo e($permalink->quote_slug); ?>">
                                                <span class="text-info mt-1 d-block">Full Path : <?php echo e(url('/')); ?>/<?php echo e($permalink->quote_slug); ?></span>
                                                <?php if($errors->has('quote_slug')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('quote_slug')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label  class="d-block control-label">Page Name : Cart</label>
                                            <div class="d-block">
                                                <input class="form-control" name="cart_slug" value="<?php echo e($permalink->cart_slug); ?>">
                                                <span class="text-info mt-1 d-block">Full Path : <?php echo e(url('/')); ?>/<?php echo e($permalink->cart_slug); ?></span>
                                                <?php if($errors->has('cart_slug')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('cart_slug')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label  class="d-block control-label">Page Name : Checkout</label>
                                            <div class="d-block">
                                                <input class="form-control" name="checkout_slug" value="<?php echo e($permalink->checkout_slug); ?>">
                                                <span class="text-info mt-1 d-block">Full Path : <?php echo e(url('/')); ?>/<?php echo e($permalink->checkout_slug); ?></span>
                                                <?php if($errors->has('checkout_slug')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('checkout_slug')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-12">
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/admin/settings/permalink.blade.php ENDPATH**/ ?>