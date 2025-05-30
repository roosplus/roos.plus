<?php $__env->startSection('content'); ?>
    <!-- banner Section Start -->
    <?php if(count(helper::footer_features(@$storeinfo->id)) > 0 ||
            (count($getcategory) > 0 && count($getitem) > 0) ||
            count($bannerimage) > 0 ||
            count($blogs) > 0): ?>
        <?php if(helper::appdata($storeinfo->id)->banner != null): ?>
            <section class="mt-0 position-relative">
                <div class="theme-1 m-0">
                    <img src="<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->banner)); ?>" alt="">
                </div>
            </section>
        <?php endif; ?>
        <!-- banner Section End -->
        <!-- fhishar Section Start -->
        <?php if(count(helper::footer_features(@$storeinfo->id)) > 0): ?>
            <section class="bg-light py-3 mt-0">
                <div class="container">
                    <div class="row my-1 justify-content-center align-items-center overflow-hidden">
                        <?php $__currentLoopData = helper::footer_features(@$storeinfo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="card footer-card">
                                    <div class="card-body d-flex gap-3 align-items-center">
                                        <div class="quality-icon">
                                            <?php echo $feature->icon; ?>

                                        </div>
                                        <div class="quality-content">
                                            <h3><?php echo e($feature->title); ?></h3>
                                            <p class="fs-7"><?php echo e($feature->description); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- fhishar Section end -->
        <!-- Banner Slider Section Start -->
        <?php if(count($bannerimage) > 0): ?>
            <section class="banner-slider-section">
                <div class="container">
                    <div class="row py-5">
                        <div class="col">
                            <div class="owl-carousel banner-imges-slider-2 owl-theme">
                                <?php $__currentLoopData = $bannerimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item">
                                        <div class="overflow-hidden rounded">
                                            <img src="<?php echo e(helper::image_path($image->banner_image)); ?>" alt=""
                                                class="rounded">
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- Banner Slider Section End -->

        <!-- Why People Choose us Section Start -->
        <?php if(count($whowearedata) > 0): ?>
            <section class="theme-1">
                <div class="container Who_We_Are">
                    <div class="row my-md-4 my-3 g-3">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center align-items-center">
                            <div>
                                <div class="menu-heading mb-4">
                                    <h3 class="page-title mb-1 text-capitalize">
                                        <?php echo e(helper::appdata($storeinfo->id)->whoweare_title); ?></h3>
                                    <p class="page-subtitle line-limit-2 mt-0 fs-7">
                                        <?php echo e(helper::appdata($storeinfo->id)->whoweare_subtitle); ?>

                                    </p>
                                </div>
                                <div class="row g-xl-4 g-3">
                                    <?php $__currentLoopData = $whowearedata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $whoweare): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-6 col-12 d-flex gap-2">
                                            <div class="icon rounded-2">
                                                <img src="<?php echo e(helper::image_path($whoweare->image)); ?>"
                                                    class="w-100 h-100 rounded-2">
                                            </div>
                                            <div class="text-content col">
                                                <h6 class="mb-2 fs-15 text-capitalize fw-600 line-2"><?php echo e($whoweare->title); ?>

                                                </h6>
                                                <p class="fs-7 m-0 line-3"><?php echo e($whoweare->sub_title); ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="image1 rounded overflow-hidden">
                                <img src="<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->whoweare_image)); ?>"
                                    alt="" class="object rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- Why People Choose us Section End -->

        <!-- Categories Section Start -->
        <?php if(count($getcategory) > 0 && count($getitem) > 0): ?>
            <section class="theme-1-margin-top">
                <div class="container">
                    <div class="menu-heading mb-4">
                        <h3 class="page-title mb-1"><?php echo e(trans('labels.our_products')); ?></h3>
                        <p class="page-subtitle line-limit-2 mt-0">
                            <?php echo e(trans('labels.our_products_desc')); ?>

                        </p>
                    </div>
                    <ul class="navgation_lower overflow-auto theme-1-category-card gap-1 py-3 m-0 flex-lg-wrap">
                        <?php $__currentLoopData = $getcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $check_cat_count = 0;
                            ?>
                            <?php $__currentLoopData = $getitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($category->id == $item->cat_id): ?>
                                    <?php
                                        $check_cat_count++;
                                    ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($check_cat_count > 0): ?>
                                <li class="<?php echo e($key == 0 ? 'active1' : ''); ?> mb-4 mx-lg-0 mx-4 theme-1category-width"
                                    id="specs-<?php echo e($category->id); ?>">
                                    <div class="theme-1active">
                                        <img src="<?php echo e(helper::image_path($category->image)); ?>" alt="">
                                        <p class="act-1 line-2 fw-600"><?php echo e($category->name); ?></p>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <?php if(helper::appdata($storeinfo->id)->template_type == 1): ?>
                        <?php echo $__env->make('front.template-1.theme-grid', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                        <?php echo $__env->make('front.template-1.theme-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
            </section>
        <?php endif; ?>
        <!-- Categories Section End -->

        <section class="table-booking my-5">
            <div class="container">
                <div class="row g-3 align-items-center bg-light rounded p-3">
                    <div class="reservation-content col-lg-6">
                        <form action="<?php echo e(URL::To(@$storeinfo->slug . '/book')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="menu-heading mb-4">
                                        <h3 class="page-title mb-1"><?php echo e(trans('labels.book_table')); ?></h3>
                                        <p class="page-subtitle line-limit-2"><?php echo e(trans('labels.book_table_note')); ?></p>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="validationDefault"
                                                class="form-label"><?php echo e(trans('labels.name')); ?><span class="text-danger">
                                                    *
                                                </span></label>
                                            <input type="text" class="form-control input-h" name="name"
                                                placeholder="<?php echo e(trans('labels.name')); ?>" required>
                                            <input type="hidden" name="vendor_id" value="<?php echo e($vdata); ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationDefault"
                                                class="form-label"><?php echo e(trans('labels.email')); ?><span class="text-danger">
                                                    *
                                                </span></label>
                                            <input type="text" class="form-control input-h" name="email"
                                                placeholder="<?php echo e(trans('labels.email')); ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationDefault"
                                                class="form-label"><?php echo e(trans('labels.mobile')); ?><span class="text-danger">
                                                    *
                                                </span></label>
                                            <input type="number" class="form-control input-h" name="mobile"
                                                placeholder="<?php echo e(trans('labels.mobile')); ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationDefault"
                                                class="form-label"><?php echo e(trans('labels.event_date')); ?><span
                                                    class="text-danger"> * </span></label>
                                            <input type="date" class="form-control input-h" name="event_date"
                                                placeholder="<?php echo e(trans('labels.event_date')); ?>" min="<?php echo e(date('Y-m-d')); ?>"
                                                required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationDefault"
                                                class="form-label"><?php echo e(trans('labels.event_time')); ?><span
                                                    class="text-danger"> * </span></label>
                                            <input type="time" class="form-control input-h" name="event_time"
                                                placeholder="<?php echo e(trans('labels.event_time')); ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationDefault"
                                                class="form-label"><?php echo e(trans('labels.event')); ?><span class="text-danger">
                                                    *
                                                </span></label>
                                            <input type="text" class="form-control input-h" name="event"
                                                placeholder="<?php echo e(trans('labels.event')); ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationDefault"
                                                class="form-label"><?php echo e(trans('labels.people')); ?><span class="text-danger">
                                                    *
                                                </span></label>
                                            <input type="text" class="form-control input-h" name="people"
                                                placeholder="<?php echo e(trans('labels.people')); ?>" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label"><?php echo e(trans('labels.special_request')); ?></label>
                                            <textarea class="form-control input-h" rows="5" aria-label="With textarea" name="notes"
                                                placeholder="<?php echo e(trans('labels.special_request')); ?>"></textarea>
                                        </div>
                                        <div class="col d-flex justify-content-center">
                                            <button type="submit"
                                                class="btn btn-secondary px-sm-4 px-3 py-2 rounded fw-500 fs-15"><?php echo e(trans('labels.submit')); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 d-lg-block d-none table-booking-1">
                        <img src="<?php echo e(helper::image_path(helper::appdata(@$storeinfo->id)->book_table_image)); ?>"
                            class="w-100 object-fit-cover rounded" alt="table booking">
                    </div>
                </div>
            </div>
        </section>

        <!-- DEALS START -->
        <?php if(App\Models\SystemAddons::where('unique_identifier', 'top_deals')->first() != null &&
                App\Models\SystemAddons::where('unique_identifier', 'top_deals')->first()->activated == 1): ?>
            <?php if(count($topdealsproducts) > 0 && @helper::top_deals($storeinfo->id) != null): ?>
                <section class="deals mb-5 pro-hover" id="topdeals">
                    <div class="background-black py-5">
                        <div class="container">
                            <div id="eapps-countdown-timer-1"
                                class="rounded eapps-countdown-timer eapps-countdown-timer-align-center eapps-countdown-timer-position-bottom-bar-floating eapps-countdown-timer-animation-none eapps-countdown-timer-theme-default eapps-countdown-timer-finish-button-show   eapps-countdown-timer-style-combined eapps-countdown-timer-style-blocks eapps-countdown-timer-position-bar eapps-countdown-timer-area-clickable eapps-countdown-timer-has-background">
                                <div class="eapps-countdown-timer-container d-flex">
                                    <div class="eapps-countdown-timer-inner row g-3 flex-column flex-sm-row">
                                        <div
                                            class="eapps-countdown-timer-header d-flex col-lg-4 col-md-6 align-items-center justify-content-center justify-content-md-start">
                                            <div class="eapps-countdown-timer-header-title">
                                                <div
                                                    class="eapps-countdown-timer-header-title-text <?php echo e(session()->get('direction') == 2 ? 'text-sm-end' : 'text-sm-start'); ?> text-center">
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
                                            <div class="eapps-countdown-timer-header-caption"></div>
                                        </div>
                                        <div class="eapps-countdown-timer-item-container col-lg-4 col-md-6">
                                            <div id="countdown"></div>
                                        </div>
                                        <div
                                            class="eapps-countdown-timer-button-container d-flex col-lg-4 col-md-12 align-items-center justify-content-center justify-content-lg-end">
                                            <a href="<?php echo e(URL::to(@$storeinfo->slug . '/topdeals?type=1')); ?>"
                                                class="btn btn-secondary px-sm-4 px-3 py-2 rounded fw-500 fs-15">
                                                <?php echo e(trans('labels.viewall')); ?>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container pt-5">
                        <div class="owl-carousel topdeals-slider owl-theme">
                            <?php $__currentLoopData = $topdealsproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    if (@helper::top_deals($storeinfo->id)->offer_type == 1) {
                                        if ($item['variation']->count() > 0) {
                                            if (
                                                $item['variation'][0]->price >
                                                @helper::top_deals($storeinfo->id)->offer_amount
                                            ) {
                                                $price =
                                                    $item['variation'][0]->price -
                                                    @helper::top_deals($storeinfo->id)->offer_amount;
                                            } else {
                                                $price = $item['variation'][0]->price;
                                            }
                                        } else {
                                            if ($item->item_price > @helper::top_deals($storeinfo->id)->offer_amount) {
                                                $price =
                                                    $item->item_price -
                                                    @helper::top_deals($storeinfo->id)->offer_amount;
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
                                                $item->item_price *
                                                    (@helper::top_deals($storeinfo->id)->offer_amount / 100);
                                        }
                                    }
                                    if ($item['variation']->count() > 0) {
                                        $original_price = $item['variation'][0]->price;
                                    } else {
                                        $original_price = $item->item_price;
                                    }
                                    $off = $original_price > 0 ? round(100 - ($price * 100) / $original_price) : 0;
                                ?>
                                <div class="item h-100">
                                    <div class="col-auto theme1grid">
                                        <?php if(helper::appdata($storeinfo->id)->template_type == 1): ?>
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
                                                                    onclick="showreviews('<?php echo e($item->id); ?>')"
                                                                    role="button" aria-controls="offcanvasExample">
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
                                                    <div
                                                        class="d-flex flex-wrap justify-content-between align-items-center gap-2">
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
                                                        <div
                                                            class="d-flex col-sm-auto col-12 justify-content-end align-items-center">
                                                            <button
                                                                class="btn-primary w-100 px-3 py-2 d-flex gap-2 fw-500 align-items-center justify-content-center fs-7 btn m-0"
                                                                type="button"
                                                                onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')">
                                                                <div class="addcartbtn-<?php echo e($item->id); ?>">
                                                                    <i class="fa-regular fa-plus"></i>
                                                                    <?php echo e(trans('labels.add_to_cart')); ?>

                                                                </div>
                                                                <div class="load showload-<?php echo e($item->id); ?>"
                                                                    style="display:none">
                                                                </div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="card thme1categories rounded dark h-100">
                                                <a href="<?php echo e(URL::to($storeinfo->slug . '/details-' . $item->slug)); ?>">
                                                    <img src="<?php if(@$item['item_image']->image_url != null): ?> <?php echo e(@$item['item_image']->image_url); ?> <?php else: ?> <?php echo e(helper::image_path($item->image)); ?> <?php endif; ?>"
                                                        class="card-img-top rounded" alt="...">
                                                </a>
                                                <div class="card-body">
                                                    <div class="text-section">
                                                        <div
                                                            class="d-flex justify-content-between flex-wrap align-items-center">
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
                                                                        <a class="fs-8 d-flex gap-1 align-items-center"
                                                                            onclick="showreviews('<?php echo e($item->id); ?>')"
                                                                            role="button"
                                                                            aria-controls="offcanvasExample">
                                                                            <i class="fa-solid fa-star text-warning"></i>
                                                                            <p class="cursor-pointer fw-600 fs-8">
                                                                                <?php echo e(number_format($item->avg_ratting, 1)); ?>

                                                                            </p>
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

                                                        <div
                                                            class="d-flex justify-content-between align-items-center mt-2">
                                                            <div
                                                                class="d-flex col-sm-auto justify-content-end align-items-center">
                                                                <button
                                                                    class="btn-primary w-100 px-3 py-2 d-flex gap-2 fw-500 align-items-center justify-content-center fs-7 btn m-0"
                                                                    type="button"
                                                                    onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')">
                                                                    <div class="addcartbtn-<?php echo e($item->id); ?>">
                                                                        <i class="fa-regular fa-plus"></i>
                                                                        <?php echo e(trans('labels.add_to_cart')); ?>

                                                                    </div>
                                                                    <div class="load showload-<?php echo e($item->id); ?>"
                                                                        style="display:none">
                                                                    </div>
                                                                </button>
                                                            </div>
                                                            <?php if(Auth::user() && Auth::user()->type == 3): ?>
                                                                <div
                                                                    class="favorite-icon1 p-0 set-fav1-<?php echo e($item->id); ?>">
                                                                    <?php if($item->is_favorite == 1): ?>
                                                                        <a href="javascript:void(0)"
                                                                            class="text-secondary"
                                                                            onclick="managefavorite('<?php echo e($storeinfo->id); ?>','<?php echo e($item->id); ?>',0,'<?php echo e(URL::to($storeinfo->slug . '/managefavorite')); ?>','<?php echo e(request()->url()); ?>')">
                                                                            <i class="fa-solid fa-heart"></i>
                                                                        </a>
                                                                    <?php else: ?>
                                                                        <a href="javascript:void(0)"
                                                                            class="text-secondary"
                                                                            onclick="managefavorite('<?php echo e($storeinfo->id); ?>','<?php echo e($item->id); ?>',1,'<?php echo e(URL::to($storeinfo->slug . '/managefavorite')); ?>','<?php echo e(request()->url()); ?>')">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php endif; ?>
        <!-- DEALS END -->

        <!-- Blogs Section Start -->
        <?php if(App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null &&
                App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1): ?>
            <?php
                if (helper::vendordata(@$vdata)->allow_without_subscription == 1) {
                    $blog = 1;
                } else {
                    $blog = @helper::get_plan($storeinfo->id)->blogs;
                }
            ?>
            <?php if($blog == 1): ?>
                <?php if(count($blogs) > 0): ?>
                    <section class="bg-light theme-1-margin-top blogs-card theme-1 py-5">
                        <div class="container overflow-hidden">
                            <div class="d-md-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <h3 class="page-title mb-1"> <?php echo e(trans('labels.blogs')); ?></h3>
                                    <p class="page-subtitle line-limit-2 mb-4">
                                        <?php echo e(trans('labels.blog_desc')); ?>

                                    </p>
                                </div>
                                <div>
                                    <a href="<?php echo e(URL::to(@$storeinfo->slug . '/blog-list')); ?>"
                                        class="btn btn-secondary extra-paddings rounded px-sm-4 px-3 py-2 fs-15 fw-500">
                                        <?php echo e(trans('labels.view_all')); ?>

                                    </a>
                                </div>
                            </div>
                            <div class="owl-carousel blogs-slider owl-theme">
                                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(URL::to(@$storeinfo->slug . '/blog-details-' . $blog->slug)); ?>">
                                        <div class="item h-100">
                                            <div class="card h-100 rounded">
                                                <img src="<?php echo e(helper::image_path($blog->image)); ?>" alt=""
                                                    class="rounded">
                                                <div class="card-body py-4">
                                                    <p class="title mt-2 blog-title"><?php echo e($blog->title); ?></p>
                                                    <span class="blog-description"><?php echo $blog->description; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
        <!-- Blogs Section End -->
        <!-- Store Review Section Start -->
        <?php if(App\Models\SystemAddons::where('unique_identifier', 'store_reviews')->first() != null &&
                App\Models\SystemAddons::where('unique_identifier', 'store_reviews')->first()->activated == 1): ?>
            <?php if(count($storereview) > 0): ?>
                <section class="theme-1 testimonial my-5">
                    <div class="container">
                        <!-- Testimonials -->
                        <div class="row">
                            <!-- Title -->
                            <div class="d-md-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h3 class="page-title mb-1"> <?php echo e(trans('labels.review_tital')); ?></h3>
                                    <p class="page-subtitle line-limit-2 m-md-0 mb-3">
                                        <?php echo e(trans('labels.review_note')); ?>

                                    </p>
                                </div>
                                <div>
                                    <a href="<?php echo e(URL::to($storeinfo->slug . '/storereviewshow')); ?>"
                                        class="btn btn-secondary extra-paddings rounded px-sm-4 px-3 py-2 fs-15 fw-500">
                                        <?php echo e(trans('labels.view_all')); ?>

                                    </a>
                                </div>
                            </div>
                            <div class="owl-carousel testimonial-slider owl-theme testimonials pt-4">
                                <?php $__currentLoopData = $storereview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item">
                                        <div class="card rounded h-100">
                                            <div class="card-body p-sm-4 p-3">
                                                <div class="d-flex gap-2 align-items-center">
                                                    <div class="client-img">
                                                        <img src="<?php echo e(helper::image_path($review->image)); ?>"
                                                            alt="" class="object">
                                                    </div>
                                                    <div>
                                                        <p class="fs-15 fw-600 d-flex flex-wrap gap-1 align-items-center">
                                                            <?php echo e($review->name); ?> - <span
                                                                class="fs-8"><?php echo e($review->position); ?></span>
                                                        </p>
                                                        <ul class="d-flex mt-1 gap-1 m-0">
                                                            <?php if($review->star == 1): ?>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-solid fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-regular fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-regular fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-regular fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-regular fa-star"></i>
                                                                </li>
                                                            <?php elseif($review->star == 2): ?>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-solid fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-solid fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-regular fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-regular fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-regular fa-star"></i>
                                                                </li>
                                                            <?php elseif($review->star == 3): ?>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-solid fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-solid fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-solid fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-regular fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-regular fa-star"></i>
                                                                </li>
                                                            <?php elseif($review->star == 4): ?>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-solid fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-solid fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-solid fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-solid fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-regular fa-star"></i>
                                                                </li>
                                                            <?php elseif($review->star == 5): ?>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-solid fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-solid fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-solid fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-solid fa-star"></i>
                                                                </li>
                                                                <li class="fs-15 text-warning">
                                                                    <i class="fa-solid fa-star"></i>
                                                                </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="review-client mt-2">
                                                    <p class="fs-7">
                                                        <?php echo e(Str::limit($review->description, 180)); ?>

                                                    </p>

                                                    <div class="d-flex flex-wrap justify-content-between mt-3">
                                                        <div class="d-flex gap-1 align-items-center text-dark">
                                                            <i class="fa-solid fa-clock fs-8"></i>
                                                            <p class="fs-8">
                                                                <?php echo e(date('l', strtotime($review->created_at))); ?>,
                                                                <?php echo e(helper::time_format($review->created_at, $vdata)); ?></p>
                                                        </div>
                                                        <div class="d-flex gap-1 align-items-center text-dark">
                                                            <i class="fa-solid fa-calendar-days fs-8"></i>
                                                            <p class="fs-8">
                                                                <?php echo e(helper::date_format($review->created_at, $vdata)); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php endif; ?>
        <!-- Store Review Section End -->

        <!-- Subscription Section Start -->
        <section class="theme-1-margin-top my-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="subscription-main position-relative w-100 overflow-hidden">
                            <div class="overflow-hidden rounded">
                                <img src="<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->subscribe_background)); ?>"
                                    class="img-fluid subscription-image rounded">
                                <div class="caption-subscription col-md-7 col-lg-6">
                                    <div class="subscription-text">
                                        <h3><?php echo e(trans('labels.subscribe_title')); ?></h3>
                                        <p><?php echo e(trans('labels.subscribe_description')); ?></p>
                                        <form action="<?php echo e(URL::to($storeinfo->slug . '/subscribe')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <div class="subscribe-input form-control col-md-6">
                                                <input type="hidden" value="<?php echo e($storeinfo->id); ?>" name="id">
                                                <input type="email" name="email" class="form-control border-0"
                                                    placeholder="<?php echo e(trans('labels.enter_email')); ?>" required>
                                                <button type="submit"
                                                    class="btn btn-primary fw-500 fs-15 m-0"><?php echo e(trans('labels.subscribe')); ?></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Subscription Section End -->
    <?php else: ?>
        <?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/top_deals.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/template-1/index.blade.php ENDPATH**/ ?>