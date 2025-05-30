<?php
    if (Auth::user()->type == 4) {
        $vendor_id = Auth::user()->vendor_id;
    } else {
        $vendor_id = Auth::user()->id;
    }
?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center">
        <div class="col-12">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.inquiries')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <div class="col-12 mb-7 mt-3">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                        <thead>
                            <tr class="fw-500 fs-15">
                                <td><?php echo e(trans('labels.srno')); ?></td>
                                <td><?php echo e(trans('labels.name')); ?></td>
                                <td><?php echo e(trans('labels.email')); ?></td>
                                <td><?php echo e(trans('labels.mobile')); ?></td>
                                <td><?php echo e(trans('labels.message')); ?></td>
                                <td><?php echo e(trans('labels.created_date')); ?></td>
                                <td><?php echo e(trans('labels.updated_date')); ?></td>
                                <td><?php echo e(trans('labels.action')); ?></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php $__currentLoopData = $getinquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="fs-7 align-middle">
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo e($inquiry->name); ?></td>
                                    <td><?php echo e($inquiry->email); ?></td>
                                    <td><?php echo e($inquiry->mobile); ?></td>
                                    <td><?php echo e($inquiry->message); ?></td>
                                    <td><?php echo e(helper::date_format($inquiry->created_at, $vendor_id)); ?><br>
                                        <?php echo e(helper::time_format($inquiry->created_at, $vendor_id)); ?>


                                    </td>
                                    <td><?php echo e(helper::date_format($inquiry->updated_at, $vendor_id)); ?><br>
                                        <?php echo e(helper::time_format($inquiry->updated_at, $vendor_id)); ?>


                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="deletedata('<?php echo e(URL::to('admin/inquiries/delete-' . $inquiry->id)); ?>')" <?php endif; ?>
                                                class="btn btn-danger btn-sm btn-size <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_inquiries', Auth::user()->role_id, $vendor_id, 'delete') == 1 ? '' : 'd-none') : ''); ?>"
                                                tooltip="<?php echo e(trans('labels.delete')); ?>"> <i
                                                    class="fa-regular fa-trash"></i></a>
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

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/inquiries/index.blade.php ENDPATH**/ ?>