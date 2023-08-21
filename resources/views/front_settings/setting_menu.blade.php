<ul class="nav nav-tabs mb-5 pb-1 overflow-auto flex-nowrap text-nowrap" id="home" role="tablist">
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <a class="nav-link {{(isset($sectionName) && $sectionName ==='cms' || Request::is('front-cms-settings*')) ? 'active' : ''}}" href="{{                   route('front.settings.index', ['section' => 'cms']) }}" tabindex="-1">{{ __('messages.landing.home') }}</a>
    </li>
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <a class="nav-link {{(isset($sectionName) && $sectionName === 'about-us') ? 'active' : ''}}" href="{{ route('front.settings.index',                     ['section' => 'about-us']) }}" tabindex="-1">{{ __('messages.landing_cms.about_us') }}</a>
    </li>
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <a class="nav-link {{(isset($sectionName) && $sectionName === 'appointment') ? 'active' : ''}}" href="{{ route('front.settings.index',                 ['section' => 'appointment']) }}" tabindex="-1">{{ __('messages.web_menu.appointment') }}</a>
    </li>
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <a class="nav-link {{(isset($sectionName) && $sectionName === 'terms-and-conditions') ? 'active' : ''}}" href="{{ route('front.settings.index',['section' => 'terms-and-conditions']) }}" tabindex="-1">{{ __('messages.front_setting.terms_conditions') }}</a>
    </li>
</ul>
