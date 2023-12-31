@php
    $plansettings = App\Models\Utility::plansettings();
    $settings = Utility::settings();
    $type_arr= explode(',',$settings['event_type']);
    $venue = explode(',',$settings['venue'])
@endphp
{{Form::open(array('url'=>'lead','method'=>'post','enctype'=>'multipart/form-data'))}}
<div class="row">
    <div class="col-12">
        <div class="form-group">
            {{Form::label('company_name',__('Company Name'),['class'=>'form-label']) }}
            {{Form::text('company_name',null,array('class'=>'form-control','placeholder'=>__('Enter Company Name'),'required'=>'required'))}}
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
            {{Form::text('relationship',null,array('class'=>'form-control','placeholder'=>__('Enter Relationship'),'required'=>'required'))}}
        </div>
    </div>
    <div class="col-12  p-0 modaltitle pb-3 mb-3">
        <h5 style="margin-left: 14px;">{{ __('Event Details') }}</h5>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{Form::label('type',__('Event Type'),['class'=>'form-label']) }}
            {!! Form::select('type', isset($type_arr) ? $type_arr : '', null,array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('venue_selection', __('Venue'), ['class' => 'form-label']) }}
            @foreach($venue as $key => $label)
                <div>
                    {{ Form::checkbox('venue[]', $label, false, ['id' => 'venue' . ($key + 1)]) }}
                    {{ Form::label($label, $label) }}
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
            {{Form::label('guest_count',__('Guest Count'),['class'=>'form-label']) }}
            {!! Form::number('guest_count', null,array('class' => 'form-control','min'=> 0)) !!}
        </div>
    </div>
    
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('function', __('Function'), ['class' => 'form-label']) }}

            @foreach($function as $key => $value)
                <div class="form-check">
                    {!! Form::checkbox('function[]', $value, null, ['class' => 'form-check-input', 'id' => 'function_' . $key]) !!}
                    {{ Form::label($value, $value, ['class' => 'form-check-label']) }}
                </div>
            @endforeach

        </div>
    </div>


    <div class="col-6">
        <div class="form-group">
            {{Form::label('status',__('Status'),['class'=>'form-label']) }}
            {!! Form::select('status',$status, null,array('class' => 'form-control','required'=>'required')) !!}
        </div>
    </div> 
    <div class="col-6">
        <div class="form-group">
            {{Form::label('Assign User',__('Assign User'),['class'=>'form-label']) }}
            {!! Form::select('user', $user, null,array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-12  p-0 modaltitle pb-3 mb-3">
        <!-- <hr class="mt-2 mb-2"> -->
        <h5 style="margin-left: 14px;">{{ __('Other Information') }}</h5>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{Form::label('allergies',__('Allergies'),['class'=>'form-label']) }}
            {{Form::text('allergies',null,array('class'=>'form-control','placeholder'=>__('Enter Allergies(if any)')))}}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{Form::label('spcl_req',__('Any Special Requirements'),['class'=>'form-label']) }}
            {{Form::textarea('spcl_req',null,array('class'=>'form-control','rows'=>2,'placeholder'=>__('Enter Any Special Requirements')))}}
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            {{Form::label('Description',__('How did you hear about us?'),['class'=>'form-label']) }}
            {{Form::textarea('description',null,array('class'=>'form-control','rows'=>2))}}
        </div>
    </div> 
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light"
        data-bs-dismiss="modal">Close</button>
        {{Form::submit(__('Save'),array('class'=>'btn btn-primary '))}}
</div>
</div>
{{Form::close()}}
