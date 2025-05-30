<?php $__env->startSection('content'); ?>
    <?php
        if (Auth::user()->type == 4) {
            $vendor_id = Auth::user()->vendor_id;
        } else {
            $vendor_id = Auth::user()->id;
        }
        $i = 1;
    ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.theme_images')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-end">
                <a href="<?php echo e(URL::to('admin/themes/add')); ?>" class="btn btn-secondary px-4 rounded-start-5 rounded-end-5">
                    <i class="fa-regular fa-plus mx-1"></i><?php echo e(trans('labels.add')); ?>

                </a>
            </div>
        </div>
    </div>

    <div class="row mt-3">

        <div class="col-12">

            <div class="card border-0 mb-3">

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered py-3 zero-configuration w-100 dataTable no-footer">

                            <thead>

                                <tr class="text-capitalize fw-500 fs-15">

                                    <td></td>

                                    <td><?php echo e(trans('labels.srno')); ?></td>

                                    <td><?php echo e(trans('labels.image')); ?></td>

                                    <td><?php echo e(trans('labels.name')); ?></td>

                                    <td><?php echo e(trans('labels.created_date')); ?></td>

                                    <td><?php echo e(trans('labels.updated_date')); ?></td>

                                    <td><?php echo e(trans('labels.action')); ?></td>



                                </tr>

                            </thead>

                            <tbody id="tabledetails" data-url="<?php echo e(url('admin/themes/reorder_theme')); ?>">

                                <?php

                                    $i = 1;

                                ?>

                                <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="fs-7 row1 align-middle" id="dataid<?php echo e($theme->id); ?>"
                                        data-id="<?php echo e($theme->id); ?>">

                                        <td><a tooltip="<?php echo e(trans('labels.move')); ?>"><i
                                                    class="fa-light fa-up-down-left-right mx-2"></i></a></td>

                                        <td>

                                            <?php

                                                echo $i++;

                                            ?></td>

                                        <td> <img src="<?php echo e(helper::image_path($theme->image)); ?>"
                                                class="img-fluid rounded hw-50 object-fit-cover" alt=""></td>

                                        <td><?php echo e($theme->name); ?></td>

                                        <td><?php echo e(helper::date_format($theme->created_at, $vendor_id)); ?><br>
                                            <?php echo e(helper::time_format($theme->created_at, $vendor_id)); ?>

                                        </td>

                                        <td><?php echo e(helper::date_format($theme->updated_at, $vendor_id)); ?><br>
                                            <?php echo e(helper::time_format($theme->updated_at, $vendor_id)); ?>

                                        </td>

                                        <td>
                                            <div class="d-flex flex-wrap gap-1">

                                                <a href="<?php echo e(URL::to('/admin/themes/edit-' . $theme->id)); ?>"
                                                    class="btn btn-info hov btn-sm" tooltip="<?php echo e(trans('labels.edit')); ?>">
                                                    <i class="fa-regular fa-pen-to-square"></i></a>

                                                <a href="javascript:void(0)" tooltip="<?php echo e(trans('labels.delete')); ?>"
                                                    <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/themes/delete-' . $theme->id)); ?>')" <?php endif; ?>
                                                    class="btn btn-danger hov btn-sm">

                                                    <i class="fa-regular fa-trash"></i></a>
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

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/theme/index.blade.php ENDPATH**/ ?>