<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposal</title>
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
        <span style="text-align:left;">Proposal</span>
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
                            <td style="font-size:13px;font-weight:300;padding:8px 0px;" >Start Time:{{date('h:i A', strtotime($meeting['start_time']))}} <br>
                            End time:{{date('h:i A', strtotime($meeting['end_time']))}}</td>
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
                            <th style="font-size:13px;font-weight:300;padding:10px 25px;">Start:{{date('h:i A', strtotime($meeting['start_time']))}}</th>
                            <th style="font-size:13px;font-weight:300;padding:0px 25px;">End: {{date('h:i A', strtotime($meeting['end_time']))}} </th>
                            <th style="font-size:13px;font-weight:300;padding:10px 25px;">Function : {{$meeting['function']}}</th>
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
     <div class="row">
         <div class="col-md-12">
            <p>This contract defines the terms and conditions under which Lotus Estate, LLC dba The Bond 1786, (hereinafter referred to as The Bond or The
                Bond 1786), and <b>{{$meeting['name']}}</b>(hereafter referred to as the Customer) agree to the Customer’s use of The Bond 1786 facilities on <b>{{\Auth::user()->dateFormat($meeting['start_date'])}}</b>
                (reception/event date). This contract constitutes the entire agreement between the parties and becomes binding upon the signature of
                both parties. The contract may not be amended or changed unless executed in writing and signed by The Bond 1786 and the Customer.
            </p>
         </div>
     </div>   
     <div class="row">
         <div class="col-md-12">
            <h4>Venue Selection</h4>
            (Please check one or more, as applicable)
            <input type="checkbox" name="venue" value="Main Dining Room" >Main Dining Room<br>
            <input type="checkbox" name="venue" value="Main Dining Room" >Hudson Room<br>
            <input type="checkbox" name="venue" value="Main Dining Room" >Tavern<br>
            <input type="checkbox" name="venue" value="Main Dining Room" >Hudson Room Extension<br>
            <input type="checkbox" name="venue" value="Main Dining Room" > Outdoor Patio<br>
            Hotel (Please specify no. of Rooms)
            <input type= "number" name ="rooms">
           <p>
            The venue/s described above has been reserved for you for the date and time stipulated. Please note that the hours assigned to your event include all set-up and
            all clean-up, including the set-up and clean-up of all subcontractors that you may utilize. It is understood you will adhere to and follow the terms of this Agreement,
            and you will be responsible for any damage to the premises and site, including the behavior of your guests, invitees, agents, or sub-contractors resulting from your
            use of venue/s.
            </p>
            <h4>Rental Deposit and Payment Agreement</h4>
            <p>The total cost for use of The Bond 1786 and its facilities described in this contract is listed above. To reserve services on the
                date/s requested, The Bond 1786 requires this contract be signed by Customer and an <b> initial payment of $3,000</b> be deposited.
                The balance is due prior to the event date. Deposits and payments will be made at the time of signing of the Contract. Payments
                can be made by cash, Bank checks (made payable to <b>The Bond 1786</b>), on the schedule noted below. A receipt from The Bond
                1786 will be provided for each.
            </p>
            <h4>Billing Summary</h4>
         </div>
     </div>   
     <div class = "row">
         <div class= "col-md-12">
             <h3 style = "text-align:center">TERMS AND CONDITIONS</h3>
             <h5>FOOD AND ALCOHOLIC BEVERAGES and 3 RD PARTY / ON-SITE VENDORS</h5>
             <p>The Client and their guests agree to not bring in any unauthorized food or beverage into The Bond 1786. The Establishment does not allow outside alcoholic beverages, unless agreed with the Terms. Catering service is available at a cost; please see your
                    Coordinator for menu selections. The Coordinator / Owner reserves the right to approve all vendors providing services to the event to include food, 
                    audio/visual, and merchandise.
            </p>
            <p>It is understood and agreed that the Customer may serve beverages containing alcohol (including but not limit to beer, wine, champagne, mixed drinks 
            with liquor, etc., by way of example) hereinafter call “Alcohol”, upon the following terms and conditions:
            </p>
            <ul>
                <li> A copy of Liquor License/Permit must be on records at the Establishment before any alcohol can be served at your event, by a 3 rd Party Vendor.</li>
                <li>A food waiver must be on file for all outside food brought to the Establishment.</li> 
<li>Under NO circumstances shall Client(s) sell or attempt to sell any Alcohol to anyone.</li>
<li>Customer shall not permit any person under the age of twenty-one (21) to consume alcohol regardless of whether the person is accompanied by a parent or guardian.</li>
<li>Customer hereby agrees to use their best efforts to ensure that Alcohol will not be served to anyone who is intoxicated or appears to be intoxicated.</li>
<li>Customer hereby expressly grants to The Bond 1786, at The Bond’s sole discretion and option, to instruct the security officer(s) to remove any person(s) from the Venue, if in the opinion of The Bond 1786 representative in charge, the licensed
and bonded Bartender and/or the security officer(s) the person(s) is intoxicated, unruly or could present a danger to themselves or others, and/or the Venue.</li>
<li>Customer hereby agrees to be liable and responsible for all act(s) and actions of every kind and nature for each person in attendance at Customer’s function or event.</li>
<li>Caterers: No caterer can be used without prior approval of The Bond 1786. Each caterer approved should be familiar with The Bond 1786 venues, rules, and regulations.</li>
<li>Each one of these caterers will have to carry required liability insurance for The Bond.</li>
<li>If Customer requests a different food service company, they must be pre-approved by The Bond 1786 and meet their rules and regulations.</li>
<li>Your catering company is responsible for the set-up, break-down and clean-up of the catered site. Please allow appropriate time for break-down and clean-up to meet the contracted timelines.</li>
<li>All event trash must be disposed of in the designated areas at the conclusion of the event.</li>
<li>ALL vendors must adhere to the terms of our guidelines, and it is the Customer’s responsibility to share these guidelines with them.</li>
<li>Usage of cooking equipment such as fryers are allowed, with proper safety precautions, DOH certifications and requirements fully satisfied. The areas these can be used should be pre-evaluated and approved, along with the provisions for oil
disposal.</li>
<li>All food brought into the Establishment must be prepared and ready for reheat with chafing dish and sterno / Gas fuel.</li>
<li>Food and beverage must be contained in your contracted event space only and should not be brought into the lobby or other Establishment public space.</li>

            </ul>
         </div>
     </div>
</body>
</html>