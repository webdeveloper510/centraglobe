<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Billing')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
        <div class="page-header-title">
            <?php echo e(__('Billing')); ?>

        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php
$labels =
    [ 
        'venue_rental' => 'Venue Rental',
        'hotel_rooms'=>'Hotel Rooms',
        'equipment'=>'Tent, Tables, Chairs, AV Equipment',
        'setup' =>'Setup',
        'gold_2hrs'=>'Bar Package',
        'special_req' =>'Special Requests /Other',
        'classic_brunch'=>'Brunch/Lunch/Dinner Package',
    ]; 
?> 

<?php $__env->startSection('content'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <?php echo e(Form::open(array('route'=>'billing.details','method'=>'post','enctype'=>'multipart/form-data'))); ?>

                    <div class= "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <label class="form-label">Select Customer :</label>
                                <select class="form-select" id = "userinfo" name = "user" required>
                                    <option value= '-1' disabled selected>Select Customer</option>
                                    <?php $__currentLoopData = $assigned_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?> (Event- <?php echo e($user->type); ?>)</option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><?php echo e(__('Description')); ?> </th>
                                                <th><?php echo e(__('Cost')); ?> </th>
                                                <th><?php echo e(__('Quantity')); ?> </th>
                                                <th><?php echo e(__('Notes')); ?> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(ucfirst($label)); ?></td>
                                                    <td>
                                                        <input type = "number" name ="billing[<?php echo e($key); ?>][cost]" value="<?php echo e($billing->$key); ?>" class= "form-control" readonly></td>
                                                    <td> 
                                                    <input type = "number" name ="billing[<?php echo e($key); ?>][quantity]" min = '0' class= "form-control" required>
                                                    </td>
                                                    <td><input type = "text" name ="billing[<?php echo e($key); ?>][notes]" class= "form-control"></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <div class= "form-group">
                                    <label class = "form-label"> Deposit on file: </label>
                                    <input type = "number" name = "deposits" min = '0'  class= "form-control" required>
                                    </div>
                            </div>
                        </div>
                    </div>
                <?php echo e(Form::submit(__('Save'),array('class'=>'btn btn-primary '))); ?>

                    <?php echo e(Form::close()); ?>    
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nitin/Desktop/centraglobe/main-file/resources/views/billing/create.blade.php ENDPATH**/ ?>