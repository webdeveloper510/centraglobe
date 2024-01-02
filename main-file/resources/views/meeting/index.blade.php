@extends('layouts.admin')
@section('page-title')
    {{ __('Event') }}
@endsection
@section('title')
    {{ __('Event') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ __('Event') }}</li>
@endsection
@section('action-btn')
    @can('Create Meeting')
        <div class="col-12 text-end mt-3">
            <a href="{{ route('meeting.create',['meeting',0]) }}"> 
                <button  data-bs-toggle="tooltip"title="{{ __('Create') }}" class="btn btn-sm btn-primary btn-icon m-1">
                <i class="ti ti-plus"></i></button>
            </a>
        </div>
    @endcan
@endsection
@section('filter')
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive overflow_hidden">
                        <table id="datatable" class="table datatable align-items-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">{{ __('Name') }}</th>
                                    <!-- <th scope="col" class="sort" data-sort="budget">{{ __('Parent') }}</th> -->
                                    <th scope="col" class="sort" data-sort="status">{{ __('Status') }}</th>
                                    <th scope="col" class="sort" data-sort="completion">{{ __('Date Start') }}</th>
                                    <th scope="col" class="sort" data-sort="completion">{{ __('Assigned User') }}</th>
                                    @if (Gate::check('Show Meeting') || Gate::check('Edit Meeting') || Gate::check('Delete Meeting'))
                                        <th scope="col" class="text-end">{{ __('Action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meetings as $meeting)
                                    <tr>
                                        <td>
                                            <a href="{{ route('meeting.edit', $meeting->id) }}" data-size="md"
                                                data-title="{{ __('Event Details') }}" class="action-item text-primary">
                                                {{ ucfirst($meeting->name) }}
                                            </a>
                                        </td>
                                        <td>
                                            @if ($meeting->status == 0)
                                                <span class="badge bg-success p-2 px-3 rounded"
                                                    style="width: 73px;">{{ __(\App\Models\Meeting::$status[$meeting->status]) }}</span>
                                            @elseif($meeting->status == 1)
                                                <span class="badge bg-warning p-2 px-3 rounded"
                                                    style="width: 73px;">{{ __(\App\Models\Meeting::$status[$meeting->status]) }}</span>
                                            @elseif($meeting->status == 2)
                                                <span class="badge bg-danger p-2 px-3 rounded"
                                                    style="width: 73px;">{{ __(\App\Models\Meeting::$status[$meeting->status]) }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span
                                                class="budget">{{ \Auth::user()->dateFormat($meeting->start_date) }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="budget">{{ ucfirst(!empty($meeting->assign_user) ? $meeting->assign_user->name : '') }}</span>
                                        </td>
                                        @if (Gate::check('Show Meeting') || Gate::check('Edit Meeting') || Gate::check('Delete Meeting'))
                                            <td class="text-end">
                                            @can('Manage Meeting')
                                                    <div class="action-btn bg-success ms-2">
                                                        <a href="#" data-size="md"
                                                            data-url="{{ route('meeting.floor_plan', $meeting->id) }}"
                                                            data-ajax-popup="true" data-bs-toggle="tooltip"
                                                            data-title="{{ __('Event Details') }}"title="{{ __('Share') }}"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center text-white ">
                                                            <i class="fas fa-share"></i>
                                                        </a>
                                                    </div>
                                                @endcan
                                                @can('Show Meeting')
                                                    <div class="action-btn bg-warning ms-2">
                                                        <a href="#" data-size="md"
                                                            data-url="{{ route('meeting.show', $meeting->id) }}"
                                                            data-ajax-popup="true" data-bs-toggle="tooltip"
                                                            data-title="{{ __('Event Details') }}"title="{{ __('Quick View') }}"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center text-white ">
                                                            <i class="ti ti-eye"></i>
                                                        </a>
                                                    </div>
                                                @endcan
                                                @can('Edit Meeting')
                                                    <div class="action-btn bg-info ms-2">
                                                        <a href="{{ route('meeting.edit', $meeting->id) }}"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                            data-bs-toggle="tooltip" data-title="{{ __('Details') }}"
                                                            title="{{ __('Edit') }}"><i class="ti ti-edit"></i></a>
                                                    </div>
                                                @endcan
                                                @can('Delete Meeting')
                                                    <div class="action-btn bg-danger ms-2">
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['meeting.destroy', $meeting->id]]) !!}
                                                        <a href="#!"
                                                            class="mx-3 btn btn-sm   align-items-center text-white show_confirm"
                                                            data-bs-toggle="tooltip" title='Delete'>
                                                            <i class="ti ti-trash"></i>
                                                        </a>
                                                        {!! Form::close() !!}
                                                    </div>
                                                @endcan
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-page')
    <script>
        $(document).on('change', 'select[name=parent]', function() {

            var parent = $(this).val();

            getparent(parent);
        });

        function getparent(bid) {

            $.ajax({
                url: '{{ route('meeting.getparent') }}',
                type: 'POST',
                data: {
                    "parent": bid,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    console.log(data);
                    $('#parent_id').empty();
                    {{-- $('#parent_id').append('<option value="">{{__('Select Parent')}}</option>'); --}}

                    $.each(data, function(key, value) {
                        $('#parent_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
    </script>
@endpush
