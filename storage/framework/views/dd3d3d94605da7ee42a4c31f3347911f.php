<?php
    if (Auth::user()->type == 4) {
        $vendor_id = Auth::user()->vendor_id;
    } else {
        $vendor_id = Auth::user()->id;
    }
?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.coupons')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-12 col-md-4">
            <div class="d-flex justify-content-end">
                <a href="<?php echo e(URL::to('admin/coupons/add')); ?>"
                    class="btn btn-secondary px-4 rounded-start-5 rounded-end-5 <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_coupons', Auth::user()->role_id, $vendor_id, 'add') == 1 ? '' : 'd-none') : ''); ?>">
                    <i class="fa-regular fa-plus mx-1"></i><?php echo e(trans('labels.add')); ?>

                </a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-12">

            <div class="card border-0 my-3">

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered py-3 zero-configuration w-100">

                            <thead>

                                <tr class="text-capitalize fs-15 fw-500">
                                    <td></td>
                                    <td><?php echo e(trans('labels.srno')); ?></td>

                                    <td><?php echo e(trans('labels.offer_name')); ?></td>

                                    <td><?php echo e(trans('labels.offer_code')); ?></td>

                                    <td><?php echo e(trans('labels.discount')); ?></td>

                                    <td><?php echo e(trans('labels.start_date')); ?></td>

                                    <td><?php echo e(trans('labels.end_date')); ?></td>

                                    <td><?php echo e(trans('labels.status')); ?></td>
                                    <td><?php echo e(trans('labels.created_date')); ?></td>
                                    <td><?php echo e(trans('labels.updated_date')); ?></td>

                                    <td><?php echo e(trans('labels.action')); ?></td>

                                </tr>

                            </thead>

                            <tbody id="tabledetails" data-url="<?php echo e(url('admin/coupons/reorder_coupon')); ?>">

                                <?php $i = 1; ?>

                                <?php $__currentLoopData = $getpromocodeslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promocode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="fs-7 align-middle row1" id="dataid<?php echo e($promocode->id); ?>"
                                        data-id="<?php echo e($promocode->id); ?>">
                                        <td><a tooltip="<?php echo e(trans('labels.move')); ?>"><i
                                                    class="fa-light fa-up-down-left-right mx-2"></i></a></td>
                                        <td><?php echo $i++; ?></td>

                                        <td><?php echo e($promocode->offer_name); ?></td>

                                        <td><?php echo e($promocode->offer_code); ?></td>

                                        <td><?php echo e($promocode->offer_type == 1 ? helper::currency_formate($promocode->offer_amount, $promocode->vendor_id) : $promocode->offer_amount . '%'); ?>

                                        </td>

                                        <td><span
                                                class="badge bg-success"><?php echo e(helper::date_format($promocode->start_date, $promocode->vendor_id)); ?></span>
                                        </td>

                                        <td><span
                                                class="badge bg-danger"><?php echo e(helper::date_format($promocode->exp_date, $promocode->vendor_id)); ?></span>
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2">
                                                <?php if($promocode->is_available == '1'): ?>
                                                    <a href="javascript:void(0)" tooltip="<?php echo e(trans('labels.active')); ?>"
                                                        <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?>  onclick="statusupdate('<?php echo e(URL::to('admin/coupons/status-' . $promocode->id . '/2')); ?>')" <?php endif; ?>
                                                        class="btn btn-sm btn-size btn-success <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_coupons', Auth::user()->role_id, Auth::user()->vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>">
                                                        <i class="fa-regular fa-check"></i> </a>
                                                <?php else: ?>
                                                    <a href="javascript:void(0)" tooltip="<?php echo e(trans('labels.inactive')); ?>"
                                                        <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?>  onclick="statusupdate('<?php echo e(URL::to('admin/coupons/status-' . $promocode->id . '/1')); ?>')" <?php endif; ?>
                                                        class="btn btn-sm btn-size btn-danger  <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_coupons', Auth::user()->role_id, Auth::user()->vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>">
                                                        <i class="fa-regular fa-xmark"></i> </a>
                                                <?php endif; ?>
                                            </div>

                                        </td>
                                        <td><?php echo e(helper::date_format($promocode->created_at, $promocode->vendor_id)); ?><br>
                                            <?php echo e(helper::time_format($promocode->created_at, $promocode->vendor_id)); ?>

                                        </td>
                                        <td><?php echo e(helper::date_format($promocode->updated_at, $promocode->vendor_id)); ?><br>
                                            <?php echo e(helper::time_format($promocode->updated_at, $promocode->vendor_id)); ?>

                                        </td>

                                        <td>
                                            <div class="d-flex gap-2">
                                                <a class="btn btn-sm btn-info btn-size  <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_coupons', Auth::user()->role_id, Auth::user()->vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>"
                                                    tooltip="<?php echo e(trans('labels.edit')); ?>"
                                                    href="<?php echo e(URL::to('admin/coupons/edit-' . $promocode->id)); ?>">
                                                    <i class="fa-regular fa-pen-to-square"></i> </a>
                                                <a class="btn btn-sm btn-danger btn-size  <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_coupons', Auth::user()->role_id, Auth::user()->vendor_id, 'delete') == 1 ? '' : 'd-none') : ''); ?>"
                                                    tooltip="<?php echo e(trans('labels.delete')); ?>"
                                                    <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="deletedata('<?php echo e(URL::to('admin/coupons/delete-' . $promocode->id)); ?>')" <?php endif; ?>>
                                                    <i class="fa-regular fa-trash"></i> </a>
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

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/included/promocode/index.blade.php ENDPATH**/ ?>