<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Event')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Event')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Event')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('meeting.index')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
        title="<?php echo e(__('List View')); ?>">
        <i class="ti ti-list text-white"></i>
    </a>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Meeting')): ?>
        <a href="#" data-size="lg" data-url="<?php echo e(route('meeting.create', ['meeting', 0])); ?>" data-ajax-popup="true"
            data-bs-toggle="tooltip" data-title="<?php echo e(__('Create New Event')); ?>" title="<?php echo e(__('Create')); ?>"
            class="btn btn-sm btn-primary btn-icon m-1">
            <i class="ti ti-plus"></i>
        </a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <div class="d-flex align-items-center">
                            <?php if($meeting->status == 0): ?>
                                <span
                                    class="badge bg-success p-2 px-3 rounded"><?php echo e(__(\App\Models\Meeting::$status[$meeting->status])); ?></span>
                            <?php elseif($meeting->status == 1): ?>
                                <span
                                    class="badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Meeting::$status[$meeting->status])); ?></span>
                            <?php elseif($meeting->status == 2): ?>
                                <span
                                    class="badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Meeting::$status[$meeting->status])); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <?php if(Gate::check('Show Meeting') || Gate::check('Edit Meeting') || Gate::check('Delete Meeting')): ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Meeting')): ?>
                                            <a href="<?php echo e(route('meeting.edit', $meeting->id)); ?>" class="dropdown-item"
                                                data-bs-whatever="<?php echo e(__('Edit Meeting')); ?>" data-bs-toggle="tooltip"
                                                data-title="<?php echo e(__('Edit Meeting')); ?>"><i class="ti ti-edit"></i>
                                                <?php echo e(__('Edit')); ?></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Meeting')): ?>
                                            <a href="#" data-url="<?php echo e(route('meeting.show', $meeting->id)); ?>"
                                                data-ajax-popup="true"data-size="md" class="dropdown-item"
                                                data-bs-whatever="<?php echo e(__('Event Details')); ?>" data-bs-toggle="tooltip"
                                                data-title="<?php echo e(__('Event Details')); ?>"><i class="ti ti-eye"></i>
                                                <?php echo e(__('Details')); ?></a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Meeting')): ?>
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['meeting.destroy', $meeting->id]]); ?>

                                            <a href="#!"
                                                class="mx-3 btn btn-sm d-inline-flex align-items-center show_confirm"
                                                data-bs-toggle="tooltip">
                                                <i class="ti ti-trash"></i><?php echo e(__('Delete')); ?>

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
                                        
                                        <img alt="user-image" class="img-fluid rounded-circle"
                                            <?php if(!empty($meeting->avatar)): ?> src="<?php echo e(!empty($meeting->avatar) ? asset(Storage::url('upload/profile/' . $meeting->avatar)) : asset(url('./assets/img/clients/160x160/img-1.png'))); ?>" <?php else: ?>  avatar="<?php echo e($meeting->name); ?>" <?php endif; ?>>
                                    </div>
                                    <h5 class="h6 mt-4 mb-1 text-primary">
                                        <?php echo e(ucfirst($meeting->name)); ?>

                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">

            <a href="#" class="btn-addnew-project" data-ajax-popup="true" data-size="lg"
                data-title="<?php echo e(__('Create New Meeting')); ?>" data-url="<?php echo e(route('meeting.create',['meeting',0])); ?>">
                <div class="badge bg-primary proj-add-icon">
                    <i class="ti ti-plus"></i>
                </div>
                <h6 class="mt-4 mb-2">New Event</h6>
                <p class="text-muted text-center">Click here to add New Event</p>
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('change', 'select[name=parent]', function() {

            var parent = $(this).val();

            getparent(parent);
        });

        function getparent(bid) {

            $.ajax({
                url: '<?php echo e(route('meeting.getparent')); ?>',
                type: 'POST',
                data: {
                    "parent": bid,
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function(data) {
                    console.log(data);
                    $('#parent_id').empty();
                    

                    $.each(data, function(key, value) {
                        $('#parent_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\centraglobe\main-file\resources\views/meeting/grid.blade.php ENDPATH**/ ?>