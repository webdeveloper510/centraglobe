@extends('layouts.admin')
@section('page-title')
    {{ __('Lead Edit') }}
@endsection
@php
    $plansettings = App\Models\Utility::plansettings();
    
    $setting = App\Models\Utility::settings();
    $type_arr= explode(',',$setting['event_type']);
    $venue = explode(',',$setting['venue']);
@endphp
@section('title')
    <div class="page-header-title">
        {{ __('Edit Lead') }} {{ '(' . $lead->name . ')' }}
    </div>
@endsection
@section('action-btn')
    <!-- @if ($lead->is_converted != 0)
        <a href="#" data-url="{{ route('account.show', $lead->is_converted) }}" data-title="{{ __('Account Details') }}"
            data-size="md" data-ajax-popup="true" data-bs-toggle="tooltip" title="{{ __('Already Convert To Account') }}"
            class="btn btn-sm btn-primary btn-icon m-1">
            <i class="ti ti-eye"></i>
        </a>
    @else
        <a href="#" data-url="{{ route('lead.convert.account', $lead->id) }}" data-size="lg" data-ajax-popup="true"
            data-title="{{ __('Convert [' . $lead->name . '] To Account') }}" data-bs-toggle="tooltip"
            title="{{ __('Convert To Account') }}" class="btn btn-sm btn-primary btn-icon m-1">
            <i class="ti ti-exchange">
            </i>
        </a>
    @endif -->

@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('lead.index') }}">{{ __('Lead') }}</a></li>
    <li class="breadcrumb-item">{{ __('Details') }}</li>
@endsection
@section('content')
<div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#useradd-1"
                                class="list-group-item list-group-item-action border-0">{{ __('Overview') }} <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                          </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div id="useradd-1" class="card">
                        {{ Form::model($lead, ['route' => ['lead.update', $lead->id], 'method' => 'PUT']) }}
                        <div class="card-header">
                            <h5>{{ __('Overview') }}</h5>
                            <small class="text-muted">{{ __('Edit About Your Lead Information') }}</small>
                        </div>

                        <div class="card-body">
                            <form>
                              
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
            {!! Form::select('type', $type_arr, null,array('class' => 'form-control')) !!}
        </div>
    </div>

    <!-- <div class="col-6">
        <div class="form-group">
            <label for="venue" class="form-label">{{ __('Venue') }}</label>
            @foreach($venue as $key => $label)
                <div>
                    <input type="checkbox" name="venue[]" id="{{ $label }}" value="{{$label}}" 
                        {{ in_array($label, $venue_function) ? 'checked' : '' }}>
                    <label for="{{ $label }}">{{ $label }}</label>
                </div>
            @endforeach  
        </div>
    </div> -->

    <div class="col-6">
       <div class="form-group">
           <label for="venue" class="form-label">{{ __('Venue') }}</label>
           @foreach($venue as $key => $label)
               <div>
                   <input type="checkbox" name="venue[]" id="{{ $label }}" value="{{ $label }}" 
                       {{ in_array($label, @$venue_function) ? 'checked' : '' }}>
                   <label for="{{ $label }}">{{ $label }}</label>
               </div>
           @endforeach  
       </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            {{ Form::label('start_date', __('Start Date'), ['class' => 'form-label']) }}
            {!! Form::date('start_date', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('end_date', __('End Date'), ['class' => 'form-label']) }}
            {!! Form::date('end_date', null, ['class' => 'form-control', 'required' => 'required']) !!}
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
            <div class="checkbox-group">
                @foreach($function as $key => $value)
                    <label>
                        <input type="checkbox" id="{{ $value }}" name="function[]" value="{{ $value }}" class="function-checkbox" {{ in_array($value, $function_package) ? 'checked' : '' }}>
                        {{ $value }}
                    </label><br>
                @endforeach
            </div>
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
            {{Form::label('Assign Staff',__('Assign Staff'),['class'=>'form-label']) }}
            <select class="form-control" name= 'user'>
                @foreach($users as $user)
               <option class= "form-control" value= "{{$user->id}}" {{ $user->id == $lead->assigned_user ? 'selected' : '' }}>{{$user->name}}  - {{$user->type}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-12  p-0 modaltitle pb-3 mb-3">
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
    <div class="text-end">
                                        {{ Form::submit(__('Update'), ['class' => 'btn-submit btn btn-primary']) }}
                                    </div>
                        </div>
                            </form>
                        </div>
                        {{ Form::close() }}
                    </div>
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
    </script>

    <script>
        $(document).on('change', 'select[name=parent]', function() {
            console.log('h');
            var parent = $(this).val();
            getparent(parent);
        });

        function getparent(bid) {
            console.log(bid);
            $.ajax({
                url: "{{ route('task.getparent') }}",
                type: 'POST',
                data: {
                    "parent": bid,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    console.log(data);
                    $('#parent_id').empty();
                    {{-- $('#parent_id').append('<option value="">{{__("Select Parent")}}</option>'); --}}

                    $.each(data, function(key, value) {
                        $('#parent_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                    if (data == '') {
                        $('#parent_id').empty();
                    }
                }
            });
        }
    </script>
    <script>
        $(document).on('click', '#billing_data', function() {
            $("[name='shipping_address']").val($("[name='billing_address']").val());
            $("[name='shipping_city']").val($("[name='billing_city']").val());
            $("[name='shipping_state']").val($("[name='billing_state']").val());
            $("[name='shipping_country']").val($("[name='billing_country']").val());
            $("[name='shipping_postalcode']").val($("[name='billing_postalcode']").val());
        });
    </script>
@endpush
