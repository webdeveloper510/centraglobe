<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Call')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Call')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Call')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('call.grid')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
        title="<?php echo e(__('Grid View')); ?>">
        <i class="ti ti-layout-grid text-white"></i>
    </a>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Call')): ?>
        <a href="#" data-size="lg" data-url="<?php echo e(route('call.create', ['call', 0])); ?>" data-ajax-popup="true"
            data-bs-toggle="tooltip" data-title="<?php echo e(__('Create New Call')); ?>"
            title="<?php echo e(__('Create')); ?>"class="btn btn-sm btn-primary btn-icon m-1">
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
                                    <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Parent')); ?></th>
                                    <th scope="col" class="sort" data-sort="status"><?php echo e(__('Status')); ?></th>
                                    <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Date Start')); ?></th>
                                    <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Assigned User')); ?></th>
                                    <?php if(Gate::check('Show Call') || Gate::check('Edit Call') || Gate::check('Delete Call')): ?>
                                        <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $calls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $call): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('call.edit', $call->id)); ?>" data-size="md"
                                                data-title="<?php echo e(__('show Call')); ?>" class="action-item text-primary">
                                                <?php echo e(ucfirst($call->name)); ?>

                                            </a>
                                        </td>
                                       <td class="budget">
                                            <?php echo e(ucfirst($call->parent)); ?>

                                        </td>
                                        <td>
                                            <?php if($call->status == 0): ?>
                                                <span class="badge bg-success p-2 px-3 rounded"
                                                    style="width: 73px;"><?php echo e(__(\App\Models\Call::$status[$call->status])); ?></span>
                                            <?php elseif($call->status == 1): ?>
                                                <span class="badge bg-warning p-2 px-3 rounded"
                                                    style="width: 73px;"><?php echo e(__(\App\Models\Call::$status[$call->status])); ?></span>
                                            <?php elseif($call->status == 2): ?>
                                                <span class="badge bg-danger p-2 px-3 rounded"
                                                    style="width: 73px;"><?php echo e(__(\App\Models\Call::$status[$call->status])); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="budget"><?php echo e(\Auth::user()->dateFormat($call->start_date)); ?></span>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(ucfirst(!empty($call->assign_user) ? $call->assign_user->name : '')); ?></span>
                                        </td>
                                        <?php if(Gate::check('Show Call') || Gate::check('Edit Call') || Gate::check('Delete Call')): ?>
                                            <td class="text-end">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Call')): ?>
                                                    <div class="action-btn bg-warning ms-2">
                                                        <a href="#" data-size="md"
                                                            data-url="<?php echo e(route('call.show', $call->id)); ?>"
                                                            data-ajax-popup="true" data-bs-toggle="tooltip"
                                                            data-title="<?php echo e(__('Show Call')); ?>"
                                                            title="<?php echo e(__('Quick View')); ?>"class="mx-3 btn btn-sm d-inline-flex align-items-center text-white  ">
                                                            <i class="ti ti-eye"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Call')): ?>
                                                    <div class="action-btn bg-info ms-2">
                                                        <a href="<?php echo e(route('call.edit', $call->id)); ?>"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center text-white "
                                                            data-bs-toggle="tooltip"
                                                            data-title="<?php echo e(__('Edit Call')); ?>"title="<?php echo e(__('Details')); ?>"><i
                                                                class="ti ti-edit"></i></a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Call')): ?>
                                                    <div class="action-btn bg-danger ms-2">
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['call.destroy', $call->id]]); ?>

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
        $(document).on('change', 'select[name=parent]', function() {
            var parent = $(this).val();

            getparent(parent);
        });

        function getparent(bid) {
            console.log(bid);
            $.ajax({
                url: '<?php echo e(route('call.getparent')); ?>',
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
                    if (data == '') {
                        $('#parent_id').empty();
                    }
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\centraglobe\main-file\resources\views/call/index.blade.php ENDPATH**/ ?>