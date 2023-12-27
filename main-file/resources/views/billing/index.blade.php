@extends('layouts.admin')
@section('page-title')
    {{__('Billing')}}
@endsection
@section('title')
        <div class="page-header-title">
            {{__('Billing')}}
        </div>
@endsection

@section('action-btn')
@endsection
@section('filter')
@endsection
@php
$labels =
    [ 
        'venue_rental' => 'Venue Rental',
        'hotel_rooms'=>'Hotel Rooms',
        'equipment'=>'Tent, Tables, Chairs, AV Equipment',
        'setup' =>'Setup',
        'gold_2hrs'=>'Bar Package',
        'special_req' =>'Special Requests /Other',
        'classic_brunch'=>'Brunch/Lunch/Dinner Package',
    ];
    $users= App\Models\User::where('type','!=','owner')->where('type','!=','super admin')->get();
    $user_name =[];
    $user_id =[];
    foreach($users as $user){
        $user_name[] = $user->name;
        $user_id[] = $user->id;
    }
   
@endphp 
<!-- $labels = ['Venue Rental','Brunch / Lunch / Dinner Package','Bar Package','Hotel Rooms','Tent, Tables, Chairs, AV Equipment','Welcome / Rehearsal / Special Setup','Special Requests / Others
','Total','Sales, Occupancy Tax','Service Charges & Gratuity','Grand Total / Estimated Total','Deposit on File','Balance Due']; -->

@section('content')
<div class= "row">
        <div class = "col-md-12">
            <div class="form-group">
                <label class="form-label">Select User</label>
                <select class="form-select" id = "userinfo" name = "user">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class = "col-md-6">
            <div class="form-group">
                <!-- <label class="form-label">Guest Count :</label> -->
                <span id = "guest_count">Guest Count :</span>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">
            <div class="form-group">
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{__('Description')}} </th>
                        <th>{{__('Cost')}} </th>
                        <th>{{__('Quantity')}} </th>
                        <th>{{__('Notes')}} </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($labels as $key=> $label)
                       
                        <tr>
                            <td>{{ucfirst($label)}}</td>
                            <td>{{$billing->$key}}</td>
                            <td> 
                                <input type = "number" name ="quantity{{$key}}" class= "form-control">
                            </td>

                            <td><input type = "text" name ="notes{{$key}}" class= "form-control"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <button type= "button" class="btn btn-primary" style="float:right">Share</button>
        </div>
    </div>
</div>

@endsection
@push('script-page')
<script>
    $(document).ready(function(){
        $('#userinfo').on('change',function(){
            var user = $(this).val();
            $.ajax({
                url: "{{ route('billing.user_info') }}",
                type: 'POST',
                data: {
                    "user": user,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    console.log(data)
                }
            });  
        });
    });
</script>
@endpush