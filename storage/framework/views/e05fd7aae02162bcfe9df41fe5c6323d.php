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
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.category')); ?></h5>
            <div class="d-flex">
                <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-end">
                <a href="<?php echo e(URL::to('admin/categories/add')); ?>"
                    class="btn btn-secondary px-4 rounded-start-5 rounded-end-5 <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_categories', Auth::user()->role_id, $vendor_id, 'add') == 1 ? '' : 'd-none') : ''); ?>"><i
                        class="fa-regular fa-plus mx-1"></i><?php echo e(trans('labels.add')); ?></a>
            </div>
        </div>
    </div>

    <div class="col-12 mt-3 mb-7">
        <div class="card border-0 my-3 box-shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                        <thead>
                            <tr class="fw-500">
                                <td></td>
                                <td><?php echo e(trans('labels.srno')); ?></td>
                                <td><?php echo e(trans('labels.image')); ?></td>
                                <td><?php echo e(trans('labels.category')); ?></td>
                                <td><?php echo e(trans('labels.status')); ?></td>
                                <td><?php echo e(trans('labels.created_date')); ?></td>
                                <td><?php echo e(trans('labels.updated_date')); ?></td>
                                <td><?php echo e(trans('labels.action')); ?></td>
                            </tr>
                        </thead>
                        <tbody id="tabledetails" data-url="<?php echo e(url('admin/categories/reorder_category')); ?>">
                            <?php $i=1; ?>
                            <?php $__currentLoopData = $allcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="fs-7 align-middle row1" id="dataid<?php echo e($category->id); ?>"
                                    data-id="<?php echo e($category->id); ?>">
                                    <td><a tooltip="<?php echo e(trans('labels.move')); ?>"><i
                                                class="fa-light fa-up-down-left-right mx-2"></i></a></td>
                                    <td><?php echo $i++ ?></td>
                                    <td><img src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/images/category/' . $category->image)); ?>"
                                            alt="" width="50" class="img-fluid rounded hw-50 object-fit-cover">
                                    </td>
                                    <td><?php echo e($category->name); ?></td>

                                    <td>
                                        <?php if($category->is_available == '1'): ?>
                                            <a <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/categories/change_status-' . $category->slug . '/2')); ?>')" <?php endif; ?>
                                                class="btn btn-sm btn-success btn-size <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_categories', Auth::user()->role_id, $vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>"
                                                tooltip="<?php echo e(trans('labels.active')); ?>"><i class="fas fa-check"></i></a>
                                        <?php else: ?>
                                            <a <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/categories/change_status-' . $category->slug . '/1')); ?>')" <?php endif; ?>
                                                class="btn btn-sm btn-danger btn-xmark <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_categories', Auth::user()->role_id, $vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>"
                                                tooltip="<?php echo e(trans('labels.in_active')); ?>"><i class="fas fa-close"></i></a>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(helper::date_format($category->created_at, $vendor_id)); ?><br>
                                        <?php echo e(helper::time_format($category->created_at, $vendor_id)); ?>


                                    </td>
                                    <td><?php echo e(helper::date_format($category->updated_at, $vendor_id)); ?><br>
                                        <?php echo e(helper::time_format($category->updated_at, $vendor_id)); ?>


                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="<?php echo e(URL::to('admin/categories/edit-' . $category->slug)); ?>"
                                                class="btn btn-sm btn-info btn-size <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_categories', Auth::user()->role_id, $vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>"
                                                tooltip="<?php echo e(trans('labels.edit')); ?>">
                                                <i class="fa-regular fa-pen-to-square"></i></a>
                                            <a <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/categories/delete-' . $category->slug)); ?>')" <?php endif; ?>
                                                class="btn btn-sm btn-danger btn-size <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_categories', Auth::user()->role_id, $vendor_id, 'delete') == 1 ? '' : 'd-none') : ''); ?>"
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

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/category/category.blade.php ENDPATH**/ ?>