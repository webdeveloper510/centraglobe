
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Event Edit')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Edit Event')); ?>

<?php $__env->stopSection(); ?>
<?php
    $plansettings = App\Models\Utility::plansettings();
    $setting = App\Models\Utility::settings();  
    $type_arr= explode(',',$setting['event_type']);
    $type_arr = array_combine($type_arr, $type_arr);
    $venue = explode(',',$setting['venue']);
    $meal = ['Formal Plated' ,'Buffet Style' , 'Family Style'];
    $bar = ['Open Bar', 'Cash Bar', 'Package Choice'];
    $platinum = ['Platinum - 4 Hours', 'Platinum - 3 Hours', 'Platinum - 2 Hours'];
    $gold = ['Gold - 4 Hours', 'Gold - 3 Hours', 'Gold - 2 Hours'];
    $silver = ['Silver - 4 Hours', 'Silver - 3 Hours', 'Silver - 2 Hours'];
    $beer = ['Beer & Wine - 4 Hours', 'Beer & Wine - 3 Hours', 'Beer & Wine - 2 Hours'];
?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('meeting.index')); ?>"><?php echo e(__('Event')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Edit')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#useradd-1" class="list-group-item list-group-item-action"><?php echo e(__('Edit')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#event-details" class="list-group-item list-group-item-action"><?php echo e(__('Event Details')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#special_req" class="list-group-item list-group-item-action"><?php echo e(__('Special Requirements')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>   
                            <a href="#other_info" class="list-group-item list-group-item-action"><?php echo e(__('Other Information')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>          
                       
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <?php echo e(Form::model($meeting, ['route' => ['meeting.update', $meeting->id], 'method' => 'PUT'])); ?>

                        <div id="useradd-1" class="card"> 
                            <div class="col-md-12">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <h5><?php echo e(__('Event')); ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body"> 
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <?php echo e(Form::label('attendees_lead', __('Lead'), ['class' => 'form-label'])); ?>

                                                <?php echo Form::select('attendees_lead', $attendees_lead, null, ['class' => 'form-control', 'disabled' => 'disabled']); ?>

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <?php echo e(Form::label('Assign User', __('Assign User'), ['class' => 'form-label'])); ?>

                                                <?php echo Form::text('user_text', isset($users[$user_id]) ? $users[$user_id] : '', ['class' => 'form-control', 'disabled' => 'disabled']); ?>

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <?php echo e(Form::label('company_name',__('Company Name'),['class'=>'form-label'])); ?>

                                                <?php echo e(Form::text('company_name',null,array('class'=>'form-control','placeholder'=>__('Enter Company Name'),'required'=>'required'))); ?>

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <?php echo e(Form::label('status',__('Status'),['class'=>'form-label'])); ?>

                                                <?php echo Form::select('status',$status, null,array('class' => 'form-control','required'=>'required')); ?>

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

                                                <?php echo e(Form::text('relationship',null,array('class'=>'form-control','placeholder'=>__('Enter Relationship')))); ?>

                                            </div>
                                        </div>
                                        
                                        <div id = "contact-info" style = "display:none">
                                            <div class="row">
                                            <div class="col-12  p-0 modaltitle pb-3 mb-3">
                                                <h5 style="margin-left: 14px;"><?php echo e(__('Other Contact Information')); ?></h5>
                                            </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('alter_name',__('Name'),['class'=>'form-label'])); ?>

                                                        <?php echo e(Form::text('alter_name',null,array('class'=>'form-control','placeholder'=>__('Enter Name')))); ?>

                                                    </div>
                                                </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('alter_phone',__('Phone'),['class'=>'form-label'])); ?>

                                                    <?php echo e(Form::text('alter_phone',null,array('class'=>'form-control','placeholder'=>__('Enter Phone')))); ?>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('alter_email',__('Email'),['class'=>'form-label'])); ?>

                                                    <?php echo e(Form::text('alter_email',null,array('class'=>'form-control','placeholder'=>__('Enter Email')))); ?>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('alter_lead_address',__('Address'),['class'=>'form-label'])); ?>

                                                    <?php echo e(Form::text('alter_lead_address',null,array('class'=>'form-control','placeholder'=>__('Address')))); ?>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('alter_relationship',__('Relationship'),['class'=>'form-label'])); ?>

                                                    <?php echo e(Form::text('alter_relationship',null,array('class'=>'form-control','placeholder'=>__('Enter Relationship')))); ?>

                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-12 text-end mt-3">
                                            <button  data-bs-toggle="tooltip" id="opencontact" 
                                                title="<?php echo e(__('Add Contact')); ?>" class="btn btn-sm btn-primary btn-icon m-1">
                                                <i class="ti ti-plus"></i>
                                        </button>
                                        </div>
                                        <?php if(isset($setting['is_enabled']) && $setting['is_enabled'] == 'on'): ?>
                                            <div class="form-group col-md-6">
                                                <label><?php echo e(__('Synchronize in Google Calendar')); ?></label>
                                                <div class="form-check form-switch pt-2">
                                                    <input id="switch-shadow" class="form-check-input" value="1" name="is_check" type="checkbox">
                                                    <label class="form-check-label" for="switch-shadow"></label>
                                                </div>
                                            </div>
                                        <?php endif; ?> 
                                    </div>
                                </div>
                            </div>
                        </div>        
                        <div id ="event-details" class="card">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <h5><?php echo e(__('Event Details')); ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                    
                                        <div class="col-6">
                                            <div class="form-group">
                                                <?php echo e(Form::label('type',__('Event Type'),['class'=>'form-label'])); ?>

                                                <?php echo Form::select('type', $type_arr, null,array('class' => 'form-control')); ?>

                                            </div>
                                        </div>
                                        <div class="col-6">
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
                                                <?php echo e(Form::label('start_time', __('Start Time'), ['class' => 'form-label'])); ?>

                                                <?php echo Form::input('time', 'start_time',null, ['class' => 'form-control', 'required' => 'required']); ?>

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <?php echo e(Form::label('end_time', __('End Time'), ['class' => 'form-label'])); ?>

                                                <?php echo Form::input('time', 'end_time', null, ['class' => 'form-control', 'required' => 'required']); ?>

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

                                                <br>
                                                <?php $__currentLoopData = $function; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <label>
                                                        <input type="checkbox" id="<?php echo e($value); ?>" name="function[]" value="<?php echo e($value); ?>" class="function-checkbox" <?php echo e(in_array($value, $function_p) ? 'checked' : ''); ?> onchange="toggleDiv('<?php echo e($value); ?>')">
                                                        <?php echo e($value); ?>

                                                    </label>
                                                    <br>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <div class="col-6" id="breakfast">
                                            <div class="form-group">
                                                <?php echo e(Form::label('break_package', __('Breakfast Package'), ['class' => 'form-label'])); ?>

                                                <?php $__currentLoopData = $breakfast; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div>
                                                        <?php echo e(Form::radio('break_package[]', $label, in_array($label, $food_package), ['id' => $label])); ?>

                                                        <?php echo e(Form::label($label, $label)); ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                            </div>
                                        </div>
                                        <div class="col-6" id="lunch">
                                            <div class="form-group">
                                                <?php echo e(Form::label('lunch_package', __('Lunch Package'), ['class' => 'form-label'])); ?>

                                                <?php $__currentLoopData = $lunch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div>
                                                        <?php echo e(Form::radio('lunch_package[]', $label, in_array($label, $food_package), ['id' => 'lunch_package' . ($key + 1)])); ?>

                                                        <?php echo e(Form::label($label, $label)); ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                            </div>
                                        </div>

                                        <div class="col-6" id="dinner">
                                            <div class="form-group">
                                                <?php echo e(Form::label('dinner_package', __('Dinner Package'), ['class' => 'form-label'])); ?>

                                                <?php $__currentLoopData = $dinner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div>
                                                        <?php echo e(Form::radio('dinner_package[]', $label, in_array($label, $food_package), ['id' => 'dinner_package' . ($key + 1)])); ?>

                                                        <?php echo e(Form::label($label, $label)); ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                            </div>
                                        </div>

                                        <div class="col-6" id="wedding">
                                            <div class="form-group">
                                                <?php echo e(Form::label('wedding_package', __('Wedding Package'), ['class' => 'form-label'])); ?>

                                                <?php $__currentLoopData = $wedding; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div>
                                                        <?php echo e(Form::radio('wedding_package[]', $label, in_array($label, $food_package), ['id' => 'wedding_package' . ($key + 1)])); ?>

                                                        <?php echo e(Form::label($label, $label)); ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                            </div>
                                        </div> 
                                        <div class = "col-12">
                                            <?php echo e(Form::label('add_opts',__('Additional Options'),['class'=>'form-label'])); ?>

                                            <button  data-bs-toggle="tooltip" id = "ad_opt" class="btn btn-sm  btn-icon m-1">
                                                <i class="ti ti-plus"></i></button>
                                        </div>
                                        <div class="col-12" id ='add_opts' style ="display:none" >
                                            <div class="form-group">
                                                <?php echo e(Form::text('add_opts',null,array('class'=>'form-control','placeholder'=>__('Any Additional Optionas')))); ?>

                                            </div>
                                        </div>                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="special_req" class= "card">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <h5><?php echo e(__('Any Special Requirements')); ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class ="row">
                                            <div class="form-group">
                                                <?php echo Form::checkbox('room', 1, null, ['id'=>'room', 'class' => 'checkbox']); ?>

                                                <?php echo Form::label('room', 'Rooms at the hotel'); ?> 
                                            </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                            <?php echo Form::label('meal', 'Meal Preference'); ?>

                                                <?php $__currentLoopData = $meal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div>
                                                        <?php echo e(Form::radio('meal[]', $label , false, ['id' => $label])); ?>

                                                        <?php echo e(Form::label('meal' . ($key + 1), $label)); ?>

                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <?php echo Form::label('bar', 'Bar'); ?>

                                            <?php $__currentLoopData = $bar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div>
                                                    <?php echo e(Form::radio('bar', $label, false, ['id' => $label])); ?>

                                                    <?php echo e(Form::label('bar' . ($key + 1), $label)); ?>

                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <div class="row" id = "package" style = "display:none">
                                        <?php echo e(Form::label('bar_package', __('Bar Packages'), ['class' => 'form-label'])); ?>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <?php echo e(Form::label('platinum_package', __('Platinum Package'), ['class' => 'form-label'])); ?>

                                                <?php $__currentLoopData = $platinum; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div>
                                                        <?php echo e(Form::radio('bar_package', 'platinum_package' . ($key + 1), false)); ?>

                                                        <?php echo e(Form::label('platinum_package' . ($key + 1), $label)); ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <?php echo e(Form::label('gold_package', __('Gold Package'), ['class' => 'form-label'])); ?>

                                                <?php $__currentLoopData = $gold; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div>
                                                        <?php echo e(Form::radio('bar_package', 'gold_package' . ($key + 1), false)); ?>

                                                        <?php echo e(Form::label('gold_package' . ($key + 1), $label)); ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <?php echo e(Form::label('silver_package', __('Silver Package'), ['class' => 'form-label'])); ?>

                                                <?php $__currentLoopData = $silver; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div>
                                                        <?php echo e(Form::radio('bar_package', 'silver_package' . ($key + 1), false)); ?>

                                                        <?php echo e(Form::label('silver_package' . ($key + 1), $label)); ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                            </div>
                                        </div>
                                        <div class="col-6" >
                                            <div class="form-group" >
                                                <?php echo e(Form::label('beer_package', __('Beer & Wine'), ['class' => 'form-label'])); ?>

                                                <?php $__currentLoopData = $beer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div>
                                                        <?php echo e(Form::radio('bar_package', 'beer_package' . ($key + 1), false)); ?>

                                                        <?php echo e(Form::label('beer_package' . ($key + 1), $label)); ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <?php echo e(Form::label('spcl_request',__('Special Requests / Considerations'),['class'=>'form-label'])); ?>

                                                <?php echo e(Form::text('spcl_request',null,array('class'=>'form-control'))); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="other_info" class ="card">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <h5><?php echo e(__('Other Information')); ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                    
                                        <div class="col-12">
                                            <div class="form-group">
                                                <?php echo e(Form::label('allergies',__('Allergies'),['class'=>'form-label'])); ?>

                                                <?php echo e(Form::text('allergies',null,array('class'=>'form-control','placeholder'=>__('Enter Allergies(if any)')))); ?>

                                            </div>
                                        </div>
                                         
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn  btn-primary '])); ?>

                                </div>
                            </div>
                        </div>
                    <?php echo e(Form::close()); ?>    
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
        $(document).ready(function() {
        var selectedValue = $('input[name="bar"]:checked').val();
        if(selectedValue == 'option3'){
                    $('#package').show();
        }    
    });
        $('input[type=radio][name=bar]').change(function() {
            $('#package').hide();
                var val = $(this).val();
                if(val == 'option3'){
                    $('#package').show();
                }
        });
    </script>

<script>
     document.getElementById('opencontact').addEventListener('click', function(event) {
            var x = document.getElementById("contact-info");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
            event.stopPropagation();
            event.preventDefault();
        });
    document.addEventListener("DOMContentLoaded", function () {
        var checkboxes = document.querySelectorAll('.function-checkbox');
        checkboxes.forEach(function (checkbox) {
            toggleDiv(checkbox.id);
        });
        document.getElementById('ad_opt').addEventListener('click', function(event) {
            $('#add_opts').toggle();
            event.stopPropagation();
            event.preventDefault();
        });
        function toggleDiv(value) {
            var divId = value.toLowerCase();
            var div = document.getElementById(divId);

            if (div) {
                div.style.display = document.getElementById(value).checked ? 'block' : 'none';
            }
        }

        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                toggleDiv(checkbox.id);
            });
        });
    });
</script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\centra\centraglobe\main-file\resources\views/meeting/edit.blade.php ENDPATH**/ ?>