<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Stream')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
        <?php echo e(__('Stream')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Stream')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5><?php echo e(__('Latest comments')); ?></h5>
            </div>
            <?php $__currentLoopData = $streams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stream): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $remark = json_decode($stream->remark);
                ?>
            <div class="card-body">
                <div class="row">

                    <div class="col-xl-12">
                        <ul class="list-group team-msg">
                            <li class="list-group-item border-0 d-flex align-items-start mb-2">
                                <div class="avatar me-3">
                                    <?php
                                        $profile=\App\Models\Utility::get_file('upload/profile/');
                                    ?>
                                    <a href="<?php echo e((!empty($stream->file_upload))?($profile.$stream->file_upload): $profile .'avatar.png'); ?>" target="_blank">
                                        <img alt="" class="rounded-circle" src="<?php echo e((!empty($stream->file_upload))?($profile.$stream->file_upload):$profile.'avatar.png'); ?>" >
                                    </a>
                                </div>
                                <div class="d-block d-sm-flex align-items-center right-side">
                                    <div class="d-flex align-items-start flex-column justify-content-center mb-3 mb-sm-0">
                                        <div class="h6 mb-1"><?php echo e($remark->user_name); ?>

                                        </div>
                                        <span class="text-sm lh-140 mb-0">
                                            posted to <a href="#"><?php echo e($remark->title); ?></a> , <?php echo e($stream->log_type); ?>  <a href="#"><?php echo e($remark->stream_comment); ?></a>
                                        </span>
                                    </div>
                                    <div class=" ms-2  d-flex align-items-center ">
                                        <small class="float-end "><?php echo e($stream->created_at); ?></small>
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['stream.destroy', $stream->id]]); ?>

                                    <a href="#!" class="action-btn bg-danger mx-3 btn btn-sm  align-items-center text-white show_confirm" data-bs-toggle="tooltip" title='Delete'>
                                        <i class="ti ti-trash"></i>
                                    </a>
                                    <?php echo Form::close(); ?>

                                    </div>
                                </div>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\centraglobe\main-file\resources\views/stream/index.blade.php ENDPATH**/ ?>