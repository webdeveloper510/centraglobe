@php
$logo = asset('storage/uploads/logo/');
$company_logo = \App\Models\Utility::GetLogo();
$users = \Auth::user();
$currantLang = $users->currentLanguage();
$emailTemplate = App\Models\EmailTemplate::getemailtemplate();
$defaultView = App\Models\UserDefualtView::select('module','route')->where('user_id', $users->id)->get()->pluck('route', 'module')->toArray();
@endphp
@if ((isset($settings['cust_theme_bg']) && $settings['cust_theme_bg'] == 'on'))
    <nav class="dash-sidebar light-sidebar transprent-bg">
@else
    <nav class="dash-sidebar light-sidebar">
@endif
<div class="navbar-wrapper">
    <div class="m-header main-logo">
        <a href="{{ route('dashboard') }}" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            {{-- <img src="{{ asset(Storage::url('logo/'.$logo)) }}" alt="{{ env('APP_NAME') }}" class="logo logo-lg" />
                <img src="{{ asset(Storage::url('logo/'.$logo)) }}" alt="{{ env('APP_NAME') }}" class="logo logo-sm" /> --}}
                {{--<img src="{{ $logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo.png') .'?'.time()}}"
                alt="{{ config('app.name', 'Centraglobe') }}" class="logo logo-lg nav-sidebar-logo" />--}}
                <img src="http://127.0.0.1/main-file/storage/uploads/logo/logo.png"
                alt="{{ config('app.name', 'Centraglobe') }}" class="logo logo-lg nav-sidebar-logo" />
        </a>
    </div>
    <div class="navbar-content">
            <ul class="dash-navbar">
               
                <li class="dash-item {{ \Request::route()->getName() == 'dashboard' ? ' active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="dash-link">
                        <span class="dash-micon"><i class="ti ti-home-2"></i></span><span class="dash-mtext">{{ __('Dashboard') }}</span></a>
                </li>
                @can('Manage User')
                    <li class="dash-item {{ \Request::route()->getName() == 'user' || \Request::route()->getName() == 'user.edit' ? ' active' : '' }}">
                        {{-- <a class="dash-link" href="{{ !empty(\Auth::user()->getDefualtViewRouteByModule('user')) ? route(\Auth::user()->getDefualtViewRouteByModule('user')) : route('user.index') }}"> --}}
                            <a class="dash-link" href="{{ array_key_exists('user',$defaultView) ? route($defaultView['user']) : route('user.index') }}">
                            <span class="dash-micon"><i class="ti ti-user"></i></span><span class="dash-mtext">{{ __('Staff') }}</span></a>
                    </li>
                @endcan
                @can('Manage Role')
                    <li class="dash-item {{ \Request::route()->getName() == 'role' ? ' active' : '' }}">
                        <a href="{{ route('role.index') }}" class="dash-link"><span class="dash-micon">
                            <i class="ti ti-license"></i></span><span class="dash-mtext">{{ __('Role') }}</span></a>
                    </li>
                @endcan
                @can('Manage Lead')
                
                    <li class="dash-item {{ \Request::route()->getName() == 'lead' || \Request::route()->getName() == 'lead.edit' ? ' active' : '' }}">
                        {{-- <a href="{{ !empty(\Auth::user()->getDefualtViewRouteByModule('lead')) ? route(\Auth::user()->getDefualtViewRouteByModule('lead')) : route('lead.index') }}" class="dash-link">
                            <span class="dash-micon"><i class="ti ti-filter"></i></span><span class="dash-mtext">{{ __('Leads') }}</span>
                        </a> --}}
                        <a href="{{  array_key_exists('lead',$defaultView) ? route($defaultView['lead']) : route('lead.index') }}"   class="dash-link">
                            <span class="dash-micon"><i class="ti ti-filter"></i></span><span class="dash-mtext">{{ __('Leads') }}</span>
                        </a>
                @endcan
               @if(\Auth::user()->type!='super admin')
                    <li class="dash-item {{ \Request::route()->getName() == 'calendar' || \Request::route()->getName() == 'calendar.index' ? ' active' : '' }}">
                        <a href="{{ route('calendar.index') }}" class="dash-link">
                            <span class="dash-micon"><i class="far fa-calendar-alt"></i></span><span class="dash-mtext">{{ __('Calendar') }}</span>
                        </a>
                    </li>
                @endif
                <!-- @can('Manage Meeting')
                    <li class="dash-item {{ \Request::route()->getName() == 'meeting' || \Request::route()->getName() == 'meeting.show' || \Request::route()->getName() == 'meeting.edit' ? ' active' : '' }}">
                        {{-- <a href="{{ !empty(\Auth::user()->getDefualtViewRouteByModule('meeting')) ? route(\Auth::user()->getDefualtViewRouteByModule('meeting')) : route('meeting.index') }}"
                            class="dash-link">
                            <span class="dash-micon"><i class="ti ti-calendar"></i></span><span class="dash-mtext">{{ __('Event') }}</span>
                        </a> --}}
                        <a href="{{ array_key_exists('meeting',$defaultView) ? route($defaultView['meeting']) : route('meeting.index') }}"
                            class="dash-link">
                            <span class="dash-micon"><i class="ti ti-calendar"></i></span><span class="dash-mtext">{{ __('Event') }}</span>
                        </a>
                    </li>
                @endcan          -->
                @can('Manage Meeting')
                    <li class="dash-item {{ \Request::route()->getName() == 'meeting' || \Request::route()->getName() == 'meeting.show' || \Request::route()->getName() == 'meeting.edit' ? ' active' : '' }}">
                        <a href="{{ array_key_exists('meeting',$defaultView) ? route($defaultView['meeting']) : route('meeting.index') }}"
                            class="dash-link">
                            <span class="dash-micon"><i class="ti ti-calendar"></i></span><span class="dash-mtext">{{ __('Event') }}</span>
                        </a>
                    </li>
                @endcan         
                @if (\Auth::user()->type == 'super admin')
                @include('landingpage::menu.landingpage')
                @endif
                 @if (\Auth::user()->type == 'super admin' || \Auth::user()->type == 'owner')
                    <li class="dash-item  {{ Request::route()->getName() == 'settings' ? 'active' : '' }}">
                        <a href="{{ route('settings') }}" class="dash-link">
                            <span class="dash-micon"><i class="ti ti-settings"></i></span><span class="dash-mtext">{{ __('Settings') }}</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
</div>