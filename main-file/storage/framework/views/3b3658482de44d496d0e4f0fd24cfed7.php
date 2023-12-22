<div class="row">
    <div class="col-lg-12">
            <div class="">
                <dl class="row">
                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Name')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->name); ?></span></dd>
                    
                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Email')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->email); ?></span></dd>

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Phone')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->phone); ?></span></dd>

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('lead Address')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->lead_address); ?></span></dd>

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Start Date')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->start_date); ?></span></dd>

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('End Date')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->end_date); ?></span></dd>

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Venue')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->venue_selection); ?></span></dd>

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Assigned User')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e(!empty($lead->assign_user)?$lead->assign_user->name:''); ?></span></dd>

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Created')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e(\Auth::user()->dateFormat($lead->created_at)); ?></span></dd>

                    <div class="col-12">
                        <hr class="mt-2 mb-2">
                        <h5><?php echo e(__('Details')); ?></h5>
                    </div>

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Status')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md">
                        <?php if($lead  ->status == 0): ?>
                            <span class="badge bg-success p-2 px-3 rounded"><?php echo e(__(\App\Models\Lead::$status[$lead->status])); ?></span>
                        <?php else: ?>
                            <span class="badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Lead::$status[$lead->status])); ?></span>
                        <?php endif; ?>
                    </dd>
                </dl>
            </div>
    <div class="w-100 text-end pr-2">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Lead')): ?>
        <div class="action-btn bg-info ms-2">
            <a href="<?php echo e(route('lead.edit',$lead->id)); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center text-white" data-bs-toggle="tooltip"data-title="<?php echo e(__('Lead Edit')); ?>" title="<?php echo e(__('Edit')); ?>"><i class="ti ti-edit"></i>
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\centra\centraglobe\main-file\resources\views/lead/view.blade.php ENDPATH**/ ?>