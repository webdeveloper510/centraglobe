<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Billing;
use App\Models\Meeting;
use App\Models\Lead;
use App\Models\Billingdetail;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPdfEmail;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(\Auth::user()->type == 'owner'){
            $billing = Billingdetail::all();
            return view('billing.index',compact('billing'));
        }   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(\Auth::user()->type == 'owner'){
            $assigned_user = Lead::all();
            $billing = Billing::first();
            return view('billing.create',compact('billing','assigned_user'));
        }   
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
    public function edit(Billingdetail $billing)
    {
            $assigned_user = Lead::all();
            return view('billing.edit',compact('billing','assigned_user'));
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
        $billing = Billingdetail::find($id);
        $billing->delete();
        return redirect()->back()->with('success', 'Bill Deleted!');
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
        $billingdetails = new Billingdetail();
        $billingdetails['user_id'] = $request->user;
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
        ];
        
        $view = view('billing.view',$data);
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($view);
        $filename = 'billing_summary-' . time() . '.pdf';
        $destinationFolder = public_path('/assets/billing_pdf/');
        $filePath = $destinationFolder . $filename;
        $mpdf->Output($filePath , \Mpdf\Output\Destination::FILE);
        return $mpdf->Output();
        // $subject = 'Billing Summary';
        // $message = 'These are the billing details:';
        
        // // File to be attached
        // $fileContent = file_get_contents($filePath);
        // $encodedContent = chunk_split(base64_encode($fileContent));
        
        // $headers = "From: test@gmail.com\r\n";
        // $headers .= "MIME-Version: 1.0\r\n";
        // $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";
        
        // $body = "--boundary\r\n";
        // $body .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
        // $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        // $body .= "{$message}\r\n\r\n";
        // $body .= "--boundary\r\n";
        // $body .= "Content-Type: application/pdf; name=\"{$filename}\"\r\n";
        // $body .= "Content-Disposition: attachment; filename=\"{$filename}\"\r\n";
        // $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
        // $body .= "{$encodedContent}\r\n--boundary--";
        // $mail = mail($to,'Billing Details', $body, $headers);
        // if($mail){
        //      return redirect()->back()->with('success', 'Email Sent Successfully');
        // }
        // else{
        //       return redirect()->back()->with('error', 'Email Not Sent');
        // }
      

// Clean up: Delete the temporary PDF file after sending
// unlink($filePath);
    }
}