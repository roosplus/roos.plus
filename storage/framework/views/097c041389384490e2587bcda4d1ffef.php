<table class="table table-striped table-bordered py-3 zero-configuration w-100">
    <thead>
        <tr class="fw-500">
            <td></td>
            <td><?php echo e(trans('labels.srno')); ?></td>
            <td><?php echo e(trans('labels.image')); ?></td>
            <td><?php echo e(trans('labels.created_date')); ?></td>
            <td><?php echo e(trans('labels.updated_date')); ?></td>
            <td><?php echo e(trans('labels.action')); ?></td>
        </tr>
    </thead>
    <tbody id="tabledetails" data-url="<?php echo e(url('admin/banner/reorder_banner')); ?>">
        <?php $i = 1; ?>
        <?php $__currentLoopData = $getbannerlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="fs-7 align-middle row1" id="dataid<?php echo e($banner->id); ?>" data-id="<?php echo e($banner->id); ?>">
                <td><a tooltip="<?php echo e(trans('labels.move')); ?>"><i class="fa-light fa-up-down-left-right mx-2"></i></a></td>
                <td><?php echo $i++; ?></td>
                <td><img src="<?php echo e(helper::image_path($banner->banner_image)); ?>"
                        class="img-fluid rounded hight-50 object-fit-cover" alt="">
                </td>
                <td><?php echo e(helper::date_format($banner->created_at, $vendor_id)); ?><br>
                    <?php echo e(helper::time_format($banner->created_at, $vendor_id)); ?>


                </td>
                <td><?php echo e(helper::date_format($banner->updated_at, $vendor_id)); ?><br>
                    <?php echo e(helper::time_format($banner->updated_at, $vendor_id)); ?>


                </td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="<?php echo e(URL::to('admin/banner/edit-' . $banner->id)); ?>"
                            class="btn btn-sm btn-info btn-size <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_banner', Auth::user()->role_id, $vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>"
                            tooltip="<?php echo e(trans('labels.edit')); ?>">
                            <i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="javascript:void(0)"
                            <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="deletedata('<?php echo e(URL::to('admin/banner/delete-' . $banner->id)); ?>')" <?php endif; ?>
                            class="btn btn-sm btn-danger btn-size <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_banner', Auth::user()->role_id, $vendor_id, 'delete') == 1 ? '' : 'd-none') : ''); ?>"
                            tooltip="<?php echo e(trans('labels.delete')); ?>">
                            <i class="fa-regular fa-trash"></i></a>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH /mnt/c/restro-saas/resources/views/admin/banner/table.blade.php ENDPATH**/ ?>