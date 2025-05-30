<?php $__env->startSection('content'); ?>
<div class="row justify-content-between align-items-center">
    <div class="col-12 col-md-4">
        <h5 class="pages-title fs-2"><?php echo e(trans('labels.cities')); ?></h5>
        <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="col-12 col-md-8">
        <div class="d-flex justify-content-end">
            <a href="<?php echo e(URL::to('admin/cities/add')); ?>" class="btn btn-secondary px-4 rounded-start-5 rounded-end-5">
                <i class="fa-regular fa-plus mx-1"></i><?php echo e(trans('labels.add')); ?>

            </a>
        </div>
    </div>
</div>

    <div class="col-12 mb-7 mt-3">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                        <thead>
                            <tr class="fw-500">
                                <td></td>
                                <td><?php echo e(trans('labels.srno')); ?></td>
                                <td><?php echo e(trans('labels.city')); ?></td>
                                <td><?php echo e(trans('labels.status')); ?></td>
                                <td><?php echo e(trans('labels.created_date')); ?></td>
                                <td><?php echo e(trans('labels.updated_date')); ?></td>
                                <td><?php echo e(trans('labels.action')); ?></td>
                            </tr>
                        </thead>
                        <tbody id="tabledetails" data-url="<?php echo e(url('admin/cities/reorder_city')); ?>">
                            <?php
                            $i=1;
                            ?>
                            <?php $__currentLoopData = $allcities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="fs-7 align-middle row1" id="dataid<?php echo e($area->id); ?>" data-id="<?php echo e($area->id); ?>">
                            <td><a tooltip="<?php echo e(trans('labels.move')); ?>"><i class="fa-light fa-up-down-left-right mx-2"></i></a></td>
                                <td><?php
                                    echo $i++
                                    ?></td>
                                <td><?php echo e($area->name); ?></td>
                                <td>
                                    <?php if($area->is_available == '1'): ?>
                                    <a <?php if(env('Environment')=='sendbox' ): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/cities/change_status-' . $area->id . '/2')); ?>')" <?php endif; ?> class="btn btn-sm btn-success btn-size" tooltip="<?php echo e(trans('labels.active')); ?>"><i class="fas fa-check"></i></a>
                                    <?php else: ?>
                                    <a <?php if(env('Environment')=='sendbox' ): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/cities/change_status-' . $area->id . '/1')); ?>')" <?php endif; ?> class="btn btn-sm btn-danger btn-xmark" tooltip="<?php echo e(trans('labels.in_active')); ?>"><i class="fas fa-close"></i></a>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e(helper::date_format($area->created_at, Auth::user()->id)); ?><br>
                                    <?php echo e(helper::time_format($area->created_at, Auth::user()->id)); ?>


                                </td>
                                <td><?php echo e(helper::date_format($area->updated_at, Auth::user()->id)); ?><br>
                                    <?php echo e(helper::time_format($area->updated_at, Auth::user()->id)); ?>


                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="<?php echo e(URL::to('admin/cities/edit-'.$area->id)); ?>" class="btn btn-sm btn-info btn-size" tooltip="<?php echo e(trans('labels.edit')); ?>"> <i class="fa-regular fa-pen-to-square"></i></a>
                                        <a <?php if(env('Environment')=='sendbox' ): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/cities/delete-'.$area->id)); ?>')" <?php endif; ?> class="btn btn-sm btn-danger btn-size" tooltip="Delete"> <i class="fa-regular fa-trash"></i></a>
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
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/city/index.blade.php ENDPATH**/ ?>