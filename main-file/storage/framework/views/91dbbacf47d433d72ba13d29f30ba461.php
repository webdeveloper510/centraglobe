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
        <div class="col-md-12">
        <span>The Bond 1786</span><br>
        <span>Billing Summary</span>
        <span>Venue Rental & Banquet Event - Estimate</span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div>
                <table border="1">
                    <thead>
                    <tr>
                            <th>Name : <?php echo e(App\Models\User::where('id',$data['billingdetails'])->pluck('name')->first()); ?></th>
                            <th colspan = "2"></th>
                            <th colspan = "3">Date:<?php echo date("d/m/Y"); ?> </th>
                            <th >Event: <?php echo e($data['type']); ?></th>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <th colspan = "2">Additional</th>
                            <th>Cost</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>    
                        <tr>
                            <td>Venue Rental</td>
                            <td colspan = "2"></td>
                            <?php $__currentLoopData = $data['venue_rental']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e($value); ?></td>
                                <?php if($key == 'quantity'): ?>
                                <td><?php echo e($total[] = $data['venue_rental']['cost'] * $data['venue_rental']['quantity']); ?></td>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                       
                        <tr>
                            <td>Brunch / Lunch / Dinner Package</td>
                            <td colspan = "2"></td>
                            <?php $__currentLoopData = $data['food']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e($value); ?></td>
                            <?php if($key == 'quantity'): ?>
                            <td><?php echo e($total[] = $data['food']['cost'] * $data['food']['quantity']); ?></td>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <tr>
                            <td>Bar Package</td>
                            <td colspan = "2"></td>
                            <?php $__currentLoopData = $data['bar']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e($value); ?></td>
                            <?php if($key == 'quantity'): ?>
                            <td><?php echo e($total[] = $data['bar']['cost'] * $data['bar']['quantity']); ?></td>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <tr>
                            <td>Hotel Rooms</td>
                            <td colspan = "2"></td>
                            <?php $__currentLoopData = $data['hotel_rooms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e($value); ?></td>
                            <?php if($key == 'quantity'): ?>
                            <td><?php echo e($total[] =$data['hotel_rooms']['cost'] * $data['hotel_rooms']['quantity']); ?></td>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <tr>
                            <td>Tent, Tables, Chairs, AV Equipment</td>
                            <td colspan = "2"></td>
                            <?php $__currentLoopData = $data['equipment']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e($value); ?></td>
                            <?php if($key == 'quantity'): ?>
                            <td><?php echo e($total[] =$data['equipment']['cost'] * $data['equipment']['quantity']); ?></td>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <tr>
                            <td>Welcome / Rehearsal / Special Setup</td>
                            <td colspan = "2"></td>
                            <?php $__currentLoopData = $data['setup']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e($value); ?></td>
                            <?php if($key == 'quantity'): ?>
                            <td><?php echo e($total[] =$data['setup']['cost'] * $data['setup']['quantity']); ?></td>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>

                        <tr>
                            <td>Special Requests / Others</td>
                            <td colspan = "2"></td>
                            <?php $__currentLoopData = $data['special_req']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e($value); ?></td>
                            <?php if($key == 'quantity'): ?>
                            <td><?php echo e($total[] =$data['special_req']['cost'] * $data['special_req']['quantity']); ?></td>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <tr>
                            <td>-</td>
                            <td colspan = "2"></td>
                            <td colspan = "3"></td>
                            
                            <td></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td colspan = "2"></td>
                            <td colspan = "3">$<?php echo e(array_sum($total)); ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Sales, Occupancy Tax</td>
                            <td colspan = "2"></td>
                            <td colspan = "3"> $<?php echo e(7* array_sum($total)/100); ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Service Charges & Gratuity</td>
                            <td colspan = "2"></td>
                            <td colspan = "3">$<?php echo e(20* array_sum($total)/100); ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>-</td>
                            <td colspan = "2"></td>
                            <td colspan = "3"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Grand Total / Estimated Total</td>
                            <td colspan = "2"></td>
                            <td colspan = "3">$ <?php echo e($grandtotal=  array_sum($total) + 20* array_sum($total)/100 + 7* array_sum($total)/100); ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Deposits on file</td>
                            <td colspan = "2"></td>
                            <td colspan = "3">$<?php echo e($deposit= $data['deposit']); ?></td>
                            <td></td>
                        </tr> <tr>
                            <td>balance due</td>
                            <td colspan = "2"></td>
                            <td colspan = "3">$<?php echo e($grandtotal - $deposit); ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\centra\centraglobe\main-file\resources\views/billing/view.blade.php ENDPATH**/ ?>