<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).ready(function() {
            $('.cp_link').on('click', function() {
                var value = $(this).attr('data-link');
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val(value).select();
                document.execCommand("copy");
                $temp.remove();
                show_toastr('Success', '<?php echo e(__('Link Copy on Clipboard')); ?>', 'success')
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Form Builder')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Form Builder')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Form Builder')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <?php if(\Auth::user()->can('Create Form Builder')): ?>
        <div class="action-btn bg-warning ms-2">
            <a href="#" data-url="<?php echo e(route('form_builder.create')); ?>" data-size="md" data-ajax-popup="true"
                data-title="<?php echo e(__('Create New Form')); ?>"
                title="<?php echo e(__('Create')); ?>"class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip">
                <i class="ti ti-plus"></i>
            </a>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive overflow_hidden">
                        <table id="datatable" class="table datatable align-items-center">
                            <thead class="thead-light">
                                <tr>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Response')); ?></th>
                                    <?php if(\Auth::user()->can('Edit Form Builder') || \Auth::user()->can('Delete Form Builder')): ?>
                                        <th class="text-end" width="200px"><?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $__currentLoopData = $forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($form->name); ?></td>
                                    <td>
                                        <?php echo e($form->response->count()); ?>

                                    </td>
                                    <?php if(\Auth::user()->can('Edit Form Builder') || \Auth::user()->can('Delete Form Builder')): ?>
                                        <td class="text-end">
                                            <div class="action-btn bg-dark ms-2">
                                                <a href="#" data-size="md"
                                                    data-url="<?php echo e(route('form.field.bind', $form->id)); ?>"
                                                    data-ajax-popup="true" data-title="<?php echo e(__('Convert Setting')); ?>"
                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                    data-bs-toggle="tooltip" title="<?php echo e(__('Convert Setting')); ?>"><i
                                                        class="ti ti-exchange"></i></a>
                                            </div>

                                            <div class="action-btn bg-success ms-2">
                                                <a href="#"
                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center text-white cp_link"
                                                    data-link="<?php echo e(url('/form/' . $form->code)); ?>" data-bs-toggle="tooltip"
                                                    title="<?php echo e(__('copy')); ?>"data-title="<?php echo e(__('Click to copy link')); ?>"><i
                                                        class="ti ti-file"></i></a>
                                            </div>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Form Builder')): ?>
                                                <div class="action-btn bg-secondary ms-2">
                                                    <a href="<?php echo e(route('form_builder.show', $form->id)); ?>"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                        data-bs-toggle="tooltip"
                                                        data-title="<?php echo e(__('Form field')); ?>"title="<?php echo e(__('Form field')); ?>"><i
                                                            class="ti ti-table"></i></a>
                                                </div>
                                            <?php endif; ?>
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="<?php echo e(route('form.response', $form->id)); ?>"
                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                    data-bs-toggle="tooltip" data-title="<?php echo e(__('View Response')); ?>"
                                                    title="<?php echo e(__('View Response')); ?>"><i class="ti ti-eye"></i></a>
                                            </div>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Form Builder')): ?>
                                                <div class="action-btn bg-info ms-2">
                                                    <a href="#"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                        data-size="md" data-url="<?php echo e(route('form_builder.edit', $form->id)); ?>"
                                                        data-ajax-popup="true" data-title="<?php echo e(__('Edit Form')); ?>"
                                                        data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>">
                                                        <i class="ti ti-edit"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Form Builder')): ?>
                                                <div class="action-btn bg-danger ms-2">
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['form_builder.destroy', $form->id]]); ?>

                                                    <a href="#!" title="<?php echo e(__('Delete')); ?>"
                                                        data-bs-toggle="tooltip"class="mx-3 btn btn-sm  align-items-center text-white show_confirm">
                                                        <i class="ti ti-trash"></i>
                                                    </a>
                                                    <?php echo Form::close(); ?>

                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\centraglobe\main-file\resources\views/form_builder/index.blade.php ENDPATH**/ ?>