<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.add_new')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="col-12 mb-7">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <?php if(isset($id)): ?>
                    <form action="<?php echo e(URL::to('admin/clonevendor')); ?>" method="POST">
                        <input type="hidden" class="form-control" name="clone_vendor_id" value="<?php echo e(@$id); ?> "
                            required>
                    <?php else: ?>
                        <form action="<?php echo e(URL::to('admin/register_vendor')); ?>" method="POST">
                <?php endif; ?>
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="store" class="form-label"><?php echo e(trans('labels.store_categories')); ?><span
                                class="text-danger">
                                * </span></label>
                        <select name="store" class="form-select" required>
                            <option value=""><?php echo e(trans('labels.select')); ?></option>
                            <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($store->id); ?>" <?php echo e(old('store') == $store->id ? 'selected' : ''); ?>>
                                    <?php echo e($store->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="name" class="form-label"><?php echo e(trans('labels.name')); ?><span class="text-danger">
                                * </span></label>
                        <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>"
                            id="name" placeholder="<?php echo e(trans('labels.name')); ?>" required>
                        <?php $__errorArgs = ['name'];
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
                    <div class="form-group col-md-6">
                        <label for="email" class="form-label"><?php echo e(trans('labels.email')); ?><span class="text-danger">
                                * </span></label>
                        <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>"
                            id="email" placeholder="<?php echo e(trans('labels.email')); ?>" required>
                        <?php $__errorArgs = ['email'];
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
                    <div class="form-group col-md-6">
                        <label for="mobile" class="form-label"><?php echo e(trans('labels.mobile')); ?><span class="text-danger">
                                * </span></label>
                        <input type="number" class="form-control" name="mobile" value="<?php echo e(old('mobile')); ?>"
                            id="mobile" placeholder="<?php echo e(trans('labels.mobile')); ?>" required>
                        <?php $__errorArgs = ['mobile'];
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
                    <div class="form-group col-md-6">
                        <label for="password" class="form-label"><?php echo e(trans('labels.password')); ?><span class="text-danger"> *
                            </span></label>
                        <input type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>"
                            id="password" placeholder="<?php echo e(trans('labels.password')); ?>" required>
                        <?php $__errorArgs = ['password'];
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
                    <div class="form-group col-md-6">
                        <label for="city" class="form-label"><?php echo e(trans('labels.city')); ?><span class="text-danger"> *
                            </span></label>
                        <select name="city" class="form-select" id="city" required>
                            <option value=""><?php echo e(trans('labels.select')); ?></option>
                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="area" class="form-label"><?php echo e(trans('labels.area')); ?><span class="text-danger"> *
                            </span></label>
                        <select name="area" class="form-select" id="area" required>
                            <option value=""><?php echo e(trans('labels.select')); ?></option>
                        </select>

                    </div>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'unique_slug')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'unique_slug')->first()->activated == 1): ?>
                        <div class="form-group col-md-6">
                            <label for="basic-url" class="form-label"><?php echo e(trans('labels.personlized_link')); ?><span
                                    class="text-danger"> * </span></label>
                            <?php if(env('Environment') == 'sendbox'): ?>
                                <span class="badge badge bg-danger ms-2 mb-0"><?php echo e(trans('labels.addon')); ?></span>
                            <?php endif; ?>
                            <div class="input-group ">
                                <span
                                    class="input-group-text col-5 col-lg-auto overflow-x-auto <?php echo e(session()->get('direction') == 2 ? 'rounded-start-0 rounded-end-5' : 'rounded-start-5 rounded-end-0'); ?>"><?php echo e(URL::to('/')); ?>/</span>
                                <input type="text"
                                    class="form-control <?php echo e(session()->get('direction') == 2 ? 'rounded-end-0 rounded-start-5' : 'rounded-start-0 rounded-end-5'); ?>"
                                    id="slug" name="slug" value="<?php echo e(old('slug')); ?>" required>
                            </div>

                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group mt-2 m-0 d-flex gap-2 justify-content-end">

                    <a href="<?php echo e(URL::to('admin/users')); ?>"
                        class="btn btn-danger px-4 rounded-start-5 rounded-end-5"><?php echo e(trans('labels.cancel')); ?></a>

                    <button class="btn btn-secondary px-4 rounded-start-5 rounded-end-5"
                        <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?>

                    </button>

                </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        var areaurl = "<?php echo e(URL::to('admin/getarea')); ?>";
        var select = "<?php echo e(trans('labels.select')); ?>";
        var areaid = '0';
        $('#name').on('blur', function() {
            "use strict";
            $('#slug').val($('#name').val().split(" ").join("-").toLowerCase());
        });
    </script>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . '/admin-assets/js/user.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/user/add.blade.php ENDPATH**/ ?>