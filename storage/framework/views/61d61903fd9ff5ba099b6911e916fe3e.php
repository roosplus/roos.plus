
<?php $__env->startSection('content'); ?>
    <section class="breadcrumb-sec">
        <div class="container">
            <nav>
                <ol class="breadcrumb d-flex m-0 text-capitalize">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="text-dark"><?php echo e(trans('labels.home')); ?></a>
                    </li>
                    <li
                        class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left'); ?>">
                        <?php echo e(trans('labels.item_details')); ?>

                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="my-5">
        <div class="container">
            <div class="row g-4 g-md-5 view-product">
                <div class="col-md-5 mb-sm-5 mb-3">
                    <div class="card h-100 overflow-hidden rounded-0 border-0 position-relative">
                        <!-- new big-view -->
                        <div class="sp-wrap">
                            <?php $__currentLoopData = $itemimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(helper::image_path($image->image)); ?>">
                                    <img src="<?php echo e(helper::image_path($image->image)); ?>" alt="">
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <!-- new big-view -->
                </div>
                <?php
                    if ($getitem->top_deals == 1 && helper::top_deals($storeinfo->id) != null) {
                        if (@helper::top_deals($storeinfo->id)->offer_type == 1) {
                            if ($getitem['variation']->count() > 0) {
                                if (
                                    $getitem['variation'][0]->price > @helper::top_deals($storeinfo->id)->offer_amount
                                ) {
                                    $price =
                                        $getitem['variation'][0]->price -
                                        @helper::top_deals($storeinfo->id)->offer_amount;
                                } else {
                                    $price = $getitem['variation'][0]->price;
                                }
                            } else {
                                if ($getitem->item_price > @helper::top_deals($storeinfo->id)->offer_amount) {
                                    $price = $getitem->item_price - @helper::top_deals($storeinfo->id)->offer_amount;
                                } else {
                                    $price = $getitem->item_price;
                                }
                            }
                        } else {
                            if ($getitem['variation']->count() > 0) {
                                $price =
                                    $getitem['variation'][0]->price -
                                    $getitem['variation'][0]->price *
                                        (@helper::top_deals($storeinfo->id)->offer_amount / 100);
                            } else {
                                $price =
                                    $getitem->item_price -
                                    $getitem->item_price * (@helper::top_deals($storeinfo->id)->offer_amount / 100);
                            }
                        }
                        if ($getitem['variation']->count() > 0) {
                            $original_price = $getitem['variation'][0]->price;
                        } else {
                            $original_price = $getitem->item_price;
                        }
                        $off = $original_price > 0 ? round(100 - ($price * 100) / $original_price) : 0;
                    } else {
                        if ($getitem['variation']->count() > 0) {
                            $price = $getitem['variation'][0]->price;
                            $original_price = $getitem['variation'][0]->original_price;
                        } else {
                            $price = $getitem->item_price;
                            $original_price = $getitem->item_original_price;
                        }
                        $off = $original_price > 0 ? round(100 - ($price * 100) / $original_price) : 0;
                    }
                ?>
                <div class="col-md-7">
                    <div class="card-body p-0 text-left">
                        <?php if($off > 0): ?>
                            <span class="badge text-bg-primary fs-7 p-2 mb-2" id="details_offer"><?php echo e($off); ?>%
                                <?php echo e(trans('labels.off')); ?></span>
                        <?php endif; ?>

                        <p class="pro-title fs-4 fw-600 mb-2"><?php echo e($getitem->item_name); ?></p>
                        <div class="d-flex align-items-center justify-content-between mb-0">
                            <p id="detail_laodertext" class="d-none laodertext"></p>
                            <div class="d-flex flex-wrap gap-2 align-items-center product-detail-price">
                                <p class="pro-text pricing details_item_price">
                                    <?php echo e(helper::currency_formate($price, $getitem->vendor_id)); ?>

                                </p>
                                <?php if($original_price > $price): ?>
                                    <del class="card-text pro-org-value text-muted pricing mb-0 details_original_price">
                                        <?php echo e(helper::currency_formate($original_price, $getitem->vendor_id)); ?>

                                    </del>
                                <?php endif; ?>
                            </div>

                            <!-- rating star -->
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'product_reviews')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'product_reviews')->first()->activated == 1): ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1): ?>
                                    <?php if(helper::appdata($getitem->vendor_id)->checkout_login_required == 1): ?>
                                        <a href="javascript::void(0)" onclick="showreviews('<?php echo e($getitem->id); ?>')"
                                            class="cursor-pointer">
                                            <div class="d-flex bg-gray px-2 py-1 rounded-2 align-items-center p-0 m-0"
                                                tooltip="View">
                                                <div id="ratting-div" class="fs-7 fw-semibold">
                                                    <p class="px-1 avg-ratting cursor-pointer">
                                                        <i class="fa-solid fa-star text-warning fs-7"></i>
                                                        <?php echo e(number_format($getitem->avg_ratting, 1)); ?>

                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <p id="detail_tax" class="responcive-tax text-left mb-1">
                            <?php if($getitem->tax != null && $getitem->tax != ''): ?>
                                <span class="text-danger fs-7"> <?php echo e(trans('labels.exclusive_taxes')); ?></span>
                            <?php else: ?>
                                <span class="text-success fs-7"> <?php echo e(trans('labels.inclusive_taxes')); ?></span>
                            <?php endif; ?>
                        </p>

                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'fake_view')->first() != null &&
                                App\Models\SystemAddons::where('unique_identifier', 'fake_view')->first()->activated == 1): ?>
                            <?php if(helper::appdata($storeinfo->id)->product_fake_view == 1): ?>
                                <?php
                                    $var = ['{eye}', '{count}'];
                                    $newvar = [
                                        "<i class='fa-solid fa-eye'></i>",
                                        rand(
                                            helper::appdata($storeinfo->id)->min_view_count,
                                            helper::appdata($storeinfo->id)->max_view_count,
                                        ),
                                    ];

                                    $fake_view = str_replace(
                                        $var,
                                        $newvar,
                                        helper::appdata($storeinfo->id)->fake_view_message,
                                    );
                                ?>
                                <div class="border-bottom pb-3">
                                    <div class="d-flex gap-1 align-items-center blink_me">
                                        <p class="fw-600 text-success"><?php echo $fake_view; ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <div class="border-bottom pb-3 <?php echo e($getitem->stock_management == 1 ? 'd-block' : 'd-none'); ?> <?php echo e($getitem->is_available == 1 ? 'd-block' : 'd-none'); ?>"
                            id="detail_sku_stock">
                            <div class="meta-content bg-secondary-subtle p-3 mt-3 rounded-2">
                                <?php if($getitem->has_variants == 2 && $getitem->stock_management == 1): ?>
                                    <div class="sku-wrapper product_meta py-1" id="detail_stock">
                                        <span class="fs-7 fw-semibold">
                                            <?php echo e(trans('labels.stock')); ?>:
                                        </span>
                                        <?php if($getitem->qty > 0): ?>
                                            <span class="text-success fs-7"><?php echo e($getitem->qty); ?>

                                                <?php echo e(trans('labels.in_stock')); ?></span>
                                        <?php else: ?>
                                            <span class="text-danger fs-7"><?php echo e(trans('labels.out_of_stock')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                <?php elseif($getitem->has_variants == 1): ?>
                                    <div class="sku-wrapper product_meta py-1" id="detail_stock">
                                        <span class="fs-7 fw-semibold">
                                            <?php echo e(trans('labels.stock')); ?>:
                                        </span>
                                        <span class="fs-7 fw-500" id="details_out_of_stock"></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if($getitem->has_variants == 1 && $getitem->variants_json != null): ?>
                            <p class="title pb-1 mt-2 variants m-0" id="variants_title"><?php echo e(trans('labels.variants')); ?></p>
                            <div class="product-variations-wrapper">
                                <div class="size-variation detail-variation" id="detail_variation">
                                    <?php for($i = 0; $i < count($getitem->variants_json); $i++): ?>
                                        <p class="fw-500 mt-2" for="">
                                            <?php echo e($getitem->variants_json[$i]['variant_name']); ?></p>
                                        <div class="d-flex flex-wrap gap-2 border-bottom py-3">
                                            <?php for($t = 0; $t < count($getitem->variants_json[$i]['variant_options']); $t++): ?>
                                                <label
                                                    class="checkbox-inline fs-15 fw-500 check<?php echo e(str_replace(' ', '_', $getitem->variants_json[$i]['variant_name'])); ?> <?php echo e($t == 0 ? 'active' : ''); ?>"
                                                    id="check_<?php echo e(str_replace(' ', '_', $getitem->variants_json[$i]['variant_name'])); ?>-<?php echo e(str_replace(' ', '_', $getitem->variants_json[$i]['variant_options'][$t])); ?>-<?php echo e($getitem->id); ?>"
                                                    for="<?php echo e(str_replace(' ', '_', $getitem->variants_json[$i]['variant_name'])); ?>-<?php echo e(str_replace(' ', '_', $getitem->variants_json[$i]['variant_options'][$t])); ?>-<?php echo e($getitem->id); ?>">
                                                    <input type="checkbox" class="" name="skills"
                                                        <?php echo e($t == 0 ? 'checked' : ''); ?>

                                                        value="<?php echo e($getitem->variants_json[$i]['variant_options'][$t]); ?>"
                                                        id="<?php echo e(str_replace(' ', '_', $getitem->variants_json[$i]['variant_name'])); ?>-<?php echo e(str_replace(' ', '_', $getitem->variants_json[$i]['variant_options'][$t])); ?>-<?php echo e($getitem->id); ?>">
                                                    <?php echo e($getitem->variants_json[$i]['variant_options'][$t]); ?>

                                                </label>
                                            <?php endfor; ?>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if(count($getitem['extras']) > 0): ?>
                            <div class="woo_pr_color flex_inline_center my-3 border-bottom pb-3">
                                <div class="woo_colors_list text-left">
                                    <span id="extras">
                                        <h6 class="extra-title fw-500 text-dark"><?php echo e(trans('labels.extras')); ?></h6>
                                        <ul class="list-unstyled extra-food mt-2">
                                            <div id="pricelist">
                                                <?php $__currentLoopData = $getitem['extras']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $extras): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="mb-2">
                                                        <div class="form-check p-0 gap-2 d-flex align-items-center">
                                                            <input class="form-check-input m-0 Checkbox" type="checkbox"
                                                                name="addons[]" extras_name="<?php echo e($extras->name); ?>"
                                                                value="<?php echo e($extras->id); ?>" price="<?php echo e($extras->price); ?>"
                                                                id="extras_<?php echo e($extras->id); ?>_<?php echo e($getitem['id']); ?>">
                                                            <label
                                                                class="form-check-label w-100 m-0 justify-content-between d-flex"
                                                                for="extras_<?php echo e($extras->id); ?>_<?php echo e($getitem['id']); ?>">
                                                                <span class="fs-7 p-0"><?php echo e($extras->name); ?></span>
                                                                <span
                                                                    class="fs-7 p-0"><?php echo e(helper::currency_formate($extras->price, $getitem->vendor_id)); ?></span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </ul>
                                    </span>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($getitem->top_deals == 1 && helper::top_deals($storeinfo->id) != null): ?>
                            <div id="eapps-countdown-timer-1"
                                class="countdown rounded eapps-countdown-timer-align-center  eapps-countdown-timer-finish-button-show   eapps-countdown-timer-style-combined eapps-countdown-timer-style-blocks eapps-countdown-timer-position-bar eapps-countdown-timer-area-clickable eapps-countdown-timer-has-background">
                                <div class="eapps-countdown-timer-container">
                                    <div class="eapps-countdown-timer-inner col-12 ">
                                        <div class="d-flex flex-column gap-2 align-items-sm-start align-items-center">
                                            <div class="eapps-countdown-timer-header">
                                                <div class="eapps-countdown-timer-header-title">
                                                    <div class="text-dark col-12 d-flex gap-2 align-items-center">
                                                        <i class="fa-regular fa-clock fs-6"></i>
                                                        <div class="line-2 fw-bolder">Hurry up!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="eapps-countdown-timer-item-container eapps-countdown-timer-item-details mt-3 mt-sm-0">
                                                <div id="countdown"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-12 mt-3 pb-3 border-bottom">
                            <div class="row  g-2 g-sm-3 " id="detail_plus-minus">
                                <div class="col-xl-3 col-6">
                                    <div class="input-group qty-input2 col-md-auto col-12 responsive-margin m-0 rounded-2">
                                        <button class="btn p-0 change-qty-1" id="minus"
                                            onclick="detailchangeqty('<?php echo e($getitem->id); ?>','minus')" value="minus value">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input type="text" class="border text-center detail_item_qty" value="1"
                                            readonly="">
                                        <button class="btn p-0 change-qty-1" id="plus"
                                            onclick="detailchangeqty('<?php echo e($getitem->id); ?>','plus')" value="plus value">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first()->activated == 1): ?>
                                    <div class="col-xl-3 col-6">
                                        <a href="https://api.whatsapp.com/send?phone=<?php echo e(helper::appdata($getitem->vendor_id)->contact); ?>&amp;text=I am interested for this item :<?php echo e($getitem->item_name); ?>"
                                            target="_blank" class="btn py-2 btn-danger btn-enquir rounded-2 w-100">
                                            <span class="px-1 fs-7 d-flex align-items-center gap-1">
                                                <i class="fa-brands fa-whatsapp"></i>
                                                <?php echo e(trans('labels.enquiries')); ?>

                                            </span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="col-xl-3 col-6">
                                    <button class="btn btn-store m-0 add-details-btn px-0 w-100 addtocart h-100"
                                        onclick="detailaddtocart('0')"
                                        <?php echo e($getitem->stock_management == 1 ? ($getitem->qty <= 0 ? 'disabled' : '') : ''); ?>>
                                        <span class="px-1 fs-7"><?php echo e(trans('labels.addcart')); ?></span>
                                    </button>
                                </div>
                                <div class="col-xl-3 col-6">
                                    <button class="btn btn-store-outline m-0 px-0 add-details-btn w-100 buynow h-100"
                                        onclick="detailaddtocart('1')"
                                        <?php echo e($getitem->stock_management == 1 ? ($getitem->qty <= 0 ? 'disabled' : '') : ''); ?>>
                                        <span class="px-1 fs-7"><?php echo e(trans('labels.buy_now')); ?></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-sm-2 gap-3 justify-content-between w-100 my-3">
                            <?php if(Auth::user() && Auth::user()->type == 3): ?>
                                <div class="fs-7 d-flex gap-2 align-items-center">
                                    <?php if($getitem->is_favorite == 1): ?>
                                        <a href="javascript:void(0)" class="btn-sm cursor-pointer"
                                            onclick="managefavorite('<?php echo e($storeinfo->id); ?>','<?php echo e($getitem->id); ?>',0,'<?php echo e(URL::to($storeinfo->slug . '/managefavorite')); ?>','<?php echo e(request()->url()); ?>')">
                                            <div class="d-flex align-items-center justify-content-center gap-2">
                                                <i class="fa-solid fa-heart btn-Wishlist"></i>
                                                <span class="fs-7"><?php echo e(trans('labels.remove_wishlist')); ?></span>
                                            </div>
                                        </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)" class="btn-sm cursor-pointer"
                                            onclick="managefavorite('<?php echo e($storeinfo->id); ?>','<?php echo e($getitem->id); ?>',1,'<?php echo e(URL::to($storeinfo->slug . '/managefavorite')); ?>','<?php echo e(request()->url()); ?>')">
                                            <div class="d-flex align-items-center justify-content-center gap-2">
                                                <i class="fa-regular fa-heart btn-Wishlist"></i>
                                                <span class="fs-7"><?php echo e(trans('labels.add_wishlist')); ?></span>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php else: ?>
                                <a href="<?php echo e(URL::to($storeinfo->slug . '/login')); ?>" class="btn-sm cursor-pointer">
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        <i class="fa-regular fa-heart btn-Wishlist"></i>
                                        <span class="fs-7"><?php echo e(trans('labels.add_wishlist')); ?></span>
                                    </div>
                                </a>
                            <?php endif; ?>
                            <div>
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                    <?php if($getitem->video_url != null): ?>
                                        <a href="<?php echo e($getitem->video_url); ?>" class="rounded-circle prod-social m-0"
                                            tooltip="Video" target="_blank">
                                            <i class="fa-solid fa-video fs-7"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if(helper::appdata($storeinfo->id)->google_review != null): ?>
                                        <a href="<?php echo e(helper::appdata($storeinfo->id)->google_review); ?>" target="_blank"
                                            tooltip="Review" class="rounded-circle prod-social fs-7">
                                            <i class="fa-regular fa-star"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php echo $__env->make('front.product.service-trusted', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>


        <input type="hidden" name="vendor" id="detail_overview_vendor" value="<?php echo e($getitem->vendor_id); ?>">
        <input type="hidden" name="item_id" id="detail_overview_item_id" value="<?php echo e($getitem->id); ?>">
        <input type="hidden" name="item_name" id="detail_overview_item_name" value="<?php echo e($getitem->item_name); ?>">
        <input type="hidden" name="item_image" id="detail_overview_item_image"
            value="<?php echo e(@$getitem['item_image']->image); ?>">
        <input type="hidden" name="detail_item_min_order" id="detail_item_min_order"
            value="<?php echo e($getitem->min_order); ?>">
        <input type="hidden" name="detail_item_max_order" id="detail_item_max_order"
            value="<?php echo e($getitem->max_order); ?>">
        <input type="hidden" name="item_price" id="detail_overview_item_price" value="<?php echo e($getitem->item_price); ?>">
        <input type="hidden" name="item_original_price" id="detail_overview_item_original_price"
            value ="<?php echo e($original_price); ?>">
        <input type="hidden" name="detail_tax" id="detail_item_tax" value="<?php echo e($getitem->tax); ?>">
        <input type="hidden" name="detail_variants_name" id="detail_variants_name">
        <input type="hidden" name="stock_management" id="detail_stock_management"
            value="<?php echo e($getitem->stock_management); ?>">
        <input type="hidden" id="addtocarturl" value="<?php echo e(url('/add-to-cart')); ?>">
    </section>
    <?php if(count($getrelateditems) > 0): ?>
        <section class="my-sm-5 my-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div
                            class="section-heading d-flex flex-wrap gap-2 align-items-center justify-content-between py-4 border-top">
                            <h4 class="text-dark text-truncate fw-600"><?php echo e(trans('labels.top_related_products')); ?></h4>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3 best-product pro-hover">
                    <?php $__currentLoopData = $getrelateditems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            if ($itemdata->top_deals == 1 && helper::top_deals($storeinfo->id) != null) {
                                if (@helper::top_deals($storeinfo->id)->offer_type == 1) {
                                    if ($itemdata['variation']->count() > 0) {
                                        if (
                                            $itemdata['variation'][0]->price >
                                            @helper::top_deals($storeinfo->id)->offer_amount
                                        ) {
                                            $rprice =
                                                $itemdata['variation'][0]->price -
                                                @helper::top_deals($storeinfo->id)->offer_amount;
                                        } else {
                                            $rprice = $itemdata['variation'][0]->price;
                                        }
                                    } else {
                                        if ($itemdata->item_price > @helper::top_deals($storeinfo->id)->offer_amount) {
                                            $rprice =
                                                $itemdata->item_price -
                                                @helper::top_deals($storeinfo->id)->offer_amount;
                                        } else {
                                            $rprice = $itemdata->item_price;
                                        }
                                    }
                                } else {
                                    if ($itemdata['variation']->count() > 0) {
                                        $rprice =
                                            $itemdata['variation'][0]->price -
                                            $itemdata['variation'][0]->price *
                                                (@helper::top_deals($storeinfo->id)->offer_amount / 100);
                                    } else {
                                        $rprice =
                                            $itemdata->item_price -
                                            $itemdata->item_price *
                                                (@helper::top_deals($storeinfo->id)->offer_amount / 100);
                                    }
                                }
                                if ($itemdata['variation']->count() > 0) {
                                    $roriginal_price = $itemdata['variation'][0]->price;
                                } else {
                                    $roriginal_price = $itemdata->item_price;
                                }
                                $roff = $roriginal_price > 0 ? round(100 - ($rprice * 100) / $roriginal_price) : 0;
                            } else {
                                if ($itemdata['variation']->count() > 0) {
                                    $rprice = $itemdata['variation'][0]->price;
                                    $roriginal_price = $itemdata['variation'][0]->original_price;
                                } else {
                                    $rprice = $itemdata->item_price;
                                    $roriginal_price = $itemdata->item_original_price;
                                }
                                $roff = $roriginal_price > 0 ? round(100 - ($rprice * 100) / $roriginal_price) : 0;
                            }
                        ?>
                        <div class="col">
                            <div class="card h-100 position-relative rounded">
                                <div class="overflow-hidden theme1grid_image p-2">
                                    <a href="<?php echo e(URL::to($storeinfo->slug . '/details-' . $itemdata->slug)); ?>">
                                        <img src="<?php if(@$itemdata['item_image']->image_url != null): ?> <?php echo e(@$itemdata['item_image']->image_url); ?> <?php else: ?> <?php echo e(helper::image_path($itemdata->image)); ?> <?php endif; ?>"
                                            alt="" class="rounded">
                                    </a>
                                    <?php if($roff > 0): ?>
                                        <span
                                            class="<?php echo e(session()->get('direction') == 2 ? 'offer-text-right' : 'offer-text'); ?> rounded fw-500 text-bg-secondary fs-8"><?php echo e($roff); ?>%
                                            <?php echo e(trans('labels.off')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="card-body p-2 p-md-3 pb-sm-0 ">
                                    <?php if(Auth::user() && Auth::user()->type == 3): ?>
                                        <div class="favorite-icon set-fav1-<?php echo e($itemdata->id); ?>">
                                            <?php if($itemdata->is_favorite == 1): ?>
                                                <a href="javascript:void(0)"
                                                    onclick="managefavorite('<?php echo e($storeinfo->id); ?>','<?php echo e($itemdata->id); ?>',0,'<?php echo e(URL::to($storeinfo->slug . '/managefavorite')); ?>','<?php echo e(request()->url()); ?>')"><i
                                                        class="fa-solid fa-heart"></i></a>
                                            <?php else: ?>
                                                <a href="javascript:void(0)"
                                                    onclick="managefavorite('<?php echo e($storeinfo->id); ?>','<?php echo e($itemdata->id); ?>',1,'<?php echo e(URL::to($storeinfo->slug . '/managefavorite')); ?>','<?php echo e(request()->url()); ?>')">
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
                                                    onclick="showreviews('<?php echo e($itemdata->id); ?>')">
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <p class="cursor-pointer fw-600 fs-8">
                                                        <?php echo e(number_format($itemdata->avg_ratting, 1)); ?></p>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <a href="<?php echo e(URL::to($storeinfo->slug . '/details-' . $itemdata->slug)); ?>"
                                        class="title pb-1"><?php echo e($itemdata->item_name); ?></a>
                                </div>
                                <div class="card-footer bg-transparent border-0 p-2 pt-md-0 p-md-3 pt-0">
                                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                                        <div class="mb-2 mb-md-0">
                                            <div class="d-flex gap-1 flex-wrap align-items-center">
                                                <p class="price">
                                                    <?php echo e(helper::currency_formate($rprice, $vdata)); ?>

                                                </p>
                                                <?php if($roriginal_price > $rprice): ?>
                                                    <del><?php echo e(helper::currency_formate($roriginal_price, $vdata)); ?></del>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="d-flex col-sm-auto col-12 justify-content-end align-items-center">
                                            <button
                                                class="btn-primary w-100 px-3 py-2 d-flex gap-2 fw-500 align-items-center justify-content-center fs-7 btn m-0"
                                                type="button"
                                                onclick="showitems('<?php echo e($itemdata->id); ?>','<?php echo e($itemdata->item_name); ?>','<?php echo e($price); ?>')">
                                                <div class="addcartbtn-<?php echo e($itemdata->id); ?>">
                                                    <i class="fa-regular fa-plus"></i>
                                                    <?php echo e(trans('labels.add_to_cart')); ?>

                                                </div>
                                                <div class="load showload-<?php echo e($itemdata->id); ?>" style="display:none">
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if(App\Models\SystemAddons::where('unique_identifier', 'sticky_cart_bar')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'sticky_cart_bar')->first()->activated == 1): ?>
        <?php echo $__env->make('front.product.view-cart-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->make('front.sum_qusction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/smoothproducts.js')); ?>"></script>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/top_deals.js')); ?>"></script>
    <script>
        // Product Preview
        $('.sp-wrap').smoothproducts();

        var topdeals = 1;

        $(document).ready(function($) {
            var selected = [];
            $('.detail-variation input:checked').each(function() {
                var label = $("#detail_variation label[for='" + $(this).attr('id') + "']").attr('id');
                $("#detail_variation [id='" + 'check_' + this.id + "']").addClass('active');
                selected.push($(this).attr('value'));
            });

            if (selected != "" && selected != null) {

                detail_set_variant_price(selected);
            }

        });
        $('#detail_variation input:checkbox').click(function() {
            var selected = [];
            var divselected = [];
            const myArray = this.id.split("-");

            var id = this.id;
            $('#detail_variation .check' + myArray[0] + ' input:checked').each(function() {
                divselected.push($(this).attr('value'));
            });
            if (divselected.length == 0) {
                $(this).prop('checked', true);
            }

            $('#detail_variation .check' + myArray[0] + ' input:checkbox').not(this).prop('checked', false);
            $('#detail_variation .check' + myArray[0]).removeClass('active');
            $("#detail_variation [id='" + 'check_' + this.id + "']").addClass('active');
            $('.detail-variation input:checked').each(function() {
                selected.push($(this).attr('value'));
            });
            if (selected != "" && selected != null) {
                $('.product-detail-price').addClass('d-none');
                $('#detail_laodertext').removeClass('d-none');
                $('#detail_laodertext').html(
                    '<span class="loader"></span>'
                );
                detail_set_variant_price(selected);
            }
        });

        function detail_set_variant_price(variants) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "<?php echo e(URL::to('get-products-variant-quantity')); ?>",
                data: {
                    name: variants,
                    item_id: $('#detail_overview_item_id').val(),
                    vendor_id: $('#detail_overview_vendor').val(),
                },
                success: function(data) {
                    if (data.status == 1) {
                        setTimeout(function() {
                            $('#detail_laodertext').html('');
                        }, 4000);
                        var off = ((1 - (data.price / data.original_price)) * 100).toFixed(1);
                        $('#detail_laodertext').addClass('d-none');
                        $('.product-detail-price').removeClass('d-none');
                        $('#detail_variants_name').val(variants);
                        $('.details_item_price').text(currency_formate(parseFloat(data.price)));
                        $('#detail_overview_item_price').val(data.price);
                        $('#details_offer').removeClass('d-none');
                        if (parseFloat(data.original_price) > parseFloat(data.price)) {
                            $('.details_original_price').text(currency_formate(parseFloat(data
                                .original_price)));
                            $('#details_offer').text($.number(off, 0) + '% ' + '<?php echo e(trans('labels.off')); ?>');
                        } else {
                            $('.details_original_price').text('');
                            $('#details_offer').text('');
                        }
                        $('#detail_overview_item_original_price').val(data.original_price);
                        $('#detail_stock_management').val(data.stock_management);
                        $('#detail_item_min_order').val(data.min_order);
                        $('#detail_item_max_order').val(data.max_order);
                        if (data.is_available == 2) {
                            $('#details_offer').addClass('d-none');
                            $('#detail_not_available_text').html(not_available);
                            $('.add-details-btn').attr('disabled', true);
                            $('.add-details-btn').addClass('d-none');
                            $('.details_item_price').addClass('d-none');
                            $('.details_original_price').addClass('d-none');
                            $('#detail_sku_stock').addClass('d-none');
                            $('#detail_plus-minus').addClass('d-none');
                            $('#detail_tax').addClass('d-none');
                            $('#detail_stock').addClass('d-none');

                        } else {
                            $('#details_offer').removeClass('d-none');
                            $('#detail_not_available_text').html('');
                            $('.add-details-btn').attr('disabled', false);
                            $('.add-details-btn').removeClass('d-none');
                            $('.details_item_price').removeClass('d-none');
                            $('.details_original_price').removeClass('d-none');
                            $('#detail_plus-minus').removeClass('d-none');
                            $('#detail_sku_stock').addClass('d-none');
                            $('#detail_tax').removeClass('d-none');
                            $('#detail_stock').addClass('d-none');
                            if (data.stock_management == 1) {
                                $('#detail_stock').removeClass('d-none');
                                $('#detail_sku_stock').removeClass('d-none');
                                $('#details_out_of_stock').removeClass('d-none');
                                if (data.quantity > 0) {
                                    $('.add-details-btn').attr('disabled', false);
                                    $('#details_out_of_stock').removeClass('text-danger');
                                    $('#details_out_of_stock').addClass('text-success');
                                    $('#details_out_of_stock').html('' + data.quantity +
                                        ' <?php echo e(trans('labels.in_stock')); ?>');
                                } else {
                                    $('.add-details-btn').attr('disabled', true);
                                    $('#details_out_of_stock').removeClass('text-dark');
                                    $('#details_out_of_stock').addClass('text-danger');
                                    $('#details_out_of_stock').html('<?php echo e(trans('labels.out_of_stock')); ?>');
                                }
                            } else {
                                $('#details_out_of_stock').addClass('d-none');
                            }

                        }
                    }

                }
            });
        }

        function detailchangeqty(item_id, type) {
            var qtys = parseInt($('.detail_item_qty').val());
            if (type == "minus") {
                qty = qtys - 1;
            } else {
                qty = qtys + 1;
            }
            if (qty >= "1") {
                $('.change-qty-1').prop('disabled', true);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "<?php echo e(URL::to('/changeqty')); ?>",
                    data: {
                        item_id: item_id,
                        type: type,
                        qty: qty,
                        vendor_id: $('#detail_overview_vendor').val(),
                        variants_name: $('#detail_variants_name').val(),
                        stock_management: $('#detail_stock_management').val(),
                    },
                    method: 'POST',
                    success: function(response) {
                        if (response.status == 1) {
                            $('.detail_item_qty').val(response.qty);
                            $('.change-qty-1').prop('disabled', false);
                        } else {
                            $('.change-qty-1').prop('disabled', false);
                            toastr.error(response.message);
                        }
                    },
                    error: function(error) {
                        $('.change-qty-1').prop('disabled', false);
                        toastr.error(wrong);
                    }
                });
            }

        }

        function detailaddtocart(buynow) {
            "use strict";
            if (buynow == 1) {
                $('.buynow').prop("disabled", true);
                $('.buynow').html('<span class="loader"></span>');
            } else {
                $('.addtocart').prop("disabled", true);
                $('.addtocart').html('<span class="loader"></span>');
            }
            var item_id = $('#detail_overview_item_id').val();
            var vendor = $('#detail_overview_vendor').val();
            var item_name = $('#detail_overview_item_name').val();
            var item_image = $('#detail_overview_item_image').val();
            var item_price = $('#detail_overview_item_price').val();
            var item_original_price = $('#detail_overview_item_original_price').val();
            var variants_name = $('#detail_variants_name').val();
            var item_qty = $('.detail_item_qty').val();
            var min_order = $('#detail_item_min_order').val();
            var max_order = $('#detail_item_max_order').val();
            var tax = $('#detail_item_tax').val();
            var stock_management = $('#detail_stock_management').val();
            var extras_id = ($('.Checkbox:checked').map(function() {
                return this.value;
            }).get().join('| '));
            var extras_name = ($('.Checkbox:checked').map(function() {
                return $(this).attr('extras_name');
            }).get().join('| '));
            var extras_price = ($('.Checkbox:checked').map(function() {
                return $(this).attr('price');
            }).get().join('| '));

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $('#addtocarturl').val(),
                data: {
                    vendor_id: vendor,
                    item_id: item_id,
                    item_name: item_name,
                    item_image: item_image,
                    item_price: item_price,
                    item_original_price: item_original_price,
                    tax: tax,
                    variants_name: variants_name,
                    extras_id: extras_id,
                    extras_name: extras_name,
                    extras_price: extras_price,
                    qty: item_qty,
                    min_order: min_order,
                    max_order: max_order,
                    stock_management: stock_management,
                    buynow: buynow,
                    tax: tax,
                },
                method: 'POST', //Post method,
                success: function(response) {
                    if (response.status == 1) {
                        $('#cartcount').html(response.totalcart);
                        $('#cartcount_mobile').html(response.totalcart);
                        if (response.buynow == 1) {
                            window.location.href = response.checkouturl;
                        } else {
                            location.reload();
                        }
                    } else {
                        if (response.buynow == 1) {
                            $('.buynow').prop("disabled", false);
                            $('.buynow').html('Buy now');
                        } else {
                            $('.addtocart').prop("disabled", false);
                            $('.addtocart').html('Add to Cart');
                        }
                        $('#additems').modal('hide');
                        toastr.error(response.message);
                    }
                },
                error: function(response) {
                    if (response.buynow == 1) {
                        $('.buynow').prop("disabled", false);
                        $('.buynow').html('Buy now');
                    } else {
                        $('.addtocart').prop("disabled", false);
                        $('.addtocart').html('Add to Cart');
                    }
                    $('#additems').modal('hide');
                    toastr.error(wrong);
                }
            })
        };
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/product/productdetails.blade.php ENDPATH**/ ?>