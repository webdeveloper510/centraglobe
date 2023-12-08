<div class="row">
    <div class="col-lg-12">

            <div class="">
                <dl class="row">
                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Name')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->name); ?></span></dd>

                    <!-- <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Account name')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e(!empty($lead->accounts)?$lead->accounts->name:'-'); ?></span></dd> -->

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Email')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->email); ?></span></dd>

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Phone')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->phone); ?></span></dd>

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Title')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->title); ?></span></dd>

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Website')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->website); ?></span></dd>

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('lead Address')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->lead_address); ?></span></dd>

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('City')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->lead_city); ?></span></dd>

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('State')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->lead_state); ?></span></dd>

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Country')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->lead_country); ?></span></dd>

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
                            <?php elseif($lead->status == 1): ?>
                                <span class="badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Lead::$status[$lead->status])); ?></span>
                            <?php elseif($lead->status == 2): ?>
                                <span class="badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Lead::$status[$lead->status])); ?></span>
                            <?php elseif($lead->status == 3): ?>
                                <span class="badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Lead::$status[$lead->status])); ?></span>
                            <?php elseif($lead->status == 4): ?>
                                <span class="badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Lead::$status[$lead->status])); ?></span>
                            <?php elseif($lead->status == 5): ?>
                                <span class="badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Lead::$status[$lead->status])); ?></span>
                            <?php endif; ?>
                        </span></dd>

                    <!-- <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Source')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e(!empty($lead->LeadSource)?$lead->LeadSource->name:''); ?></span></dd> -->

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Opportunity Amount')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e(\Auth::user()->priceFormat($lead->opportunity_amount)); ?></span></dd>

                    <!-- <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Campaign')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e(!empty($lead->campaigns)?$lead->campaigns->name:'-'); ?></span></dd> -->

                    <!-- <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Industry')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e(!empty($lead->accountIndustry)?$lead->accountIndustry->name:''); ?></span></dd> -->


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

<?php /**PATH C:\xampp\htdocs\centraglobe\main-file\resources\views/lead/view.blade.php ENDPATH**/ ?>