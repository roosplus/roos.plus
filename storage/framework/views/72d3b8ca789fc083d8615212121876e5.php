<?php
    if (Auth::user()->type == 4) {
        $vendor_id = Auth::user()->vendor_id;
        $role_id = Auth::user()->role_id;
    } else {
        $vendor_id = Auth::user()->id;
        $role_id = '';
    }
?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.welcome_dashboard')); ?></h5>
        </div>
    </div>
    <div class="row mb-0 mb-md-4">
        <div class="col-12 col-md-12 col-lg-12 col-xl-6">
            <div class="card h-100 border-0 shadow desh_left">
                <div class="card-body p-4">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-12 col-md-6">
                            <h4 class="card-title fw-600 fs-2"><?php echo e(trans('labels.quick_access_card_title')); ?></h4>
                            <p class="card-text pb-3">
                                <?php echo e(trans('labels.quick_access_card_description')); ?>

                            </p>
                            <div class="dropwdown d-inline-block">
                                <a class="btn bg-white border-0 dropwdown-desh-card" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <span class="ms-1"><?php echo e(trans('labels.quick_access')); ?></span>
                                    <i class="fa-regular fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu shadow border-0">

                                    

                                    <?php if(Auth::user()->type == 1): ?>
                                        <a href="<?php echo e(URL::to('admin/users')); ?>"
                                            class="dropdown-item d-flex align-items-center px-3 py-2">
                                            <?php echo e(trans('labels.restaurants')); ?>

                                        </a>

                                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                                                App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                                            <a href="<?php echo e(URL::to('admin/plan')); ?>"
                                                class="dropdown-item d-flex align-items-center px-3 py-2">
                                                <?php echo e(trans('labels.pricing_plans')); ?>

                                            </a>
                                        <?php endif; ?>

                                        <a href="<?php echo e(URL::to('admin/transaction')); ?>"
                                            class="dropdown-item d-flex align-items-center px-3 py-2">
                                            <?php echo e(trans('labels.transaction')); ?>

                                        </a>
                                    <?php endif; ?>

                                    

                                    <?php if(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
                                        <a href="<?php echo e(URL::to('admin/categories')); ?>"
                                            class="dropdown-item d-flex align-items-center px-3 py-2 <?php echo e(helper::check_menu($role_id, 'role_categories') == 1 ? 'd-block' : 'd-none'); ?>">
                                            <?php echo e(trans('labels.category')); ?>

                                        </a>
                                        <a href="<?php echo e(URL::to('admin/products')); ?>"
                                            class="dropdown-item d-flex align-items-center px-3 py-2 <?php echo e(helper::check_menu($role_id, 'role_products') == 1 ? 'd-block' : 'd-none'); ?>">
                                            <?php echo e(trans('labels.products')); ?>

                                        </a>
                                        <a href="<?php echo e(URL::to('admin/orders')); ?>"
                                            class="dropdown-item d-flex align-items-center px-3 py-2 <?php echo e(helper::check_menu($role_id, 'role_orders') == 1 ? 'd-block' : 'd-none'); ?>">
                                            <?php echo e(trans('labels.orders')); ?>

                                        </a>
                                    <?php endif; ?>

                                    

                                    <a href="<?php echo e(URL::to('admin/settings')); ?>"
                                        class="dropdown-item d-flex align-items-center px-3 py-2 <?php echo e(helper::check_menu($role_id, 'role_settings') == 1 ? 'd-block' : 'd-none'); ?>">
                                        <?php echo e(trans('labels.setting')); ?>

                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-end">
                            <img src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/images/about/seo-dashboard.png')); ?>"
                                alt="" class="desh-chart-img d-none d-md-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-12 col-xl-6 mt-4 mt-xl-0">
            <div class="row h-100">
                <?php if(Auth::user()->type == 1): ?>
                    <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6 mb-4">
                        <div class="card border-0 box-shadow h-100 deshcard1">
                            <div class="card-body">
                                <div class="dashboard-card">
                                    <span class="<?php echo e(session()->get('direction') == '2' ? 'text-start' : 'text-start'); ?>">
                                        <p class="fw-semibold fs-5 mb-1 text-dark"><?php echo e(trans('labels.users')); ?></p>
                                        <h4 class="text-dark fw-bold fs-2"><?php echo e($totalvendors); ?></h4>
                                    </span>
                                    <span class="card-icon">
                                        <i class="fa-solid fa-user-plus fs-5"></i>
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6 mb-4">
                        <div class="card border-0 box-shadow h-100 deshcard2">
                            <div class="card-body">
                                <div class="dashboard-card">
                                    <span class="<?php echo e(session()->get('direction') == 2 ? 'text-end' : 'text-start'); ?>">
                                        <p class="fw-semibold fs-5 mb-1 text-dark"><?php echo e(trans('labels.pricing_plans')); ?></p>
                                        <h4 class="text-dark fw-bold fs-2"><?php echo e($totalplans); ?></h4>
                                    </span>
                                    <span class="card-icon">
                                        <i class="fa-regular fa-medal fs-5"></i>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endif; ?>
                <?php if(Auth::user()->type == 2): ?>
                    <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6 mb-4">
                        <div class="card border-0 box-shadow h-100 deshcard02">
                            <div class="card-body">
                                <div class="dashboard-card">
                                    <span class="<?php echo e(session()->get('direction') == '2' ? 'text-end' : 'text-start'); ?>">
                                        <p class="fw-semibold fs-5 mb-1 text-dark"><?php echo e(trans('labels.products')); ?></p>
                                        <h4 class="text-dark fw-bold fs-2"><?php echo e($totalvendors); ?></h4>
                                    </span>
                                    <span class="card-icon">
                                        <i class="fa-solid fa-list-timeline fs-5"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6 mb-4">
                        <div class="card border-0 box-shadow h-100 deshcard03">
                            <div class="card-body">
                                <div class="dashboard-card">
                                    <span class="<?php echo e(session()->get('direction') == '2' ? 'text-end' : 'text-start'); ?>">
                                        <p class="fw-semibold fs-5 mb-1 text-dark"><?php echo e(trans('labels.current_plan')); ?></p>
                                        <?php if(!empty($currentplanname)): ?>
                                            <h4 class="text-dark fw-bold fs-2"> <?php echo e(@$currentplanname->name); ?> </h4>
                                        <?php else: ?>
                                            <i class="fa-regular fa-exclamation-triangle h4 text-muted"></i>
                                        <?php endif; ?>
                                    </span>
                                    <span class="card-icon">
                                        <i class="fa-solid fa-cart-flatbed-suitcase fs-5"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6 mb-4 mb-md-0">
                    <div class="card h-100 border-0 box-shadow deshcard3">
                        <div class="card-body">
                            <div class="dashboard-card">
                                <span class="<?php echo e(session()->get('direction') == 2 ? 'text-end' : 'text-start'); ?>">
                                    <p class="fw-semibold fs-5 mb-1 text-dark">
                                        <?php echo e(Auth::user()->type == 1 ? trans('labels.transaction') : trans('labels.orders')); ?>

                                    </p>
                                    <h4 class="text-dark fw-bold fs-2"><?php echo e($totalorders); ?></h4>
                                </span>
                                <span class="card-icon">
                                    <?php if(Auth::user()->type == 1): ?>
                                        <i class="fa-solid fa-chart-line fs-5"></i>
                                    <?php else: ?>
                                        <i class="fa-regular fa-cart-shopping fs-5"></i>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6 mb-4 mb-md-0">
                    <div class="card h-100 border-0 box-shadow deshcard4">
                        <div class="card-body">
                            <div class="dashboard-card">
                                <span class="<?php echo e(session()->get('direction') == 2 ? 'text-end' : 'text-start'); ?>">
                                    <p class="fw-semibold fs-5 mb-1 text-dark"><?php echo e(trans('labels.revenue')); ?></p>
                                    <h4 class="text-dark fw-bold fs-2">
                                        <?php echo e(helper::currency_formate($totalrevenue, $vendor_id)); ?></h4>
                                </span>
                                <span class="card-icon">
                                    <i class="fa-solid fa-chart-pie fs-5"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xl-6 mb-4">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title"><?php echo e(trans('labels.revenue')); ?></h5>
                        <select class="form-select form-select-sm w-auto selectdrop" id="revenueyear"
                            data-url="<?php echo e(URL::to('/admin/dashboard')); ?>">
                            <?php if(count($revenue_years) > 0 && !in_array(date('Y'), array_column($revenue_years->toArray(), 'year'))): ?>
                                <option value="<?php echo e(date('Y')); ?>" selected><?php echo e(date('Y')); ?></option>
                            <?php endif; ?>
                            <?php $__empty_1 = true; $__currentLoopData = $revenue_years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $revenue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <option value="<?php echo e($revenue->year); ?>" <?php echo e(date('Y') == $revenue->year ? 'selected' : ''); ?>>
                                    <?php echo e($revenue->year); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <option value="" selected disabled><?php echo e(trans('labels.select')); ?></option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="row">
                        <canvas id="revenuechart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-6 mb-4">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title">
                            <?php echo e(Auth::user()->type == 1 ? trans('labels.users') : trans('labels.orders')); ?></h5>
                        <select class="form-select form-select-sm w-auto selectdrop" id="doughnutyear"
                            data-url="<?php echo e(request()->url()); ?>">
                            <?php if(count($doughnut_years) > 0 && !in_array(date('Y'), array_column($doughnut_years->toArray(), 'year'))): ?>
                                <option value="<?php echo e(date('Y')); ?>" selected><?php echo e(date('Y')); ?></option>
                            <?php endif; ?>
                            <?php $__empty_1 = true; $__currentLoopData = $doughnut_years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $useryear): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <option value="<?php echo e($useryear->year); ?>"
                                    <?php echo e(date('Y') == $useryear->year ? 'selected' : ''); ?>><?php echo e($useryear->year); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <option value="" selected disabled><?php echo e(trans('labels.select')); ?></option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="row">
                        <canvas id="doughnut"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(Auth::user()->type != 1): ?>
        <?php
            $ran = [
                'gradient-1',
                'gradient-2',
                'gradient-3',
                'gradient-4',
                'gradient-5',
                'gradient-6',
                'gradient-7',
                'gradient-8',
                'gradient-9',
            ];
        ?>
        <div class="row">
            <div class="col-xl-6 mb-4">
                <div class="card border-0 box-shadow h-100">
                    <div class="card-body">
                        <h5 class="card-title pb-3 m-0"><?php echo e(trans('labels.top_product')); ?></h5>
                        <div class="table-responsive" id="table-items">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="fs-15 fw-500"><?php echo e(trans('labels.image')); ?></th>
                                        <th class="fs-15 fw-500"><?php echo e(trans('labels.item_name')); ?></th>
                                        <th class="fs-15 fw-500"><?php echo e(trans('labels.category')); ?></th>
                                        <th class="fs-15 fw-500"><?php echo e(trans('labels.orders')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($topitems) > 0): ?>
                                        <?php $__currentLoopData = @$topitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="fs-7 fw-500 text-dark align-middle">
                                                <td>
                                                    <img src="<?php echo e(Helper::image_path($row['item_image']->image)); ?>"
                                                        class="rounded hw-50 object" alt="">
                                                </td>
                                                <td>
                                                    <a
                                                        href="<?php echo e(URL::to('admin/products/edit-' . $row->slug)); ?>"><?php echo e($row->item_name); ?></a>
                                                </td>
                                                <td><?php echo e(@$row['category_info']->name); ?></td>
                                                <td>
                                                    <?php
                                                        $per =
                                                            $getorderdetailscount > 0
                                                                ? ($row->item_order_counter * 100) /
                                                                    $getorderdetailscount
                                                                : 0;
                                                    ?>
                                                    <?php echo e(number_format($per, 2)); ?>%
                                                    <div class="progress h-10-px">
                                                        <div class="progress-bar gradient-6 <?php echo e($ran[array_rand($ran, 1)]); ?>"
                                                            style="width: <?php echo e($per); ?>%;" role="progressbar">
                                                            <span class="sr-only"><?php echo e($per); ?>%
                                                                <?php echo e(trans('labels.orders')); ?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4">
                                                <h6 class="text-center fw-600 text-dark">
                                                    <?php echo e(trans('labels.data_not_found')); ?>

                                                </h6>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-4">
                <div class="card border-0 box-shadow h-100">
                    <div class="card-body">
                        <h5 class="card-title pb-3 m-0"><?php echo e(trans('labels.top_customers')); ?></h5>
                        <div class="table-responsive" id="table-users">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="fs-15 fw-500"><?php echo e(trans('labels.image')); ?></th>
                                        <th class="fs-15 fw-500"><?php echo e(trans('labels.name')); ?></th>
                                        <th class="fs-15 fw-500"><?php echo e(trans('labels.email')); ?></th>
                                        <th class="fs-15 fw-500"><?php echo e(trans('labels.orders')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($topusers) > 0): ?>
                                        <?php $__currentLoopData = @$topusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="fs-7 fw-500 text-dark align-middle">
                                                <td>
                                                    <img src="<?php echo e(Helper::image_path($user->image)); ?>"
                                                        class="rounded hw-50 object" alt="">
                                                </td>
                                                <td>
                                                    <div class="fs-7 fw-500">
                                                        <p><?php echo e($user->name); ?></p>
                                                        <p><?php echo e($user->mobile); ?></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo e($user->email); ?>

                                                </td>
                                                <td>
                                                    <?php
                                                        $per =
                                                            ($user->user_order_counter * 100) / @$getorderdetailscount;
                                                    ?>
                                                    <?php echo e(number_format($per, 2)); ?>%
                                                    <div class="progress h-10-px">
                                                        <div class="progress-bar <?php echo e($ran[array_rand($ran, 1)]); ?>"
                                                            style="width: <?php echo e($per); ?>%;" role="progressbar">
                                                            <span class="sr-only"><?php echo e($per); ?>%
                                                                <?php echo e(trans('labels.orders')); ?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4">
                                                <h6 class="text-center fw-600 text-dark">
                                                    <?php echo e(trans('labels.data_not_found')); ?>

                                                </h6>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12">
            <h5 class="pages-title fs-2 py-2">
                <?php echo e(Auth::user()->type == 1 ? trans('labels.today_transaction') : trans('labels.processing_orders')); ?>

            </h5>
        </div>
        <div class="col-12 mb-7">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if(Auth::user()->type == 1): ?>
                            <?php echo $__env->make('admin.dashboard.admintransaction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('admin.orders.orderstable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <!--- Admin -------- users-chart-script --->
    <!--- VendorAdmin -------- orders-count-chart-script --->
    <script type="text/javascript">
        var doughnut = null;
        var doughnutlabels = <?php echo e(Js::from($doughnutlabels)); ?>;
        var doughnutdata = <?php echo e(Js::from($doughnutdata)); ?>;
    </script>
    <!--- Admin ------ revenue-by-plans-chart-script --->
    <!--- vendorAdmin ------ revenue-by-orders-script --->
    <script type="text/javascript">
        var revenuechart = null;
        var labels = <?php echo e(Js::from($revenuelabels)); ?>;
        var revenuedata = <?php echo e(Js::from($revenuedata)); ?>;
    </script>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/dashboard.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/dashboard/index.blade.php ENDPATH**/ ?>