
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Lead Edit')); ?>

<?php $__env->stopSection(); ?>
<?php
    $plansettings = App\Models\Utility::plansettings();
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

    <!-- <div class="btn-group" role="group">
        <?php if(!empty($previous)): ?>
            <div class="action-btn  ms-2">
                <a href="<?php echo e(route('lead.edit', $previous)); ?>" class="btn btn-sm btn-primary btn-icon m-1"
                    data-bs-toggle="tooltip" title="<?php echo e(__('Previous')); ?>">
                    <i class="ti ti-chevron-left"></i>
                </a>
            </div>
        <?php else: ?>
            <div class="action-btn  ms-2">
                <a href="#" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip"
                    title="<?php echo e(__('Previous')); ?>">
                    <i class="ti ti-chevron-left"></i>
                </a>
            </div>
        <?php endif; ?>
        <?php if(!empty($next)): ?>
            <div class="action-btn  ms-2">
                <a href="<?php echo e(route('lead.edit', $next)); ?>" class="btn btn-sm btn-primary btn-icon m-1"
                    data-bs-toggle="tooltip" title="<?php echo e(__('Next')); ?>">
                    <i class="ti ti-chevron-right"></i>
                </a>
            </div>
        <?php else: ?>
            <div class="action-btn  ms-2">
                <a href="#" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip"
                    title="<?php echo e(__('Next')); ?>">
                    <i class="ti ti-chevron-right"></i>
                </a>
            </div>
        <?php endif; ?>
    </div> -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('lead.index')); ?>"><?php echo e(__('Lead')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Details')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#useradd-1"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Overview')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <!-- <a href="#useradd-2"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Stream')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-3"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Tasks')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div id="useradd-1" class="card">
                        <?php echo e(Form::model($lead, ['route' => ['lead.update', $lead->id], 'method' => 'PUT'])); ?>

                        <div class="card-header">
                            <!-- <?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
                                <div class="float-end">
                                    <a href="#" data-size="md" class="btn btn-sm btn-primary "
                                        data-ajax-popup-over="true" data-size="md"
                                        data-title="<?php echo e(__('Generate content with AI')); ?>"
                                        data-url="<?php echo e(route('generate', ['lead'])); ?>" data-toggle="tooltip"
                                        title="<?php echo e(__('Generate')); ?>">
                                        <i class="fas fa-robot"></span><span
                                                class="robot"><?php echo e(__('Generate With AI')); ?></span></i>
                                    </a>
                                </div>
                            <?php endif; ?> -->
                            <h5><?php echo e(__('Overview')); ?></h5>
                            <small class="text-muted"><?php echo e(__('Edit About Your Lead Information')); ?></small>
                        </div>

                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Name')])); ?>

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
                                    <!-- <div class="col-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('account', __('Account'), ['class' => 'form-label'])); ?>

                                            <?php echo Form::select('account', $account, null, ['class' => 'form-control']); ?>

                                            <?php $__errorArgs = ['account_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-account_id" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div> -->

                                    <div class="col-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('email', __('Email'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Enter Email')])); ?>

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
                                            <?php echo e(Form::label('phone', __('Phone'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('phone', null, ['class' => 'form-control', 'placeholder' => __('Enter Phone')])); ?>

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
                                            <?php echo e(Form::label('title', __('Title'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Enter Title')])); ?>

                                            <?php $__errorArgs = ['title'];
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
                                            <?php echo e(Form::label('website', __('Website'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('website', null, ['class' => 'form-control', 'placeholder' => __('Enter Website')])); ?>

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
                                            <?php echo e(Form::label('lead_address', __('Lead Address'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('lead_address', null, ['class' => 'form-control', 'placeholder' => __('Enter Billing Address')])); ?>

                                            <?php $__errorArgs = ['lead_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-lead_address" role="alert">
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
                                            <?php echo e(Form::label('lead_city', __('Lead City'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('lead_city', null, ['class' => 'form-control', 'placeholder' => __('Enter Billing City')])); ?>

                                            <?php $__errorArgs = ['lead_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-lead_city" role="alert">
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
                                            <?php echo e(Form::label('lead_state', __('Lead State'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('lead_state', null, ['class' => 'form-control', 'placeholder' => __('Enter Billing State')])); ?>

                                            <?php $__errorArgs = ['lead_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-lead_state" role="alert">
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
                                            <?php echo e(Form::label('lead_postalcode', __('Lead Postal Code'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::number('lead_postalcode', null, ['class' => 'form-control', 'placeholder' => __('Enter Postal Code')])); ?>

                                            <?php $__errorArgs = ['lead_postalcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-lead_postalcode" role="alert">
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
                                            <?php echo e(Form::label('lead_country', __('Lead Country'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('lead_country', null, ['class' => 'form-control', 'placeholder' => __('Enter Billing Country')])); ?>

                                            <?php $__errorArgs = ['lead_country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-lead_country" role="alert">
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
                                            <?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?>

                                            <?php echo Form::select('status', $status, null, ['class' => 'form-control']); ?>

                                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-status" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <!-- <div class="col-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('source', __('Source'), ['class' => 'form-label'])); ?>

                                            <?php echo Form::select('source', $source, null, ['class' => 'form-control']); ?>

                                            <?php $__errorArgs = ['source'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-source" role="alert">
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
                                            <?php echo e(Form::label('opportunity_amount', __('Opportunity Amount'), ['class' => 'form-label'])); ?>

                                            <?php echo Form::number('opportunity_amount', null, ['class' => 'form-control']); ?>

                                            <?php $__errorArgs = ['source'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-opportunity_amount" role="alert">
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
                                            <?php echo e(Form::label('campaign', __('Campaign'), ['class' => 'form-label'])); ?>

                                            <?php echo Form::select('campaign', $campaign, null, ['class' => 'form-control']); ?>

                                            <?php $__errorArgs = ['campaign'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-campaign" role="alert">
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
                                            <?php echo e(Form::label('industry', __('Industry'), ['class' => 'form-label'])); ?>

                                            <?php echo Form::select('industry', $industry, null, ['class' => 'form-control']); ?>

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
                                    </div> -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('user', __(' Assigned User'), ['class' => 'form-label'])); ?>

                                            <?php echo Form::select('user', $user, $lead->user_id, ['class' => 'form-control']); ?>

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
                                    <div class="col-12">
                                        <div class="form-group">
                                            <?php echo e(Form::label('description', __('Description'), ['class' => 'form-label'])); ?>

                                            <?php echo Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]); ?>

                                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-description" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

                    <!-- <div id="useradd-2" class="card">
                        <?php echo e(Form::open(['route' => ['streamstore', ['lead', $lead->name, $lead->id]], 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="card-header">
                            <h5><?php echo e(__('Stream')); ?></h5>
                            <small class="text-muted"><?php echo e(__('Add stream comment')); ?></small>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <?php echo e(Form::label('stream', __('Stream'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('stream_comment', null, ['class' => 'form-control', 'placeholder' => __('Enter Stream Comment')])); ?>

                                        </div>
                                    </div>
                                    <input type="hidden" name="log_type" value="lead comment">
                                    <div class="col-12 mb-3 field" data-name="attachments">
                                        <div class="attachment-upload">
                                            <div class="attachment-button">
                                                <div class="pull-left">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('attachment', __('Attachment'), ['class' => 'form-label'])); ?>

                                                        
                                                        <input type="file"name="attachment" class="form-control mb-3"
                                                            onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                        <img id="blah" width="20%" height="20%" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="attachments"></div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <?php echo e(Form::submit(__('Save'), ['class' => 'btn-submit btn btn-primary'])); ?>

                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-12">
                            <div class="card-header">
                                <h5><?php echo e(__('Latest comments')); ?></h5>
                            </div>
                            <?php $__currentLoopData = $streams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stream): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $remark = json_decode($stream->remark);
                                ?>
                                <?php if($remark->data_id == $lead->id): ?>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-xl-12">
                                                <ul class="list-group team-msg">
                                                    <li class="list-group-item border-0 d-flex align-items-start mb-2">
                                                        <div class="avatar me-3">
                                                            <?php
                                                                $profile = \App\Models\Utility::get_file('upload/profile/');
                                                            ?>
                                                            <a href="<?php echo e(!empty($stream->file_upload) ? $profile . $stream->file_upload : asset(url('./assets/images/user/avatar-5.jpg'))); ?>"
                                                                target="_blank">
                                                                <img alt="" class="rounded-circle"
                                                                    <?php if(!empty($stream->file_upload)): ?> src="<?php echo e(!empty($stream->file_upload) ? $profile . $stream->file_upload : asset(url('./assets/images/user/avatar-5.jpg'))); ?>" <?php else: ?>  avatar="<?php echo e($remark->user_name); ?>" <?php endif; ?>>
                                                            </a>
                                                        </div>
                                                        <div class="d-block d-sm-flex align-items-center right-side">
                                                            <div
                                                                class="d-flex align-items-start flex-column justify-content-center mb-3 mb-sm-0">
                                                                <div class="h6 mb-1"><?php echo e($remark->user_name); ?>

                                                                </div>
                                                                <span class="text-sm lh-140 mb-0">
                                                                    posted to <a href="#"><?php echo e($remark->title); ?></a> ,
                                                                    <?php echo e($stream->log_type); ?> <a
                                                                        href="#"><?php echo e($remark->stream_comment); ?></a>
                                                                </span>
                                                            </div>
                                                            <div class=" ms-2  d-flex align-items-center ">
                                                                <small
                                                                    class="float-end "><?php echo e($stream->created_at); ?></small>
                                                            </div>
                                                        </div>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>



                        <?php echo e(Form::close()); ?>

                    </div>

                    <div id="useradd-3" class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h5><?php echo e(__('Tasks')); ?></h5>
                                    <small class="text-muted"><?php echo e(__('Assigned Tasks for this lead')); ?></small>
                                </div>
                                <div class="col">
                                    <div class="text-end">
                                        <a href="#" data-size="lg" data-url="<?php echo e(route('task.create',['task',0])); ?>"
                                            data-ajax-popup="true" data-bs-toggle="tooltip"
                                            data-title="<?php echo e(__('Create New Task')); ?>" title="<?php echo e(__('Create')); ?>"
                                            class="btn btn-sm btn-primary btn-icon-only ">
                                            <i class="ti ti-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatable" id="datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                            <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Parent')); ?>

                                            </th>
                                            <th scope="col" class="sort" data-sort="status"><?php echo e(__('Stage')); ?>

                                            </th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Date Start')); ?></th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Assigned User')); ?></th>
                                            <?php if(Gate::check('Show Task') || Gate::check('Edit Task') || Gate::check('Delete Task')): ?>
                                                <th scope="col"><?php echo e(__('Action')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <a href="#" data-size="md"
                                                        data-url="<?php echo e(route('task.show', $task->id)); ?>"
                                                        data-ajax-popup="true" data-title="<?php echo e(__('Task Details')); ?>"
                                                        class="action-item text-primary">
                                                        <?php echo e($task->name); ?>

                                                    </a>
                                                </td>
                                                <td class="budget">
                                                    <?php echo e($task->parent); ?>

                                                </td>
                                                <td>
                                                    <span
                                                        class="budget"><?php echo e(!empty($task->stages) ? $task->stages->name : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="budget"><?php echo e(\Auth::user()->dateFormat($task->start_date)); ?></span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="budget"><?php echo e(!empty($task->assign_user) ? $task->assign_user->name : '-'); ?></span>
                                                </td>
                                                <?php if(Gate::check('Show Task') || Gate::check('Edit Task') || Gate::check('Delete Task')): ?>
                                                    <td>
                                                        <div class="d-flex">
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Task')): ?>
                                                                <div class="action-btn bg-warning ms-2">
                                                                    <a href="#" data-size="md"
                                                                        data-url="<?php echo e(route('task.show', $task->id)); ?>"
                                                                        data-ajax-popup="true" data-bs-toggle="tooltip"
                                                                        title="<?php echo e(__('Details')); ?>"
                                                                        data-title="<?php echo e(__('Task Details')); ?>"
                                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center text-white">
                                                                        <i class="ti ti-eye"></i>
                                                                    </a>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Task')): ?>
                                                                <div class="action-btn bg-info ms-2">
                                                                    <a href="<?php echo e(route('task.edit', $task->id)); ?>"
                                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                                        data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>"
                                                                        data-title="<?php echo e(__('Edit Task')); ?>"><i
                                                                            class="ti ti-edit"></i></a>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Task')): ?>
                                                                <div class="action-btn bg-danger ms-2">
                                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['task.destroy', $task->id]]); ?>

                                                                    <a href="#!"
                                                                        class="mx-3 btn btn-sm  align-items-center text-white show_confirm"
                                                                        data-bs-toggle="tooltip" title='Delete'>
                                                                        <i class="ti ti-trash"></i>
                                                                    </a>
                                                                    <?php echo Form::close(); ?>

                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div> -->
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
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
                url: '<?php echo e(route('task.getparent')); ?>',
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\centraglobe\main-file\resources\views/lead/edit.blade.php ENDPATH**/ ?>