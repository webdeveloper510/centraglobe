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
                <span >{{__('Name')}}: {{ $meeting['name'] }}</span><br>
                <span>{{__('Phone & Email')}}: {{ $meeting['phone'] }} , {{ $meeting['email'] }}</span><br>
                <span>{{__('Address')}}: {{ $meeting['lead_address'] }}</span><br>
                <span>{{__('Event Date')}}: {{ $meeting['start_date'] }}</span>
            </dl>
        </div>
        <div class="col-md-6">
            <dl>
                <span>{{__('Primary Contact')}}: {{ $meeting['name'] }}</span><br>
                <span>{{__('Phone')}}: {{ $meeting['phone'] }}</span><br>
                <span>{{__('Email')}}: {{ $meeting['email'] }}</span><br>
                <span>{{__('Secondary Contact')}}: {{ $meeting['alter_name'] }}</span><br>
                <span>{{__('Phone')}}: {{ $meeting['alter_phone'] }}</span><br>
                <span>{{__('Email')}}: {{ $meeting['alter_email'] }}</span><br>
            </dl>
        </div>
    </div>
    <hr>
    <div class="row" >
        <div class="col-md-6">
            <dl>
                <span >{{__('Deposit')}}:</span><br>
                <span>{{__('Billing Method')}}:</span>
            </dl>
        </div>
        <div class="col-md-6">
            <dl>
                <span>{{__('Catering Service')}}: NA</span><br>
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
                            <td >Start Time:{{ $meeting['start_time'] }} End time:{{ $meeting['end_time'] }}</td>
                            <td>{{$meeting['venue_selection']}}</td>
                            <td>{{$meeting['type']}}</td>
                            <td>{{$meeting['function']}}</td>
                            <td>{{$meeting['meal']}}</td>
                            <td>Exp</td>
                            <td>GTD</td>
                            <td>Set</td> 
                            <td>RENTAL</td>
                        </tr>
                    </tbody>
                </table>
</body>
</html>
