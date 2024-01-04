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
                    <div class="img-section" style="width:20%; margin: 0 auto;display:flex;">
                            <img class="logo-img" src="{{ asset('storage/uploads/logo/logo.png') }}" style="width:100%; margin:10px auto;display:flex;">
              </div>
                </div>
            </div>
                       
    
    <div class="row">
        <div class="col-md-12"  style=" display:flex;justify-content:center; margin:0 auto; width:50%;font-size:12px;margin-bottom:15px;">
        <span style="text-align:left;">The Bond 1786</span><br>
        <spanstyle="text-align:left;">Billing Summary</span>
        <span style="text-align:left;">Venue Rental & Banquet Event - Estimate</span>
        </div>
    </div>
    <div class="row" style="display:flex; border:1px solid black;">
        <div class="col-md-6" style="text-align:left; margin-left:10px;">
            <dl>
                <span style="font-size:14px;margin-bottom:10px;">{{__('Name')}}: {{ $meeting['name'] }}</span><br>
                <span style="font-size:14px;margin-bottom:10px;">{{__('Phone & Email')}}: {{ $meeting['phone'] }} , {{ $meeting['email'] }}</span><br>
                <span style="font-size:14px;margin-bottom:10px;">{{__('Address')}}: {{ $meeting['lead_address'] }}</span><br>
                <span style="font-size:14px;margin-bottom:10px;">{{__('Event Date')}}: {{ $meeting['start_date'] }}</span>
            </dl>
        </div>
        <div class="col-md-6" style="text-align:right; margin-top:-9rem;margin-right:20px;">
            <dl class="text-align:left;">
                <span  style="font-size:14px;margin-bottom:10px;">{{__('Primary Contact')}}: {{ $meeting['name'] }}</span><br>
                <span  style="font-size:14px;margin-bottom:10px;">{{__('Phone')}}: {{ $meeting['phone'] }}</span><br>
                <span  style="font-size:14px;margin-bottom:10px;">{{__('Email')}}: {{ $meeting['email'] }}</span><br>
                <span  style="font-size:14px;margin-bottom:10px;">{{__('Secondary Contact')}}: {{ $meeting['alter_name'] }}</span><br>
                <span  style="font-size:14px;margin-bottom:10px;">{{__('Phone')}}: {{ $meeting['alter_phone'] }}</span><br>
                <span  style="font-size:14px;margin-bottom:10px;">{{__('Email')}}: {{ $meeting['alter_email'] }}</span><br>
            </dl>
        </div>
    </div>
    <hr>
    <div class="row" style="display:flex;margin-bottom:10px; border:1px solid black;">
        <div class="col-md-6" style="margin-left:10px;">
            <dl>
                <span style="font-size:14px;margin-bottom:10px;">{{__('Deposit')}}:</span><br>
                <span style="font-size:14px;margin-bottom:10px;">{{__('Billing Method')}}:</span>
            </dl>
        </div>
        <div class="col-md-6" style="text-align:right;margin-top:-5rem;margin-right:10px;">
            <dl>
                <span style="font-size:14px;margin-bottom:10px;">{{__('Catering Service')}}: NA</span><br>
            </dl>
        </div>
    </div>
    <table border="1">
                    <thead>
                        <tr>
                           <th style="background-color:#d3ead3;font-size:13px;font-weight:300;padding:5px 0px;">Date</th>
                            <th style="background-color:#d3ead3;font-size:13px;font-weight:300;padding:5px 0px;">Time</th>
                            <th style="background-color:#d3ead3;font-size:13px;font-weight:300;padding:5px 0px;">Room</th>
                            <th style="background-color:#d3ead3;font-size:13px;font-weight:300;padding:5px 0px;">Event</th>
                            <th style="background-color:#d3ead3;font-size:13px;font-weight:300;padding:5px 0px;">Function</th>
                            <th style="background-color:#d3ead3;font-size:13px;font-weight:300;padding:5px 0px;">Set Up</th>
                            <th style="background-color:#d3ead3;font-size:13px;font-weight:300;padding:5px 0px;">Exp</th>
                            <th style="background-color:#d3ead3;font-size:13px;font-weight:300;padding:5px 0px;">GTD</th>
                            <th style="background-color:#d3ead3;font-size:13px;font-weight:300;padding:5px 0px;">Set</th> 
                            <th style="background-color:#d3ead3;font-size:13px;font-weight:300;padding:5px 0px;">RENTAL</th>
                        </tr>
                    </thead>
                    <tbody>    
                        <tr>
                            <td style="font-size:13px;font-weight:300;padding:8px 0px;"><?php echo date("d/m/Y"); ?></td>
                            <td style="font-size:13px;font-weight:300;padding:8px 0px;" >Start Time:{{ $meeting['start_time'] }} End time:{{ $meeting['end_time'] }}</td>
                            <td style="font-size:13px;font-weight:300;padding:8px 0px;">{{$meeting['venue_selection']}}</td>
                            <td style="font-size:13px;font-weight:300;padding:8px 0px;">{{$meeting['type']}}</td>
                            <td style="font-size:13px;font-weight:300;padding:8px 0px;">{{$meeting['function']}}</td>
                            <td style="font-size:13px;font-weight:300;padding:8px 0px;">{{$meeting['meal']}}</td>
                            <td style="font-size:13px;font-weight:300;padding:8px 0px;">Exp</td>
                            <td style="font-size:13px;font-weight:300;padding:8px 0px;">GTD</td>
                            <td style="font-size:13px;font-weight:300;padding:8px 0px;">Set</td> 
                            <td style="font-size:13px;font-weight:300;padding:8px 0px;">RENTAL</td>
                        </tr>
                        
                    </tbody>
                </table>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-md-12">
                        
                        <div class="row" style="margin-top:10px;padding-top:10px;">
                         <div class="col-md-6" style="width:50%; border:1px solid black; margin-top:10px">
                            <p style="text-align:center;border:1px solid black; padding:10px;font-weight:bold;">Menu Selections</p>
                            
                             <table border="1">
                    <thead>
                        <tr>
                            <th style="font-size:13px;font-weight:300;padding:10px 25px;">start:  4pm</th>
                            <th style="font-size:13px;font-weight:300;padding:0px 25px;">end;  10pm</th>
                            <th style="font-size:13px;font-weight:300;padding:10px 25px;">Function</th>
                        </tr>
                    </thead>
                    </tbody>  
                        
                     
</table>          
                                 <div class="text" style="border:1px solid black;"> 
                        
                            <p style="text-align:center;height:6%;"> </p>
                        
                        </div>
                           <p style="text-align:center; border:1px solid black;padding:5px;font-weight:bold;">Audio Visual Requirements
                            Miscellaneous</p>
                                 <div class="text" style="border:1px solid black;"> 
                        
                            <p style="text-align:center;height:6%;"> </p>
                        
                        </div>
                        </div>
                         <div class="col-md-6" style="float:right; margin-top:-2rem; padding-top:-25rem; border:1px solid black; width:45%;text-align:center;">
                              <p style="text-align:center;border:1px solid black; padding:10px;font-weight:bold;">Setup Requirements</p>
                            
                        <div class="text" style="border:1px solid black;height:6%;"> 
                        
                            <p style="text-align:center;"> TBD</p>
                        
                        </div>
                        
                        <p style="text-align:center; border:1px solid black;padding:10px;font-weight:bold;">Entertainment, Décor and<br>
                            Miscellaneous</p>
                                 <div class="text" style="border:1px solid black;"> 
                        
                            <p style="text-align:center;height:3%;"> </p>
                        
                        </div>
                         <p style="text-align:center; border:1px solid black;padding:5px;font-weight:bold;">Audio Visual Requirements
                           </p>
                                 <div class="text" style="border:1px solid black;"> 
                        
                            <p style="text-align:center;height:2%;"> </p>
                        
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
</body>
</html>