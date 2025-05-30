<?php
    if ($itemdata->top_deals == 1 && helper::top_deals($storeinfo->id) != null) {
        if (@helper::top_deals($storeinfo->id)->offer_type == 1) {
            if ($itemdata['variation']->count() > 0) {
                if ($itemdata['variation'][0]->price > @helper::top_deals($storeinfo->id)->offer_amount) {
                    $price = $itemdata['variation'][0]->price - @helper::top_deals($storeinfo->id)->offer_amount;
                } else {
                    $price = $itemdata['variation'][0]->price;
                }
            } else {
                if ($itemdata->item_price > @helper::top_deals($storeinfo->id)->offer_amount) {
                    $price = $itemdata->item_price - @helper::top_deals($storeinfo->id)->offer_amount;
                } else {
                    $price = $itemdata->item_price;
                }
            }
        } else {
            if ($itemdata['variation']->count() > 0) {
                $price =
                    $itemdata['variation'][0]->price -
                    $itemdata['variation'][0]->price * (@helper::top_deals($storeinfo->id)->offer_amount / 100);
            } else {
                $price =
                    $itemdata->item_price -
                    $itemdata->item_price * (@helper::top_deals($storeinfo->id)->offer_amount / 100);
            }
        }
        if ($itemdata['variation']->count() > 0) {
            $original_price = $itemdata['variation'][0]->price;
        } else {
            $original_price = $itemdata->item_price;
        }
        $off = $original_price > 0 ? round(100 - ($price * 100) / $original_price) : 0;
    } else {
        if ($itemdata['variation']->count() > 0) {
            $price = $itemdata['variation'][0]->price;
            $original_price = $itemdata['variation'][0]->original_price;
        } else {
            $price = $itemdata->item_price;
            $original_price = $itemdata->item_original_price;
        }
        $off = $original_price > 0 ? round(100 - ($price * 100) / $original_price) : 0;
    }
?>
<div class="card h-100 position-relative rounded">
    <a href="<?php echo e(URL::to($storeinfo->slug . '/details-' . $itemdata->slug)); ?>">
        <div class="overflow-hidden theme1grid_image p-2">
            <img src="<?php if(@$itemdata['item_image']->image_url != null): ?> <?php echo e(@$itemdata['item_image']->image_url); ?> <?php else: ?> <?php echo e(helper::image_path($itemdata->image)); ?> <?php endif; ?>"
                alt="" class="rounded">
            <?php if($off > 0): ?>
                <span
                    class="<?php echo e(session()->get('direction') == 2 ? 'offer-text-right' : 'offer-text'); ?> rounded fw-500 text-bg-secondary fs-8"><?php echo e($off); ?>%
                    <?php echo e(trans('labels.off')); ?></span>
            <?php endif; ?>
        </div>
    </a>
    <div class="card-body p-2 p-md-3 pb-sm-0 ">
        <?php if(Auth::user() && Auth::user()->type == 3): ?>
            <div class="favorite-icon set-fav1-<?php echo e($itemdata->id); ?>">
                <?php if($itemdata->is_favorite == 1): ?>
                    <a href="javascript:void(0)"
                        onclick="managefavorite('<?php echo e($storeinfo->id); ?>','<?php echo e($itemdata->id); ?>',0,'<?php echo e(URL::to($storeinfo->slug . '/managefavorite')); ?>','<?php echo e(request()->url()); ?>')">
                        <i class="fa-solid fa-heart"></i></a>
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
                    <a class="fs-8 d-flex gap-1 align-items-center mb-1" onclick="showreviews('<?php echo e($itemdata->id); ?>')"
                        role="button" aria-controls="offcanvasExample">
                        <i class="fa-solid fa-star text-warning"></i>
                        <p class="cursor-pointer fw-600 fs-8"><?php echo e(number_format($itemdata->avg_ratting, 1)); ?></p>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
        <a href="<?php echo e(URL::to($storeinfo->slug . '/details-' . $itemdata->slug)); ?>" class="title pb-1">
            <?php echo e($itemdata->item_name); ?>

        </a>
    </div>
    <div class="card-footer bg-transparent border-0 p-2 pt-md-0 p-md-3 pt-0">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div class="mb-2 mb-md-0">
                <div class="d-flex gap-1 flex-wrap align-items-center">
                    <p class="price">
                        <?php echo e(helper::currency_formate($price, $vdata)); ?>

                    </p>
                    <?php if($itemdata->item_original_price != null): ?>
                        <?php if($original_price > $price): ?>
                            <del><?php echo e(helper::currency_formate($original_price, $vdata)); ?></del>
                        <?php endif; ?>
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
<?php /**PATH /mnt/c/restro-saas/resources/views/front/productcommonview.blade.php ENDPATH**/ ?>