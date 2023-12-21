
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
$labels = ['Venue Rental','Brunch / Lunch / Dinner Package','Bar Package','Hotel Rooms','Tent, Tables, Chairs, AV Equipment','Welcome / Rehearsal / Special Setup','Special Requests / Others
','Total','Sales, Occupancy Tax','Service Charges & Gratuity','Grand Total / Estimated Total','Deposit on File','Balance Due'];
?> 
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
                <table class="table">
                    <thead>
                    <tr>
                        <th><?php echo e(__('Description')); ?> </th>
                        <th><?php echo e(__('Cost')); ?> </th>
                        <th><?php echo e(__('Quantity')); ?> </th>
                        <th><?php echo e(__('Total Price')); ?> </th>
                        <th><?php echo e(__('Notes')); ?> </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(ucfirst($label)); ?></td>
                            <td><td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\centra\centraglobe\main-file\resources\views/billing/index.blade.php ENDPATH**/ ?>