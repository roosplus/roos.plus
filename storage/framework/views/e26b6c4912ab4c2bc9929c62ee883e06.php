<?php
    if (Auth::user()->type == 4) {
        $vendor_id = Auth::user()->vendor_id;
    } else {
        $vendor_id = Auth::user()->id;
    }
?>
<?php $__env->startSection('content'); ?>
    <?php if(Auth::user()->type == 1): ?>
        <div class="alert alert-warning" role="alert">
            <p>Don't use double quote (") and back slash (\) in the language fields.</p>
        </div>
    <?php endif; ?>

    <div class="row settings">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <div class="">
                <h5 class="pages-title fs-2"><?php echo e(trans('labels.language-settings')); ?></h5>
                <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php if(Auth::user()->type == 1): ?>
                <?php if(App\Models\SystemAddons::where('unique_identifier', 'language')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'language')->first()->activated == 1): ?>
                    <div class="col-sm-auto col-12">
                        <a href="<?php echo e(URL::to('/admin/language-settings/add')); ?>"
                            class="btn w-100 d-flex gap-1 justify-content-center btn-secondary px-4 rounded-start-5 rounded-end-5">
                            <i class="fa-regular fa-plus"></i>
                            <?php echo e(trans('labels.add')); ?>

                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <?php if(Auth::user()->type == 1): ?>
            <div class="col-12 mb-7">
                <div class="row">
                    <div class="col-xl-3 mb-3">
                        <div class="card card-sticky-top rounded-5 bg-transparent border-0">
                            <ul class="list-group list-options">
                                <?php $__currentLoopData = $getlanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(URL::to('admin/language-settings/' . $data->code)); ?>"
                                        class="list-group-item basicinfo p-3 rounded-5 list-item-primary <?php if($currantLang->code == $data->code): ?> active <?php endif; ?>"
                                        aria-current="true">
                                        <div class="d-flex justify-content-between align-item-center">
                                            <?php echo e($data->name); ?>

                                            <div class="d-flex align-item-center">
                                                <i class="fa-regular fa-angle-right ps-2"></i>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="d-flex gap-2 flex-wrap justify-content-between align-items-center">
                            <div
                                class="dropdown <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_language_settings', Auth::user()->role_id, $vendor_id, 'add') == 1 ? '' : 'd-none') : ''); ?>">
                                <div class="d-flex gap-2">
                                    <a class="btn btn-info btn-size" tooltip="<?php echo e(trans('labels.edit')); ?>"
                                        href="<?php echo e(URL::to('/admin/language-settings/language/edit-' . $currantLang->id)); ?>"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                    <?php if(Strtolower($currantLang->name) != 'english'): ?>
                                        <a class="btn btn-sm btn-danger btn-size " tooltip="<?php echo e(trans('labels.delete')); ?>"
                                            <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/language-settings/layout/delete-' . $currantLang->id . '/1')); ?>')" <?php endif; ?>>
                                            <i class="fa-regular fa-trash"></i> </a>
                                    <?php endif; ?>
                                    <?php if($currantLang->is_available == '1'): ?>
                                        <?php if(helper::available_language('')->count() > 1): ?>
                                            <a tooltip="<?php echo e(trans('labels.active')); ?>"
                                                <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/language-settings/status-' . $currantLang->id . '/2')); ?>')" <?php endif; ?>
                                                class="btn btn-sm btn-success btn-size "><i class="fas fa-check"></i></a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a tooltip="<?php echo e(trans('labels.inactive')); ?>"
                                            <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/language-settings/status-' . $currantLang->id . '/1')); ?>')" <?php endif; ?>
                                            class="btn btn-sm btn-danger btn-size "><i class="fas fa-close"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php if(helper::available_language('')->count() > 1): ?>
                                <div class="d-flex gap-2 align-items-center">
                                    <label for="language_default"
                                        class="form-label col-auto m-0"><?php echo e(trans('labels.default_language')); ?></label>
                                    <select name="language_default" class="form-select" id="language_default"
                                        <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onchange="location =  $('option:selected',this).data('value');" <?php endif; ?>>
                                        <option value="" data-value="<?php echo e(URL::to('admin/language-settings?lang=')); ?>">
                                            <?php echo e(trans('labels.select')); ?></option>
                                        <?php $__currentLoopData = helper::available_language(''); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="item"
                                                <?php echo e($item->code == helper::appdata('')->default_language ? 'selected' : ''); ?>

                                                <?php if(Request()->code != null && Request()->code != ''): ?> data-value="<?php echo e(URL::to('admin/language-settings/' . Request()->code . '?lang=' . $item->code)); ?>" <?php else: ?> data-value="<?php echo e(URL::to('admin/language-settings/?lang=' . $item->code)); ?>" <?php endif; ?>>
                                                <?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            <?php endif; ?>
                        </div>

                        <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="labels-tab" data-bs-toggle="tab"
                                    data-bs-target="#labels" type="button" role="tab" aria-controls="labels"
                                    aria-selected="true">Labels</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="message-tab" data-bs-toggle="tab" data-bs-target="#message"
                                    type="button" role="tab" aria-controls="message"
                                    aria-selected="false">Messages</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="landing-tab" data-bs-toggle="tab" data-bs-target="#landing"
                                    type="button" role="tab" aria-controls="landing"
                                    aria-selected="false">Landing</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="labels" role="tabpanel"
                                aria-labelledby="labels-tab">
                                <div class="card border-0 box-shadow">
                                    <div class="card-body">
                                        <form method="post" action="<?php echo e(URL::to('admin/language-settings/update')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" class="form-control" name="currantLang"
                                                value="<?php echo e($currantLang->code); ?>">
                                            <input type="hidden" class="form-control" name="file" value="label">
                                            <div class="row">
                                                <?php $__currentLoopData = $arrLabel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                for="example3cols1Input"><?php echo e($label); ?>

                                                            </label>
                                                            <input type="text" class="form-control"
                                                                name="label[<?php echo e($label); ?>]"
                                                                id="label<?php echo e($label); ?>"
                                                                onkeyup="validation($(this).val(),this.getAttribute('id'))"
                                                                value="<?php echo e($value); ?>">
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <div class="d-flex justify-content-end">
                                                            <?php if(env('Environment') == 'sendbox'): ?>
                                                                <button type="button"
                                                                    class="btn btn-secondary px-4 rounded-start-5 rounded-end-5"
                                                                    onclick="myFunction()"><i
                                                                        class="fa fa-check-square-o"></i>
                                                                    <?php echo e(trans('labels.save')); ?> </button>
                                                            <?php else: ?>
                                                                <button type="submit"
                                                                    class="btn btn-secondary px-4 rounded-start-5 rounded-end-5"><i
                                                                        class="fa fa-check-square-o"></i>
                                                                    <?php echo e(trans('labels.save')); ?>

                                                                </button>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="message" role="tabpanel" aria-labelledby="message-tab">
                                <div class="card border-0 box-shadow">
                                    <div class="card-body">
                                        <form method="post" action="<?php echo e(URL::to('admin/language-settings/update')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" class="form-control" name="currantLang"
                                                value="<?php echo e($currantLang->code); ?>">
                                            <input type="hidden" class="form-control" name="file" value="message">
                                            <div class="row">
                                                <?php $__currentLoopData = $arrMessage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                for="example3cols1Input"><?php echo e($label); ?>

                                                            </label>
                                                            <input type="text" class="form-control"
                                                                name="message[<?php echo e($label); ?>]"
                                                                id="message<?php echo e($label); ?>"
                                                                onkeyup="validation($(this).val(),this.getAttribute('id'))"
                                                                value="<?php echo e($value); ?>">
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <div class="d-flex justify-content-end">
                                                            <?php if(env('Environment') == 'sendbox'): ?>
                                                                <button type="button"
                                                                    class="btn btn-secondary px-4 rounded-start-5 rounded-end-5"
                                                                    onclick="myFunction()"><i
                                                                        class="fa fa-check-square-o"></i>
                                                                    <?php echo e(trans('labels.save')); ?> </button>
                                                            <?php else: ?>
                                                                <button type="submit"
                                                                    class="btn btn-secondary px-4 rounded-start-5 rounded-end-5"><i
                                                                        class="fa fa-check-square-o"></i>
                                                                    <?php echo e(trans('labels.save')); ?>

                                                                </button>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="landing" role="tabpanel" aria-labelledby="landing-tab">
                                <div class="card border-0 box-shadow">
                                    <div class="card-body">
                                        <form method="post" action="<?php echo e(URL::to('admin/language-settings/update')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" class="form-control" name="currantLang"
                                                value="<?php echo e($currantLang->code); ?>">
                                            <input type="hidden" class="form-control" name="file" value="landing">
                                            <div class="row">
                                                <?php $__currentLoopData = $arrLanding; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                for="example3cols1Input"><?php echo e($label); ?>

                                                            </label>
                                                            <input type="text" class="form-control"
                                                                name="landing[<?php echo e($label); ?>]"
                                                                id="landing<?php echo e($label); ?>"
                                                                onkeyup="validation($(this).val(),this.getAttribute('id'))"
                                                                value="<?php echo e($value); ?>">
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <div class="d-flex justify-content-end">
                                                            <?php if(env('Environment') == 'sendbox'): ?>
                                                                <button type="button"
                                                                    class="btn btn-secondary px-4 rounded-start-5 rounded-end-5"
                                                                    onclick="myFunction()"><i
                                                                        class="fa fa-check-square-o"></i>
                                                                    <?php echo e(trans('labels.save')); ?> </button>
                                                            <?php else: ?>
                                                                <button type="submit"
                                                                    class="btn btn-secondary px-4 rounded-start-5 rounded-end-5"><i
                                                                        class="fa fa-check-square-o"></i>
                                                                    <?php echo e(trans('labels.save')); ?>

                                                                </button>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
            <div class="col-12 mb-7">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                                <thead>
                                    <tr class="text-capitalize fs-15 fw-500">
                                        <td><?php echo e(trans('labels.srno')); ?></td>
                                        <td><?php echo e(trans('labels.language')); ?></td>
                                        <td><?php echo e(trans('labels.status')); ?></td>
                                        <td><?php echo e(trans('labels.is_default')); ?></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    <?php $__currentLoopData = helper::listoflanguage(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="fs-7" data-id="<?php echo e($language->id); ?>">
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo e($language->name); ?></td>
                                            <td>
                                                <?php if(in_array($language->code, explode('|', helper::appdata($vendor_id)->languages))): ?>
                                                    <a tooltip="<?php echo e(trans('labels.active')); ?>"
                                                        <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/language-settings/languagestatus-' . $language->code . '/2')); ?>')" <?php endif; ?>
                                                        class="btn btn-sm btn-success btn-size <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_language_settings', Auth::user()->role_id, $vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>">
                                                        <i class="fas fa-check"></i></a>
                                                <?php else: ?>
                                                    <a tooltip="<?php echo e(trans('labels.inactive')); ?>"
                                                        <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/language-settings/languagestatus-' . $language->code . '/1')); ?>')" <?php endif; ?>
                                                        class="btn btn-sm btn-danger btn-size <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_language_settings', Auth::user()->role_id, $vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>">
                                                        <i class="fas fa-close mx-1"></i></a>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <?php if(helper::appdata($vendor_id)->default_language == $language->code): ?>
                                                        <a tooltip="<?php echo e(trans('labels.active')); ?>"
                                                            <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/language-settings/setdefault-' . $language->code . '/2')); ?>')" <?php endif; ?>
                                                            class="btn btn-sm btn-success btn-size <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_language_settings', Auth::user()->role_id, $vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>">
                                                            <i class="fas fa-check"></i></a>
                                                    <?php else: ?>
                                                        <a tooltip="<?php echo e(trans('labels.inactive')); ?>"
                                                            <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/language-settings/setdefault-' . $language->code . '/1')); ?>')" <?php endif; ?>
                                                            class="btn btn-sm btn-danger btn-size <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_language_settings', Auth::user()->role_id, $vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>">
                                                            <i class="fas fa-close mx-1"></i></a>
                                                    <?php endif; ?>
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
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        function validation(value, id) {
            if (value.includes('"')) {
                newval = value.replaceAll('"', '');
                $('#' + id).val(newval);
            }
            if (value.includes('\\')) {
                newval = value.replaceAll('\\', '');
                $('#' + id).val(newval);
            }
        }
    </script>
    <script src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/js/settings.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/included/language/index.blade.php ENDPATH**/ ?>