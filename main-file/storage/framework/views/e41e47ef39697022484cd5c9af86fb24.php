<div class="row">
    <div class="col-lg-12">

            <div class="">
                <dl class="row">
                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Name')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e($meeting->name); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Status')); ?></span></dt>
                    <dd class="col-md-5">
                        <?php if($meeting->status == 0): ?>
                            <span class="badge bg-success p-2 px-3 rounded"><?php echo e(__(\App\Models\Meeting::$status[$meeting->status])); ?></span>
                        <?php elseif($meeting->status == 1): ?>
                            <span class="badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Meeting::$status[$meeting->status])); ?></span>
                        <?php elseif($meeting->status == 2): ?>
                            <span class="badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Meeting::$status[$meeting->status])); ?></span>
                        <?php elseif($meeting->status == 3): ?>
                            <span class="badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Meeting::$status[$meeting->status])); ?></span>
                        <?php elseif($meeting->status == 4): ?>
                            <span class="badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Meeting::$status[$meeting->status])); ?></span>
                        <?php elseif($meeting->status == 5): ?>
                            <span class="badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Meeting::$status[$meeting->status])); ?></span>
                        <?php endif; ?>
                    </dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Start Date')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e(\Auth::user()->dateFormat($meeting->start_date)); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('End Date')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e(\Auth::user()->dateFormat($meeting->end_date)); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Guest Count')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e($meeting->guest_count); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Event Type')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e($meeting->type); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Attendees Lead')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e(!empty($meeting->attendees_leads->name)?$meeting->attendees_leads->name:'--'); ?></span></dd>

                    <dt class="col-sm-5"><span class="h6 text-sm mb-0"><?php echo e(__('Assigned User')); ?></span></dt>
                    <dd class="col-sm-7"><span class="text-sm"><?php echo e(!empty($meeting->assign_user)?$meeting->assign_user->name:''); ?></span></dd>

                    <dt class="col-sm-5"><span class="h6 text-sm mb-0"><?php echo e(__('Created')); ?></span></dt>
                    <dd class="col-sm-7"><span class="text-sm"><?php echo e(\Auth::user()->dateFormat($meeting->created_at)); ?></span></dd>
                </dl>
            </div>

    </div>

    <div class="w-100 text-end pr-2">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Meeting')): ?>
        <div class="action-btn bg-info ms-2">
            <a href="<?php echo e(route('meeting.edit',$meeting->id)); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center text-white" data-bs-toggle="tooltip"data-title="<?php echo e(__('Edit Call')); ?>" title="<?php echo e(__('Edit')); ?>"><i class="ti ti-edit"></i>
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\centraglobe\main-file\resources\views/meeting/view.blade.php ENDPATH**/ ?>