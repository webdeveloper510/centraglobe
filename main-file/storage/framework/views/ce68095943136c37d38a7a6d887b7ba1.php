<?php echo e(Form::model($lead, array('route' => array('lead.convert.to.account', $lead->id), 'method' => 'POST'))); ?>

<div class="row">
    <div class="col-xs-12">
        <!--account edit -->
        <div id="account_edit" class="tabs-card">
                    <?php echo e(Form::model($lead, array('route' => array('lead.convert.to.account', $lead->id), 'method' => 'POST'))); ?>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <?php echo e(Form::label('name',__('Name'),['class'=>'form-label'])); ?>

                                <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name'),'required'=>'required'))); ?>

                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-name" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <?php echo e(Form::label('email',__('Email'),['class'=>'form-label'])); ?>

                                <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter email'),'required'=>'required'))); ?>

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-email" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <?php echo e(Form::label('phone',__('Phone'),['class'=>'form-label'])); ?>

                                <?php echo e(Form::text('phone',null,array('class'=>'form-control','placeholder'=>__('Enter phone'),'required'=>'required'))); ?>

                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-phone" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <?php echo e(Form::label('website',__('Website'),['class'=>'form-label'])); ?>

                                <?php echo e(Form::text('website',null,array('class'=>'form-control','placeholder'=>__('Enter Website'),'required'=>'required'))); ?>

                                <?php $__errorArgs = ['website'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-website" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <?php echo e(Form::label('billing_address',__('Billing Address'),['class'=>'form-label'])); ?>

                                <div class="action-btn bg-primary ms-2 float-end">
                                <a class="mx-3 btn btn-sm d-inline-flex align-items-center text-white" id="billing_data" data-toggle="tooltip" data-placement="top" title="Same As Billing Address"><i class="ti ti-copy"></i></a>
                                <span class="clearfix"></span>
                                </div>
                                <?php echo e(Form::text('billing_address',null,array('class'=>'form-control','placeholder'=>__('Enter Billing Address')))); ?>

                                <?php $__errorArgs = ['billing_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-billing_address" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <?php echo e(Form::label('shipping_address',__('Shipping Address'),['class'=>'form-label'])); ?>

                                <?php echo e(Form::text('shipping_address',null,array('class'=>'form-control','placeholder'=>__('Enter Shipping Address')))); ?>

                                <?php $__errorArgs = ['shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-shipping_address" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <?php echo e(Form::label('city',__('City'),['class'=>'form-label'])); ?>

                                <?php echo e(Form::text('billing_city',null,array('class'=>'form-control','placeholder'=>__('Enter Billing City')))); ?>

                                <?php $__errorArgs = ['billing_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-billing_city" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <?php echo e(Form::label('state',__('State'),['class'=>'form-label'])); ?>

                                <?php echo e(Form::text('billing_state',null,array('class'=>'form-control','placeholder'=>__('Enter Billing State')))); ?>

                                <?php $__errorArgs = ['billing_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-billing_state" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <?php echo e(Form::label('shipping_city',__('City'),['class'=>'form-label'])); ?>

                                <?php echo e(Form::text('shipping_city',null,array('class'=>'form-control','placeholder'=>__('Enter Shipping City')))); ?>

                                <?php $__errorArgs = ['shipping_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-shipping_city" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <?php echo e(Form::label('shipping_state',__('State'),['class'=>'form-label'])); ?>

                                <?php echo e(Form::text('shipping_state',null,array('class'=>'form-control','placeholder'=>__('Enter Shipping State')))); ?>

                                <?php $__errorArgs = ['shipping_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-shipping_state" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <?php echo e(Form::label('billing_country',__('Country'),['class'=>'form-label'])); ?>

                                <?php echo e(Form::text('billing_country',null,array('class'=>'form-control','placeholder'=>__('Enter Billing country')))); ?>

                                <?php $__errorArgs = ['billing_country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-billing_country" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <?php echo e(Form::label('billing_postalcode',__('Postal Code'),['class'=>'form-label'])); ?>

                                <?php echo e(Form::number('billing_postalcode',null,array('class'=>'form-control','placeholder'=>__('Enter Billing Postal Code')))); ?>

                                <?php $__errorArgs = ['billing_postalcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-billing_postalcode" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <?php echo e(Form::label('shipping_country',__('Country'),['class'=>'form-label'])); ?>

                                <?php echo e(Form::text('shipping_country',null,array('class'=>'form-control','placeholder'=>__('Enter Shipping Country')))); ?>

                                <?php $__errorArgs = ['shipping_country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-shipping_country" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <?php echo e(Form::label('shipping_postalcode',__('Postal Code'),['class'=>'form-label'])); ?>

                                <?php echo e(Form::number('shipping_postalcode',null,array('class'=>'form-control','placeholder'=>__('Enter Shipping Postal Code')))); ?>

                                <?php $__errorArgs = ['shipping_postalcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-shipping_postalcode" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr class="mt-1 mb-2">
                            <h5><?php echo e(__('Detail')); ?></h5>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <?php echo e(Form::label('type',__('Type'),['class'=>'form-label'])); ?>

                                <?php echo Form::select('type', $accountype, null,array('class' => 'form-control ','required'=>'required')); ?>

                                <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-name" role="alert">
                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <?php echo e(Form::label('industry',__('Industry'),['class'=>'form-label'])); ?>

                                <?php echo Form::select('industry', $industry, null,array('class' => 'form-control ','required'=>'required')); ?>

                                <?php $__errorArgs = ['industry'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-industry" role="alert">
                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <?php echo e(Form::label('document_id',__('Document'),['class'=>'form-label'])); ?>

                                <?php echo Form::select('document_id', $document_id, null,array('class' => 'form-control','required'=>'required')); ?>

                                <?php $__errorArgs = ['industry'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-industry" role="alert">
                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <?php echo e(Form::label('description',__('Description'),['class'=>'form-label'])); ?>

                                <?php echo e(Form::textarea('description',null,array('class'=>'form-control','rows'=>2,'placeholder'=>__('Enter Name'),'required'=>'required'))); ?>

                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                            <?php echo e(Form::label('user',__('Assigned User'),['class'=>'form-label'])); ?>

                            <?php echo Form::select('user', $user, null,array('class' => 'form-control ','required'=>'required')); ?>

                            <?php $__errorArgs = ['user'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-user" role="alert">
                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn  btn-light"
                                data-bs-dismiss="modal">Close</button>
                                <?php echo e(Form::submit(__('Save'),array('class'=>'btn btn-primary '))); ?>

                        </div>

                    </div>
                    <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var is_client = $("input[name='client_check']:checked").val();


        $("input[name='client_check']").click(function () {
            is_client = $(this).val();
            console.log(is_client);
            if (is_client == "exist") {
                $('.exist_client').removeClass('d-none');
                $('#client_name').removeAttr('required');
                $('#client_email').removeAttr('required');
                $('#client_password').removeAttr('required');
                $('.new_client').addClass('d-none');
            } else {
                $('.new_client').removeClass('d-none');
                $('#client_name').attr('required', 'required');
                $('#client_email').attr('required', 'required');
                $('#client_password').attr('required', 'required');
                $('.exist_client').addClass('d-none');
            }
        });
        if (is_client == "exist") {
            $('.exist_client').removeClass('d-none');
            $('#client_name').removeAttr('required');
            $('#client_email').removeAttr('required');
            $('#client_password').removeAttr('required');
            $('.new_client').addClass('d-none');
        } else {
            $('.new_client').removeClass('d-none');
            $('#client_name').attr('required', 'required');
            $('#client_email').attr('required', 'required');
            $('#client_password').attr('required', 'required');
            $('.exist_client').addClass('d-none');
        }
    })
</script>
<?php /**PATH C:\xampp\htdocs\centraglobe\main-file\resources\views/lead/convert.blade.php ENDPATH**/ ?>