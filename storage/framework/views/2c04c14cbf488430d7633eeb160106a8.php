 
 <?php $__env->startSection('content'); ?>
     <!-- breadcrumb start -->
     <section class="breadcrumb-sec">
         <div class="container">
             <nav class="px-3">
                 <ol class="breadcrumb d-flex m-0 text-capitalize">
                     <li class="breadcrumb-item">
                         <a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="text-dark">
                             <?php echo e(trans('labels.home')); ?>

                         </a>
                     </li>
                     <li
                         class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left'); ?>">
                         <?php echo e(trans('labels.change_password')); ?>

                     </li>
                 </ol>
             </nav>
         </div>
     </section>
     <!-- breadcrumb end -->
     <!-- Change Password section end -->
     <section class="bg-light mt-0 py-sm-5 py-4">
         <div class="container">
             <div class="row gx-sm-3 gx-0">
                 <?php echo $__env->make('front.theme.user_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                 <div class="col-md-12 col-lg-9">
                     <div class="card rounded">
                         <div class="card-body py-4">
                             <h2 class="page-title mb-2 px-sm-2"><?php echo e(trans('labels.change_password')); ?></h2>
                             <p class="page-subtitle px-sm-2 mb-4 line-limit-2"><?php echo e(trans('labels.change_password_desc')); ?>

                             </p>
                             <form action="<?php echo e(URL::to($storeinfo->slug . '/change_password/')); ?>" method="POST">
                                 <?php echo csrf_field(); ?>
                                 <div class="row gx-sm-3 gx-0">
                                     <div class="col-md-12 mb-4">
                                         <label for="Name" class="form-label"><?php echo e(trans('labels.current_password')); ?>

                                             <span class="text-danger"> * </span></label>
                                         <input type="password" class="form-control input-h" name="current_password"
                                             id="validationDefault" value=""
                                             placeholder="<?php echo e(trans('labels.current_password')); ?> " required>
                                         <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                             <span class="text-danger"><?php echo e($message); ?></span>
                                         <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                     </div>
                                     <div class="col-md-12 mb-4">
                                         <label for="Name" class="form-label"><?php echo e(trans('labels.new_password')); ?><span
                                                 class="text-danger"> * </span></label>
                                         <input type="password" class="form-control input-h" name="new_password"
                                             id="validationDefault" value=""
                                             placeholder="<?php echo e(trans('labels.new_password')); ?>" required>
                                         <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                             <span class="text-danger"><?php echo e($message); ?></span>
                                         <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                     </div>
                                     <div class="col-md-12 mb-4">
                                         <label for="Name"
                                             class="form-label"><?php echo e(trans('labels.confirm_password')); ?><span
                                                 class="text-danger"> * </span></label>
                                         <input type="password" class="form-control input-h" name="confirm_password"
                                             id="validationDefault" value=""
                                             placeholder="<?php echo e(trans('labels.confirm_password')); ?>" required>
                                         <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                             <span class="text-danger"><?php echo e($message); ?></span>
                                         <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                     </div>
                                     <div class="col-md-12 d-flex justify-content-end">
                                         <button type="submit"
                                             class="btn-primary btn fs-15 fw-500 rounded px-sm-4 px-3 py-2"><?php echo e(trans('labels.save')); ?></button>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- Change Password section end -->

     <?php echo $__env->make('front.sum_qusction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/change-password.blade.php ENDPATH**/ ?>