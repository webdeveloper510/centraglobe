<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Billing;
use App\Models\Meeting;
use App\Models\Billingdetail;
use Mpdf\Mpdf;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(\Auth::user()->type == 'owner'){
            $assigned_user = Meeting::all();
            $billing = Billing::first();
            return view('billing.index',compact('billing','assigned_user'));
        }   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function get_user_info(Request $request){
        $event_info = Meeting::where('user_id',$request->user)->get();
        return $event_info;
    }
    public function billing_details(Request $request){
        $validator = \Validator::make(
            $request->all(),
            [
                'user' => 'required',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }
        $event_id = Meeting::where('user_id',$request->user)->first();
        $billingdetails = new Billingdetail();
        $billingdetails['user_id'] = $request->user;
        $billingdetails['event_id'] = $event_id->id;
        $billingdetails['venue_rental'] = serialize($request->billing['venue_rental']);
        $billingdetails['hotel_rooms'] = serialize($request->billing['hotel_rooms']);
        $billingdetails['equipment'] = serialize($request->billing['equipment']);
        $billingdetails['setup'] = serialize($request->billing['setup']);
        $billingdetails['bar'] = serialize($request->billing['gold_2hrs']);
        $billingdetails['special_req'] = serialize($request->billing['special_req']);
        $billingdetails['food'] = serialize($request->billing['classic_brunch']);
        $billingdetails['created_by'] = \Auth::user()->creatorId();
        $billingdetails->save();
        $data['data'] = [
            'billingdetails' => $billingdetails->user_id,
            'hotel_rooms' => unserialize($billingdetails->hotel_rooms),
            'venue_rental' => unserialize($billingdetails->venue_rental),
            'equipment' => unserialize($billingdetails->equipment),
            'setup' => unserialize($billingdetails->setup),
            'bar' => unserialize($billingdetails->bar),
            'special_req' => unserialize($billingdetails->special_req),
            'food' => unserialize($billingdetails->food),
            'deposit'=>$request->deposits,
                'type'=>$event_id->type
        ];
        
        $view = view('billing.view',$data);
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($view);
        return $mpdf->Output();
    }
}
