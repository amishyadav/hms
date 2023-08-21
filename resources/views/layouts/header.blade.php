@php
    $notifications = getNotification(Auth::user()->roles->pluck('name')->first());
    $notificationCount = count($notifications);
    $settingValue = getSuperAdminSettingValue();
    $username = App\Models\User::where('tenant_id', getLoggedInUser()->tenant_id)->first();
@endphp
<?php
$style = 'style=';
$background = 'background-color:';
$margin = 'margin-left:';
?>

<header class='d-flex align-items-center justify-content-between flex-grow-1 header px-3 px-xl-0'>

    <button type="button" class="btn px-0 aside-menu-container__aside-menubar d-block d-xl-none sidebar-btn">
        <i class="fa-solid fa-bars fs-1"></i>
    </button>

    <nav class="navbar navbar-expand-xl {{getLoggedInUser()->theme_mode ? 'bg-light' : 'bg-white'}} navbar-light top-navbar d-xl-flex d-block px-3 px-xl-0 py-4 py-xl-0"
         id="nav-header">
        <div class="container-fluid pe-0">
            <div class="navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @include('layouts.sub_menu')
                </ul>
            </div>
        </div>
    </nav>

    <ul class="nav align-items-center flex-nowrap">

        <li class="px-xxl-3 px-2">
            @if(getLoggedInUser()->hasRole('Admin'))
                <div class="d-flex {{ getLoggedInUser()->language == 'ar' ? 'hospital-preview' : 'ms-auto' }} ">
                    <div class="d-flex align-items-stretch hospital-preview-logo">
                        <a href="{{ route('front', $username->username) }}"
                           class="ps-2 pe-0" target="_blank">
                            <i class="fas fa-globe-americas text-primary fs-3"></i>
                        </a>
                    </div>
                </div>
            @endif
        </li>

        <li class="px-xxl-3 px-2">
            <a data-turbo="false" href="{{ route('theme.mode') }}"
               title="{{ getLoggedInUser()->theme_mode ? 'Switch to Light Mode' : 'Switch to Dark Mode' }}">
                @if(getLoggedInUser()->theme_mode)
                    <i class="fa-solid fa-sun text-primary fs-3"></i>
                @else
                    <i class="fa-solid fa-moon text-primary fs-3"></i>
                @endif
            </a>
        </li>

        <li class="px-xxl-3 px-2">
            <div class="dropdown custom-dropdown d-flex align-items-center py-4">
                <button class="btn dropdown-toggle hide-arrow ps-2 pe-0 position-relative" type="button"
                        id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    <i class="fa-solid fa-bell text-primary fs-2"></i>
                    @if(count(getNotification(Auth::user()->roles->pluck('name')->first())) != 0)
                        <span
                                class="position-absolute top-0 start-100 translate-middle badge badge-circle bg-danger {{($notificationCount > 9)?'end-0':'counter-0'}}"
                                id="counter">{{ count(getNotification(Auth::user()->roles->pluck('name')->first())) }}</span>
                    @endif
                </button>
                <div class="dropdown-menu py-0 my-2" aria-labelledby="dropdownMenuButton1">
                    <div class="text-start border-bottom py-4 px-7">
                        <h3 class="text-gray-900 mb-0">{{__('messages.notification.notifications')}}</h3>
                    </div>
                    <div class="px-7 mt-5 inner-scroll height-270">
                        @if($notificationCount > 0)
                            @foreach($notifications as $notification)
                                <div class="d-flex position-relative mb-5 notification"
                                     data-id="{{ $notification->id }}" id="notification"> 
                                    <span class="me-5 text-primary fs-2 icon-label">
                                        <i class="{{ getNotificationIcon($notification->type) }}"></i>
                                    </span>
                                    <div>
                                        <a href="#" class="text-decoration-none">
                                            <h5 class="text-gray-900 fs-6 mb-2">{{ $notification->title }}</h5>
                                        </a>
                                        <h6 class="text-gray-600 fs-small fw-light mb-0">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans(null, true)}}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div>
                                <h5 class="text-gray-900 fs-6 mb-2 empty-state text-center">{{ __('messages.notification.you_don`t_have_any_new_notification') }}</h5>
                            </div>
                        @endif
                        <div>
                            <h5 class="text-gray-900 text-center fs-6 mb-2 empty-state empty-notification d-none">{{ __('messages.notification.you_don`t_have_any_new_notification') }}</h5>
                        </div>
                    </div>
                    @if($notificationCount > 0)
                        <div class="text-center border-top p-4 mark-read">
                            <h5><a href="#" class="text-primary mb-0 fs-5 read-all-notification text-decoration-none"
                                   id="readAllNotification">{{ __('messages.notification.mark_all_as_read') }}</a></h5>
                        </div>
                    @endif
                </div>
            </div>
        </li>

        <li class="px-xxl-3 px-2">
            <div class="dropdown dropdown-transparent d-flex align-items-center py-4">
                <div class="image image-circle image-mini">
                    <img src="{{ Auth::user()->image_url??'' }}"
                         class="img-fluid" alt="profile image">
                </div>
                <button class="btn dropdown-toggle ps-2 pe-0 text-gray-600" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    {{ (Auth::user()->full_name)??'' }}
                    <i class="fa-solid fa-angle-down"></i>
                </button>
                <div class="dropdown-menu py-7 pb-4 my-2" aria-labelledby="dropdownMenuButton1">
                    <div class="text-center border-bottom pb-5">
                        <div class="image image-circle image-tiny mb-5">
                            <img src="{{ Auth::user()->image_url??'' }}" class="img-fluid" alt="profile image">
                        </div>
                        <h3 class="text-gray-900">{{ (Auth::user()->full_name)??'' }}</h3>
                        <h4 class="mb-0 fw-400 fs-6">{{ (Auth::user()->email)??'' }}</h4>
                    </div>
                    <ul class="pt-4">
                        <li>
                            <a class="dropdown-item editProfile"
                               data-id="{{ getLoggedInUserId() }}"
                               href="javascript:void(0)">
                                {{ __('messages.user.edit_profile') }}
                            </a>
                        </li>
                        @if(getLoggedInUser()->hasRole('Admin'))
                            <li>
                                <a class="dropdown-item subscription_plan"
                                   href="{{ route('subscription.pricing.plans.index') }}">
                                    {{__('messages.subscription_plans.subscription_plans')}}</a>
                            </li>
                        @endif
                        @if(session('impersonated_by'))
                            <li>
                                <a class="dropdown-item" href="{{ route('impersonate.userLogout') }}" data-turbo="false">
                                    {{ __('messages.user.back_to_admin') }}</a>
                            </li>
                        @endif
                        @if(!session('impersonated_by'))
                        <li>
                            <button type="button" class="btn btn-primary dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#changePasswordModal" data-id="{{ getLoggedInUserId() }}">
                                {{ __('messages.user.change_password') }}
                            </button>
                        </li>
                        @endif
                        <li>
                            <button type="button" class="btn btn-primary dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#changeLanguageModal" data-id="{{ getLoggedInUserId() }}">
                                {{__('messages.profile.change_language')}}
                            </button>
                        </li>
                        @if(!session('impersonated_by'))
                            <li>
                                <form id="logout-form" action="{{ route('logout.user') }}" method="post">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="#"
                                   onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                                    {{ __('messages.user.logout') }}</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <button type="button" class="btn px-0 d-block d-xl-none header-btn pb-2">
                <i class="fa-solid fa-bars fs-1"></i>
            </button>
        </li>
    </ul>
</header>

<div class="bg-overlay" id="nav-overly"></div>


