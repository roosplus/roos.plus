<form method="POST" action="<?php echo e(URL::to('admin/products/get-product-variants-possibilities')); ?>" id="editvariants">
    <?php echo csrf_field(); ?>
    <input name="variant_edit" type="hidden" value="edit">
    <div class="px-3">
        <?php $__currentLoopData = $productVariantOption; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kry => $variantOpt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-group">
                <h6 class="text-dark"> <?php echo e($variantOpt['variant_name']); ?>:
                    <small><?php echo e(__('Variant Options')); ?></small>
                </h6>
            </div>
            <div class="form-group">
                <input class="form-control" name="variant_edt[<?php echo e($kry); ?>][variant_name]" type="hidden"
                    id="variant_name<?php echo e($kry); ?>" value="<?php echo e($variantOpt['variant_name']); ?>"
                    onkeyup="this.value = this.value.replace(/[`\/\\~_$&+,:;=?[\]@#{}'<>.^*()%!-/]/, '')">
                <input class="form-control" name="variant_edt[<?php echo e($kry); ?>][variant_options]" type="text"
                    onkeyup="this.value = this.value.replace(/[`\/\\~_$&+,:;=?[\]@#{}'<>.^*()%!-/]/, '')"
                    id="variant_options<?php echo e($kry); ?>"
                    placeholder="<?php echo e(__('Variant Options separated by|pipe symbol, i.e Black|Blue|Red')); ?>">
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="modal-footer p-3">
        <div class="form-group m-0 p-0 gap-2 col-12 d-flex justify-content-end col-form-label">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-danger px-4 rounded-start-5 rounded-end-5"
                data-bs-dismiss="modal">
            <input type="button" value="<?php echo e(__('Add Variants')); ?>"
                class="btn btn-secondary px-4 rounded-start-5 rounded-end-5 addOredit-variants">
        </div>
    </div>
</form>
<script>
    $(document).on('click', '.addOredit-variants', function(e) {
        e.preventDefault();
        var forms = $(this).parents('form');

        var hiddenVariantOptions = $('#hiddenVariantOptions').val();
        let form = document.getElementById('editvariants');
        let fd = new FormData(form);

        fd.append('hiddenVariantOptions', hiddenVariantOptions);
        $.ajax({
            type: 'POST',
            url: "<?php echo e(URL::to('admin/products/product-variants-possibilities', ['item_id' => $item_id])); ?>",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: fd,
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {

                $('#hiddenVariantOptions').val(data.hiddenVariantOptions);
                $('.variant-table').html(data.varitantHTML);
                $("#commonModal").modal('hide');
            },
        });
    });
</script>
<script>
    function regularexpession(id) {
        $('#' + id).keypress(function(e) {
            setTimeout(function() {
                var value = $('#variant_options').val();
                var updated = value.replace(/[`\/\\~_$&+,:;=?[\]@#{}'<>.^*()%!-/]/, '');
                $('#variant_options').val(updated);
            });

        });
    }
</script>
<script>
    function validation(value, id) {
        if (value.includes('@')) {
            newval = value.replaceAll('@', '');
            $('#' + id).val(newval);
        }
        if (value.includes('\\')) {
            newval = value.replaceAll('\\', '');
            $('#' + id).val(newval);
        }
    }
</script>
<?php /**PATH /mnt/c/restro-saas/resources/views/admin/product/variants/edit.blade.php ENDPATH**/ ?>