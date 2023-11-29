<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Cases')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Cases')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Cases')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('commoncases.grid')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
        title="<?php echo e(__('Grid View')); ?>">
        <i class="ti ti-layout-grid text-white"></i>
    </a>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create CommonCase')): ?>
        <a href="#" data-size="lg" data-url="<?php echo e(route('commoncases.create', ['commoncases', 0])); ?>" data-ajax-popup="true"
            data-bs-toggle="tooltip" data-title="<?php echo e(__('Create New Case')); ?>"title="<?php echo e(__('Create')); ?>"
            class="btn btn-sm btn-primary btn-icon m-1">
            <i class="ti ti-plus"></i>
        </a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable" id="datatable">
                            <thead>
                                <tr>
                                    <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                    <th scope="col" class="sort" data-sort="name"><?php echo e(__('Number')); ?></th>
                                    <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Account')); ?></th>
                                    <th scope="col" class="sort" data-sort="status"><?php echo e(__('Status')); ?></th>
                                    <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Priority')); ?></th>
                                    <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Assigned User')); ?></th>
                                    <?php if(Gate::check('Show CommonCase') || Gate::check('Edit CommonCase') || Gate::check('Delete CommonCase')): ?>
                                        <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $cases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $case): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('commoncases.edit', $case->id)); ?>"     data-size="md"
                                                data-title="<?php echo e(__('Cases Details')); ?>" class="text-primary">
                                                <?php echo e($case->name); ?>

                                            </a>
                                        </td>
                                        <td><?php echo e($case->number); ?></td>
                                        <td>
                                            <?php echo e(!empty($case->accounts->name) ? $case->accounts->name : '--'); ?>

                                        </td>
                                        <td>
                                            <?php if($case->status == 0): ?>
                                                <span class="badge bg-success p-2 px-3 rounded"
                                                    style="width: 73px;"><?php echo e(__(\App\Models\CommonCase::$status[$case->status])); ?></span>
                                            <?php elseif($case->status == 1): ?>
                                                <span class="badge bg-info p-2 px-3 rounded"
                                                    style="width: 73px;"><?php echo e(__(\App\Models\CommonCase::$status[$case->status])); ?></span>
                                            <?php elseif($case->status == 2): ?>
                                                <span class="badge bg-warning p-2 px-3 rounded"
                                                    style="width: 73px;"><?php echo e(__(\App\Models\CommonCase::$status[$case->status])); ?></span>
                                            <?php elseif($case->status == 3): ?>
                                                <span class="badge bg-danger p-2 px-3 rounded"
                                                    style="width: 73px;"><?php echo e(__(\App\Models\CommonCase::$status[$case->status])); ?></span>
                                            <?php elseif($case->status == 4): ?>
                                                <span class="badge bg-danger p-2 px-3 rounded"
                                                    style="width: 73px;"><?php echo e(__(\App\Models\CommonCase::$status[$case->status])); ?></span>
                                            <?php elseif($case->status == 5): ?>
                                                <span class="badge bg-warning p-2 px-3 rounded"
                                                    style="width: 73px;"><?php echo e(__(\App\Models\CommonCase::$status[$case->status])); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($case->priority == 0): ?>
                                                <span class="badge bg-primary p-2 px-3 rounded"
                                                    style="width: 73px;"><?php echo e(__(\App\Models\CommonCase::$priority[$case->priority])); ?></span>
                                            <?php elseif($case->priority == 1): ?>
                                                <span class="badge bg-info p-2 px-3 rounded"
                                                    style="width: 73px;"><?php echo e(__(\App\Models\CommonCase::$priority[$case->priority])); ?></span>
                                            <?php elseif($case->priority == 2): ?>
                                                <span class="badge bg-warning p-2 px-3 rounded"
                                                    style="width: 73px;"><?php echo e(__(\App\Models\CommonCase::$priority[$case->priority])); ?></span>
                                            <?php elseif($case->priority == 3): ?>
                                                <span class="badge bg-danger  p-2 px-3 rounded"
                                                    style="width: 73px;"><?php echo e(__(\App\Models\CommonCase::$priority[$case->priority])); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php echo e(!empty($case->assign_user) ? $case->assign_user->name : ''); ?>

                                        </td>
                                        <?php if(Gate::check('Show CommonCase') || Gate::check('Edit CommonCase') || Gate::check('Delete CommonCase')): ?>
                                            <td class="text-end">

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show CommonCase')): ?>
                                                    <div class="action-btn bg-warning ms-2">
                                                        <a href="#" data-size="md"
                                                            data-url="<?php echo e(route('commoncases.show', $case->id)); ?>"
                                                            data-ajax-popup="true" data-bs-toggle="tooltip"
                                                            data-title="<?php echo e(__('Cases Details')); ?>"title="<?php echo e(__('Quick View')); ?>"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center text-white ">
                                                            <i class="ti ti-eye"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit CommonCase')): ?>
                                                    <div class="action-btn bg-info ms-2">
                                                        <a href="<?php echo e(route('commoncases.edit', $case->id)); ?>"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center text-white "
                                                            data-bs-toggle="tooltip"
                                                            data-title="<?php echo e(__('Edit Cases')); ?>"title="<?php echo e(__('Details')); ?>"><i
                                                                class="ti ti-edit"></i></a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete CommonCase')): ?>
                                                    <div class="action-btn bg-danger ms-2">
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['commoncases.destroy', $case->id]]); ?>

                                                        <a href="#!"
                                                            class="mx-3 btn btn-sm   align-items-center text-white show_confirm"
                                                            data-bs-toggle="tooltip" title='Delete'>
                                                            <i class="ti ti-trash"></i>
                                                        </a>
                                                        <?php echo Form::close(); ?>



                                                        
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\centraglobe\main-file\resources\views/commoncase/index.blade.php ENDPATH**/ ?>