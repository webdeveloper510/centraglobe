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
        <span style="text-center">The Bond 1786</span><br>
        <span>Venue Rental & Banquet Event - Estimate</span>
        </div>
    </div>
    <?php print_r($data['deposit']) ?>
    <div class="row">
        <div class="col-lg-12">
            <div>
                <table border="1">
                    <thead>
                    <tr>
                            <th>Name : {{App\Models\User::where('id',$data['billingdetails'])->pluck('name')->first()}}</th>
                            <th colspan = "2"></th>
                            <th colspan = "3">Date:<?php echo date("d/m/Y"); ?> </th>
                            <!-- <th></th> -->
                            <th colspan = "2">Event: {{$data['type']}}</th>
                            <!-- <th></th> -->
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
                            @foreach($data['venue_rental'] as $key => $value)
                            <td>{{$value}}</td>
                                @if($key == 'quantity')
                                <td>{{$total[] = $data['venue_rental']['cost'] * $data['venue_rental']['quantity']}}</td>
                                @endif
                            @endforeach
                        </tr>
                       
                        <tr>
                            <td>Brunch / Lunch / Dinner Package</td>
                            <td colspan = "2"></td>
                            @foreach($data['food'] as $key => $value)
                            <td>{{$value}}</td>
                            @if($key == 'quantity')
                            <td>{{$total[] = $data['food']['cost'] * $data['food']['quantity']}}</td>
                            @endif
                            @endforeach
                        </tr>
                        <tr>
                            <td>Bar Package</td>
                            <td colspan = "2"></td>
                            @foreach($data['bar'] as $key => $value)
                            <td>{{$value}}</td>
                            @if($key == 'quantity')
                            <td>{{$total[] = $data['bar']['cost'] * $data['bar']['quantity']}}</td>
                            @endif
                            @endforeach
                        </tr>
                        <tr>
                            <td>Hotel Rooms</td>
                            <td colspan = "2"></td>
                            @foreach($data['hotel_rooms'] as $key => $value)
                            <td>{{$value}}</td>
                            @if($key == 'quantity')
                            <td>{{$total[] =$data['hotel_rooms']['cost'] * $data['hotel_rooms']['quantity']}}</td>
                            @endif
                            @endforeach
                        </tr>
                        <tr>
                            <td>Tent, Tables, Chairs, AV Equipment</td>
                            <td colspan = "2"></td>
                            @foreach($data['equipment'] as $key => $value)
                            <td>{{$value}}</td>
                            @if($key == 'quantity')
                            <td>{{$total[] =$data['equipment']['cost'] * $data['equipment']['quantity']}}</td>
                            @endif
                            @endforeach
                        </tr>
                        <tr>
                            <td>Welcome / Rehearsal / Special Setup</td>
                            <td colspan = "2"></td>
                            @foreach($data['setup'] as $key => $value)
                            <td>{{$value}}</td>
                            @if($key == 'quantity')
                            <td>{{$total[] =$data['setup']['cost'] * $data['setup']['quantity']}}</td>
                            @endif
                            @endforeach
                        </tr>

                        <tr>
                            <td>Special Requests / Others</td>
                            <td colspan = "2"></td>
                            @foreach($data['special_req'] as $key => $value)
                            <td>{{$value}}</td>
                            @if($key == 'quantity')
                            <td>{{$total[] =$data['special_req']['cost'] * $data['special_req']['quantity']}}</td>
                            @endif
                            @endforeach
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
                            <td colspan = "3">${{ array_sum($total) }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Sales, Occupancy Tax</td>
                            <td colspan = "2"></td>
                            <td colspan = "3"> ${{ 7* array_sum($total)/100 }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Service Charges & Gratuity</td>
                            <td colspan = "2"></td>
                            <td colspan = "3">${{ 20* array_sum($total)/100 }}</td>
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
                            <td colspan = "3">$ {{$grandtotal=  array_sum($total) + 20* array_sum($total)/100 + 7* array_sum($total)/100}}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Deposits on file</td>
                            <td colspan = "2"></td>
                            <td colspan = "3">${{$deposit= $data['deposit']}}</td>
                            <td></td>
                        </tr> <tr>
                            <td>balance due</td>
                            <td colspan = "2"></td>
                            <td colspan = "3">${{$grandtotal - $deposit}}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
