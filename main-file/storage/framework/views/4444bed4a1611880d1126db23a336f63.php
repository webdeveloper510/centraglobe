<?php
$profile=\App\Models\Utility::get_file('upload/profile/');
?>


<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('User')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="page-header-title">
        <h4 class="m-b-10"><?php echo e(__('Users')); ?></h4>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('User')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('user.index')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
        title="<?php echo e(__('List View')); ?>">
        <i class="ti ti-list text-white"></i>
    </a>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create User')): ?>

            <a href="#" data-url="<?php echo e(route('user.create')); ?>" data-size="md" data-ajax-popup="true" data-bs-toggle="tooltip"
                title="<?php echo e(__('Create')); ?>" data-title="<?php echo e(__('Create New User')); ?>"
                class="btn btn-sm btn-primary btn-icon">
                <i class="ti ti-plus"></i>
            </a>

        <?php endif; ?>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('filter'); ?>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>
        <?php if(\Auth::user()->type != 'super admin'): ?>
            <div class="row">
                 <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <div class="d-flex align-items-center">
                                    <?php if(!empty($user->getRoleNames())): ?>
                                    <div class="badge-container">
                                        <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label class="badge bg-primary p-2 px-2 rounded"><?php echo e($v); ?></label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="card-header-right">
                                    <div class="btn-group card-option">
                                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="feather icon-more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <?php if(Gate::check('Create User') || Gate::check('Edit User') || Gate::check('Delete User')): ?>
                                                
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit User')): ?>
                                                    <a href="<?php echo e(route('user.edit', $user->id)); ?>" class="dropdown-item"
                                                        data-bs-whatever="<?php echo e(__('Edit User')); ?>" data-bs-toggle="tooltip"
                                                        data-title="<?php echo e(__('Edit User')); ?>"><i class="ti ti-edit"></i>
                                                        <?php echo e(__('Edit')); ?></a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create User')): ?>
                                                    <a href="#" data-url="<?php echo e(route('user.show', $user->id)); ?>"
                                                        data-ajax-popup="true" data-size="md" class="dropdown-item"
                                                        data-bs-whatever="<?php echo e(__('User Details')); ?>" data-bs-toggle="tooltip"
                                                        data-title="<?php echo e(__('User Details')); ?>"><i class="ti ti-eye"></i>
                                                        <?php echo e(__('Details')); ?></a>
                                                <?php endif; ?>
                                                <a href="#" data-url="<?php echo e(route('user.reset', \Crypt::encrypt($user->id))); ?>"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal" data-ajax-popup="true"
                                                    data-size="md" title="<?php echo e(__('Reset Password')); ?>" class="dropdown-item"
                                                    data-bs-toggle="tooltip" data-bs-whatever="<?php echo e(__('Reset Password')); ?>"
                                                    data-title=" <?php echo e(__('Reset Password')); ?>"><i class="ti ti-trophy"></i>
                                                    <?php echo e(__('Reset Password')); ?>

                                                </a>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete User')): ?>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]); ?>

                                                    <a href="#!" class="dropdown-item  show_confirm" data-bs-toggle="tooltip">
                                                        <i class="ti ti-trash"></i>
                                                        <?php echo e(__('Delete')); ?>

                                                    </a>
                                                    <?php echo Form::close(); ?>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row g-2 justify-content-between">
                                    <div class="col-12">
                                        <div class="text-center client-box">
                                            <div class="avatar-parent-child">

                                                <a href="<?php echo e($profile); ?><?php echo e(!empty($user->avatar)?$user->avatar:'avatar.png'); ?>" target="_blank">
                                                    <img class="rounded-circle" width="25%" <?php if($user->avatar): ?> src="<?php echo e($profile); ?><?php echo e(!empty($user->avatar)?$user->avatar:'avatar.png'); ?>" <?php else: ?> src="<?php echo e($profile.'avatar.png'); ?>" <?php endif; ?>  alt="<?php echo e($user->name); ?>">
                                                </a>
                                                

                                            </div>


                                            <h5 class="h6 mt-4 mb-1">
                                                <a href="#" data-size="md"
                                                    data-url="<?php echo e(route('user.show',$user->id)); ?>"
                                                    data-ajax-popup="true" data-title="<?php echo e(__('User Details')); ?>"
                                                    class="action-item text-primary">
                                                    <?php echo e(ucfirst($user->name)); ?>

                                                </a>
                                            </h5>
                                            <a href="#" class="d-block text-sm text-muted mb-3"> <?php echo e($user->email); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <a href="#" class="btn-addnew-project" data-ajax-popup="true" data-size="md"
                        data-title="<?php echo e(__('Create New User')); ?>" data-url="<?php echo e(route('user.create')); ?>">
                        <div class="badge bg-primary proj-add-icon">
                            <i class="ti ti-plus"></i>
                        </div>
                        <h6 class="mt-4 mb-2">New User</h6>
                        <p class="text-muted text-center">Click here to add New User</p>
                    </a>
                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="row">
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3">
                                <div class="card text-center">
                                    <div class="card-header border-0 pb-0">


                                        <div class="card-header-right">
                                            <div class="btn-group card-option">

                                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-more-vertical"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end">

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit User')): ?>
                                                        <a href="<?php echo e(route('user.edit', $user->id)); ?>" class="dropdown-item"
                                                            data-bs-whatever="<?php echo e(__('Edit User')); ?>" data-bs-toggle="tooltip"
                                                            data-title="<?php echo e(__('Edit User')); ?>"><i class="ti ti-edit"></i>
                                                            <?php echo e(__('Edit')); ?></a>
                                                    <?php endif; ?>


                                                    <a href="#" data-url="<?php echo e(route('user.reset', \Crypt::encrypt($user->id))); ?>"
                                                        data-bs-toggle="modal" data-size="md" data-bs-target="#exampleModal"
                                                        data-ajax-popup="true" class="dropdown-item" data-bs-toggle="tooltip"
                                                        data-bs-whatever="<?php echo e(__('Reset Password')); ?>"
                                                        data-title=" <?php echo e(__('Reset Password')); ?>"><i
                                                            class="ti ti-key"></i>
                                                        <?php echo e(__('Reset Password')); ?>

                                                    </a>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete User')): ?>
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]); ?>

                                                        <a href="#!" class="dropdown-item  show_confirm" data-bs-toggle="tooltip">
                                                            <i class="ti ti-trash"></i><?php echo e(__('Delete')); ?>

                                                        </a>
                                                        <?php echo Form::close(); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="avatar-parent-child">
                                                

                                                <a href="<?php echo e($profile); ?><?php echo e(!empty($user->avatar)?$user->avatar:'avatar.png'); ?>" target="_blank">
                                                <img class="rounded-circle" width="25%" <?php if($user->avatar): ?> src="<?php echo e($profile); ?><?php echo e(!empty($user->avatar)?$user->avatar:'avatar.png'); ?>" <?php else: ?> src="<?php echo e($profile.'avatar.png'); ?>" <?php endif; ?>  alt="<?php echo e($user->name); ?>">
                                                </a>
                                            </div>
                                            <h5 class="h6 mt-4 mb-0 text-primary"> <?php echo e($user->name); ?></h5>
                                            <a href="#" class="d-block text-sm text-muted mb-3"> <?php echo e($user->email); ?></a>

                                            <p></p>

                                                    <div class="mt-4">
                                                        <div class="row justify-content-between align-items-center">
                                                            <div class="col-6 text-center mb-2">
                                                                <span class="d-block font-bold mb-0"><?php echo e(!empty($user->currentPlan) ? $user->currentPlan->name : ''); ?></span>
                                                            </div>
                                                            <div class="col-6 text-center Id mb-2">
                                                                <a href="#" data-url="<?php echo e(route('plan.upgrade', $user->id)); ?>"
                                                                    data-size="md" data-ajax-popup="true"
                                                                    data-title="<?php echo e(__('Upgrade Plan')); ?>"
                                                                    class="btn small--btn btn-outline-primary text-sm"><?php echo e(__('Upgrade Plan')); ?></a>
                                                            </div>
                                                            <div class="col-12">
                                                                <hr class="my-3">
                                                            </div>

                                                            <div class="col-12 text-center pb-2">
                                                                <span class="d-block text-sm text-muted"><?php echo e(__('Plan Expired')); ?> :
                                                                    <?php echo e(!empty($user->plan_expire_date) ? \Auth::user()->dateFormat($user->plan_expire_date) : 'lifetime'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3">
                                                        <div class="col-12 col-sm-12">
                                                            <div class="card mb-0">
                                                                <div class="card-body p-3">
                                                                    <div class="row">

                                                                        <div class="col-4">
                                                                            <p class="text-muted text-sm mb-0" data-bs-toggle="tooltip" title="<?php echo e(__('Users')); ?>"><i class="ti ti-user card-icon-text-space"></i><?php echo e($user->countUser($user->id)); ?></p>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <p class="text-muted text-sm mb-0" data-bs-toggle="tooltip" title="<?php echo e(__('Account')); ?>"><i class="ti ti-building card-icon-text-space"></i><?php echo e($user->countAccount($user->id)); ?></p>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <p class="text-muted text-sm mb-0" data-bs-toggle="tooltip" title="<?php echo e(__('Contact')); ?>"><i class="ti ti-file-phone card-icon-text-space"></i><?php echo e($user->countContact($user->id)); ?></p>
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">
                            <a href="#" class="btn-addnew-project" data-ajax-popup="true" data-size="md"
                                data-title="<?php echo e(__('Create New User')); ?>" data-url="<?php echo e(route('user.create')); ?>">
                                <div class="badge bg-primary proj-add-icon">
                                    <i class="ti ti-plus"></i>
                                </div>
                                <h6 class="mt-4 mb-2">New User</h6>
                                <p class="text-muted text-center">Click here to add New User</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\centraglobe\centraglobe\main-file\resources\views/user/grid.blade.php ENDPATH**/ ?>