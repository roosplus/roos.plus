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
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.booking')); ?></h5>
            <div class="d-flex">
                <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

    </div>

    <div class="col-12 mb-7 mt-3">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                        <thead>
                            <tr class="fs-15 fw-500">
                                <td><?php echo e(trans('labels.srno')); ?></td>
                                <td><?php echo e(trans('labels.event')); ?></td>
                                <td><?php echo e(trans('labels.people')); ?></td>
                                <td><?php echo e(trans('labels.event_date')); ?></td>
                                <td><?php echo e(trans('labels.event_time')); ?></td>
                                <td><?php echo e(trans('labels.name')); ?></td>
                                <td><?php echo e(trans('labels.email')); ?></td>
                                <td><?php echo e(trans('labels.mobile')); ?></td>
                                <td><?php echo e(trans('labels.special_request')); ?></td>
                                <td><?php echo e(trans('labels.created_date')); ?></td>
                                <td><?php echo e(trans('labels.updated_date')); ?></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="fs-7 align-middle">
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo e($booking->event); ?></td>
                                    <td><?php echo e($booking->people); ?></td>
                                    <td><?php echo e($booking->event_date); ?></td>
                                    <td>
                                        <?php echo e(date('h:i a', strtotime($booking->event_time))); ?>

                                    </td>
                                    <td><?php echo e($booking->name); ?></td>
                                    <td><?php echo e($booking->email); ?></td>
                                    <td><?php echo e($booking->mobile); ?></td>
                                    <td><?php echo e($booking->notes); ?></td>
                                    <td><?php echo e(helper::date_format($booking->created_at, $vendor_id)); ?><br>
                                        <?php echo e(helper::time_format($booking->created_at, $vendor_id)); ?>


                                    </td>
                                    <td><?php echo e(helper::date_format($booking->updated_at, $vendor_id)); ?><br>
                                        <?php echo e(helper::time_format($booking->updated_at, $vendor_id)); ?>


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

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/table_booking/index.blade.php ENDPATH**/ ?>