
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Document')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Document')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Document')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('document.grid')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
        title="<?php echo e(__('Grid View')); ?>">
        <i class="ti ti-layout-grid text-white"></i>
    </a>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Document')): ?>
        <a href="#" data-size="lg" data-url="<?php echo e(route('document.create', ['document', 0])); ?>" data-ajax-popup="true"
            data-bs-toggle="tooltip" data-title="<?php echo e(__('Create New Document')); ?>" title="<?php echo e(__('Create')); ?>"
            class="btn btn-sm btn-primary btn-icon m-1">
            <i class="ti ti-plus"></i>
        </a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
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
                                    <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                    <th scope="col" class="sort" data-sort="budget"><?php echo e(__('File')); ?></th>
                                    <th scope="col" class="sort" data-sort="status"><?php echo e(__('Status')); ?></th>
                                    <th scope="col" class="sort" data-sort="completion">
                                        <?php echo e(__('Created At')); ?></th>
                                    <th scope="col" class="sort" data-sort="completion">
                                        <?php echo e(__('Assign User')); ?></th>
                                    <?php if(Gate::check('Show Document') || Gate::check('Edit Document') || Gate::check('Delete Document')): ?>
                                        <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('document.edit', $document->id)); ?>" data-size="md"
                                                data-title="<?php echo e(__('Document Details')); ?>" class="action-item text-primary">
                                                <?php echo e(ucfirst($document->name)); ?>

                                            </a>
                                        </td>
                                        <td class="budget">
                                            <?php
                                                $profile = \App\Models\Utility::get_file('upload/profile/');
                                            ?>
                                            <?php if(!empty($document->attachment)): ?>
                                                <div class="action-btn bg-primary ms-2">
                                                    <a class="mx-3 btn btn-sm align-items-center"
                                                        href="<?php echo e($profile . '/' . $document->attachment); ?>" download="">
                                                        <i class="ti ti-download text-white"></i>
                                                    </a>
                                                </div>
                                                <div class="action-btn bg-secondary ms-2">
                                                    <a class="mx-3 btn btn-sm align-items-center"
                                                        href="<?php echo e($profile . '/' . $document->attachment); ?>"
                                                        target="_blank">
                                                        <i class="ti ti-crosshair text-white" data-bs-toggle="tooltip"
                                                            data-bs-original-title="<?php echo e(__('Preview')); ?>"></i>
                                                    </a>
                                                </div>
                                            <?php else: ?>
                                                <span>
                                                    <?php echo e(__('No File')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($document->status == 0): ?>
                                                <span class="badge bg-success p-2 px-3 rounded"
                                                    style="width: 73px;"><?php echo e(__(\App\Models\Document::$status[$document->status])); ?></span>
                                            <?php elseif($document->status == 1): ?>
                                                <span class="badge bg-warning p-2 px-3 rounded"
                                                    style="width: 73px;"><?php echo e(__(\App\Models\Document::$status[$document->status])); ?></span>
                                            <?php elseif($document->status == 2): ?>
                                                <span class="badge bg-danger p-2 px-3 rounded"
                                                    style="width: 73px;"><?php echo e(__(\App\Models\Document::$status[$document->status])); ?></span>
                                            <?php elseif($document->status == 3): ?>
                                                <span class="badge bg-danger p-2 px-3 rounded"
                                                    style="width: 73px;"><?php echo e(__(\App\Models\Document::$status[$document->status])); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(\Auth::user()->dateFormat($document->created_at)); ?></span>
                                        </td>
                                        <td>
                                            <span class="col-sm-12"><span
                                                    class="text-sm"><?php echo e(ucfirst(!empty($document->assign_user) ? $document->assign_user->name : '-')); ?></span></span>
                                        </td>
                                        <?php if(Gate::check('Show Document') || Gate::check('Edit Document') || Gate::check('Delete Document')): ?>
                                            <td class="text-end">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Document')): ?>
                                                    <div class="action-btn bg-warning ms-2">
                                                        <a href="#" data-size="md"
                                                            data-url="<?php echo e(route('document.show', $document->id)); ?>"
                                                            data-ajax-popup="true" data-bs-toggle="tooltip"
                                                            title="<?php echo e(__('Quick View')); ?>"
                                                            data-title="<?php echo e(__('Document Details')); ?>"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center text-white">
                                                            <i class="ti ti-eye"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Document')): ?>
                                                    <div class="action-btn bg-info ms-2">
                                                        <a href="<?php echo e(route('document.edit', $document->id)); ?>"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center text-white "
                                                            data-bs-toggle="tooltip" title="<?php echo e(__('Details')); ?>"
                                                            data-title="<?php echo e(__('Edit Document')); ?>"><i
                                                                class="ti ti-edit"></i></a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Document')): ?>
                                                    <div class="action-btn bg-danger ms-2">
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['document.destroy', $document->id]]); ?>

                                                        <a href="#!"
                                                            class="mx-3 btn btn-sm   align-items-center text-white show_confirm"
                                                            data-bs-toggle="tooltip" title='Delete'>
                                                            <i class="ti ti-trash"></i>
                                                        </a>
                                                        <?php echo Form::close(); ?>

                                                    </div>
                                                <?php endif; ?>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\centra\centraglobe\main-file\resources\views/document/index.blade.php ENDPATH**/ ?>