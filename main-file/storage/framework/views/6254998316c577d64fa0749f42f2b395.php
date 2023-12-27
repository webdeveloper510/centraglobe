<div class="row">
    <div class="col-lg-12">
            <div class="">
            <?php echo e(Form::open(array('route' => 'meeting.event_info','method' =>'post'))); ?>

                <dl class="row">

                    <dt class="col-md-6"><span class="h6 text-md mb-0"><?php echo e(__('Name')); ?></span></dt>
                    <dd class="col-md-6"> 
                        <input type = "text" name="name" class="form-control" value = "<?php echo e($meeting->name); ?>" disabled>
                    </dd>
                    <dt class="col-md-6"><span class="h6 text-md mb-0"><?php echo e(__('Email')); ?></span></dt>
                    <dd class="col-md-6">
                        <input type = "text" name="email" class="form-control" value = "<?php echo e($meeting->email); ?>" >
                    </dd>

                </dl>
            <?php echo e(Form::submit(__('Share'),array('class'=>'btn btn-primary'))); ?>

            <?php echo e(Form::close()); ?>

            </div>

    </div>
</div>

<?php /**PATH C:\xampp\htdocs\centra\centraglobe\main-file\resources\views/floor_plan/view.blade.php ENDPATH**/ ?>