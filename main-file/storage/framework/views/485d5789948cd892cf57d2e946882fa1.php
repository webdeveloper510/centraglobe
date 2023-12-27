
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
    $users= App\Models\User::where('type','!=','owner')->where('type','!=','super admin')->get();
    $user_name =[];
    $user_id =[];
    foreach($users as $user){
        $user_name[] = $user->name;
        $user_id[] = $user->id;
    }
   
?> 
<!-- $labels = ['Venue Rental','Brunch / Lunch / Dinner Package','Bar Package','Hotel Rooms','Tent, Tables, Chairs, AV Equipment','Welcome / Rehearsal / Special Setup','Special Requests / Others
','Total','Sales, Occupancy Tax','Service Charges & Gratuity','Grand Total / Estimated Total','Deposit on File','Balance Due']; -->

<?php $__env->startSection('content'); ?>
<div class= "row">
        <div class = "col-md-12">
            <div class="form-group">
                <label class="form-label">Select User</label>
                <select class="form-select" id = "userinfo" name = "user">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class = "col-md-6">
            <div class="form-group">
                <!-- <label class="form-label">Guest Count :</label> -->
                <span id = "guest_count">Guest Count :</span>
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
                            <td><?php echo e($billing->$key); ?></td>
                            <td> 
                                <input type = "number" name ="quantity<?php echo e($key); ?>" class= "form-control">
                            </td>

                            <td><input type = "text" name ="notes<?php echo e($key); ?>" class= "form-control"></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <button type= "button" class="btn btn-primary" style="float:right">Share</button>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<script>
    $(document).ready(function(){
        $('#userinfo').on('change',function(){
            var user = $(this).val();
            $.ajax({
                url: "<?php echo e(route('billing.user_info')); ?>",
                type: 'POST',
                data: {
                    "user": user,
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function(data) {
                    console.log(data)
                }
            });  
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\centra\centraglobe\main-file\resources\views/billing/index.blade.php ENDPATH**/ ?>