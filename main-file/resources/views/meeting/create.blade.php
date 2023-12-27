@extends('layouts.admin')
@section('page-title')
    {{ __('Event Create') }}
@endsection
@section('title')
    {{ __('Create Event') }}
@endsection
@php
    $plansettings = App\Models\Utility::plansettings();
    $setting = App\Models\Utility::settings();
    $type_arr= explode(',',$setting['event_type']);
    $venue = explode(',',$setting['venue']);
    $meal = ['Formal Plated' ,'Buffet Style' , 'Family Style'];
    $bar = ['Open Bar', 'Cash Bar', 'Package Choice'];
    $platinum = ['Platinum - 4 Hours', 'Platinum - 3 Hours', 'Platinum - 2 Hours'];
    $gold = ['Gold - 4 Hours', 'Gold - 3 Hours', 'Gold - 2 Hours'];
    $silver = ['Silver - 4 Hours', 'Silver - 3 Hours', 'Silver - 2 Hours'];
    $beer = ['Beer & Wine - 4 Hours', 'Beer & Wine - 3 Hours', 'Beer & Wine - 2 Hours'];
  
@endphp
@section('content')
<style>
.floorimages{
    height: 183px;
    width: 256px;
    margin: 26px;
}

/* input[type="radio"] {
    display: none;
} */
/* .floor-radio-buttons input[type="radio"] {
    display: none;
} */

.selected-image {
    border: 2px solid #3498db; 
    box-shadow: 0 0 10px rgba(52, 152, 219, 0.5); 
    transition: border-color 0.3s, box-shadow 0.3s; 
}

.selected-image:hover {
    border-color: #2980b9; 
    box-shadow: 0 0 15px rgba(41, 128, 185, 0.8);
}

.zoom {
  /* padding: 50px; */
  background-color: none;
  transition: transform .2s;
  /* width: 200px;
  height: 200px; */
  /* margin: 0 auto; */
}

.zoom:hover {
  -ms-transform: scale(1.5); 
  -webkit-transform: scale(1.5); 
  transform: scale(1.2); 
}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#useradd-1" class="list-group-item list-group-item-action">{{ __('Event') }} <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#event-details" class="list-group-item list-group-item-action">{{ __('Event Details') }} <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#special_req" class="list-group-item list-group-item-action">{{ __('Special Requirements') }} <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>   
                            <a href="#other_info" class="list-group-item list-group-item-action">{{ __('Other Information') }} <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>          
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    {{ Form::open(['url' => 'meeting', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                    <div id="useradd-1" class="card"> 
                        <div class="col-md-12">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <h5>{{ __('Event') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body"> 
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('attendees_lead', __('Lead'), ['class' => 'form-label']) }}
                                            {!! Form::select('attendees_lead', $attendees_lead, null, ['class' => 'form-control ','required'=>'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{Form::label('Assign User',__('Assign User'),['class'=>'form-label']) }}
                                            {!! Form::select('user', $user, null,array('class' => 'form-control','required'=>'required')) !!}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{Form::label('company_name',__('Company Name'),['class'=>'form-label']) }}
                                            {{Form::text('company_name',null,array('class'=>'form-control','placeholder'=>__('Enter Company Name'),'required'=>'required'))}}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{Form::label('status',__('Status'),['class'=>'form-label']) }}
                                            {!! Form::select('status',$status, null,array('class' => 'form-control','required'=>'required')) !!}
                                        </div>
                                    </div> 
                                    <div class="col-12  p-0 modaltitle pb-3 mb-3">
                                        <h5 style="margin-left: 14px;">{{ __('Contact Information') }}</h5>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{Form::label('name',__('Name'),['class'=>'form-label']) }}
                                            {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name'),'required'=>'required'))}}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{Form::label('phone',__('Phone'),['class'=>'form-label']) }}
                                            {{Form::text('phone',null,array('class'=>'form-control','placeholder'=>__('Enter Phone'),'required'=>'required'))}}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{Form::label('email',__('Email'),['class'=>'form-label']) }}
                                            {{Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter Email'),'required'=>'required'))}}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{Form::label('lead_address',__('Address'),['class'=>'form-label']) }}
                                            {{Form::text('lead_address',null,array('class'=>'form-control','placeholder'=>__('Address'),'required'=>'required'))}}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{Form::label('relationship',__('Relationship'),['class'=>'form-label']) }}
                                            {{Form::text('relationship',null,array('class'=>'form-control','placeholder'=>__('Enter Relationship')))}}
                                        </div>
                                    </div>
                                    <div id = "contact-info" style = "display:none">
                                        <div class="row">
                                        <div class="col-12  p-0 modaltitle pb-3 mb-3">
                                            <h5 style="margin-left: 14px;">{{ __('Other Contact Information') }}</h5>
                                        </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    {{Form::label('alter_name',__('Name'),['class'=>'form-label']) }}
                                                    {{Form::text('alter_name',null,array('class'=>'form-control','placeholder'=>__('Enter Name')))}}
                                                </div>
                                            </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                {{Form::label('alter_phone',__('Phone'),['class'=>'form-label']) }}
                                                {{Form::text('alter_phone',null,array('class'=>'form-control','placeholder'=>__('Enter Phone')))}}
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                {{Form::label('alter_email',__('Email'),['class'=>'form-label']) }}
                                                {{Form::text('alter_email',null,array('class'=>'form-control','placeholder'=>__('Enter Email')))}}
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="col-6">
                                            <div class="form-group">
                                                {{Form::label('alter_relationship',__('Relationship'),['class'=>'form-label']) }}
                                                {{Form::text('alter_relationship',null,array('class'=>'form-control','placeholder'=>__('Enter Relationship')))}}
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-end mt-3">
                                        <button  data-bs-toggle="tooltip" id="opencontact" 
                                                title="{{ __('Add Contact') }}" class="btn btn-sm btn-primary btn-icon m-1">
                                                <i class="ti ti-plus"></i>
                                        </button>
                                    </div>
                                    @if (isset($setting['is_enabled']) && $setting['is_enabled'] == 'on')
                                        <div class="form-group col-md-6">
                                            <label>{{ __('Synchronize in Google Calendar') }}</label>
                                            <div class="form-check form-switch pt-2">
                                                <input id="switch-shadow" class="form-check-input" value="1" name="is_check" type="checkbox">
                                                <label class="form-check-label" for="switch-shadow"></label>
                                            </div>
                                        </div>
                                    @endif 
                                </div>
                            </div>
                        </div>
                    </div>        
                    <div id ="event-details" class="card">
                        <div class="col-md-12">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <h5>{{ __('Event Details') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{Form::label('type',__('Event Type'),['class'=>'form-label']) }}
                                            {!! Form::select('type', $type_arr, null,array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                   
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="venue_selection" class="form-label">Venue</label>
                                            @foreach($venue as $key => $label)
                                                <div>
                                                    <input type="checkbox" name="venue[]" value="{{ $label }}" id="venue{{ $key + 1 }}">
                                                    <label for="{{ $label }}">{{ $label }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>



                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('start_date', __('Start Date'), ['class' => 'form-label']) }}
                                            {!! Form::date('start_date', date('Y-m-d'), ['class' => 'form-control', 'required' => 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('end_date', __('End Date'), ['class' => 'form-label']) }}
                                            {!! Form::date('end_date', date('Y-m-d'), ['class' => 'form-control', 'required' => 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('start_time', __('Start Time'), ['class' => 'form-label']) }}
                                            {!! Form::input('time', 'start_time', date('H:i'), ['class' => 'form-control', 'required' => 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('end_time', __('End Time'), ['class' => 'form-label']) }}
                                            {!! Form::input('time', 'end_time', date('H:i'), ['class' => 'form-control', 'required' => 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{Form::label('guest_count',__('Guest Count'),['class'=>'form-label']) }}
                                            {!! Form::number('guest_count', null,array('class' => 'form-control','min'=> 0)) !!}
                                        </div>
                                    </div>                                    
                                    <!-- <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('function', __('Function'), ['class' => 'form-label']) }}
                                            {!! Form::select('function',$function, null,array('class' => 'form-control','required'=>'required')) !!}
                                        </div>
                                    </div> -->  
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('function', __('Function'), ['class' => 'form-label']) }}
                                           @foreach($function as $key => $value)
                                                <div class="form-check">
                                                    {!! Form::checkbox('function[]',$value, null, ['id' => 'function_' . $key, 'class' => 'form-check-input']) !!}
                                                    {{ Form::label($value, $value, ['class' => 'form-check-label']) }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>                                   
                                    <div class="col-6" id ="breakfast" style ="display:none">
                                        <div class="form-group">
                                            {{ Form::label('break_package', __('Breakfast Package'), ['class' => 'form-label']) }}
                                            @foreach($breakfast as $key => $label)
                                                <div>
                                                    {{ Form::radio('break_package[]',$label, false, ['id' => 'break_package' . ($key + 1)]) }}
                                                    {{ Form::label($label, $label) }}
                                                </div>
                                            @endforeach  
                                        </div>
                                    </div>
                                    <div class="col-6" id ="lunch" style ="display:none">
                                        <div class="form-group">
                                            {{ Form::label('lunch_package', __('Lunch Package'), ['class' => 'form-label']) }}
                                            @foreach($lunch as $key => $label)
                                                <div>
                                                    {{ Form::radio('lunch_package[]', $label, false, ['id' => 'lunch_package' . ($key + 1)]) }}
                                                    {{ Form::label($label, $label) }}
                                                </div>
                                            @endforeach  
                                        </div>
                                    </div>
                                    <div class="col-6" id ="dinner" style ="display:none">
                                        <div class="form-group">
                                            {{ Form::label('dinner_package', __('Dinner Package'), ['class' => 'form-label']) }}
                                            @foreach($dinner as $key => $label)
                                                <div>
                                                    {{ Form::radio('dinner_package[]', $label, false, ['id' => 'dinner_package' . ($key + 1)]) }}
                                                    {{ Form::label($label, $label) }}
                                                </div>
                                            @endforeach  
                                        </div>
                                    </div>
                                    <div class="col-6"  id ="wedding" style ="display:none">
                                        <div class="form-group">
                                            {{ Form::label('wedding_package', __('Wedding Package'), ['class' => 'form-label']) }}
                                            @foreach($wedding as $key => $label)
                                                <div>
                                                    {{ Form::radio('wedding_package[]', $label, false, ['id' => 'wedding_package' . ($key + 1)]) }}
                                                    {{ Form::label($label, $label) }}
                                                </div>
                                            @endforeach  
                                        </div>
                                    </div>
                                    <div class="col-12" id ='add_opts' style ="display:none" >
                                            <div class="form-group">
                                                {{Form::label('add_opts',__('Additional Options'),['class'=>'form-label']) }}
                                                {{Form::text('add_opts',null,array('class'=>'form-control','placeholder'=>__('Any Additional Optionas')))}}
                                            </div>
                                        </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <label><b>Select Floor Plans</b></label>
                                            @foreach(File::files(public_path('floor_images')) as $image)
                                            <div class="col-6">    
                                                    <input type="radio" id="image_{{ $loop->index }}" name="uploadedImage" class="form-check-input " value="{{ asset('/public/floor_images/' . basename($image)) }}" style="display:none;">
                                                    <label for="image_{{ $loop->index }}" class="form-check-label">
                                                        <img src="{{URL::asset('/floor_images/'. basename($image))}}" alt="Uploaded Image" class="img-thumbnail floorimages zoom">
                                                        <!-- <i class="ti ti-trash" data-image="{{ basename($image) }}" onclick="deleteImage(this)"></i> -->
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="special_req" class= "card">
                        <div class="col-md-12">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <h5>{{ __('Any Special Requirements') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class ="row">
                                        <div class="form-group">
                                            {!! Form::checkbox('room', 1, null, ['id'=>'room', 'class' => 'checkbox']) !!}
                                            {!! Form::label('room', 'Rooms at the hotel') !!} 
                                        </div>
                                    <!-- <div class="col-6">
                                        <div class="form-group">
                                        {!! Form::label('meal', 'Meal Preference') !!}
                                            @foreach($meal as $key => $label)
                                            <div>
                                                    {{ Form::radio('meal', 'option' . ($key + 1), false, ['id' => 'meal' . ($key + 1)]) }}
                                                    {{ Form::label('meal' . ($key + 1), $label) }}
                                            </div>
                                            @endforeach
                                        </div>
                                    </div> -->
                                    <div class="col-6">
                                            <div class="form-group">
                                            {!! Form::label('meal', 'Meal Preference') !!}
                                                @foreach($meal as $key => $label)
                                                <div>
                                                        {{ Form::radio('meal[]', $label , false, ['id' => $label]) }}
                                                        {{ Form::label('meal' . ($key + 1), $label) }}
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    <!-- <div class="col-6">
                                        <div class="form-group">
                                            {!! Form::label('bar', 'Bar') !!}
                                            @foreach($bar as $key => $label)
                                                <div>
                                                    {{ Form::radio('bar', 'option' . ($key + 1), false, ['id' => 'bar' . ($key + 1)]) }}
                                                    {{ Form::label('bar' . ($key + 1), $label) }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div> -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            {!! Form::label('bar', 'Bar') !!}
                                            @foreach($bar as $key => $label)
                                                <div>
                                                    {{ Form::radio('bar', $label, false, ['id' => $label]) }}
                                                    {{ Form::label('bar' . ($key + 1), $label) }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row" id = "package" style = "display:none">
                                        {{ Form::label('bar_package', __('Bar Packages'), ['class' => 'form-label']) }}
                                        <div class="col-6">
                                            <div class="form-group">
                                                {{ Form::label('platinum_package', __('Platinum Package'), ['class' => 'form-label']) }}
                                                @foreach($platinum as $key => $label)
                                                    <div>
                                                        {{ Form::radio('bar_package', 'platinum_package' . ($key + 1), false) }}
                                                        {{ Form::label('platinum_package' . ($key + 1), $label) }}
                                                    </div>
                                                @endforeach  
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                {{ Form::label('gold_package', __('Gold Package'), ['class' => 'form-label']) }}
                                                @foreach($gold as $key => $label)
                                                    <div>
                                                        {{ Form::radio('bar_package', 'gold_package' . ($key + 1), false) }}
                                                        {{ Form::label('gold_package' . ($key + 1), $label) }}
                                                    </div>
                                                @endforeach  
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                {{ Form::label('silver_package', __('Silver Package'), ['class' => 'form-label']) }}
                                                @foreach($silver as $key => $label)
                                                    <div>
                                                        {{ Form::radio('bar_package', 'silver_package' . ($key + 1), false) }}
                                                        {{ Form::label('silver_package' . ($key + 1), $label) }}
                                                    </div>
                                                @endforeach  
                                            </div>
                                        </div>
                                        <div class="col-6" >
                                            <div class="form-group" >
                                                {{ Form::label('beer_package', __('Beer & Wine'), ['class' => 'form-label']) }}
                                                @foreach($beer as $key => $label)
                                                    <div>
                                                        {{ Form::radio('bar_package', 'beer_package' . ($key + 1), false) }}
                                                        {{ Form::label('beer_package' . ($key + 1), $label) }}
                                                    </div>
                                                @endforeach  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            {{Form::label('spcl_request',__('Special Requests / Considerations'),['class'=>'form-label']) }}
                                            {{Form::text('spcl_request',null,array('class'=>'form-control'))}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="other_info" class ="card">
                        <div class="col-md-12">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <h5>{{ __('Other Information') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{Form::label('allergies',__('Allergies'),['class'=>'form-label']) }}
                                            {{Form::text('allergies',null,array('class'=>'form-control','placeholder'=>__('Enter Allergies(if any)')))}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                {{ Form::submit(__('Save'), ['class' => 'btn  btn-primary ']) }}
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}    
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-page')
    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })
        document.getElementById('opencontact').addEventListener('click', function(event) {
            var x = document.getElementById("contact-info");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
            event.stopPropagation();
            event.preventDefault();
        });
        $('select[name= "attendees_lead"]').on('change', function() {
            $('#breakfast').hide();
            $('#lunch').hide();
            $('#dinner').hide();
            $('#wedding').hide();
            var venu = this.value ;
            $.ajax({
                url: "{{ route('meeting.lead') }}",
                type: 'POST',
                data: {
                    "venue": venu,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    console.log(data)
                    // alert("yes");
                    // alert(data.function);
                    venue_str = data.venue_selection;
                    venue_arr = venue_str.split(",");
                    func_str = data.function;
                    func_arr = func_str.split(",");
                    $('input[name ="company_name"]').val(data.company_name);
                    $('input[name ="name"]').val(data.name);
                    $('input[name ="phone"]').val(data.phone);
                    $('input[name ="relationship"]').val(data.relationship);
                    $('input[name ="start_date"]').val(data.start_date);
                    $('input[name ="end_date"]').val(data.end_date);
                    $('input[name ="email"]').val(data.email);
                    $('input[name ="lead_address"]').val(data.lead_address);
                    $("select[name='type'] option[value='"+data.type+"']").prop("selected", true);
                    $("select[name='user'] option[value='"+data.assigned_user+"']").prop("selected", true);
                    // $("select[name='function'] option[value='"+data.function+"']").prop("selected", true);                    
                    $.each(venue_arr, function(i, val){
                        // console.log(i,val)
                        $("input[name='venue[]'][value='" + val + "']").prop('checked', true);
                    });
                    
                    $.each(func_arr, function(i, val){
                        $("input[name='function[]'][value='" + val + "']").prop('checked', true);
                    });
                    
                    $('input[name ="guest_count"]').val(data.guest_count);

                    var checkedFunctions = $('input[name="function[]"]:checked').map(function() {
                        return $(this).val();
                    }).get();
                    console.log("check",checkedFunctions);

                    if(checkedFunctions.includes('Breakfast') || checkedFunctions.includes('Brunch')){
                        // console.log("fdsfdsfds")
                        $('#breakfast').show();                        
                    }
                    if(checkedFunctions.includes('Lunch') ){
                        $('#lunch').show();
                    }
                    if(checkedFunctions.includes('Dinner') ){
                        $('#dinner').show();
                    }
                    if(checkedFunctions.includes('Wedding')){
                        $('#wedding').show();
                    }
                }
            });          
        });;

        $('input[name= "function[]"]').on('change', function() {
            $('#breakfast').hide();
            $('#lunch').hide();
            $('#dinner').hide();
            $('#wedding').hide();
            // var fun = $('input[name = "function[]"]').val();
            var checkedFunctions = $('input[name="function[]"]:checked').map(function() {
                        return $(this).val();
                    }).get();
                    // console.log("check",checkedFunctions);

                    if(checkedFunctions.includes('Breakfast') || checkedFunctions.includes('Brunch')){
                        // console.log("fdsfdsfds")
                        $('#breakfast').show();
                      
                    }
                    if(checkedFunctions.includes('Lunch') ){
                        $('#lunch').show();
                    }
                    if(checkedFunctions.includes('Dinner') ){
                        $('#dinner').show();
                    }
                    if(checkedFunctions.includes('Wedding')){
                        $('#wedding').show();
                    }
        });
        $('input[type=radio][name=bar]').change(function() {
            $('#package').hide();
                var val = $(this).val();
                if(val == 'option3'){
                    $('#package').show();
                }
        });
        $('input[type=radio][name="lunch_package[]"]').change(function() {
            var val = $(this).val();
                if(val == 'Additional Options'){
                  $('#add_opts').show();
                }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('input[name="uploadedImage"]').change(function () {
                $('.floorimages').removeClass('selected-image');
                
                if ($(this).is(':checked')) {
                    var imageId = $(this).attr('id');
                    $('label[for="' + imageId + '"] img').addClass('selected-image');
                }
            });
        });
    </script>
@endpush

