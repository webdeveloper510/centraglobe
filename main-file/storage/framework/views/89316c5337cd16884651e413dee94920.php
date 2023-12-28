
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Lead Edit')); ?>

<?php $__env->stopSection(); ?>
<?php
    $plansettings = App\Models\Utility::plansettings();
    
    $setting = App\Models\Utility::settings();
    $type_arr= explode(',',$setting['event_type']);
    $venue = explode(',',$setting['venue']);
?>
<?php $__env->startSection('title'); ?>
    <div class="page-header-title">
        <?php echo e(__('Edit Lead')); ?> <?php echo e('(' . $lead->name . ')'); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <!-- <?php if($lead->is_converted != 0): ?>
        <a href="#" data-url="<?php echo e(route('account.show', $lead->is_converted)); ?>" data-title="<?php echo e(__('Account Details')); ?>"
            data-size="md" data-ajax-popup="true" data-bs-toggle="tooltip" title="<?php echo e(__('Already Convert To Account')); ?>"
            class="btn btn-sm btn-primary btn-icon m-1">
            <i class="ti ti-eye"></i>
        </a>
    <?php else: ?>
        <a href="#" data-url="<?php echo e(route('lead.convert.account', $lead->id)); ?>" data-size="lg" data-ajax-popup="true"
            data-title="<?php echo e(__('Convert [' . $lead->name . '] To Account')); ?>" data-bs-toggle="tooltip"
            title="<?php echo e(__('Convert To Account')); ?>" class="btn btn-sm btn-primary btn-icon m-1">
            <i class="ti ti-exchange">
            </i>
        </a>
    <?php endif; ?> -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('lead.index')); ?>"><?php echo e(__('Lead')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Details')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#useradd-1"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Overview')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                          </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div id="useradd-1" class="card">
                        <?php echo e(Form::model($lead, ['route' => ['lead.update', $lead->id], 'method' => 'PUT'])); ?>

                        <div class="card-header">
                            <h5><?php echo e(__('Overview')); ?></h5>
                            <small class="text-muted"><?php echo e(__('Edit About Your Lead Information')); ?></small>
                        </div>

                        <div class="card-body">
                            <form>
                              
                                <div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('company_name',__('Company Name'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('company_name',null,array('class'=>'form-control','placeholder'=>__('Enter Company Name'),'required'=>'required'))); ?>

        </div>
    </div>
    <div class="col-12  p-0 modaltitle pb-3 mb-3">
        <h5 style="margin-left: 14px;"><?php echo e(__('Contact Information')); ?></h5>
    </div>
        <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('name',__('Name'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name'),'required'=>'required'))); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('phone',__('Phone'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('phone',null,array('class'=>'form-control','placeholder'=>__('Enter Phone'),'required'=>'required'))); ?>

        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('email',__('Email'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter Email'),'required'=>'required'))); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('lead_address',__('Address'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('lead_address',null,array('class'=>'form-control','placeholder'=>__('Address'),'required'=>'required'))); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('relationship',__('Relationship'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('relationship',null,array('class'=>'form-control','placeholder'=>__('Enter Relationship'),'required'=>'required'))); ?>

        </div>
    </div>
    <div class="col-12  p-0 modaltitle pb-3 mb-3">
        <h5 style="margin-left: 14px;"><?php echo e(__('Event Details')); ?></h5>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('type',__('Event Type'),['class'=>'form-label'])); ?>

            <?php echo Form::select('type', $type_arr, null,array('class' => 'form-control')); ?>

        </div>
    </div>

    <!-- <div class="col-6">
        <div class="form-group">
            <label for="venue" class="form-label"><?php echo e(__('Venue')); ?></label>
            <?php $__currentLoopData = $venue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <input type="checkbox" name="venue[]" id="<?php echo e($label); ?>" value="<?php echo e($label); ?>" 
                        <?php echo e(in_array($label, $venue_function) ? 'checked' : ''); ?>>
                    <label for="<?php echo e($label); ?>"><?php echo e($label); ?></label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
        </div>
    </div> -->

    <div class="col-6">
       <div class="form-group">
           <label for="venue" class="form-label"><?php echo e(__('Venue')); ?></label>
           <?php $__currentLoopData = $venue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div>
                   <input type="checkbox" name="venue[]" id="<?php echo e($label); ?>" value="<?php echo e($label); ?>" 
                       <?php echo e(in_array($label, @$venue_function) ? 'checked' : ''); ?>>
                   <label for="<?php echo e($label); ?>"><?php echo e($label); ?></label>
               </div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
       </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('start_date', __('Start Date'), ['class' => 'form-label'])); ?>

            <?php echo Form::date('start_date', date('Y-m-d'), ['class' => 'form-control', 'required' => 'required']); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('end_date', __('End Date'), ['class' => 'form-label'])); ?>

            <?php echo Form::date('end_date', date('Y-m-d'), ['class' => 'form-control', 'required' => 'required']); ?>

        </div>
    </div>
    
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('guest_count',__('Guest Count'),['class'=>'form-label'])); ?>

            <?php echo Form::number('guest_count', null,array('class' => 'form-control','min'=> 0)); ?>

        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('function', __('Function'), ['class' => 'form-label'])); ?>

            <div class="checkbox-group">
                <?php $__currentLoopData = $function; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label>
                        <input type="checkbox" id="<?php echo e($value); ?>" name="function[]" value="<?php echo e($value); ?>" class="function-checkbox" <?php echo e(in_array($value, $function_package) ? 'checked' : ''); ?>>
                        <?php echo e($value); ?>

                    </label><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>


    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('status',__('Status'),['class'=>'form-label'])); ?>

            <?php echo Form::select('status',$status, null,array('class' => 'form-control','required'=>'required')); ?>

        </div>
    </div> 
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('Assign User', __('Assign User'), ['class' => 'form-label'])); ?>

            <?php echo Form::select('user', $user,$lead->assigned_user, ['class' => 'form-control']); ?>

        </div>
    </div>

    <div class="col-12  p-0 modaltitle pb-3 mb-3">
        <h5 style="margin-left: 14px;"><?php echo e(__('Other Information')); ?></h5>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('allergies',__('Allergies'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('allergies',null,array('class'=>'form-control','placeholder'=>__('Enter Allergies(if any)')))); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('spcl_req',__('Any Special Requirements'),['class'=>'form-label'])); ?>

            <?php echo e(Form::textarea('spcl_req',null,array('class'=>'form-control','rows'=>2,'placeholder'=>__('Enter Any Special Requirements')))); ?>

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('Description',__('How did you hear about us?'),['class'=>'form-label'])); ?>

            <?php echo e(Form::textarea('description',null,array('class'=>'form-control','rows'=>2))); ?>

        </div>
    </div> 
    <div class="text-end">
                                        <?php echo e(Form::submit(__('Update'), ['class' => 'btn-submit btn btn-primary'])); ?>

                                    </div>
                        </div>
                            </form>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })
    </script>

    <script>
        $(document).on('change', 'select[name=parent]', function() {
            console.log('h');
            var parent = $(this).val();
            getparent(parent);
        });

        function getparent(bid) {
            console.log(bid);
            $.ajax({
                url: "<?php echo e(route('task.getparent')); ?>",
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
    <script>
        $(document).on('click', '#billing_data', function() {
            $("[name='shipping_address']").val($("[name='billing_address']").val());
            $("[name='shipping_city']").val($("[name='billing_city']").val());
            $("[name='shipping_state']").val($("[name='billing_state']").val());
            $("[name='shipping_country']").val($("[name='billing_country']").val());
            $("[name='shipping_postalcode']").val($("[name='billing_postalcode']").val());
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\centra\centraglobe\main-file\resources\views/lead/edit.blade.php ENDPATH**/ ?>