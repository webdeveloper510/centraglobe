
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
<?php echo e(Form::open(array('route'=>'billing.details','method'=>'post','enctype'=>'multipart/form-data'))); ?>

    <div class= "row">
        <div class = "col-md-12">
            <div class="form-group">
                <label class="form-label">Select User</label>
                <select class="form-select" id = "userinfo" name = "user" required>
                    <option value = "-1" selected disabled>Select user</option>
                    <?php $__currentLoopData = $assigned_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->user_id); ?>"><?php echo e(App\Models\User::where('id',$user->user_id)->pluck('name')->first()); ?></option>
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\centraglobe\main-file\resources\views/billing/index.blade.php ENDPATH**/ ?>