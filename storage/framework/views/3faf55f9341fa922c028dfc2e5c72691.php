<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.promotional_banners')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-end">
                <a href="<?php echo e(URL::to('admin/promotionalbanners/add')); ?>"
                    class="btn btn-secondary px-4 rounded-start-5 rounded-end-5">
                    <i class="fa-regular fa-plus mx-1"></i><?php echo e(trans('labels.add')); ?>

                </a>
            </div>
        </div>
    </div>
    <div class="col-12 mb-7 mt-3">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered py-3 zero-configuration w-100 dataTable no-footer">
                        <thead>
                            <tr class="fw-500">
                                <td></td>
                                <td><?php echo e(trans('labels.srno')); ?></td>
                                <td><?php echo e(trans('labels.image')); ?></td>
                                <td><?php echo e(trans('labels.vendor_title')); ?></td>
                                <td><?php echo e(trans('labels.created_date')); ?></td>
                                <td><?php echo e(trans('labels.updated_date')); ?></td>
                                <td><?php echo e(trans('labels.action')); ?></td>
                            </tr>
                        </thead>
                        <tbody id="tabledetails" data-url="<?php echo e(url('admin/promotionalbanners/reorder_promotionalbanner')); ?>">
                            <?php
                                $i = 1;
                            ?>
                            <?php $__currentLoopData = $getbannerlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="fs-7 align-middle row1" id="dataid<?php echo e($banner->id); ?>"
                                    data-id="<?php echo e($banner->id); ?>">
                                    <td><a tooltip="<?php echo e(trans('labels.move')); ?>"><i
                                                class="fa-light fa-up-down-left-right mx-2"></i></a></td>
                                    <td><?php
                                        echo $i++;
                                    ?></td>
                                    <td>
                                        <img src="<?php echo e(helper::image_path($banner->image)); ?>"
                                            class="hight-50 object-fit-cover rounded-3" alt="">
                                    </td>
                                    <td><?php echo e(@$banner['vendor_info']->name); ?></td>
                                    <td><?php echo e(helper::date_format($banner->created_at, Auth::user()->id)); ?><br>
                                        <?php echo e(helper::time_format($banner->created_at, Auth::user()->id)); ?>


                                    </td>
                                    <td><?php echo e(helper::date_format($banner->updated_at, Auth::user()->id)); ?><br>
                                        <?php echo e(helper::time_format($banner->updated_at, Auth::user()->id)); ?>


                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="<?php echo e(URL::to('admin/promotionalbanners/edit-' . $banner->id)); ?>"
                                                class="btn btn-sm btn-info btn-size" tooltip="<?php echo e(trans('labels.edit')); ?>">
                                                <i class="fa-regular fa-pen-to-square"></i></a>

                                            <a href="javascript:void(0)"
                                                <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/promotionalbanners/delete-' . $banner->id)); ?>')" <?php endif; ?>
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

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/promotionalbanners/index.blade.php ENDPATH**/ ?>