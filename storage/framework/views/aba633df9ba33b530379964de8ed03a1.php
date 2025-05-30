<?php $__env->startSection('content'); ?>
    <!-- breadcrumb start -->
    <section class="breadcrumb-sec">
        <div class="container">
            <nav class="px-3">
                <ol class="breadcrumb d-flex m-0 text-capitalize">
                    <li class="breadcrumb-item"><a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>"
                            class="text-dark"><?php echo e(trans('labels.home')); ?></a></li>

                    <li
                        class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left'); ?>">
                        <?php echo e(trans('labels.top_deals')); ?>

                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- breadcrumb end -->
    <section>
        <div class="background-black py-5">
            <div class="container">
                <div id="eapps-countdown-timer-1"
                    class="rounded eapps-countdown-timer eapps-countdown-timer-align-center eapps-countdown-timer-position-bottom-bar-floating eapps-countdown-timer-animation-none eapps-countdown-timer-theme-default eapps-countdown-timer-finish-button-show  eapps-countdown-timer-style-combined eapps-countdown-timer-style-blocks eapps-countdown-timer-position-bar eapps-countdown-timer-area-clickable eapps-countdown-timer-has-background">
                    <div class="eapps-countdown-timer-container d-flex">
                        <div class="eapps-countdown-timer-inner row g-md-3 g-5 flex-column flex-sm-row">
                            <div
                                class="eapps-countdown-timer-header d-flex col-sm-6 col-12 align-items-center justify-content-center justify-content-md-start">
                                <div
                                    class="eapps-countdown-timer-header-title <?php echo e(session()->get('direction') == 2 ? 'text-center text-md-end' : 'text-center text-md-start'); ?>">
                                    <div class="eapps-countdown-timer-header-title-text">
                                        <div class="page-title mb-1">
                                            <?php echo e(trans('labels.home_page_top_deals_title')); ?>

                                        </div>
                                        <div class="page-subtitle text-white line-limit-2 m-0">
                                            Special Offer 30% OFF 🔥 Lorem, ipsum dolor sit amet
                                            consectetur adipisicing elit. Enim tempora maiores.
                                            <?php echo e(trans('labels.home_page_top_deals_subtitle')); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="eapps-countdown-timer-item-container col-sm-6 col-12">
                                <div id="countdown"
                                    class="<?php echo e(session()->get('direction') == 2 ? 'justify-content-center justify-content-start' : 'justify-content-md-end justify-content-center'); ?> gap-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row g-2 g-md-3 pt-4">
                <?php $__currentLoopData = $topdealsproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        if (@helper::top_deals($storeinfo->id)->offer_type == 1) {
                            if ($item['variation']->count() > 0) {
                                if ($item['variation'][0]->price > @helper::top_deals($storeinfo->id)->offer_amount) {
                                    $price =
                                        $item['variation'][0]->price - @helper::top_deals($storeinfo->id)->offer_amount;
                                } else {
                                    $price = $item['variation'][0]->price;
                                }
                            } else {
                                if ($item->item_price > @helper::top_deals($storeinfo->id)->offer_amount) {
                                    $price = $item->item_price - @helper::top_deals($storeinfo->id)->offer_amount;
                                } else {
                                    $price = $item->item_price;
                                }
                            }
                        } else {
                            if ($item['variation']->count() > 0) {
                                $price =
                                    $item['variation'][0]->price -
                                    $item['variation'][0]->price *
                                        (@helper::top_deals($storeinfo->id)->offer_amount / 100);
                            } else {
                                $price =
                                    $item->item_price -
                                    $item->item_price * (@helper::top_deals($storeinfo->id)->offer_amount / 100);
                            }
                        }
                        if ($item['variation']->count() > 0) {
                            $original_price = $item['variation'][0]->price;
                        } else {
                            $original_price = $item->item_price;
                        }
                        $off = $original_price > 0 ? round(100 - ($price * 100) / $original_price) : 0;
                    ?>
                    <?php if(helper::appdata($storeinfo->id)->template_type == 1): ?>
                        <div class="col-6 col-xl-3 col-lg-4">
                            <div class="card h-100 position-relative rounded">
                                <a href="<?php echo e(URL::to($storeinfo->slug . '/details-' . $item->slug)); ?>">
                                    <div class="overflow-hidden theme1grid_image p-2">
                                        <img src="<?php if(@$item['item_image']->image_url != null): ?> <?php echo e(@$item['item_image']->image_url); ?> <?php else: ?> <?php echo e(helper::image_path($item->image)); ?> <?php endif; ?>"
                                            alt="" class="rounded">
                                        <?php if($off > 0): ?>
                                            <span
                                                class="offer-text rounded fw-500 text-bg-secondary fs-8"><?php echo e($off); ?>%
                                                <?php echo e(trans('labels.off')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </a>
                                <div class="card-body p-2 p-md-3 pb-sm-0 ">
                                    <?php if(Auth::user() && Auth::user()->type == 3): ?>
                                        <div class="favorite-icon set-fav1-<?php echo e($item->id); ?>">
                                            <?php if($item->is_favorite == 1): ?>
                                                <a href="javascript:void(0)"
                                                    onclick="managefavorite('<?php echo e($storeinfo->id); ?>','<?php echo e($item->id); ?>',0,'<?php echo e(URL::to($storeinfo->slug . '/managefavorite')); ?>','<?php echo e(request()->url()); ?>')"><i
                                                        class="fa-solid fa-heart"></i></a>
                                            <?php else: ?>
                                                <a href="javascript:void(0)"
                                                    onclick="managefavorite('<?php echo e($storeinfo->id); ?>','<?php echo e($item->id); ?>',1,'<?php echo e(URL::to($storeinfo->slug . '/managefavorite')); ?>','<?php echo e(request()->url()); ?>')">
                                                    <i class="fa-regular fa-heart"></i>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'product_reviews')->first() != null &&
                                            App\Models\SystemAddons::where('unique_identifier', 'product_reviews')->first()->activated == 1): ?>
                                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                                                App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1): ?>
                                            <?php if(helper::appdata($storeinfo->id)->checkout_login_required == 1): ?>
                                                <a class="fs-8 d-flex gap-1 align-items-center mb-1"
                                                    onclick="showreviews('<?php echo e($item->id); ?>')" role="button"
                                                    aria-controls="offcanvasExample">
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <p class="cursor-pointer fw-600 fs-8">
                                                        <?php echo e(number_format($item->avg_ratting, 1)); ?></p>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <a href="<?php echo e(URL::to($storeinfo->slug . '/details-' . $item->slug)); ?>"
                                        class="title pb-1">
                                        <?php echo e($item->item_name); ?>

                                    </a>
                                </div>
                                <div class="card-footer bg-transparent border-0 p-2 pt-md-0 p-md-3 pt-0">
                                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                                        <div class="mb-2 mb-md-0">
                                            <div class="d-flex gap-1 flex-wrap align-items-center">
                                                <p class="price">
                                                    <?php echo e(helper::currency_formate($price, @$storeinfo->id)); ?>

                                                </p>
                                                <?php if($item->item_original_price != null): ?>
                                                    <?php if($original_price > $price): ?>
                                                        <del><?php echo e(helper::currency_formate($original_price, @$storeinfo->id)); ?></del>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="d-flex col-sm-auto col-12 justify-content-end align-items-center">
                                            <button
                                                class="btn-primary w-100 px-3 py-2 d-flex gap-2 fw-500 align-items-center justify-content-center fs-7 btn m-0"
                                                type="button"
                                                onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')">
                                                <div class="addcartbtn-<?php echo e($item->id); ?>">
                                                    <i class="fa-regular fa-plus"></i>
                                                    <?php echo e(trans('labels.add_to_cart')); ?>

                                                </div>
                                                <div class="load showload-<?php echo e($item->id); ?>" style="display:none">
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-md-6">
                            <div class="card thme1categories rounded dark h-100">
                                <a href="<?php echo e(URL::to($storeinfo->slug . '/details-' . $item->slug)); ?>">
                                    <img src="<?php if(@$item['item_image']->image_url != null): ?> <?php echo e(@$item['item_image']->image_url); ?> <?php else: ?> <?php echo e(helper::image_path($item->image)); ?> <?php endif; ?>"
                                        class="card-img-top rounded" alt="...">
                                </a>
                                <div class="card-body">
                                    <div class="text-section">
                                        <div class="d-flex justify-content-between flex-wrap align-items-center">
                                            <?php if($off > 0): ?>
                                                <span
                                                    class="p-1 px-2 rounded fw-500 text-bg-secondary fs-8"><?php echo e($off); ?>%
                                                    <?php echo e(trans('labels.off')); ?></span>
                                            <?php endif; ?>
                                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'product_reviews')->first() != null &&
                                                    App\Models\SystemAddons::where('unique_identifier', 'product_reviews')->first()->activated == 1): ?>
                                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                                                        App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1): ?>
                                                    <?php if(helper::appdata($storeinfo->id)->checkout_login_required == 1): ?>
                                                        <a class="fs-8 d-flex gap-1 align-items-center mb-1"
                                                            onclick="showreviews('<?php echo e($item->id); ?>')" role="button"
                                                            aria-controls="offcanvasExample">
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <p class="cursor-pointer fw-600 fs-8">
                                                                <?php echo e(number_format($item->avg_ratting, 1)); ?></p>
                                                        </a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <a href="<?php echo e(URL::to($storeinfo->slug . '/details-' . $item->slug)); ?>"
                                            class="title pb-1 mt-2"><?php echo e($item->item_name); ?></a>
                                        <div class="d-flex align-items-baseline mt-2">
                                            <div class="products-price d-flex gap-2 align-items-center">
                                                <span class="price">
                                                    <?php echo e(helper::currency_formate($price, @$storeinfo->id)); ?></span>
                                                <?php if($item->item_original_price != null): ?>
                                                    <?php if($original_price > $price): ?>
                                                        <del><?php echo e(helper::currency_formate($original_price, @$storeinfo->id)); ?></del>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <div class="d-flex col-sm-auto justify-content-end align-items-center">
                                                <button
                                                    class="btn-primary w-100 px-3 py-2 d-flex gap-2 fw-500 align-items-center justify-content-center fs-7 btn m-0"
                                                    type="button"
                                                    onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')">
                                                    <div class="addcartbtn-<?php echo e($item->id); ?>">
                                                        <i class="fa-regular fa-plus"></i>
                                                        <?php echo e(trans('labels.add_to_cart')); ?>

                                                    </div>
                                                    <div class="load showload-<?php echo e($item->id); ?>" style="display:none">
                                                    </div>
                                                </button>
                                            </div>
                                            <?php if(Auth::user() && Auth::user()->type == 3): ?>
                                                <div class="favorite-icon1 p-0 set-fav1-<?php echo e($item->id); ?>">
                                                    <?php if($item->is_favorite == 1): ?>
                                                        <a href="javascript:void(0)" class="text-secondary"
                                                            onclick="managefavorite('<?php echo e($storeinfo->id); ?>','<?php echo e($item->id); ?>',0,'<?php echo e(URL::to($storeinfo->slug . '/managefavorite')); ?>','<?php echo e(request()->url()); ?>')"><i
                                                                class="fa-solid fa-heart"></i></a>
                                                    <?php else: ?>
                                                        <a href="javascript:void(0)" class="text-secondary"
                                                            onclick="managefavorite('<?php echo e($storeinfo->id); ?>','<?php echo e($item->id); ?>',1,'<?php echo e(URL::to($storeinfo->slug . '/managefavorite')); ?>','<?php echo e(request()->url()); ?>')"><i
                                                                class="fa-regular fa-heart"></i></a>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        </div>
    </section>
    <!-- blog detail section end -->
    <?php echo $__env->make('front.sum_qusction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/top_deals.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/viewalltopdeals.blade.php ENDPATH**/ ?>