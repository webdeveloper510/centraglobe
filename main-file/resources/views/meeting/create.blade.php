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
@endphp
@section('content')
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
                                    <div class="col-12 text-end mt-3">
                                        <button  data-bs-toggle="tooltip" onclick="myFunction()"
                                                title="{{ __('Create') }}" class="btn btn-sm btn-primary btn-icon m-1">
                                                <i class="ti ti-plus"></i>
                                        </button>
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
                                                {{Form::label('alter_lead_address',__('Address'),['class'=>'form-label']) }}
                                                {{Form::text('alter_lead_address',null,array('class'=>'form-control','placeholder'=>__('Address')))}}
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
                                          {{ Form::label('venue_selection', __('Venue'), ['class' => 'form-label']) }}
                                            @foreach($venue as $key => $label)
                                                <div>
                                                    {{ Form::checkbox('venue[]', 'option' . ($key + 1), false, ['id' => 'venue' . ($key + 1)]) }}
                                                    {{ Form::label('venue' . ($key + 1), $label) }}
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
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('function', __('Function'), ['class' => 'form-label']) }}
                                            {!! Form::select('function',$function, null,array('class' => 'form-control','required'=>'required')) !!}
                                        </div>
                                    </div>
                                    <div class="col-6" id ="breakfast" style ="display:none">
                                        <div class="form-group">
                                            {{ Form::label('break_package', __('Breakfast Package'), ['class' => 'form-label']) }}
                                            @foreach($breakfast as $key => $label)
                                                <div>
                                                    {{ Form::checkbox('break_package[]', 'option' . ($key + 1), false, ['id' => 'break_package' . ($key + 1)]) }}
                                                    {{ Form::label('break_package' . ($key + 1), $label) }}
                                                </div>
                                            @endforeach  
                                        </div>
                                    </div>
                                    <div class="col-6" id ="lunch" style ="display:none">
                                        <div class="form-group">
                                            {{ Form::label('lunch_package', __('Lunch Package'), ['class' => 'form-label']) }}
                                            @foreach($lunch as $key => $label)
                                                <div>
                                                    {{ Form::checkbox('lunch_package[]', 'option' . ($key + 1), false, ['id' => 'lunch_package' . ($key + 1)]) }}
                                                    {{ Form::label('lunch_package' . ($key + 1), $label) }}
                                                </div>
                                            @endforeach  
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group" id ="dinner" style ="display:none">
                                            {{ Form::label('dinner_package', __('Dinner Package'), ['class' => 'form-label']) }}
                                            @foreach($dinner as $key => $label)
                                                <div>
                                                    {{ Form::checkbox('dinner_package[]', 'option' . ($key + 1), false, ['id' => 'dinner_package' . ($key + 1)]) }}
                                                    {{ Form::label('dinner_package' . ($key + 1), $label) }}
                                                </div>
                                            @endforeach  
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group" id ="wedding" style ="display:none">
                                            {{ Form::label('wedding_package', __('Wedding Package'), ['class' => 'form-label']) }}
                                            @foreach($wedding as $key => $label)
                                                <div>
                                                    {{ Form::checkbox('wedding_package[]', 'option' . ($key + 1), false, ['id' => 'wedding_package' . ($key + 1)]) }}
                                                    {{ Form::label('wedding_package' . ($key + 1), $label) }}
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
                                    <div class="col-6">
                                        <div class="form-group">
                                        {!! Form::label('meal', 'Meal Preference') !!}
                                            @foreach($meal as $key => $label)
                                            <div>
                                                    {{ Form::checkbox('meal', 'option' . ($key + 1), false, ['id' => 'meal' . ($key + 1)]) }}
                                                    {{ Form::label('meal' . ($key + 1), $label) }}
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {!! Form::label('bar', 'Bar') !!}
                                            @foreach($bar as $key => $label)
                                                <div>
                                                    {{ Form::checkbox('bar','option'.($key + 1) , false, ['id' => 'bar' . ($key + 1)]) }}
                                                    {{ Form::label('bar' . ($key + 1), $label) }}
                                                </div>
                                            @endforeach
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
        function myFunction() {
            var x = document.getElementById("contact-info");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        $('select[name= "attendees_lead"]').on('change', function() {
            $('#breakfast').hide();
            $('#lunch').hide();
            $('#dinner').hide();
            $('#wedding').hide();
            var venu = this.value ;
            $.ajax({
                url: '{{ route('meeting.lead') }}',
                type: 'POST',
                data: {
                    "venue": venu,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
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
                    $("select[name='user'] option[value='"+data.user_id+"']").prop("selected", true);
                    $("select[name='function'] option[value='"+data.function+"']").prop("selected", true);
                    $.each(venue_arr, function(i, val){
                        $("input[name='venue[]'][value='" + val + "']").prop('checked', true);
                    }); 
                    $('input[name ="guest_count"]').val(data.guest_count);
                    var fun = $('select[name = "function"]').val();
                    if(fun == 0 || fun == 1){
                        $('#breakfast').show();
                    }
                    else if(fun == 2 ){
                        $('#lunch').show();
                    }
                    else if(fun == 3 ){
                        $('#dinner').show();
                    }
                    else if(fun == 4){
                        $('#wedding').show();
                    }
                }
            });
          
        });
        $('select[name= "function"]').on('change', function() {
            $('#breakfast').hide();
            $('#lunch').hide();
            $('#dinner').hide();
            $('#wedding').hide();
            var fun = $('select[name = "function"]').val();
            if(fun == 0 || fun == 1){
                $('#breakfast').show();
            }
            else if(fun == 2 ){
                $('#lunch').show();
            }
            else if(fun == 3 ){
                $('#dinner').show();
            }
            else if(fun == 4){
                $('#wedding').show();
            }
        });
    </script>

@endpush

