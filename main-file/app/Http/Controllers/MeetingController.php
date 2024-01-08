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
USE App\Models\Billingdetail;
use DateTime;
use Mpdf\Mpdf;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;


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
            $users              = User::where('created_by', \Auth::user()->creatorId())->get();
            
            // $user->prepend('Select User', 0);
            $attendees_lead    = Lead::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $attendees_lead->prepend('Select Lead', 0);
            $function = Meeting::$function;
            $breakfast = Meeting::$breakfast;
            $lunch = Meeting::$lunch;
            $dinner = Meeting::$dinner;
            $wedding = Meeting::$wedding;
            return view('meeting.create', compact('status','type','breakfast', 'lunch', 'dinner', 'wedding', 'parent','users', 'attendees_lead','function'));
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
       
        $start_date = $_REQUEST['start_date'];
        $end_date = $_REQUEST['end_date'];

        $meeting_overlap = Meeting::where(function ($query) use ($start_date, $end_date) {
            $query->where('start_date', '<=', $end_date)
                ->where('end_date', '>=', $start_date);
        })->exists();

        $blockdate_overlap = Blockdate::where(function ($query) use ($start_date, $end_date) {
            $query->where('start_date', '<=', $end_date)
                ->where('end_date', '>=', $start_date);
        })->exists();

        if ($meeting_overlap || $blockdate_overlap) {
            // echo "Date is blocked!";
            return redirect()->back()->with('success', __('Date is Already booked!'));
        } else 
        {
            // echo "Event Created Successfully ";
        $allPackages = array_merge(
            isset($request->break_package) ? $request->break_package : [],
            isset($request->lunch_package) ? $request->lunch_package : [],
            isset($request->dinner_package) ? $request->dinner_package : [],
            isset($request->wedding_package) ? $request->wedding_package : []
        );
        $packagesString = implode(',', $allPackages);
        if (\Auth::user()->can('Create Meeting')) {
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
                    'start_date'=>'required',
                    'end_date'=>'required',
                    // 'user' => 'required|unique:meetings,user_id',
                ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }
            $meeting                      = new Meeting();
            $meeting['user_id']           =  implode(',', $request->user);
            $meeting['name']              = $request->name;
            $meeting['status']            = $request->status;
            $meeting['start_date']        = $request->start_date;
            $meeting['end_date']          = $request->end_date;
            $meeting['email']              = $request->email;
            $meeting['lead_address']       = $request->lead_address;
            $meeting['parent']             = $request->parent;
            $meeting['parent_id']         = $request->parent_id ?? '0';
            $meeting['company_name']      = $request->company_name;
            $meeting['relationship']       = $request->relationship;
            $meeting['type']               = $request->type;
            $meeting['venue_selection']    = implode(',', $request->venue);
            $meeting['func_package']       = $packagesString;
            $meeting['function']            = implode(',', $request->function); 
            $meeting['guest_count']         = $request->guest_count;
            $meeting['room']                = $request->room;
            $meeting['meal']                = implode(',', $request->meal);
            $meeting['bar']                 = $request->bar;
            $meeting['bar_package']         = $request->bar_package;
            $meeting['spcl_request']        = $request->spcl_request;
            $meeting['alter_name']          = $request->alter_name;
            $meeting['alter_email']         = $request->alter_email;
            $meeting['alter_relationship']  = $request->alter_relationship;
            $meeting['alter_lead_address']  = $request->alter_lead_address;
            $meeting['attendees_lead']      = $request->attendees_lead;
            $meeting['phone']               = $request->phone;
            $meeting['start_time']          = $request->start_time;
            $meeting['end_time']            = $request->end_time;
            $meeting['ad_opts']             = $request->add_opts;
            $meeting['floor_plan']          = $request->uploadedImage;
            $meeting['created_by']        = \Auth::user()->creatorId();
            $meeting->save();
            $Assign_user_phone = User::where('id', $request->user)->first();
            $setting  = Utility::settings(\Auth::user()->creatorId());
            $uArr = [
                // 'meeting_assign_user' => $request->name,
                'meeting_name' => $request->name,
                'meeting_start_date' => $request->start_date,
                'meeting_due_date' => $request->end_date,
                'attendees_user' => $request->attendees_user,
                'attendees_contact' => $request->attendees_contact,
            ];
            $resp = Utility::sendEmailTemplate('meeting_assigned', [$meeting->id => $Assign_user_phone->email], $uArr);
            if (isset($setting['twilio_meeting_create']) && $setting['twilio_meeting_create'] == 1) {
                $uArr = [
                    'meeting_name' => $request->name,
                    'meeting_start_date' => $request->start_date,
                    'meeting_due_date' => $request->end_date,
                    'user_name' => \Auth::user()->name,

                ];
                Utility::send_twilio_msg($Assign_user_phone->phone, 'new_meeting', $uArr);
            }
            if ($request->get('is_check')  == '1') {
                $type = 'meeting';
                $request1 = new Meeting();
                $request1->title = $request->name;
                $request1->start_date = $request->start_date;
                $request1->end_date = $request->end_date;
                Utility::addCalendarData($request1, $type);
            }
            $module = 'New Meeting';
            $webhook =  Utility::webhookSetting($module);
            if ($webhook) {
                $parameter = json_encode($meeting);
                // 1 parameter is  URL , 2 parameter is data , 3 parameter is method
                $status = Utility::WebhookCall($webhook['url'], $parameter, $webhook['method']);
                if ($status != true) {
                    $msg = "Webhook call failed.";
                }
            }
            if (\Auth::user()) {
                return redirect()->back()->with('success', __('Event successfully created!') . ((isset($msg) ? '<br> <span class="text-danger">' . $msg . '</span>' : '')));
            } else {
                return redirect()->back()->with('error', __('Webhook call failed.') . ((isset($msg) ? '<br> <span class="text-danger">' . $msg . '</span>' : '')));
            }
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
        if (\Auth::user()->can('Edit Meeting')) {
            $status            = Meeting::$status;
            $attendees_lead    = Lead::where('created_by', \Auth::user()->creatorId())->get()->pluck('name');
            $users  = User::where('created_by', \Auth::user()->creatorId())->get();
            $function_p = explode(',', $meeting->function);
            $venue_function = explode(',', $meeting->venue_selection);
            $food_package = explode(',', $meeting->func_package);
            $user_id = explode(',',$meeting->user_id);
            // $previous = Meeting::where('id', '<', $meeting->id)->max('id');
            // $next = Meeting::where('id', '>', $meeting->id)->min('id');
            $function = Meeting::$function;
            $breakfast = Meeting::$breakfast;
            $lunch = Meeting::$lunch;
            $dinner = Meeting::$dinner;
            $wedding = Meeting::$wedding;
            return view('meeting.edit', compact('user_id', 'users','food_package','function_p','venue_function','meeting', 'breakfast', 'lunch', 'dinner', 'wedding', 'status', 'function','attendees_lead'))->with('start_date', $meeting->start_date)->with('end_date', $meeting->end_date);
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
        $break_package = $lunch_package = $dinner_package = $wedding_package = '';
        if(isset($_REQUEST['venue'])){
            $venue = implode(',',$_REQUEST['venue']);
        }
        if(isset($_REQUEST['function'])){
            $function = implode(',',$_REQUEST['function']);
        }
        if(isset($_REQUEST['meal'])){
            $meal = implode(',',$_REQUEST['meal']);
        }

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
            $meeting['func_package']       = $packagesArray;
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
            $meeting['ad_opts']             = $request->add_opts;
            $meeting['floor_plan']          = $request->uploadedImage;
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
            return redirect()->back()->with('success', __('Event  Updated.'));
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

            return redirect()->back()->with('success', 'Event ' . $meeting->name . ' Deleted!');
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
        $validator = \Validator::make($request->all(),[
                'start_date' => 'required|date|date_format:Y-m-d',
                'end_date' => 'required|date|date_format:Y-m-d',
                'purpose' => 'required',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }
    
        $get_start_date = $request->input('start_date');
        $get_end_date = $request->input('end_date');

        $overlapping_meetings = Meeting::where(function ($query) use ($get_start_date, $get_end_date) {
            $query->where('start_date', '<=', $get_end_date)
                ->where('end_date', '>=', $get_start_date);
        })->get();

        if ($overlapping_meetings->isNotEmpty()) {
            return redirect()->back()->with('error', 'Event is Already Booked For this date');
        }

        $overlapping_blocked_dates = Blockdate::where(function ($query) use ($get_start_date, $get_end_date) {
            $query->where(function ($q) use ($get_start_date, $get_end_date) {
                $q->where('start_date', '>=', $get_start_date)->where('start_date', '<=', $get_end_date);
            })->orWhere(function ($q) use ($get_start_date, $get_end_date) {
                $q->where('end_date', '>=', $get_start_date)->where('end_date', '<=', $get_end_date);
            })->orWhere(function ($q) use ($get_start_date, $get_end_date) {
                $q->where('start_date', '<', $get_start_date)->where('end_date', '>', $get_end_date);
            });
        })->get();

        if ($overlapping_blocked_dates->isNotEmpty()) {
            return redirect()->back()->with('error', __('Date Already Blocked'));
        } else {
            // echo "block date successful";
            $block = new Blockdate();
            $block['start_date'] = $request->start_date;
            $block['end_date'] = $request->end_date;
            $block['purpose'] = $request->purpose;
            $block['created_by'] = \Auth::user()->creatorId();
            $block->save();
            return redirect()->back()->with('success', __('Date Successfully Blocked'));
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
        $to =  'developerweb6@gmail.com'; 
        $from = 'test@gmail.com'; 
        $subject = "Event Details";
        $message = '';
        $message .= "<strong>Centraverse</strong>";
        $message .= "<p>Hey,Following are the event details :</p>";
        $message .= "<div class='row'>
        <div class='col-sm-12'>
            <div class='card'>
                <div class='card-body table-border-style'>
                    <div class='table-responsive overflow_hidden'>
                        <table class='table align-items-center' style='border: 1px;'>
                            <thead class='thead-light'>
                                <tr>
                                    <th scope='col' >Description</th>
                                    <th scope='col'>Cost</th>
                                </tr>
                            </thead>
                            <tbody>";
                            $message .=  "<tr>
                                <td><label class='ischeck'>Event name:</label></td><td>{$event->name}</td></tr>
                                <tr><td><label class='ischeck'>Start Date:</label></td><td>{$event->start_date}</td></tr>
                                <tr><td><label class='ischeck'>End Date:</label></td><td>{$event->end_date}</td></tr>
                                <tr><td><label class='ischeck'>Guest Count:</label></td><td>{$event->guest_count}</td></tr>
                                <tr><td><label class='ischeck'>Function:</label></td><td>{$event->function}</td></tr>
                                <tr><td><label class='ischeck'>Venue:</label></td><td>{$event->venue_selection}</td></tr>
                                <tr><td><label class='ischeck'>Special Requests:</label></td><td>{$event->spcl_request}</td></tr>
                            </tr>";
                            $message .= "</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>";
        $message .= "<div class='row'>
        <div class='col-sm-12'>
        <div class='card'>
            <img src='".$event->floor_plan."'>
        </div>
        </div>"; 
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
        $headers .= 'Cc: welcome@example.com' . "\r\n"; 
        $headers .= 'Bcc: welcome2@example.com' . "\r\n"; 
        $mail = mail($to, $subject, $message, $headers);
        if($mail){
                return redirect()->back()->with('success', 'Email Sent Successfully');
        }
        else{
                return redirect()->back()->with('error', 'Email Not Sent');
        }
    }
    public function proposal(Meeting $meeting){
        $billingdetail = Billingdetail::where('user_id',$meeting->attendees_lead)->first();
        return view('meeting.proposal',compact('meeting','billingdetail'));
    }
    public function proposalpdf(Request $request){
     
        $meeting = Meeting::where('id',$request->event)->first();
        $billingdetail = Billingdetail::where('user_id',$meeting->attendees_lead)->first();
        $data['image'] = $this->uploadSignature($request->signed);
        $data['billingdetail'] = $billingdetail ;
        $data['meeting'] = $meeting ;
        $pdf = Pdf::loadView('meeting.signed_proposal', $data);
        return $pdf->download('signature.pdf');
    }
    public function uploadSignature($signed)
    {
        $folderPath = public_path('upload/');
          
        $image_parts = explode(";base64,", $signed);
               
        $image_type_aux = explode("image/", $image_parts[0]);
            
        $image_type = $image_type_aux[1];
            
        $image_base64 = base64_decode($image_parts[1]);
            
        $file = $folderPath . uniqid() . '.'.$image_type;
 
        file_put_contents($file, $image_base64);
 
        return $file;
    }
}
