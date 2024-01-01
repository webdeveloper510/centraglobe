<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\Meeting;
use App\Models\Task;
use App\Models\Utility;
use App\Models\Blockdate;
use App\Models\User;

use Illuminate\Http\Request;

class CalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transdate = date('Y-m-d', time());
        $blockeddate = Blockdate::all();
   
        if(\Auth::user()->type == 'owner'){
            $calls    = Call::where('created_by', \Auth::user()->creatorId())->get();
            $meetings = Meeting::where('created_by', \Auth::user()->creatorId())->get();         
            $tasks    = Task::where('created_by', \Auth::user()->creatorId())->get();            
        }
        else
        {
            $calls    = Call::where('user_id', \Auth::user()->id)->get();
            $meetings = Meeting::where('user_id', \Auth::user()->id)->get();            
            $tasks    = Task::where('user_id', \Auth::user()->id)->get();
        }
        return view('calendar.index', compact('transdate','blockeddate'));
    }    

    // public function index()
    // {
    //     $transdate = date('Y-m-d', time());
    //     $blockeddate = Blockdate::all();               
    //     return view('calendar.index', compact('transdate','blockeddate'));
    // }  


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function calendar(){

    }

    // public function get_data(Request $request){
        
    //         $arrMeeting = [];
    //         $arrTask    = [];
    //         $arrCall    = [];
    //         $arrblock   = [];
            
    //         if($request->get('calender_type') == 'goggle_calender')
    //         {
    //             if($type ='task'){
    //                 $arrTask =  Utility::getCalendarData($type);
    //         }

    //         if($type ='meeting'){
    //         $arrMeeting =  Utility::getCalendarData($type);
    //         }

    //         if($type = 'call'){
    //         $arrCall =  Utility::getCalendarData($type);
    //         }

    //          $arrayJson = array_merge($arrCall, $arrMeeting, $arrTask);

    //     }else{

    //         $arrMeeting = [];
    //         $arrTask    = [];
    //         $arrCall    = [];

    //         if(\Auth::user()->type == 'owner'){
    //             $meetings = Meeting::where('created_by', \Auth::user()->creatorId())->get();
    //             $blockeddate = Blockdate::all();
    //         }
    //         else
    //         {
    //             $meetings = Meeting::where('user_id', \Auth::user()->id)->get();
    //             $blockeddate = Blockdate::all();
    //         }

    //             foreach($meetings as $val)
    //             {                   
    //                 $end_date=date_create($val->end_date);
    //                 // date_add($end_date,date_interval_create_from_date_string("1 day"));
    //                 $arrMeeting[] = [
    //                     "id"=> $val->id,
    //                     "title" => $val->name,
    //                     "start" => $val->start_date,
    //                     "end" => date_format($end_date,"Y-m-d"),
    //                     "className" => $val->color,
    //                     "textColor" => '#fff',
    //                     "url" => route('meeting.show', $val['id']),
    //                     "allDay" => true,
    //                 ];
    //             }
    //             foreach($blockeddate as $val)
    //             {
    //                 $end_date=date_create($val->end_date);
    //                 // date_add($end_date,date_interval_create_from_date_string("1 day"));
    //                 $arrblock[] = [
    //                     "id"=> $val->id,
    //                     "title" => $val->purpose,
    //                     "start" => $val->start_date,
    //                     "end" => date_format($end_date,"Y-m-d"),
    //                     "className" => $val->color,
    //                     "textColor" => '#000',
    //                     "allDay" => true,
    //                     "display" =>'background',
    //                 ];
    //             }                
    //                 $arrayJson = array_merge($arrMeeting,$arrblock);
    //             }
    //             return $arrayJson;
    // }
    public function get_data(Request $request){

        $arrMeeting = [];
        $arrTask    = [];
        $arrCall    = [];
        $arrblock   = [];
    
        if($request->get('calender_type') == 'goggle_calender') {
            if($type ='task'){
                $arrTask =  Utility::getCalendarData($type);
            }
    
            if($type ='meeting'){
                $arrMeeting =  Utility::getCalendarData($type);
            }
    
            if($type = 'call'){
                $arrCall =  Utility::getCalendarData($type);
            }
    
            $arrayJson = array_merge($arrCall, $arrMeeting, $arrTask);
    
        } else {
    
            $arrMeeting = [];
            $arrTask    = [];
            $arrCall    = [];
            $arrblock   = [];
    
            $meetings = Meeting::all();
            $blockeddate = Blockdate::all();
    
            foreach($meetings as $val) {                   
                $end_date=date_create($val->end_date);

                $blockingUser = $val->user ?? null;
                $blockingUserName = $blockingUser ? $blockingUser->name : 'Unknown User';

                $arrMeeting[] = [
                    "id"=> $val->id,
                    "title" => $val->name,
                    "start" => $val->start_date,
                    "end" => date_format($end_date,"Y-m-d"),
                    "className" => $val->color,
                    "textColor" => '#fff',
                    "url" => route('meeting.show', $val['id']),
                    "allDay" => true,
                    "blocked_by" => $blockingUserName, 
                ];
            }
    
            foreach($blockeddate as $val) {
                
                $blockingUser = $val->user ?? null;
                $blockingUserName = $blockingUser ? $blockingUser->name : 'Unknown User';
                
                // $end_date = date_create($val->end_date);
                $expireDate = date('Y-m-d', strtotime($val->end_date. ' + 1 days'));
                $arrblock[] = [
                    "id"=> $val->id,
                    "title" => $val->purpose,
                    "start" => $val->start_date,
                    "end" => $expireDate,
                    "className" => $val->color,
                    "textColor" => '#000',
                    "allDay" => true,
                    "display" =>'background',
                    "blocked_by" => $blockingUserName, 
                ];
            }                
            
            $arrayJson = array_merge($arrMeeting, $arrblock);
        }               
          
    
        return $arrayJson;
    }
    
    
}
