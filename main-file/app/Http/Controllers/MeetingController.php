<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\CommonCase;
use App\Models\Contact;
use App\Models\Lead;
use App\Models\Meeting;
use App\Models\Opportunities;
use App\Models\Plan;
use App\Models\Stream;
use App\Models\Utility;
use App\Models\User;
use App\Models\UserDefualtView;
use Illuminate\Http\Request;
use App\Models\Blockdate;
USE App\Models\Billing;
use DateTime;


class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->can('Manage Meeting')) {
            if (\Auth::user()->type == 'owner') {
                $meetings = Meeting::with('assign_user')->where('created_by', \Auth::user()->creatorId())->get();

                $defualtView         = new UserDefualtView();
                $defualtView->route  = \Request::route()->getName();
                $defualtView->module = 'meeting';
                $defualtView->view   = 'list';
                User::userDefualtView($defualtView);
            } else {
                $meetings = Meeting::with('assign_user')->where('user_id', \Auth::user()->id)->get();

                $defualtView         = new UserDefualtView();
                $defualtView->route  = \Request::route()->getName();
                $defualtView->module = 'meeting';
                $defualtView->view   = 'list';
            }

            return view('meeting.index', compact('meetings'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    public function create($type, $id)
    {
        if (\Auth::user()->can('Create Meeting')) {
            $status            = Meeting::$status;
            $parent            = Meeting::$parent;
            $user              = User::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            
            $user->prepend('Select User', 0);
            $attendees_lead    = Lead::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $attendees_lead->prepend('Select Lead', 0);
            $function = Meeting::$function;
            $breakfast = Meeting::$breakfast;
            $lunch = Meeting::$lunch;
            $dinner = Meeting::$dinner;
            $wedding = Meeting::$wedding;
            return view('meeting.create', compact('status','type','breakfast', 'lunch', 'dinner', 'wedding', 'parent','user', 'attendees_lead','function'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // echo "<pre>";
        // print_r($_REQUEST);
        // die;

        $meal = implode(',', $_REQUEST['meal']);
        $venueString = implode(',', $request->venue);
        $functionString = implode(',', $request->function); 
    
        $allPackages = array_merge(
            isset($request->break_package) ? $request->break_package : [],
            isset($request->lunch_package) ? $request->lunch_package : [],
            isset($request->dinner_package) ? $request->dinner_package : [],
            isset($request->wedding_package) ? $request->wedding_package : []
        );
        $uniquePackages = array_unique($allPackages);
        $packagesString = implode(',', $uniquePackages);
        if (\Auth::user()->can('Create Meeting')) {
            $type = 
            $validator = \Validator::make(
                $request->all(),
                [
                    'name' => 'required|max:120',
                    'start_date' => 'required',
                    'end_date' => 'required',
                    'email' => 'required|email|max:120',
                    'lead_address' => 'required|max:120',
                    'type' => 'required',
                    'venue' => 'required',
                    'function' => 'required|max:120',
                    'guest_count' => 'required', 
                    'start_time' => 'required',
                    'end_time' => 'required',
                ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }
            $meeting                      = new Meeting();
            $meeting['user_id']           = $_REQUEST['user'];
            $meeting['name']              = $request->name;
            $meeting['status']            = $request->status;
            $meeting['start_date']        = $request->start_date;
            $meeting['end_date']          = $request->end_date;
            $meeting['email']              = $request->email;
            $meeting['lead_address']       = $request->lead_address;
            $meeting['parent']             = $request->parent;
            $meeting['parent_id']         = $request->parent_id ?? '0';
            $meeting['company_name']      = $_REQUEST['company_name'];
            $meeting['relationship']       = $request->relationship;
            $meeting['type']               = $request->type;
            $meeting['venue_selection']    = $venueString ;
            $meeting['func_package']       = $packagesString;
            $meeting['function']            = $functionString;
            $meeting['guest_count']         = $request->guest_count;
            $meeting['room']                = $request->room;
            $meeting['meal']                = $meal;
            $meeting['bar']                 = $request->bar;
            $meeting['spcl_request']        = $request->spcl_request;
            $meeting['alter_name']          = $request->alter_name;
            $meeting['alter_email']         = $request->alter_email;
            $meeting['alter_relationship']  = $request->alter_relationship;
            $meeting['alter_lead_address']  = $request->alter_lead_address;
            $meeting['attendees_lead']      = $request->attendees_lead;
            $meeting['phone']               = $request->phone;
            $meeting['start_time']          = $request->start_time;
            $meeting['end_time']            = $request->end_time;
            $meeting['created_by']        = \Auth::user()->creatorId();
            $meeting->save();
            // Stream::create(
            //     [
            //         'user_id' => \Auth::user()->id, 'created_by' => \Auth::user()->creatorId(),
            //         'log_type' => 'created',
            //         'remark' => json_encode(
            //             [
            //                 'owner_name' => \Auth::user()->username,
            //                 'title' => 'meeting',
            //                 'stream_comment' => '',
            //                 'user_name' => $meeting->name,
            //             ]
            //         ),
            //     ]
            // );
            // $Assign_user_phone = User::where('id', $request->user)->first();

            // echo "<pre>";
            // print_r($Assign_user_phone);
            // die;
            // $setting  = Utility::settings(\Auth::user()->creatorId());

            // $uArr = [
            //     // 'meeting_assign_user' => $request->name,
            //     'meeting_name' => $request->name,
            //     'meeting_start_date' => $request->start_date,
            //     'meeting_due_date' => $request->end_date,
            //     'attendees_user' => $request->attendees_user,
            //     'attendees_contact' => $request->attendees_contact,
            // ];
            // $resp = Utility::sendEmailTemplate('meeting_assigned', [$meeting->id => $Assign_user_phone->email], $uArr);
            // if (isset($setting['twilio_meeting_create']) && $setting['twilio_meeting_create'] == 1) {
            // //  $msg = "New Meeting" . " " . $request->name . " created by " . \Auth::user()->name . '.';
            //     $uArr = [
            //         'meeting_name' => $request->name,
            //         'meeting_start_date' => $request->start_date,
            //         'meeting_due_date' => $request->end_date,
            //         'user_name' => \Auth::user()->name,

            //     ];
            //     Utility::send_twilio_msg($Assign_user_phone->phone, 'new_meeting', $uArr);
            // }
            // if ($request->get('is_check')  == '1') {
            //     $type = 'meeting';
            //     $request1 = new Meeting();
            //     $request1->title = $request->name;
            //     $request1->start_date = $request->start_date;
            //     $request1->end_date = $request->end_date;
            //     Utility::addCalendarData($request1, $type);
            // }
            //webhook
            // $module = 'New Meeting';
            // $webhook =  Utility::webhookSetting($module);
            // if ($webhook) {
            //     $parameter = json_encode($meeting);
            //     // 1 parameter is  URL , 2 parameter is data , 3 parameter is method
            //     $status = Utility::WebhookCall($webhook['url'], $parameter, $webhook['method']);
            //     if ($status != true) {
            //         $msg = "Webhook call failed.";
            //     }
            // }
            if (\Auth::user()) {
                return redirect()->back()->with('success', __('Meeting successfully created!') . ((isset($msg) ? '<br> <span class="text-danger">' . $msg . '</span>' : '')));
            } else {
                return redirect()->back()->with('error', __('Webhook call failed.') . ((isset($msg) ? '<br> <span class="text-danger">' . $msg . '</span>' : '')));
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Meeting $meeting
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    {
        if (\Auth::user()->can('Show Meeting')) {
            $status = Meeting::$status;
            return view('meeting.view', compact('meeting', 'status'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Meeting $meeting
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {

        $function_p = explode(',', $meeting->function);
        $venue_function = explode(',', $meeting->venue_selection);
        $food_package = explode(',', $meeting->food_package);
        $lead_address = $meeting->lead_address;
        if (\Auth::user()->can('Edit Meeting')) {
            $status            = Meeting::$status;
            $attendees_contact = Contact::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $attendees_contact->prepend('--', 0);
            $attendees_lead    = Lead::where('created_by', \Auth::user()->creatorId())->get()->pluck('name');
            // $attendees_lead->prepend('--', 0);
            $user              = User::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            // $user->prepend('Select User', 0);
            $users = User::pluck('name', 'id');
            $user_id = $meeting->user_id;
            $account_name = Account::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $previous = Meeting::where('id', '<', $meeting->id)->max('id');
            $next = Meeting::where('id', '>', $meeting->id)->min('id');
            $function = Meeting::$function;
            $breakfast = Meeting::$breakfast;
            $lunch = Meeting::$lunch;
            $dinner = Meeting::$dinner;
            $wedding = Meeting::$wedding;
            return view('meeting.edit', compact('user_id', 'users','lead_address','food_package','function_p','venue_function','meeting', 'account_name', 'breakfast', 'lunch', 'dinner', 'wedding','attendees_contact', 'status', 'user', 'function','attendees_lead', 'previous', 'next'))->with('start_date', $meeting->start_date)->with('end_date', $meeting->end_date);
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Meeting $meeting
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meeting $meeting)
    {      
        // echo "<pre>";
        // print_r($meeting);
        // die;
        $break_package = $lunch_package = $dinner_package = $wedding_package = '';
        if(isset($_REQUEST['venue'])){
            $venue = implode(',',$_REQUEST['venue']);
            // print_r($venue);
        }
        if(isset($_REQUEST['function'])){
            $function = implode(',',$_REQUEST['function']);
            // print_r($function);
        }
        if(isset($_REQUEST['meal'])){
            $meal = implode(',',$_REQUEST['meal']);
            // print_r($function);
        }

        // $break_package = implode(',', $_REQUEST['break_package']);
        // $lunch_package = implode(',', $_REQUEST['lunch_package']);
        // $dinner_package = implode(',', $_REQUEST['dinner_package']);
        // $wedding_package = implode(',', $_REQUEST['wedding_package']);
        // $packagesArray = implode(',', array($break_package, $lunch_package, $dinner_package, $wedding_package));
        // print_r($packagesArray);
        if (isset($_REQUEST['break_package']))
        {
            $break_package = implode(',', $_REQUEST['break_package']);
        }
        if (isset($_REQUEST['lunch_package']))
        {
            $lunch_package = implode(',', $_REQUEST['lunch_package']);
        }
        if (isset($_REQUEST['dinner_package']))
        {
            $dinner_package = implode(',', $_REQUEST['dinner_package']);
        }
        if (isset($_REQUEST['wedding_package']))
        {
            $wedding_package = implode(',', $_REQUEST['wedding_package']);
        }        
            $packagesArray = implode(',', array($break_package, $lunch_package, $dinner_package, $wedding_package));
            // print_r($packagesArray);
        // die;            
            
        if (\Auth::user()->can('Edit Meeting')) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'name' => 'required|max:120',
                    'start_date' => 'required',
                    'end_date' => 'required',
                    'email' => 'required|email|max:120',
                    'lead_address' => 'required|max:120',
                    'type' => 'required',
                    'venue' => 'required|max:120',
                    'function' => 'required|max:120',
                    'guest_count' => 'required', 
                    'start_time' => 'required',
                    'end_time' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            
            $meeting['user_id']           = $meeting->user_id;
            $meeting['name']              = $request->name;
            $meeting['status']            = $request->status;
            $meeting['start_date']        = $request->start_date;
            $meeting['end_date']          = $request->end_date;
            $meeting['relationship']       = $request->relationship;
            $meeting['type']               = $request->type;
            $meeting['venue_selection']    = $request->venue_selection;
            $meeting['email']              = $request->email;
            $meeting['lead_address']      = $request->lead_address;
            $meeting['function']           = $function;
            $meeting['venue_selection']    = $venue ;
            $meeting['food_package']       = $packagesArray;
            $meeting['status']             = $request->status;
            $meeting['guest_count']        = $request->guest_count;
            $meeting['room']                = $request->room;
            $meeting['meal']                = $meal;
            $meeting['bar']                 = $request->bar;
            $meeting['spcl_request']        = $request->spcl_request;
            $meeting['alter_name']          = $request->alter_name;
            $meeting['alter_email']         = $request->alter_email;
            $meeting['alter_relationship']  = $request->alter_relationship;
            $meeting['alter_lead_address']  = $request->alter_lead_address;
            $meeting['attendees_lead']        = $request->attendees_lead;
            $meeting['phone']               = $request->phone;
            $meeting['start_time']        = $request->start_time;
            $meeting['end_time']       = $request->end_time;
            $meeting['created_by']        = \Auth::user()->creatorId();
            $meeting->update();
            // Stream::create(
            //     [
            //         'user_id' => \Auth::user()->id, 'created_by' => \Auth::user()->creatorId(),
            //         'log_type' => 'updated',
            //         'remark' => json_encode(
            //             [
            //                 'owner_name' => \Auth::user()->username,
            //                 'title' => 'meeting',
            //                 'stream_comment' => '',
            //                 'user_name' => $meeting->name,
            //             ]
            //         ),
            //     ]
            // );
            return redirect()->back()->with('success', __('Meeting  Updated.'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Meeting $meeting
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        if (\Auth::user()->can('Delete Meeting')) {
            $meeting->delete();

            return redirect()->back()->with('success', 'Meeting ' . $meeting->name . ' Deleted!');
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    public function grid()
    {
        $meetings = Meeting::where('created_by', \Auth::user()->creatorId())->get();

        $defualtView         = new UserDefualtView();
        $defualtView->route  = \Request::route()->getName();
        $defualtView->module = 'meeting';
        $defualtView->view   = 'grid';
        User::userDefualtView($defualtView);
        return view('meeting.grid', compact('meetings'));
    }

    public function getparent(Request $request)
    {
        if ($request->parent == 'account') {
            $parent = Account::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id')->toArray();
        } elseif ($request->parent == 'lead') {
            $parent = Lead::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id')->toArray();
        } elseif ($request->parent == 'contact') {
            $parent = Contact::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id')->toArray();
        } elseif ($request->parent == 'opportunities') {
            $parent = Opportunities::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id')->toArray();
        } elseif ($request->parent == 'case') {
            $parent = CommonCase::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id')->toArray();
        } else {
            $parent = '';
        }

        return response()->json($parent);
    }

    public function get_meeting_data(Request $request)
    {
        $arrayJson = [];

        if ($request->get('calender_type') == 'goggle_calender') {
            $type = 'meeting';
            $arrayJson =  Utility::getCalendarData($type);
        } else {
            $data = Meeting::where('created_by', \Auth::user()->creatorId())->get();
            foreach ($data as $val) {
                $end_date = date_create($val->end_date);
                date_add($end_date, date_interval_create_from_date_string("1 days"));
                $arrayJson[] = [
                    "id" => $val->id,
                    "title" => $val->name,
                    "start" => $val->start_date,
                    "end" => date_format($end_date, "Y-m-d H:i:s"),
                    "className" => $val->color,
                    "url" => route('meeting.show', $val['id']),
                    "textColor" => '#FFF',
                    "allDay" => true,
                ];
            }
        }

        return $arrayJson;
    }
    public function get_lead_data(Request $request){
        $lead = Lead::where('id',$request->venue)->first();
        return $lead;
    }
    public function block_date(Request $request)
    {
        if (\Auth::user()->can('Create Meeting')) {
            $blocked_date = Blockdate::where('start_date',$request->start_date)
                ->orWhere('start_date',$request->end_date)->orWhere('end_date',$request->end_date)
                ->orWhere('end_date',$request->start_date)->get()->toArray();
            if (!empty($blocked_date)){
                return redirect()->back()->with('error', __('Date already Blocked'));
            }
            else
            {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'start_date' => 'required',
                        'end_date' => 'required',
                        'purpose' => 'required',
                    ]);
                if ($validator->fails()) {
                    $messages = $validator->getMessageBag();
                    return redirect()->back()->with('error', $messages->first());
                } 
                $block                      = new Blockdate();
                $block['start_date']        = $request->start_date;
                $block['end_date']          = $request->end_date;
                $block['purpose']           = $request->purpose;
                $block['created_by']        = \Auth::user()->creatorId();
                $block->save();
                return redirect()->back()->with('success', __('Date Blocked'));
            }
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }
    public function unblock_date(Request $request)
    {
        $booked = Blockdate::where('start_date',$request->start)->orWhere('end_date',$request->end_date)
        ->orWhere('start_date',$request->end_date)
        ->orWhere('end_date',$request->start)->get();
        foreach($booked as $val){
            Blockdate::where('id',$val->id)->delete();
        }  
    }
    public function view_floor(Meeting $meeting){
      
        return view('floor_plan.view', compact('meeting'));
    }
    public function get_event_info(Request $request){
        $email = $request->email;
        $event = Meeting::where('email', $email)->first();
        echo "<pre>";print_r($event);
        // $billing = Billing::first();
        // $labels = [ 'venue_rental' => 'Venue Rental',
        //             'hotel_rooms'=>'Hotel Rooms',
        //             'equipment'=>'Requirements',
        //             'setup' =>'Setup',
        //             'gold_2hrs'=>'Bar Package',
        //             'special_req' =>'Special Request /Other',
        //             'classic_brunch'=>'Brunch/Lunch/Dinner Package',
        //  ];
        // $to = $request->email;
        $to = "sonali@codenomad.net"; 
        $from = 'harjot@codenomad.net'; 
    //     $fromName = 'Developer'; 
        $subject = "Event Details";
        $message = '';
        $message .= "<strong>Centraverse</strong>";
        $message .= "<p>Hey,Following are the event details </p>";
        $message .= "<div class='row'>
        <div class='col-sm-12'>
            <div class='card'>
                <div class='card-body table-border-style'>
                    <div class='table-responsive overflow_hidden'>
                        <table class='table datatable align-items-center'>
                            <thead class='thead-light'>
                                <tr>
                                    <th scope='col' >Description</th>
                                    <th scope='col'>Cost</th>
                                </tr>
                            </thead>
                            <tbody>";
                            $message .=  "<tr>
                                <td><label class='ischeck'>Event name:</label>{$event->name}</td>
                                <td><label class='ischeck'>Start Date:</label>{$event->start_date}</td>
                                <td><label class='ischeck'>End Date:</label>{$event->end_date}</td>
                                <td><label class='ischeck'>Guest Count:</label>{$event->guest_count}</td>
                                <td><label class='ischeck'>Function:</label>{$event->function}</td>
                                <td><label class='ischeck'>Venue:</label>{$event->venue_selection}</td>
                                <td><label class='ischeck'>Special Requests:</label>{$event->spcl_request}</td>
                            </tr>";
                            $message .= "</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>"; 
        // Set content-type header for sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
        // $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
        $headers .= 'Cc: welcome@example.com' . "\r\n"; 
        $headers .= 'Bcc: welcome2@example.com' . "\r\n"; 
        // Send email 
        if(@mail($to, $subject, $message, $headers)){ 
            return redirect()->back()->with('success', 'Email Sent successfully');
        }else{ 
            return redirect()->back()->with('success', 'Email Sent successfully');
        }
    }
}
