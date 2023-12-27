<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountIndustry;
use App\Models\AccountType;
use App\Models\Campaign;
use App\Models\Contact;
use App\Models\Document;
use App\Models\Lead;
use App\Models\LeadSource;
use App\Models\Plan;
use App\Models\Stream;
use App\Models\Task;
use App\Models\Utility;
use App\Models\User;
use App\Models\UserDefualtView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            if (\Auth::user()->can('Manage Lead')) {
                if(\Auth::user()->type == 'owner'){
                $leads = Lead::with('accounts','assign_user')->where('created_by', \Auth::user()->creatorId())->get();
                $defualtView         = new UserDefualtView();
                $defualtView->route  = \Request::route()->getName();
                $defualtView->module = 'lead';
                $defualtView->view   = 'list';
                User::userDefualtView($defualtView);
                }
                else{
                $leads = Lead::with('accounts','assign_user')->where('user_id', \Auth::user()->id)->get();
                $defualtView         = new UserDefualtView();
                $defualtView->route  = \Request::route()->getName();
                $defualtView->module = 'lead';
                $defualtView->view   = 'list';
                }
                return view('lead.index', compact('leads'));
            } else {
                return redirect()->back()->with('error', 'permission Denied');
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type, $id)
    {
        if (\Auth::user()->can('Create Lead')) {
            $user       = User::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $user->prepend('--', 0);
            $leadsource = LeadSource::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $campaign   = Campaign::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $campaign->prepend('--', 0);
            $industry   = AccountIndustry::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $account    = Account::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $account->prepend('--', 0);
            $status     = Lead::$status;
            $function = Lead::$function;

            return view('lead.create', compact('status', 'leadsource', 'user', 'account', 'industry', 'campaign','function', 'id'));
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
        // $user = User::where('id',$request->user)->get();

        // echo "" $user->username;
        // print_r($user);
        // die;

        if (\Auth::user()->can('Create Lead')) {

            $validator = \Validator::make(
                $request->all(),
                [
                    'name' => 'required|max:120',
                    'email' => 'required|unique:leads,email',
                    'venue' => 'required',
                    'guest_count' => 'required|numeric',
                    'status' => 'required',
                    'start_date'=>'required',
                    'end_date'=>'required',
                    'function' => 'required'
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $lead                       = new Lead();
            $lead['user_id']            = Auth::user()->id;
            $lead['name']               = $request->name;
            $lead['assigned_user']      = $request->user;
            $lead['account']            = $request->account;
            $lead['email']              = $request->email;
            $lead['phone']              = $request->phone;
            $lead['title']              = $request->title;
            $lead['lead_address']       = $request->lead_address;
            $lead['company_name']       = $request->company_name;
            $lead['relationship']       = $request->relationship;
            $lead['start_date']         = $request->start_date;
            $lead['end_date']           = $request->end_date;
            $lead['type']               = $request->type;
            $lead['venue_selection']    = implode(',',$request->venue);
            $lead['function']           = implode(',',$request->function);
            $lead['status']             = $request->status;
            $lead['guest_count']        = $request->guest_count;
            $lead['description']        = $request->description;
            $lead['created_by']         = \Auth::user()->creatorId();
            $lead->save();
            Stream::create(
                [
                    'user_id' => \Auth::user()->id, 'created_by' => \Auth::user()->creatorId(),
                    'log_type' => 'created',
                    'remark' => json_encode(
                        [
                            'owner_name' => \Auth::user()->username,
                            'title' => 'lead',
                            'stream_comment' => '',
                            'user_name' => $lead->name,
                        ]
                    ),
                ]
            );
            $uArr = [
                'lead_name' => $lead->name,
                'lead_email' => $lead->email,

            ];
            $resp = Utility::sendEmailTemplate('lead_assign', [$lead->id => $lead->email], $uArr);

            //webhook
            $module = 'New Lead';
            $webhook =  Utility::webhookSetting($module);
            if ($webhook) {
                $parameter = json_encode($lead);
                // 1 parameter is  URL , 2 parameter is data , 3 parameter is method
                $status = Utility::WebhookCall($webhook['url'], $parameter, $webhook['method']);
                if ($status != true) {
                    $msg = "Webhook call failed.";
                }
            }
            
            $Assign_user_phone = User::where('id', $request->user)->first();
            $setting  = Utility::settings(\Auth::user()->creatorId());
            $uArr = [
                'lead_name' => $lead->name,
                'lead_email' => $lead->email,
                // 'lead_assign_user' => $Assign_user_phone->name,
            ];
            // $resp = Utility::sendEmailTemplate('lead_assigned', [$lead->id => $Assign_user_phone->email], $uArr);
            if (isset($setting['twilio_lead_create']) && $setting['twilio_lead_create'] == 1) {
                //$msg = __("New Lead created by") . ' ' . \Auth::user()->name . '.';
                $uArr = [
                    // 'company_name'  => $lead->name,
                    'lead_email' => $lead->email,
                    'lead_name' => $lead->name
                ];
                Utility::send_twilio_msg('+919882240722', 'new_lead', $uArr);
                
            }
            if (Auth::user()) {
                return redirect()->back()->with('success', __('Lead created!') . ((isset($msg) ? '<br> <span class="text-danger">' . $msg . '</span>' : '')));
            } else {
                return redirect()->back()->with('error', __('Webhook call failed.') . ((isset($msg) ? '<br> <span class="text-danger">' . $msg . '</span>' : '')));
            }
            return redirect()->back()->with('success', __('Lead Created.'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Lead $lead
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {

        if (\Auth::user()->can('Show Lead')) {
            return view('lead.view', compact('lead'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Lead $lead
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        // echo "<pre>";
        // print_r($lead);
        // die;
        // $venue_function = $lead->function;
        $venue_function = explode(',', $lead->venue_selection);
        $function_package =  explode(',', $lead->function);
        if (\Auth::user()->can('Edit Lead')) {
            $status   = Lead::$status;
            $source   = LeadSource::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $user     = User::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');             
            $leadUserId = $lead->assigned_user;
            $user->prepend('--', 0);
            $account  = Account::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $account->prepend('--', 0);
            $industry = AccountIndustry::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $parent   = 'lead';
            $tasks    = Task::where('parent', $parent)->where('parent_id', $lead->id)->get();
            $log_type = 'lead comment';
            $streams  = Stream::where('log_type', $log_type)->get();
            $campaign = Campaign::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $campaign->prepend('--', 0);
            // get previous user id
            $previous = Lead::where('id', '<', $lead->id)->max('id');
            // get next user id
            $next = Lead::where('id', '>', $lead->id)->min('id');
            $function = Lead::$function;
            return view('lead.edit', compact('leadUserId','venue_function','function_package','lead', 'account', 'user', 'source', 'industry', 'status', 'tasks', 'streams', 'campaign', 'previous', 'next','function'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Lead $lead
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        // echo "<pre>";
        // print_r($_REQUEST);
        $venue_function = implode(',',$_REQUEST['venue']);
        // print_r($venue_function);
        $function = implode(',',$_REQUEST['function']);
        // print_r($function);
        // die;
        if (\Auth::user()->can('Edit Lead')) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'name' => 'required|max:120',
                    'email' => 'required|email',
                    'guest_count' => 'required|numeric',
                    'status' => 'required',
                    'start_date'=>'required',
                    'end_date'=>'required',
                    'venue'=>'required',
                    'function'=>'required','user'=>'required'
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $lead['user_id']            = $request->user;
            $lead['name']               = $request->name;
            $lead['account']            = $request->account;
            $lead['email']              = $request->email;
            $lead['phone']              = $request->phone;
            $lead['title']              = $request->title;
            $lead['lead_address']       = $request->lead_address;
            $lead['company_name']       = $request->company_name;
            $lead['relationship']       = $request->relationship;
            $lead['start_date']         = $request->start_date;
            $lead['end_date']           = $request->end_date;
            $lead['type']               = $request->type;
            $lead['venue_selection']    = $venue_function;
            $lead['function']           = $function;
            $lead['status']             = $request->status;
            $lead['guest_count']        = $request->guest_count;
            $lead['description']        = $request->description;
            $lead['created_by']         = \Auth::user()->creatorId();
            $lead->update();

            Stream::create(
                [
                    'user_id' => \Auth::user()->id, 'created_by' => \Auth::user()->creatorId(),
                    'log_type' => 'updated',
                    'remark' => json_encode(
                        [
                            'owner_name' => \Auth::user()->username,
                            'title' => 'lead',
                            'stream_comment' => '',
                            'user_name' => $lead->name,
                        ]
                    ),
                ]
            );

            return redirect()->back()->with('success', __('Lead  Updated.'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Lead $lead
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        if (\Auth::user()->can('Delete Lead')) {
            $lead->delete();

            return redirect()->back()->with('success', __('Lead  Deleted.'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    public function grid()
    {
        $leads   = Lead::where('created_by', '=', \Auth::user()->creatorId())->get();
        $statuss = Lead::where('created_by', '=', \Auth::user()->creatorId())->get();

        // if($leads->isNotEmpty())
        // {
        //     $users = user::where('id', $leads[0]->user_id)->get();
        // }

        $defualtView         = new UserDefualtView();
        $defualtView->route  = \Request::route()->getName();
        $defualtView->module = 'lead';
        $defualtView->view   = 'kanban';
        User::userDefualtView($defualtView);
        // if($leads->isEmpty())
        // {
        //     return view('lead.grid', compact( 'statuss'));
        // }
        // else
        // {
        //      return view('lead.grid', compact('leads', 'statuss','users'));
        // }
        return view('lead.grid', compact('leads', 'statuss'));
    }

    public function changeorder(Request $request)
    {
        $post   = $request->all();
        $lead   = Lead::find($post['lead_id']);
        $status = Lead::where('status', $post['status_id'])->get();


        if (!empty($status)) {
            $lead->status = $post['status_id'];
            $lead->save();
        }

        foreach ($post['order'] as $key => $item) {
            $order         = Lead::find($item);
            $order->status = $post['status_id'];
            $order->save();
        }
    }

    public function showConvertToAccount($id)
    {
        if (\Auth::user()->type == 'owner') {
            $lead        = Lead::findOrFail($id);
            $accountype  = accountType::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $industry    = accountIndustry::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $user        = User::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $document_id = Document::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('lead.convert', compact('lead', 'accountype', 'industry', 'user', 'document_id'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function convertToAccount($id, Request $request)
    {
        if (\Auth::user()->type == 'owner') {
            $lead = Lead::findOrFail($id);
            $usr  = \Auth::user();

            $validator = \Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:accounts,email',
                    'shipping_postalcode' => 'required',
                    'lead_postalcode' => 'required',
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $account                        = new account();
            $account['user_id']             = $request->user;
            $account['document_id']         = $request->document_id;
            $account['name']                = $request->name;
            $account['email']               = $request->email;
            $account['phone']               = $request->phone;
            $account['website']             = $request->website;
            $account['billing_address']     = $request->lead_address;
            $account['billing_city']        = $request->lead_city;
            $account['billing_state']       = $request->lead_state;
            $account['billing_country']     = $request->lead_country;
            $account['billing_postalcode']  = $request->lead_postalcode;
            $account['shipping_address']    = $request->shipping_address;
            $account['shipping_city']       = $request->shipping_city;
            $account['shipping_state']      = $request->shipping_state;
            $account['shipping_country']    = $request->shipping_country;
            $account['shipping_postalcode'] = $request->shipping_postalcode;
            $account['type']                = $request->type;
            $account['industry']            = $request->industry;
            $account['description']         = $request->description;
            $account['created_by']          = \Auth::user()->creatorId();
            $account->save();
            // end create deal

            // Update is_converted field as deal_id
            $lead->is_converted = $account->id;
            $lead->save();

            return redirect()->back()->with('success', __('Lead converted.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
