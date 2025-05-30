<?php $__env->startSection('content'); ?>
    <!-- breadcrumb start -->

    <section class="breadcrumb-sec">
        <div class="container">
            <nav class="px-3">
                <ol class="breadcrumb d-flex m-0 text-capitalize">
                    <li class="breadcrumb-item"><a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>"
                            class="text-dark"><?php echo e(trans('labels.home')); ?></a></li>

                    <li
                        class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left'); ?>">
                        <?php echo e(trans('labels.settings')); ?>

                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- breadcrumb end -->

    <!-- Setting section end -->

    <section class="bg-light py-sm-5 py-4">

        <div class="container">

            <div class="row gx-sm-3 gx-2">

                <?php echo $__env->make('front.theme.user_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="col-lg-9 col-md-12">

                    <div class="card rounded">

                        <div class="card-body py-4">

                            <h2 class="page-title mb-2 px-sm-2"><?php echo e(trans('labels.profile')); ?></h2>

                            <p class="page-subtitle px-sm-2 mb-4 line-limit-2"><?php echo e(trans('labels.profile_desc')); ?></p>

                            <form action="<?php echo e(URL::to($storeinfo->slug . '/updateprofile/')); ?>" method="POST"
                                enctype="multipart/form-data">

                                <?php echo csrf_field(); ?>

                                <div class="row gx-sm-3 gx-0">

                                    <div class="col-md-6 mb-4">

                                        <input type="hidden" value="<?php echo e(Auth::user()->id); ?>" name="id">

                                        <label for="Name" class="form-label"><?php echo e(trans('labels.name')); ?> <span
                                                class="text-danger"> * </span></label>

                                        <input type="text" class="form-control input-h" id="validationDefault"
                                            name="name" value="<?php echo e(Auth::user()->name); ?>"
                                            placeholder="<?php echo e(trans('labels.name')); ?> " required>

                                    </div>

                                    <div class="col-md-6 mb-4">

                                        <label for="Name" class="form-label"><?php echo e(trans('labels.email')); ?><span
                                                class="text-danger"> * </span></label>

                                        <input type="email" class="form-control input-h" id="validationDefault"
                                            name="email" value="<?php echo e(Auth::user()->email); ?>"
                                            placeholder="<?php echo e(trans('labels.email')); ?>" required>

                                    </div>

                                    <div class="col-md-6 mb-4">

                                        <label for="Name" class="form-label"><?php echo e(trans('labels.mobile')); ?><span
                                                class="text-danger"> * </span></label>

                                        <input type="tel" class="form-control input-h" id="validationDefault"
                                            name="mobile" value="<?php echo e(Auth::user()->mobile); ?>"
                                            placeholder="<?php echo e(trans('labels.mobile')); ?>" required>

                                    </div>

                                    <div class="col-md-12 mb-4">

                                        <label for="Name" class="form-label"><?php echo e(trans('labels.image')); ?></label>

                                        <input class="form-control input-h" type="file" id="formFile" name="profile" />

                                        <?php $__errorArgs = ['profile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <img class="rounded-circle object-fit-cover mt-3"
                                            src="<?php echo e(helper::image_path(Auth::user()->image)); ?>" alt=""
                                            style="width:65px;">
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

    <!-- Setting section end -->

    <?php echo $__env->make('front.sum_qusction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/profile.blade.php ENDPATH**/ ?>