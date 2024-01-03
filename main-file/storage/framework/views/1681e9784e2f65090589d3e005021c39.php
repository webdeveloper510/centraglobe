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
    <div class="row" >
        <div class="col-md-6">
            <dl>
                <span ><?php echo e(__('Name')); ?>: <?php echo e($meeting['name']); ?></span><br>
                <span><?php echo e(__('Phone & Email')); ?>: <?php echo e($meeting['phone']); ?> , <?php echo e($meeting['email']); ?></span><br>
                <span><?php echo e(__('Address')); ?>: <?php echo e($meeting['lead_address']); ?></span><br>
                <span><?php echo e(__('Event Date')); ?>: <?php echo e($meeting['start_date']); ?></span>
            </dl>
        </div>
        <div class="col-md-6">
            <dl>
                <span><?php echo e(__('Primary Contact')); ?>: <?php echo e($meeting['name']); ?></span><br>
                <span><?php echo e(__('Phone')); ?>: <?php echo e($meeting['phone']); ?></span><br>
                <span><?php echo e(__('Email')); ?>: <?php echo e($meeting['email']); ?></span><br>
                <span><?php echo e(__('Secondary Contact')); ?>: <?php echo e($meeting['alter_name']); ?></span><br>
                <span><?php echo e(__('Phone')); ?>: <?php echo e($meeting['alter_phone']); ?></span><br>
                <span><?php echo e(__('Email')); ?>: <?php echo e($meeting['alter_email']); ?></span><br>
            </dl>
        </div>
    </div>
    <hr>
    <div class="row" >
        <div class="col-md-6">
            <dl>
                <span ><?php echo e(__('Deposit')); ?>:</span><br>
                <span><?php echo e(__('Billing Method')); ?>:</span>
            </dl>
        </div>
        <div class="col-md-6">
            <dl>
                <span><?php echo e(__('Catering Service')); ?>: NA</span><br>
            </dl>
        </div>
    </div>
    <table border="1">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Room</th>
                            <th>Event</th>
                            <th>Function</th>
                            <th>Set Up</th>
                            <th>Exp</th>
                            <th>GTD</th>
                            <th>Set</th> 
                            <th>RENTAL</th>
                        </tr>
                    </thead>
                    <tbody>    
                        <tr>
                            <td><?php echo date("d/m/Y"); ?></td>
                            <td >Start Time:<?php echo e($meeting['start_time']); ?> End time:<?php echo e($meeting['end_time']); ?></td>
                            <td><?php echo e($meeting['venue_selection']); ?></td>
                            <td><?php echo e($meeting['type']); ?></td>
                            <td><?php echo e($meeting['function']); ?></td>
                            <td><?php echo e($meeting['meal']); ?></td>
                            <td>Exp</td>
                            <td>GTD</td>
                            <td>Set</td> 
                            <td>RENTAL</td>
                        </tr>
                    </tbody>
                </table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\centra\centraglobe\main-file\resources\views/meeting/proposal.blade.php ENDPATH**/ ?>