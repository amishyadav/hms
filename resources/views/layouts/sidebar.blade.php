{{--<link href="{{ mix('assets/css/style.css') }}" rel="stylesheet" type="text/css"/>--}}
@php
    $settingValue = getSuperAdminSettingValue();
    $hospitalSettingValue = getSettingValue();
    $username = App\Models\User::where('tenant_id', getLoggedInUser()->tenant_id)->first();
@endphp
<div class="aside-menu-container" id="sidebar">
    <!--begin::Brand-->
    <div class="aside-menu-container__aside-logo flex-column-auto">
        <!--begin::Logo-->
{{--        @dd($username->username)--}}
        <a href="{{ getLoggedInUser()->hasRole('Admin') ? route('front', $username->username) : url('/') }}"
           data-toggle="tooltip" data-placement="right"
           data-turbo="false"
           class="text-decoration-none sidebar-logo"
           title="{{ getAppName() }}">
            <img src="{{ !getLoggedInUser()->hasRole('Super Admin') ? asset($hospitalSettingValue['app_logo']['value']) : asset($settingValue['app_logo']['value']) }}"
                 width="50px" height="50px"
                 alt="Logo"/>
            <span class="navbar-brand-name text-dark text-decoration-none logo ps-2">{{ (!getLoggedInUser()->hasRole('Super Admin') ? $hospitalSettingValue['app_name']['value'] : $settingValue['app_name']['value']) }}</span>
        </a>

        <!--end::Logo-->
        <button type="button" class="btn px-0 aside-menu-container__aside-menubar d-lg-block d-none sidebar-btn">
            <i class="fa-solid fa-bars fs-1"></i>
        </button>

    </div>
    <!--end::Brand-->
    <form class="d-flex position-relative aside-menu-container__aside-search search-control py-3 mt-1">
        <div class="position-relative w-100 sidebar-search-box">
            <input class="form-control" type="text" placeholder="{{__('messages.common.search')}}" id="menuSearch" aria-label="Search">
            <span class="aside-menu-container__search-icon position-absolute d-flex align-items-center top-0 bottom-0">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
        </div>
    </form>
    <div class="no-record text-white text-center d-none">No matching records found</div>
    <div class="sidebar-scrolling overflow-auto">
        <ul class="aside-menu-container__aside-menu nav flex-column">
            @include('layouts.menu')
        </ul>
    </div>
</div>
<div class="bg-overlay" id="sidebar-overly"></div>
