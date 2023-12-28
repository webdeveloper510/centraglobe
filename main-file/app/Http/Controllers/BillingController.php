<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Billing;
use App\Models\Meeting;
use App\Models\Billingdetail;

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
        // $event_id = Meeting::where('user_id',$request->user)->pluck('id')->first();
        // $billingdetails = new Billingdetail();
        // $billingdetails['user_id'] = $request->user;
        // $billingdetails['event_id'] = $event_id;
        // $billingdetails['venue_rental'] = $request->user;
        // $billingdetails['hotel_rooms'] = $request->user;
        // $billingdetails['equipment'] = $request->user;
        // $billingdetails['setup'] = $request->user;
        // $billingdetails['bar'] = $request->user;
        // $billingdetails['special_req'] = $request->user;
        // $billingdetails['food'] = $request->user;
        // echo "<pre>";
        // $data = serialize($request->billing); 
        // $dataa = unserialize($data); 
        // print_r($data);
        // print_r($dataa);
    }
}
