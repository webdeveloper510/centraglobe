<div class="row">
    <div class="col-lg-12">

            <div class="">
                <dl class="row">
                    <dt class="col-md-5"><span class="h6 text-md mb-0">{{__('Name')}}</span></dt>
                    <dd class="col-md-5"><span class="text-md">{{ $meeting->name }}</span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0">{{__('Status')}}</span></dt>
                    <dd class="col-md-5">
                        @if($meeting->status == 0)
                            <span class="badge bg-success p-2 px-3 rounded">{{ __(\App\Models\Meeting::$status[$meeting->status]) }}</span>
                        @elseif($meeting->status == 1)
                            <span class="badge bg-info p-2 px-3 rounded">{{ __(\App\Models\Meeting::$status[$meeting->status]) }}</span>
                        @endif
                    </dd>
                    
                    <dt class="col-md-5"><span class="h6 text-md mb-0">{{__('Start Date')}}</span></dt>
                    <dd class="col-md-5"><span class="text-md">{{\Auth::user()->dateFormat($meeting->start_date)}}</span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0">{{__('End Date')}}</span></dt>
                    <dd class="col-md-5"><span class="text-md">{{\Auth::user()->dateFormat($meeting->end_date)}}</span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0">{{__('Guest Count')}}</span></dt>
                    <dd class="col-md-5"><span class="text-md">{{$meeting->guest_count}}</span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0">{{__('Venue')}}</span></dt>
                    <dd class="col-md-5"><span class="text-md">{{$meeting->venue_selection}}</span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0">{{__('Function')}}</span></dt>
                    <dd class="col-md-5"><span class="text-md">{{$meeting->function}}</span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0">{{__('Event Type')}}</span></dt>
                    <dd class="col-md-5"><span class="text-md">{{$meeting->type}}</span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0">{{__('Lead')}}</span></dt>
                    <dd class="col-md-5"><span class="text-md">{{ !empty($meeting->attendees_leads->name)?$meeting->attendees_leads->name:'--' }}</span></dd>

                    <dt class="col-sm-5"><span class="h6 text-sm mb-0">{{__('Assigned User')}}</span></dt>
                    <dd class="col-sm-7"><span class="text-md">{{ !empty($meeting->assign_user)?$meeting->assign_user->name:''}}</span></dd>

                    <dt class="col-sm-5"><span class="h6 text-sm mb-0">{{__('Created')}}</span></dt>
                    <dd class="col-sm-7"><span class="text-md">{{\Auth::user()->dateFormat($meeting->created_at)}}</span></dd>
                </dl>
            </div>

    </div>

    <div class="w-100 text-end pr-2">
        @can('Edit Meeting')
        <div class="action-btn bg-info ms-2">
            <a href="{{ route('meeting.edit',$meeting->id) }}" class="mx-3 btn btn-sm d-inline-flex align-items-center text-white" data-bs-toggle="tooltip"data-title="{{__('Edit Call')}}" title="{{__('Edit')}}"><i class="ti ti-edit"></i>
            </a>
        </div>
        @endcan
    </div>
</div>

