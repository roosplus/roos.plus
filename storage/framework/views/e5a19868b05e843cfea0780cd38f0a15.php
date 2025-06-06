<nav aria-label="breadcrumb">

    <ol class="breadcrumb breadcrumb-rtl">

        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('admin/dashboard')); ?>"><?php echo e(trans('labels.dashboard')); ?></a></li>

        <?php if(request()->is('admin/transaction')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.transaction')); ?></li>
        <?php endif; ?>
        <?php if(request()->is('admin/transaction/plandetails-*')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><a href="<?php echo e(URL::to('admin/transaction')); ?>"><?php echo e(trans('labels.transaction')); ?></a>
            </li>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">
                <?php echo e(trans('labels.plan_details')); ?>


            </li>
        <?php endif; ?>

        <?php if(request()->is('admin/report*')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.report')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/reviews')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.product_reviews')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/orders')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.orders')); ?></li>
        <?php endif; ?>
        <?php if(request()->is('admin/top_deals')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.top_deals')); ?></li>
        <?php endif; ?>


        <?php if(request()->is('admin/orders/invoice*')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><a href="<?php echo e(URL::to('admin/orders')); ?>"><?php echo e(trans('labels.orders')); ?></a></li>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">Order details</li>
        <?php endif; ?>



        <?php if(request()->is('admin/plan')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.pricing_plan')); ?></li>
        <?php endif; ?>



        <?php if(request()->is('admin/plan/add*') || request()->is('admin/plan/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><a href="<?php echo e(URL::to('admin/plan')); ?>"><?php echo e(trans('labels.pricing_plan')); ?></a></li>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <?php if(request()->is('admin/plan/edit-*')): ?>
                    <?php echo e(trans('labels.edit')); ?>

                <?php else: ?>
                    <?php echo e(trans('labels.add_new')); ?>

                <?php endif; ?>

            </li>

        <?php endif; ?>





        <?php if(request()->is('admin/tableqr')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.tableqr')); ?></li>
        <?php endif; ?>



        <?php if(request()->is('admin/tableqr/add*') || request()->is('admin/tableqr/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><a href="<?php echo e(URL::to('admin/tableqr')); ?>"><?php echo e(trans('labels.tableqr')); ?></a></li>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <?php if(request()->is('admin/tableqr/edit-*')): ?>
                    <?php echo e(trans('labels.edit')); ?>

                <?php else: ?>
                    <?php echo e(trans('labels.add_new')); ?>

                <?php endif; ?>



            </li>

        <?php endif; ?>
        <?php if(request()->is('admin/employees')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.employee')); ?></li>
        <?php endif; ?>



        <?php if(request()->is('admin/employees/add*') || request()->is('admin/employees/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><a href="<?php echo e(URL::to('admin/employees')); ?>"><?php echo e(trans('labels.employee')); ?></a></li>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <?php if(request()->is('admin/employees/edit-*')): ?>
                    <?php echo e(trans('labels.edit')); ?>

                <?php else: ?>
                    <?php echo e(trans('labels.add_new')); ?>

                <?php endif; ?>

            </li>

        <?php endif; ?>

        <?php if(request()->is('admin/store_categories')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.store_categories')); ?></li>
        <?php endif; ?>



        <?php if(request()->is('admin/store_categories/add*') || request()->is('admin/store_categories/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><a
                    href="<?php echo e(URL::to('admin/store_categories')); ?>"><?php echo e(trans('labels.store_categories')); ?></a></li>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <?php if(request()->is('admin/store_categories/edit-*')): ?>
                    <?php echo e(trans('labels.edit')); ?>

                <?php else: ?>
                    <?php echo e(trans('labels.add_new')); ?>

                <?php endif; ?>



            </li>

        <?php endif; ?>

        <?php if(request()->is('admin/tax')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.tax')); ?></li>
        <?php endif; ?>



        <?php if(request()->is('admin/tax/add*') || request()->is('admin/tax/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><a href="<?php echo e(URL::to('admin/tax')); ?>"><?php echo e(trans('labels.tax')); ?></a></li>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <?php if(request()->is('admin/tax/edit-*')): ?>
                    <?php echo e(trans('labels.edit')); ?>

                <?php else: ?>
                    <?php echo e(trans('labels.add_new')); ?>

                <?php endif; ?>



            </li>

        <?php endif; ?>

        <?php if(request()->is('admin/extras')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.global_extras')); ?></li>
        <?php endif; ?>



        <?php if(request()->is('admin/extras/add*') || request()->is('admin/extras/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><a href="<?php echo e(URL::to('admin/extras')); ?>"><?php echo e(trans('labels.extras')); ?></a></li>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <?php if(request()->is('admin/extras/edit-*')): ?>
                    <?php echo e(trans('labels.edit')); ?>

                <?php else: ?>
                    <?php echo e(trans('labels.add_new')); ?>

                <?php endif; ?>



            </li>

        <?php endif; ?>
        <?php if(request()->is('admin/custom_status')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.custom_status')); ?></li>
        <?php endif; ?>



        <?php if(request()->is('admin/custom_status/add*') || request()->is('admin/custom_status/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><a
                    href="<?php echo e(URL::to('admin/custom_status')); ?>"><?php echo e(trans('labels.custom_status')); ?></a></li>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <?php if(request()->is('admin/custom_status/edit-*')): ?>
                    <?php echo e(trans('labels.edit')); ?>

                <?php else: ?>
                    <?php echo e(trans('labels.add_new')); ?>

                <?php endif; ?>



            </li>

        <?php endif; ?>



        <?php if(request()->is('admin/roles')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.roles')); ?></li>
        <?php endif; ?>



        <?php if(request()->is('admin/roles/add*') || request()->is('admin/roles/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><a href="<?php echo e(URL::to('admin/roles')); ?>"><?php echo e(trans('labels.roles')); ?></a></li>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <?php if(request()->is('admin/roles/edit-*')): ?>
                    <?php echo e(trans('labels.edit')); ?>

                <?php else: ?>
                    <?php echo e(trans('labels.add_new')); ?>

                <?php endif; ?>



            </li>

        <?php endif; ?>
        <?php if(request()->is('admin/customers')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.customers')); ?></li>
        <?php endif; ?>



        <?php if(request()->is('admin/customers/add*') || request()->is('admin/customers/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><a href="<?php echo e(URL::to('admin/customers')); ?>"><?php echo e(trans('labels.customers')); ?></a>
            </li>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <?php if(request()->is('admin/customers/edit-*')): ?>
                    <?php echo e(trans('labels.edit')); ?>

                <?php else: ?>
                    <?php echo e(trans('labels.add_new')); ?>

                <?php endif; ?>



            </li>

        <?php endif; ?>
        <?php if(request()->is('admin/notification')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.firebase_notification')); ?></li>
        <?php endif; ?>



        <?php if(request()->is('admin/notification/add*') || request()->is('admin/notification/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><a
                    href="<?php echo e(URL::to('admin/notification')); ?>"><?php echo e(trans('labels.firebase_notification')); ?></a></li>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <?php if(request()->is('admin/notification/edit-*')): ?>
                    <?php echo e(trans('labels.edit')); ?>

                <?php else: ?>
                    <?php echo e(trans('labels.add_new')); ?>

                <?php endif; ?>



            </li>

        <?php endif; ?>

        <?php if(request()->is('admin/booking')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.booking')); ?></li>
        <?php endif; ?>



        <?php if(request()->is('admin/area')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.area')); ?></li>
        <?php endif; ?>



        <?php if(request()->is('admin/area/add*') || request()->is('admin/area/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><a href="<?php echo e(URL::to('admin/area')); ?>"><?php echo e(trans('labels.area')); ?></a></li>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <?php if(request()->is('admin/area/edit-*')): ?>
                    <?php echo e(trans('labels.edit')); ?>

                <?php else: ?>
                    <?php echo e(trans('labels.add_new')); ?>

                <?php endif; ?>



            </li>

        <?php endif; ?>



        <?php if(request()->is('admin/plan/selectplan-*')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/plan')); ?>"><?php echo e(trans('labels.plan')); ?></a>
            </li>



            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.selected_plan')); ?></li>
        <?php endif; ?>


        <?php if(request()->is('admin/payment')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.payment_settings')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/shipping-area')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.shipping_area')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/shipping-area/add*') || request()->is('admin/shipping-area/show*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><a
                    href="<?php echo e(URL::to('admin/shipping-area')); ?>"><?php echo e(trans('labels.shipping_area')); ?></a></li>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <?php if(request()->is('admin/shipping-area/show*')): ?>
                    <?php echo e(trans('labels.edit')); ?>

                <?php else: ?>
                    <?php echo e(trans('labels.add')); ?>

                <?php endif; ?>

            </li>



        <?php endif; ?>

        <?php if(request()->is('admin/time')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.working_hours')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/google_analytics')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.analytics')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/categories')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.categories')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/categories/add') || request()->is('admin/categories/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/categories')); ?>"><?php echo e(trans('labels.categories')); ?></a>
            </li>

            <?php if(request()->is('admin/categories/edit-*')): ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.edit')); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>

        <?php endif; ?>





        <?php if(request()->is('admin/products')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.products')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/products/add') || request()->is('admin/products/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/products')); ?>"><?php echo e(trans('labels.products')); ?></a>
            </li>

            <?php if(request()->is('admin/products/edit-*')): ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.edit')); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>

        <?php endif; ?>



        <?php if(request()->is('admin/banner')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.banner')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/banner/add') || request()->is('admin/banner/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/banner')); ?>"><?php echo e(trans('labels.banner')); ?></a>
            </li>

            <?php if(request()->is('admin/banner/edit-*')): ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.edit')); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>

        <?php endif; ?>



        <?php if(request()->is('admin/coupons')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.coupons')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/coupons/add') || request()->is('admin/coupons/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/coupons')); ?>"><?php echo e(trans('labels.coupons')); ?></a>
            </li>

            <?php if(request()->is('admin/coupons/edit-*')): ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.edit')); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>

        <?php endif; ?>



        <?php if(request()->is('admin/blogs')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.blogs')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/blogs/add') || request()->is('admin/blogs/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/blogs')); ?>"><?php echo e(trans('labels.blogs')); ?></a>
            </li>

            <?php if(request()->is('admin/blogs/edit-*')): ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.edit')); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>

        <?php endif; ?>

        <?php if(request()->is('admin/subscribers')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.subscribers')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/inquiries')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.inquiries')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/privacy-policy')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.privacy_policy')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/refund-policy')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.refund_policy')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/terms-conditions')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.terms')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/aboutus')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.about_us')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/share')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.share')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/settings')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.settings')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/users')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.users')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/users/add-*') || request()->is('admin/users/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/users')); ?>"><?php echo e(trans('labels.users')); ?></a>
            </li>

            <?php if(request()->is('admin/users/edit-*')): ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.edit')); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>

        <?php endif; ?>

        <?php if(request()->is('admin/areas')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.areas')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/areas/add') || request()->is('admin/areas/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/areas')); ?>"><?php echo e(trans('labels.areas')); ?></a>
            </li>

            <?php if(request()->is('admin/areas/edit-*')): ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.edit')); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>

        <?php endif; ?>

        <?php if(request()->is('admin/cities')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.cities')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/cities/add') || request()->is('admin/cities/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/cities')); ?>"><?php echo e(trans('labels.cities')); ?></a>
            </li>

            <?php if(request()->is('admin/cities/edit-*')): ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.edit')); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>

        <?php endif; ?>



        <?php if(request()->is('admin/custom_domain')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.custom_domain')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/custom_domain/add') || request()->is('admin/custom_domain/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/custom_domain')); ?>"><?php echo e(trans('labels.custom_domain')); ?></a>
            </li>

            <?php if(request()->is('admin/custom_domain/edit-*')): ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.edit')); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>

        <?php endif; ?>



        <?php if(request()->is('admin/whoweare')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.who_we_are')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/whoweare/add') || request()->is('admin/whoweare/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/whoweare')); ?>"><?php echo e(trans('labels.who_we_are')); ?></a>
            </li>

            <?php if(request()->is('admin/whoweare/edit-*')): ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.edit')); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>

        <?php endif; ?>


        <?php if(request()->is('admin/how_works')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.how_works')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/how_works/add') || request()->is('admin/how_works/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/how_works')); ?>"><?php echo e(trans('labels.how_works')); ?></a>
            </li>

            <?php if(request()->is('admin/how_works/edit-*')): ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.edit')); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>

        <?php endif; ?>

        <?php if(request()->is('admin/themes')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.theme_images')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/themes/add') || request()->is('admin/themes/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/themes')); ?>"><?php echo e(trans('labels.theme_images')); ?></a>
            </li>

            <?php if(request()->is('admin/themes/edit-*')): ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.edit')); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>

        <?php endif; ?>

        <?php if(request()->is('admin/features')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.features')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/features/add') || request()->is('admin/features/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/features')); ?>"><?php echo e(trans('labels.features')); ?></a>
            </li>

            <?php if(request()->is('admin/features/edit-*')): ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.edit')); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>

        <?php endif; ?>



        <?php if(request()->is('admin/promotionalbanners')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.promotional_banners')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/promotionalbanners/add') || request()->is('admin/promotionalbanners/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/promotionalbanners')); ?>"><?php echo e(trans('labels.promotional_banners')); ?></a>
            </li>

            <?php if(request()->is('admin/promotionalbanners/edit-*')): ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.edit')); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>

        <?php endif; ?>



        <?php if(request()->is('admin/faqs')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.faqs')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/faqs/add') || request()->is('admin/faqs/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/faqs')); ?>"><?php echo e(trans('labels.faqs')); ?></a>
            </li>

            <?php if(request()->is('admin/faqs/edit-*')): ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.edit')); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>

        <?php endif; ?>



        <?php if(request()->is('admin/testimonials')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.testimonials')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/testimonials/add') || request()->is('admin/testimonials/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/testimonials')); ?>"><?php echo e(trans('labels.testimonials')); ?></a>
            </li>

            <?php if(request()->is('admin/testimonials/edit-*')): ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.edit')); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>

        <?php endif; ?>

        <?php if(request()->is('admin/products/import')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.product_upload')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/media')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/products/import')); ?>"><?php echo e(trans('labels.media')); ?></a>
            </li>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.add')); ?>

            </li>
        <?php endif; ?>



        <?php if(request()->is('admin/language-settings') ||
                request()->is('admin/language-settings/en*') ||
                request()->is('admin/language-settings/ar*') ||
                request()->is('admin/language-settings/de*')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.language-settings')); ?></li>
        <?php endif; ?>


        <?php if(request()->is('admin/language-settings/add') || request()->is('admin/language-settings/language/edit-*')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/language-settings')); ?>"><?php echo e(trans('labels.language-settings')); ?></a>
            </li>
            <?php if(request()->is('admin/language-settings/language/edit-*')): ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.edit')); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>
        <?php endif; ?>

        <?php if(request()->is('admin/apps')): ?>
            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page"><?php echo e(trans('labels.apps')); ?></li>
        <?php endif; ?>

        <?php if(request()->is('admin/createsystem-addons') || request()->is('admin/createsystem-addons/edit-*')): ?>

            <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                aria-current="page">

                <a href="<?php echo e(URL::to('admin/apps')); ?>"><?php echo e(trans('labels.addons_manager')); ?></a>
            </li>

            <?php if(request()->is('admin/features/edit-*')): ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.edit')); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    aria-current="page"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>

        <?php endif; ?>









    </ol>

</nav>
<?php /**PATH /mnt/c/restro-saas/resources/views/admin/layout/breadcrumb.blade.php ENDPATH**/ ?>