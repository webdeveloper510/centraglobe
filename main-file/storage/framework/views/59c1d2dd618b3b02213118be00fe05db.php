
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Account')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Account')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Account')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('account.grid')); ?>" class="btn btn-sm btn-primary btn-icon m-1"
        data-bs-toggle="tooltip"title="<?php echo e(__('Grid View')); ?>">
        <i class="ti ti-layout-grid text-white"></i>
    </a>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Account')): ?>
        <a href="#" data-url="<?php echo e(route('account.create', ['account', 0])); ?>" data-size="lg" data-ajax-popup="true"
            data-bs-toggle="tooltip"data-title="<?php echo e(__('Create New Account')); ?>"title="<?php echo e(__('Create')); ?>"
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
                                    <th scope="col" class="sort" data-sort="Email"><?php echo e(__('Email')); ?></th>
                                    <th scope="col" class="sort" data-sort="Phone"><?php echo e(__('Phone')); ?></th>
                                    <th scope="col" class="sort" data-sort="Website"><?php echo e(__('Website')); ?></th>
                                    <th scope="col" class="sort" data-sort="Assigned User"><?php echo e(__('Assigned User')); ?>

                                    </th>
                                    <?php if(Gate::check('Show Account') || Gate::check('Edit Account') || Gate::check('Delete Account')): ?>
                                        <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('account.edit', $account->id)); ?>" data-size="md"
                                                data-title="<?php echo e(__('Account Details')); ?>" class="action-item text-primary">
                                                <?php echo e(ucfirst($account->name)); ?>

                                            </a>
                                        </td>
                                        <td class="budget">
                                            <?php echo e($account->email); ?>

                                        </td>
                                        <td>
                                            <span class="budget"> <?php echo e($account->phone); ?> </span>
                                        </td>
                                        <td>
                                            <span class="budget"><?php echo e($account->website); ?>

                                                <a href="<?php echo e($account->website); ?>" target="_blank"
                                                    class="btn btn-lg btn-sm d-inline-flex align-items-center">
                                                    <i class="ti ti-external-link text-success"
                                                        style="font-size: 1.5rem;"></i>
                                                </a>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="col-sm-12"><span
                                                    class="text-sm"><?php echo e(ucfirst(!empty($account->assign_user) ? $account->assign_user->name : '-')); ?></span></span>
                                        </td>

                                        <?php if(Gate::check('Show Account') || Gate::check('Edit Account') || Gate::check('Delete Account')): ?>
                                            <td class="text-end">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Account')): ?>
                                                    <div class="action-btn bg-warning ms-2">
                                                        <a href="#" data-size="md"
                                                            data-url="<?php echo e(route('account.show', $account->id)); ?>"
                                                            data-ajax-popup="true" data-bs-toggle="tooltip"
                                                            title="<?php echo e(__('Quick View')); ?>"
                                                            data-title="<?php echo e(__('Account Details')); ?>"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center text-white ">
                                                            <i class="ti ti-eye"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Account')): ?>
                                                    <div class="action-btn bg-info ms-2">
                                                        <a href="<?php echo e(route('account.edit', $account->id)); ?>"
                                                            data-size="md"class="mx-3 btn btn-sm d-inline-flex align-items-center text-white "
                                                            data-bs-toggle="tooltip"data-title="<?php echo e(__('Account Edit')); ?>"
                                                            title="<?php echo e(__('Details')); ?>"><i class="ti ti-edit"></i></a>

                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Account')): ?>
                                                    <div class="action-btn bg-danger ms-2">
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['account.destroy', $account->id]]); ?>

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
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('click', '#billing_data', function() {
            $("[name='shipping_address']").val($("[name='billing_address']").val());
            $("[name='shipping_city']").val($("[name='billing_city']").val());
            $("[name='shipping_state']").val($("[name='billing_state']").val());
            $("[name='shipping_country']").val($("[name='billing_country']").val());
            $("[name='shipping_postalcode']").val($("[name='billing_postalcode']").val());
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\centra\centraglobe\main-file\resources\views/account/index.blade.php ENDPATH**/ ?>