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
$labels = ['Venue Rental','Brunch / Lunch / Dinner Package','Bar Package','Hotel Rooms','Tent, Tables, Chairs, AV Equipment','Welcome / Rehearsal / Special Setup','Special Requests / Others
','Total','Sales, Occupancy Tax','Service Charges & Gratuity','Grand Total / Estimated Total','Deposit on File','Balance Due'];
@endphp 
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{__('Description')}} </th>
                        <th>{{__('Cost')}} </th>
                        <th>{{__('Quantity')}} </th>
                        <th>{{__('Total Price')}} </th>
                        <th>{{__('Notes')}} </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($labels as $label)
                        <tr>
                            <td>{{ ucfirst($label) }}</td>
                            <td><td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection