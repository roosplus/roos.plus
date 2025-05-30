<?php
    if (Auth::user()->type == 4) {
        $vendor_id = Auth::user()->vendor_id;
    } else {
        $vendor_id = Auth::user()->id;
    }

?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-6">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.add_new')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <div class="col-12 mb-7 mt-3">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <form action="<?php echo e(URL::to('admin/products/save')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="form-label"><?php echo e(trans('labels.category')); ?> <span class="text-danger"> *
                                </span></label>
                            <select class="form-select" name="category" id="cat_id" required>
                                <option value=""><?php echo e(trans('labels.select')); ?></option>
                                <?php $__currentLoopData = $getcategorylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($catdata->id); ?>" data-id="<?php echo e($catdata->id); ?>"
                                        <?php echo e(old('category') == $catdata->id ? 'selected' : ''); ?>>
                                        <?php echo e($catdata->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-6 form-group">
                            <label class="form-label"><?php echo e(trans('labels.name')); ?> <span class="text-danger"> *
                                </span></label>
                            <input type="text" class="form-control" name="product_name"
                                value="<?php echo e(old('product_name')); ?>" placeholder="<?php echo e(trans('labels.name')); ?>" required>
                            <?php $__errorArgs = ['product_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-4 form-group add-extra-class <?php echo e(session()->get('direction') == 2 ? 'rtl' : ''); ?>">
                            <label class="form-label"><?php echo e(trans('labels.tax')); ?> </label>
                            <select name="tax[]" class="form-control selectpicker" multiple data-live-search="true">
                                <?php if(!empty($gettaxlist)): ?>
                                    <?php $__currentLoopData = $gettaxlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tax->id); ?>"> <?php echo e($tax->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-4 form-group">
                            <label class="form-label"><?php echo e(trans('labels.image')); ?>

                                <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="product_image[]" accept="image/*"
                                id="image" multiple required>
                            <?php $__errorArgs = ['product_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span> <br>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="gallery"></div>
                        </div>
                        <div class="col-4 form-group">
                            <label class="form-label"><?php echo e(trans('labels.video_url')); ?></label>
                            <input type="text" class="form-control" name="video_url"
                                placeholder="<?php echo e(trans('labels.video_url')); ?>">
                        </div>
                        <div class="col-12 form-group">
                            <label class="form-label"><?php echo e(trans('labels.description')); ?> <span class="text-danger"> *
                                </span></label>
                            <textarea name="description" class="form-control" rows="5" placeholder="<?php echo e(trans('labels.description')); ?>"
                                required><?php echo e(old('description')); ?></textarea>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                    <div class="form-group">
                                        <label for="has_extras"
                                            class="form-label"><?php echo e(trans('labels.product_has_extras')); ?></label>
                                        <div class="col-md-12">
                                            <div class="form-check-inline">
                                                <input class="form-check-input me-0 has_extras" type="radio"
                                                    name="has_extras" id="extras_no" value="2" checked
                                                    <?php if(old('has_extras') == 2): ?> checked <?php endif; ?>>
                                                <label class="form-check-label"
                                                    for="extras_no"><?php echo e(trans('labels.no')); ?></label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input me-0 has_extras" type="radio"
                                                    name="has_extras" id="extras_yes" value="1"
                                                    <?php if(old('has_extras') == 1): ?> checked <?php endif; ?>>
                                                <label class="form-check-label"
                                                    for="extras_yes"><?php echo e(trans('labels.yes')); ?></label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center gap-2 col-sm-auto col-12">
                                        <?php if(count($globalextras) > 0): ?>
                                            <button
                                                class="btn btn-secondary w-100 fs-7 btn-sm px-sm-4 rounded-start-5 rounded-end-5"
                                                type="button" id="globalextra" onclick="global_extras()"><i
                                                    class="fa-sharp fa-solid fa-plus"></i>
                                                <?php echo e(trans('labels.add_global_extras')); ?></button>
                                        <?php endif; ?>
                                        <button class="btn btn-dark hov btn-sm rounded-5" type="button" id="add_extra"
                                            onclick="extras_fields('<?php echo e(trans('labels.name')); ?>','<?php echo e(trans('labels.price')); ?>')"><i
                                                class="fa-sharp fa-solid fa-plus"></i> </button>
                                    </div>

                                </div>
                                <div id="extras">

                                    <?php if(!empty($globalextras) && $globalextras->count() > 0): ?>
                                        <div id="global-extras"></div>
                                    <?php endif; ?>
                                    <div id="more_extras_fields"></div>
                                </div>


                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center justify-content-between">
                                    <div class="form-group">
                                        <label for="has_variants"
                                            class="form-label"><?php echo e(trans('labels.product_has_variation')); ?></label>
                                        <div class="col-md-12">
                                            <div class="form-check-inline">
                                                <input class="form-check-input me-0 has_variants" type="radio"
                                                    name="has_variants" id="no" value="2" checked
                                                    <?php if(old('has_variants') == 2): ?> checked <?php endif; ?>>
                                                <label class="form-check-label"
                                                    for="no"><?php echo e(trans('labels.no')); ?></label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input me-0 has_variants" type="radio"
                                                    name="has_variants" id="yes" value="1"
                                                    <?php if(old('has_variants') == 1): ?> checked <?php endif; ?>>
                                                <label class="form-check-label"
                                                    for="yes"><?php echo e(trans('labels.yes')); ?></label>
                                            </div>

                                        </div>
                                    </div>
                                    <button class="btn btn-dark hov btn-sm rounded-5" type="button" id="btn_addvariants"
                                        onclick="commonModal()">
                                        <i class="fa-sharp fa-solid fa-plus"></i>
                                    </button>
                                </div>
                                <div class="col-12">
                                    <div class="row dn <?php if($errors->has('variants_name.*') || $errors->has('variants_price.*')): ?> dn <?php endif; ?> <?php if(old('variants') == 2): ?> d-flex <?php endif; ?>"
                                        id="price_row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(trans('labels.original_price')); ?> <span
                                                        class="text-danger"> * </span>
                                                </label>
                                                <input type="text" class="form-control numbers_only"
                                                    name="original_price" value="<?php echo e(old('original_price')); ?>"
                                                    placeholder="<?php echo e(trans('labels.original_price')); ?>"
                                                    id="original_price" required>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(trans('labels.selling_price')); ?> <span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control numbers_only" name="price"
                                                    value="<?php echo e(old('price')); ?>"
                                                    placeholder="<?php echo e(trans('labels.selling_price')); ?>" id="price"
                                                    required>

                                            </div>
                                        </div>

                                        <div class="col-12 d-flex align-items-center justify-content-between">
                                            <div class="form-group">
                                                <label for="has_stock"
                                                    class="form-label"><?php echo e(trans('labels.stock_management')); ?></label>
                                                <div class="col-md-12">
                                                    <div class="form-check-inline">
                                                        <input class="form-check-input me-0 has_stock" type="radio"
                                                            name="has_stock" id="stock_no" value="2" checked
                                                            <?php if(old('has_stock') == 2): ?> checked <?php endif; ?>>
                                                        <label class="form-check-label"
                                                            for="stock_no"><?php echo e(trans('labels.no')); ?></label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <input class="form-check-input me-0 has_stock" type="radio"
                                                            name="has_stock" id="stock_yes" value="1"
                                                            <?php if(old('has_stock') == 1): ?> checked <?php endif; ?>>
                                                        <label class="form-check-label"
                                                            for="stock_yes"><?php echo e(trans('labels.yes')); ?></label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3" id="block_stock_qty">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(trans('labels.stock_qty')); ?> <span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control numbers_only"
                                                    onkeypress="allowNumbersOnly(event)" name="qty"
                                                    value="<?php echo e(old('qty')); ?>"
                                                    placeholder="<?php echo e(trans('labels.stock_qty')); ?>" id="qty">
                                            </div>
                                        </div>
                                        <div class="col-md-3" id="block_min_order">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(trans('labels.min_order_qty')); ?> <span
                                                        class="text-danger"> * </span>
                                                </label>
                                                <input type="text" class="form-control numbers_only"
                                                    onkeypress="allowNumbersOnly(event)" name="min_order"
                                                    value="<?php echo e(old('min_order')); ?>"
                                                    placeholder="<?php echo e(trans('labels.min_order_qty')); ?>" id="min_order">

                                            </div>
                                        </div>
                                        <div class="col-md-3" id="block_max_order">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(trans('labels.max_order_qty')); ?> <span
                                                        class="text-danger"> * </span>
                                                </label>
                                                <input type="text" class="form-control numbers_only"
                                                    onkeypress="allowNumbersOnly(event)" name="max_order"
                                                    value="<?php echo e(old('max_order')); ?>"
                                                    placeholder="<?php echo e(trans('labels.max_order_qty')); ?>" id="max_order">

                                            </div>
                                        </div>
                                        <div class="col-md-3" id="block_product_low_qty_warning">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(trans('labels.product_low_qty_warning')); ?>

                                                    <span class="text-danger"> * </span></label>
                                                <input type="text" class="form-control numbers_only variation_qty"
                                                    onkeypress="allowNumbersOnly(event)" name="low_qty" id="low_qty"
                                                    placeholder="<?php echo e(trans('labels.product_low_qty_warning')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row  dn <?php if($errors->has('variation.*') || $errors->has('variation_price.*') || old('has_variants') == 1): ?> d-flex <?php endif; ?>" id="variations">
                                        <div id="productVariant" class="col-md-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card my-3 d-none" id="variant_card">
                                                        <div class="card-header">
                                                            <div class="row flex-grow-1">
                                                                <div class="col-md d-flex align-items-center">
                                                                    <h5 class="card-header-title">
                                                                        <?php echo e(trans('labels.product')); ?>

                                                                        <?php echo e(trans('labels.variants')); ?>

                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <input type="hidden" id="hiddenVariantOptions"
                                                                name="hiddenVariantOptions" value="{}">
                                                            <div class="variant-table">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group m-0 gap-2 d-flex justify-content-end">
                            <a href="<?php echo e(URL::to('admin/products')); ?>"
                                class="btn btn-danger px-4 rounded-start-5 rounded-end-5"><?php echo e(trans('labels.cancel')); ?></a>
                            <button
                                class="btn btn-secondary px-4 rounded-start-5 rounded-end-5 <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_products', Auth::user()->role_id, $vendor_id, 'add') == 1 ? '' : 'd-none') : ''); ?>"
                                <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade  modal-fade-transform" id="commonModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-inner lg-dialog" role="document">
            <div class="modal-content">
                <div class="popup-content">
                    <div class="modal-header justify-content-between popup-header align-items-center">
                        <h5 class="mb-0 modal-title text-dark" id="modelCommanModelLabel">
                            <?php echo e(trans('labels.add_variants')); ?></h5>
                        <button type="button" class="btn-close m-0 p-0" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body pb-0 px-0">
                        <form method="POST" action="<?php echo e(URL::to('admin/products/get-product-variants-possibilities')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="px-3">
                                <div class="form-group">
                                    <label for="variant_name"><?php echo e(trans('labels.variant_name')); ?></label>
                                    <input class="form-control" name="variant_name" type="text" id="variant_name"
                                        onkeyup="this.value = this.value.replace(/[`\/\\|~_$&+,:;=?[\]@#{}'<>.^*()%!-/]/, '')"
                                        placeholder="<?php echo e('Variant Name, i.e Size, Color etc'); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="variant_options"><?php echo e(trans('labels.variant_options')); ?></label>
                                    <input class="form-control" name="variant_options" type="text"
                                        id="variant_options"
                                        placeholder="<?php echo e('Variant Options separated by|pipe symbol, i.e Black|Blue|Red'); ?>">
                                </div>
                            </div>

                            <div class="modal-footer p-3">
                                <div class="form-group col-12 m-0 d-flex justify-content-end gap-2 form-label">
                                    <input type="button" value="<?php echo e(trans('labels.cancel')); ?>"
                                        class="btn btn-danger px-4 rounded-start-5 rounded-end-5" data-bs-dismiss="modal">
                                    <input type="button" value="<?php echo e(trans('labels.add_variants')); ?>"
                                        class="btn btn-secondary px-4 rounded-start-5 rounded-end-5 add-variants">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        var extrasurl = "<?php echo e(URL::to('admin/getextras')); ?>";
        var placehodername = "<?php echo e(trans('labels.name')); ?>";
        var placeholderprice = "<?php echo e(trans('labels.price')); ?>";
        var page = "add";
        var vendor_id = "<?php echo e(Auth::user()->id); ?>";
    </script>
    <script>
        $(document).on('click', '.add-variants', function(e) {
            e.preventDefault();
            var form = $(this).parents('form');
            var variantNameEle = $('#variant_name');
            var variantOptionsEle = $('#variant_options');
            var isValid = true;
            var hiddenVariantOptions = $('#hiddenVariantOptions').val();

            if (variantNameEle.val() == '') {
                variantNameEle.focus();
                isValid = false;
            } else if (variantOptionsEle.val() == '') {
                variantOptionsEle.focus();
                isValid = false;
            }

            if (isValid) {
                $.ajax({
                    url: form.attr('action'),
                    datType: 'json',
                    data: {
                        variant_name: variantNameEle.val(),
                        variant_options: variantOptionsEle.val(),
                        hiddenVariantOptions: hiddenVariantOptions
                    },
                    success: function(data) {
                        if (data.message != "" && data.message != null) {
                            toastr.error(data.message);
                        }
                        $('#hiddenVariantOptions').val(data.hiddenVariantOptions);
                        $('.variant-table').html(data.varitantHTML);
                        $('#variant_card').removeClass('d-none');
                        $("#commonModal").modal('hide');
                    }
                })
            }
        });
    </script>

    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/product.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/product/add_product.blade.php ENDPATH**/ ?>