<?php $__env->startSection('content'); ?>
    <?php
        if (Auth::user()->type == 4) {
            $vendor_id = Auth::user()->vendor_id;
        } else {
            $vendor_id = Auth::user()->id;
        }
    ?>

    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.how_works')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <div class="row mt-3">

        <div class="col-12">

            <form action="<?php echo e(URL::to('admin/how_works/savecontent')); ?>" method="POST">

                <?php echo csrf_field(); ?>

                <div class="card border-0 mb-3 p-3">

                    <div class="row">

                        <div class="col-md-6 mb-lg-0">

                            <div class="form-group">

                                <label class="form-label"><?php echo e(trans('labels.title')); ?><span class="text-danger"> *

                                    </span></label>

                                <input type="text"
                                    class="form-control <?php echo e(session()->get('direction') == 2 ? 'input-group-rtl' : ''); ?>"
                                    name="title" placeholder="<?php echo e(trans('labels.title')); ?>"
                                    value="<?php echo e($content->work_title); ?>" required>

                                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>

                        </div>

                        <div class="col-md-6 mb-lg-0">

                            <div class="form-group">

                                <label class="form-label"><?php echo e(trans('labels.sub_title')); ?><span class="text-danger"> *

                                    </span></label>

                                <input type="text"
                                    class="form-control <?php echo e(session()->get('direction') == 2 ? 'input-group-rtl' : ''); ?>"
                                    name="subtitle" placeholder="<?php echo e(trans('labels.sub_title')); ?>"
                                    value="<?php echo e($content->work_subtitle); ?>" required>

                                <?php $__errorArgs = ['subtitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit"
                                class="btn btn-secondary px-4 rounded-start-5 rounded-end-5"><?php echo e(trans('labels.save')); ?></button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card border-0 mb-3">
                <div class="d-flex justify-content-end">
                    <a href="<?php echo e(URL::to('admin/how_works/add')); ?>"
                        class="btn btn-secondary px-4 mx-3 mt-3 rounded-start-5 rounded-end-5">
                        <i class="fa-regular fa-plus mx-1"></i><?php echo e(trans('labels.add')); ?>

                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered py-3 zero-configuration w-100 dataTable no-footer">
                            <thead>
                                <tr class="text-uppercase fw-500">
                                    <td></td>
                                    <td><?php echo e(trans('labels.srno')); ?></td>
                                    <td><?php echo e(trans('labels.title')); ?></td>
                                    <td><?php echo e(trans('labels.sub_title')); ?></td>
                                    <td><?php echo e(trans('labels.created_date')); ?></td>
                                    <td><?php echo e(trans('labels.updated_date')); ?></td>
                                    <td><?php echo e(trans('labels.action')); ?></td>
                                </tr>
                            </thead>
                            <tbody id="tabledetails" data-url="<?php echo e(url('admin/how_works/reorder_status')); ?>">
                                <?php
                                    $i = 1;
                                ?>
                                <?php $__currentLoopData = $allworkcontent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="fs-7 row1" id="dataid<?php echo e($content->id); ?>" data-id="<?php echo e($content->id); ?>">
                                        <td><a tooltip="<?php echo e(trans('labels.move')); ?>">
                                                <i class="fa-light fa-up-down-left-right mx-2"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <?php
                                                echo $i++;
                                            ?>
                                        </td>
                                        <td><?php echo e($content->title); ?></td>
                                        <td><?php echo e($content->sub_title); ?></td>
                                        <td><?php echo e(helper::date_format($content->created_at, $vendor_id)); ?><br>
                                            <?php echo e(helper::time_format($content->created_at, $vendor_id)); ?>

                                        </td>
                                        <td><?php echo e(helper::date_format($content->updated_at, $vendor_id)); ?><br>
                                            <?php echo e(helper::time_format($content->updated_at, $vendor_id)); ?>

                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="<?php echo e(URL::to('/admin/how_works/edit-' . $content->id)); ?>"
                                                    class="btn btn-info btn-sm btn-size"
                                                    tooltip="<?php echo e(trans('labels.edit')); ?>">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('/admin/how_works/delete-' . $content->id)); ?>')" <?php endif; ?>
                                                    class="btn btn-danger btn-sm btn-size"
                                                    tooltip="<?php echo e(trans('labels.delete')); ?>">
                                                    <i class="fa-regular fa-trash"></i>
                                                </a>
                                            </div>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/how_work/index.blade.php ENDPATH**/ ?>