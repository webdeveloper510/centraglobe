<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Summary</title>
</head>
<body>
       <div class="row">
            <div class="col-md-12"  style="border:2px solid black; width:93%;">
                <div class="row" style="display:flex;justify-content:center;align-item:center;">
                    <div class="col-md-3" style="width:20%;float:left; display:flex; justify-content:center; align-items:center; font-size:14px;font-family:sans-serif;">
                        <img  class="logo-img" src="<?php echo e(asset('storage/uploads/logo/logo.png')); ?>" style="width:80%;height:80%;padding-top:30px;">
                    </div>
                 <div class="col-md-3" style="text-align:center; width:45%; margin-top:50px;">
                     <span style="text-align:center;justify-content:center;align-items:center;display:flex; justify-content:center; align-items:center;">The Bond 1786</span><br>
                        <span>Venue Rental & Banquet Event - Estimate</span>   
                </div>
                 <div class="col-md-3" style="width:20%;float:right; display:flex; justify-content:center;align-item:center;border 2px solid black !important;">
                        <p style="font-size:14px;text-align:left;text-align:center;border 2px solid black !important; background-color:yellow; margin-bottom:30px;">Guest count:62<p>
    
                 </div>
            
                </div>

         </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
            <table border="1">
                <thead>
                    <tr>
                        <th style="text-align:left; font-size:13px;text-align:left; padding:5px 5px; margin-left:5px;">Name : <?php echo e(App\Models\User::where('id',$data['billingdetails'])->pluck('name')->first()); ?></th>
                        <th colspan = "2" style="padding:5px 0px;margin-left 5px;font-size:13px"></th>
                        <th colspan = "3"  style="text-align:left;text-align:left; padding:5px 5px; margin-left:5px;">Date:<?php echo date("d/m/Y"); ?> </th>
                        <th  style="text-align:left; font-size:13px;padding:5px 5px; margin-left:5px;">Event: <?php echo e($data['type']); ?></th>
                    </tr>
                    <tr style="background-color:#063806;">
                        <th style="color:#ffffff; font-size:13px;text-align:left; padding:5px 5px; margin-left:5px;">Description</th>
                        <th colspan = "2" style="color:#ffffff; font-size:13px;padding:5px 5px; margin-left:5px;">Additional</th>
                        <th  style="color:#ffffff; font-size:13px;padding:5px 5px;margin-left 5px;font-size:13px">Cost</th>
                        <th  style="color:#ffffff; font-size:13px;padding:5px 5px;margin-left 5px;font-size:13px">Quantity</th>
                        <th  style="color:#ffffff; font-size:13px;padding:5px 5px;margin-left 5px;font-size:13px">Total Price</th>
                        <th style="color:#ffffff; font-size:13px;padding:5px 5px;margin-left 5px;font-size:13px">Notes</th>
                    </tr>
                </thead>
                <tbody>    
                    <tr>
                        <td style="padding:5px 5px; margin-left:5px;font-size:13px;">Venue Rental</td>
                        <td colspan = "2" style="padding:5px 5px; margin-left:5px;font-size:13px;"></td>
                        <?php $__currentLoopData = $data['venue_rental']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td style="padding:5px 5px; margin-left:5px;font-size:13px;"><?php echo e($value); ?></td>
                            <?php if($key == 'quantity'): ?>
                            <td style="padding:5px 5px; margin-left:5px;font-size:13px;"><?php echo e($total[] = $data['venue_rental']['cost'] * $data['venue_rental']['quantity']); ?></td>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    
                    <tr>
                        <td style="padding:5px 5px; margin-left:5px;font-size:13px;">Brunch / Lunch / Dinner Package</td>
                        <td colspan = "2" style="padding:5px 5px; margin-left:5px;font-size:13px;"></td>
                        <!--<td colspan = "2"></td>-->
                            <?php $__currentLoopData = $data['food']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td style="padding:5px 5px; margin-left:5px;font-size:13px;"><?php echo e($value); ?></td>
                                <?php if($key == 'quantity'): ?>
                                <td style="padding:5px 5px; margin-left:5px;font-size:13px;"><?php echo e($total[] = $data['food']['cost'] * $data['food']['quantity']); ?></td>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <tr>
                        <td style="padding:5px 5px; margin-left:5px;font-size:13px;">Bar Package</td>
                        <td colspan = "2" style="padding:5px 5px; margin-left:5px;font-size:13px;"></td>
                            <?php $__currentLoopData = $data['bar']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td style="padding:5px 5px; margin-left:5px;font-size:13px;"><?php echo e($value); ?></td>
                                <?php if($key == 'quantity'): ?>
                                <td style="padding:5px 5px; margin-left:5px;font-size:13px;"><?php echo e($total[] = $data['bar']['cost'] * $data['bar']['quantity']); ?></td>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <tr>
                        <td style="padding:5px 5px; margin-left:5px;font-size:13px;">Hotel Rooms</td>
                        <td colspan = "2" style="padding:5px 5px; margin-left:5px;"></td>
                            <?php $__currentLoopData = $data['hotel_rooms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td style="text-align:left;text-align:left; padding:5px 5px; margin-left:5px;font-size:13px;"><?php echo e($value); ?></td>
                                <?php if($key == 'quantity'): ?>
                                <td style="padding:5px 5px; margin-left:5px;font-size:13px;"><?php echo e($total[] =$data['hotel_rooms']['cost'] * $data['hotel_rooms']['quantity']); ?></td>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <tr>
                        <td style="padding:5px 5px; margin-left:5px;font-size:13px;">Tent, Tables, Chairs, AV Equipment</td>
                        <td colspan = "2" style="padding:5px 5px; margin-left:5px;font-size:13px;"></td>
                        <?php $__currentLoopData = $data['equipment']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td style="padding:5px 5px; margin-left:5px;font-size:13px;"><?php echo e($value); ?></td>
                        <?php if($key == 'quantity'): ?>
                        <td style="padding:5px 5px; margin-left:5px;font-size:13px;"><?php echo e($total[] =$data['equipment']['cost'] * $data['equipment']['quantity']); ?></td>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <tr>
                        <td style="padding:5px 5px; margin-left:5px;font-size:13px;">Welcome / Rehearsal / Special Setup</td>
                        <td colspan = "2" style="padding:5px 5px; margin-left:5px;font-size:13px"></td>
                        <?php $__currentLoopData = $data['setup']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td style="padding:5px 5px; margin-left:5px;font-size:13px;"><?php echo e($value); ?></td>
                        <?php if($key == 'quantity'): ?>
                        <td style="padding:5px 5px; margin-left:5px;font-size:13px;"><?php echo e($total[] =$data['setup']['cost'] * $data['setup']['quantity']); ?></td>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>

                    <tr>
                        <td style="padding:5px 5px; margin-left:5px;font-size:13px;">Special Requests / Others</td>
                        <td colspan = "2" style="padding:5px 5px; margin-left:5px;font-size:13px;"></td>
                        <?php $__currentLoopData = $data['special_req']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td style="padding:5px 5px; margin-left:5px;font-size:13px;"><?php echo e($value); ?></td>
                        <?php if($key == 'quantity'): ?>
                        <td style="padding:5px 5px; margin-left:5px;font-size:13px;"><?php echo e($total[] =$data['special_req']['cost'] * $data['special_req']['quantity']); ?></td>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <tr>
                        <td>-</td>
                        <td colspan = "2" style="padding:5px 5px; margin-left:5px;font-size:13px;"></td>
                        <td colspan = "3" style="padding:5px 5px; margin-left:5px;font-size:13px;"></td>
                        
                        <td style="padding:5px 5px; margin-left:5px;font-size:13px;"></td>
                    </tr>
                    <tr>
                        <td style="padding:5px 5px; margin-left:5px;font-size:13px;">Total</td>
                        <td colspan = "2" style="padding:5px 5px; margin-left:5px;font-size:13px;"></td>
                        <td colspan = "3" style="padding:5px 5px; margin-left:5px;font-size:13px;">$<?php echo e(array_sum($total)); ?></td>
                        <td style="padding:5px 5px; margin-left:5px;font-size:13px;"></td>
                    </tr>
                    <tr>
                        <td style="padding:5px 5px; margin-left:5px;font-size:13px;">Sales, Occupancy Tax</td>
                        <td colspan = "2" style="padding:5px 5px; margin-left:5px;font-size:13px;"></td>
                        <td colspan = "3" style="padding:5px 5px; margin-left:5px;font-size:13px;"> $<?php echo e(7* array_sum($total)/100); ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align:left;text-align:left; padding:5px 5px; margin-left:5px;font-size:13px;">Service Charges & Gratuity</td>
                        <td colspan = "2" style="padding:5px 5px; margin-left:5px;font-size:13px;"></td>
                        <td colspan = "3" style="padding:5px 5px; margin-left:5px;font-size:13px;">$<?php echo e(20* array_sum($total)/100); ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>-</td>
                        <td colspan = "2" style="padding:5px 5px; margin-left:5px;font-size:13px;"></td>
                        <td colspan = "3" style="padding:5px 5px; margin-left:5px;font-size:13px;"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="background-color:#ffff00; padding:5px 5px; margin-left:5px;font-size:13px;">Grand Total / Estimated Total</td>
                        <td colspan = "2" style="padding:5px 5px; margin-left:5px;font-size:13px;"></td>
                        <td colspan = "3" style="padding:5px 5px; margin-left:5px;font-size:13px;">$ <?php echo e($grandtotal=  array_sum($total) + 20* array_sum($total)/100 + 7* array_sum($total)/100); ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="background-color:#d7e7d7; padding:5px 5px; margin-left:5px;font-size:13px;">Deposits on file</td>
                        <td colspan = "2" style="padding:5px 5px; margin-left:5px;font-size:13px;"></td>
                        <td colspan = "3" style="background-color:#d7e7d7;padding:5px 5px; margin-left:5px;font-size:13px;">$<?php echo e($deposit= $data['deposit']); ?></td>
                        <td></td>
                    </tr> <tr>
                        <td style="background-color:#ffff00;text-align:left; padding:5px 5px; margin-left:5px;font-size:13px;">balance due</td>
                        <td colspan = "2" style="padding:5px 5px; margin-left:5px;font-size:13px;"></td>
                        <td colspan = "3" style="padding:5px 5px; margin-left:5px;font-size:13px;background-color:#9fdb9f;">$<?php echo e($grandtotal - $deposit); ?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\centra\centraglobe\main-file\resources\views/billing/view.blade.php ENDPATH**/ ?>