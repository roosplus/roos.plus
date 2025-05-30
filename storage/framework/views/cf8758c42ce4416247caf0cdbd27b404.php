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
        <div class="specs theme1grid <?php if($check_cat_count > 0 && $key != 0): ?> card-none <?php endif; ?>" id="specs-<?php echo e($category->id); ?>">
            <div class="row g-3 products-img">
                <?php if(!$getcategory->isEmpty()): ?>
                    <?php $i = 0; ?>
                    <?php $__currentLoopData = $getitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($category->id == $item->cat_id): ?>
                            <?php
                                if ($item->top_deals == 1 && helper::top_deals($storeinfo->id) != null) {
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
                                } else {
                                    if ($item['variation']->count() > 0) {
                                        $price = $item['variation'][0]->price;
                                        $original_price = $item['variation'][0]->original_price;
                                    } else {
                                        $price = $item->item_price;
                                        $original_price = $item->item_original_price;
                                    }
                                    $off = $original_price > 0 ? round(100 - ($price * 100) / $original_price) : 0;
                                }
                            ?>
                            <div class="col-6 col-lg-3">
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
                                            <div
                                                class="d-flex col-sm-auto col-12 justify-content-end align-items-center">
                                                <button
                                                    class="btn-primary w-100 px-3 py-2 d-flex gap-2 fw-500 align-items-center justify-content-center fs-7 btn m-0 addcartbtn-<?php echo e($item->id); ?>"
                                                    type="button"
                                                    onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')">
                                                    <i class="fa-regular fa-plus"></i>
                                                    <?php echo e(trans('labels.add_to_cart')); ?>

                                                    <div class="load showload-<?php echo e($item->id); ?>"
                                                        style="display:none">
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i += 1; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /mnt/c/restro-saas/resources/views/front/template-1/theme-grid.blade.php ENDPATH**/ ?>