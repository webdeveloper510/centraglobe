<?php
    $plansettings = App\Models\Utility::plansettings();
?>
<?php echo e(Form::open(['url' => 'quote', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

<div class="row">
    <?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
    <div class="text-end">
        <a href="#" data-size="md" class="btn btn-sm btn-primary" data-ajax-popup-over="true" data-size="md"
            data-title="<?php echo e(__('Generate content with AI')); ?>" data-url="<?php echo e(route('generate', ['quote'])); ?>"
            data-toggle="tooltip" title="<?php echo e(__('Generate')); ?>">
            <i class="fas fa-robot"></span><span class="robot"><?php echo e(__('Generate With AI')); ?></span></i>
        </a>
    </div>
    <?php endif; ?>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'placeholder' => __('Enter Name'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('opportunity', __('Opportunity'), ['class' => 'form-label'])); ?>

            <?php echo Form::select('opportunity', $opportunities, null, ['id' => 'opportunity', 'class' => 'form-control']); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?>

            <select name="status" id="status" class="form-control" data-toggle="select" required>
                <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($k); ?>"><?php echo e(__($v)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('account', __('Account'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::text('account', null, ['id' => 'account_name', 'class' => 'form-control', 'placeholder' => __('Enter account'), 'disabled'])); ?>

            <input type="hidden" name="account_id" id="account_id">
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('date_quoted', __('Date Quoted'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::date('date_quoted', null, ['class' => 'form-control datepicker', 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('quote_number', __('Quote Number'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::number('quote_number', null, ['class' => 'form-control', 'placeholder' => __('Enter Quote Number'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('billing_address', __('Billing Address'), ['class' => 'form-label'])); ?>

            <div class="action-btn bg-primary ms-2 float-end">
                <a class="btn btn-sm btn-primary btn-icon m-1" id="billing_data" data-toggle="tooltip"
                    data-placement="top" title="Same As Billing Address"><i class="fas fa-copy"></i></a>
                <span class="clearfix"></span>
            </div>
            <?php echo e(Form::text('billing_address', null, ['id' => 'billing_address', 'class' => 'form-control', 'placeholder' => __('Billing Address'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('shipping_address', __('Shipping Address'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::text('shipping_address', null, ['id' => 'shipping_address', 'class' => 'form-control', 'placeholder' => __('Shipping Address'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('billing_city', null, ['id' => 'billing_city', 'class' => 'form-control', 'placeholder' => __('Billing city'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('billing_state', null, ['id' => 'billing_state', 'class' => 'form-control', 'placeholder' => __('Billing State'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('shipping_city', null, ['id' => 'shipping_city', 'class' => 'form-control', 'placeholder' => __('Shipping City'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('shipping_state', null, ['id' => 'shipping_state', 'class' => 'form-control', 'placeholder' => __('Shipping State'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('billing_country', null, ['id' => 'billing_country', 'class' => 'form-control', 'placeholder' => __('Billing Country'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('billing_postalcode', null, ['id' => 'billing_postalcode', 'class' => 'form-control', 'placeholder' => __('Billing Postal Code'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('shipping_country', null, ['id' => 'shipping_country', 'class' => 'form-control', 'placeholder' => __('Shipping Country'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('shipping_postalcode', null, ['id' => 'shipping_postalcode', 'class' => 'form-control', 'placeholder' => __('Shipping Postal Code'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('billing_contact', __('Billing Contact'), ['class' => 'form-label'])); ?>

            <?php echo Form::select('billing_contact', $contact, null, ['class' => 'form-control']); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('shipping_contact', __('Shipping Contact'), ['class' => 'form-label'])); ?>

            <?php echo Form::select('shipping_contact', $contact, null, ['class' => 'form-control']); ?>

        </div>
    </div>
    
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('Assign User', __('Assign User'), ['class' => 'form-label'])); ?>

            <?php echo Form::select('user', $user, null, ['class' => 'form-control', 'required' => 'required']); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('shipping_provider', __('Shipping Provider'), ['class' => 'form-label'])); ?>

            <?php echo Form::select('shipping_provider', $shipping_provider, null, ['class' => 'form-control', 'required' => 'required']); ?>

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('description', __('Description'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => __('Enter Description')])); ?>

        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
        <?php echo e(Form::submit(__('Save'), ['class' => 'btn btn-primary'])); ?>

    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH C:\xampp\htdocs\centraglobe\main-file\resources\views/quote/create.blade.php ENDPATH**/ ?>