<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.features')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-end">
                <a href="<?php echo e(URL::to('admin/features/add')); ?>" class="btn btn-secondary px-4 rounded-start-5 rounded-end-5">
                    <i class="fa-regular fa-plus mx-1"></i><?php echo e(trans('labels.add')); ?>

                </a>
            </div>
        </div>
    </div>

    <div class="col-12 mb-7">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <div class="table-responsive" id="table-display">
                    <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                        <thead>
                            <tr class=" fw-500">
                                <td></td>
                                <td><?php echo e(trans('labels.srno')); ?></td>
                                <td><?php echo e(trans('labels.image')); ?></td>
                                <td><?php echo e(trans('labels.title')); ?></td>
                                <td><?php echo e(trans('labels.description')); ?></td>
                                <td><?php echo e(trans('labels.created_date')); ?></td>
                                <td><?php echo e(trans('labels.updated_date')); ?></td>
                                <td><?php echo e(trans('labels.action')); ?></td>
                            </tr>
                        </thead>
                        <tbody id="tabledetails" data-url="<?php echo e(url('admin/features/reorder_features')); ?>">
                            <?php
                                $i = 1;
                            ?>
                            <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="fs-7 row1" id="dataid<?php echo e($feature->id); ?>" data-id="<?php echo e($feature->id); ?>">
                                    <td><a tooltip="<?php echo e(trans('labels.move')); ?>"><i
                                                class="fa-light fa-up-down-left-right mx-2"></i></a></td>
                                    <td><?php
                                        echo $i++;
                                    ?></td>
                                    <td><img src="<?php echo e(helper::image_path($feature->image)); ?>"
                                            class="img-fluid rounded hw-50" alt=""></td>
                                    <td><?php echo e($feature->title); ?></td>
                                    <td><?php echo e($feature->description); ?></td>
                                    <td><?php echo e(helper::date_format($feature->created_at, Auth::user()->id)); ?><br>
                                        <?php echo e(helper::time_format($feature->created_at, Auth::user()->id)); ?>


                                    </td>
                                    <td><?php echo e(helper::date_format($feature->updated_at, Auth::user()->id)); ?><br>
                                        <?php echo e(helper::time_format($feature->updated_at, Auth::user()->id)); ?>


                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="<?php echo e(URL::to('/admin/features/edit-' . $feature->id)); ?>"
                                                class="btn btn-sm btn-info btn-size" tooltip="<?php echo e(trans('labels.edit')); ?>">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <a href="javascript:void(0)"
                                                <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/features/delete-' . $feature->id)); ?>')" <?php endif; ?>
                                                class="btn btn-sm btn-danger btn-size"
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/features/index.blade.php ENDPATH**/ ?>