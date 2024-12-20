<aside class="app-sidebar sticky" id="sidebar">
    <div class="main-sidebar-header">
        @php
            $logo = @getappconfig()->logo;
            if (!$logo) {
                $logo = asset('ressources/images/logo.png');
            } else {
                $logo = asset('storage/' . $logo);
            }
        @endphp
        <a href="{{ route('login') }}" class="header-logo">
            <img src="{{ $logo }}" alt="logo" class="desktop-logo">
            <img src="{{ $logo }}" alt="logo" class="toggle-logo">
            <img src="{{ $logo }}" alt="logo" class="desktop-dark">
            <img src="{{ $logo }}" alt="logo" class="toggle-dark">
            <img src="{{ $logo }}" alt="logo" class="desktop-white">
            <img src="{{ $logo }}" alt="logo" class="toggle-white">

            {{-- <img src="{{ asset('assets/images/brand-logos/desktop-logo.png') }}" alt="logo" class="desktop-logo">
            <img src="{{ asset('assets/images/brand-logos/toggle-logo.png') }}" alt="logo" class="toggle-logo">
            <img src="{{ asset('assets/images/brand-logos/desktop-dark.png') }}" alt="logo" class="desktop-dark">
            <img src="{{ asset('assets/images/brand-logos/toggle-dark.png') }}" alt="logo" class="toggle-dark">
            <img src="{{ asset('assets/images/brand-logos/desktop-white.png') }}" alt="logo" class="desktop-white">
            <img src="{{ asset('assets/images/brand-logos/toggle-white.png') }}" alt="logo" class="toggle-white"> --}}
        </a>
    </div>
    <div class="main-sidebar" id="sidebar-scroll">
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">
                <li class="slide__category"><span class="category-name">Main</span></li>
                @php
                    $role = auth()->user()->user_role;

                @endphp
                @if ('admin' == $role)
                    @php
                        $cl = Route::is('admin.home') ? 'active open' : '';
                    @endphp
                    <li class="slide has-sub {{ $cl }}">
                        <a href="javascript:void(0);" class="side-menu__item {{ $cl }}">
                            <i class="bx bx-home side-menu__icon"></i>
                            <span class="side-menu__label">Dashboard </span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Dashboard</a>
                            </li>
                            <li class="slide">
                                <a href="{{ route('admin.home') }}"
                                    class="side-menu__item @if (Route::is('admin.home')) active @endif">Dashboard</a>
                            </li>
                        </ul>
                    </li>
                    @php
                        $cl = (Route::is('admin.service') or Route::is('admin.service-request')) ? 'active open' : '';
                    @endphp
                    <li class="slide has-sub {{ $cl }}">
                        <a href="javascript:void(0);" class="side-menu__item {{ $cl }}">
                            <i class="bx bxs-food-menu side-menu__icon"></i>
                            <span class="side-menu__label">Services</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Services</a>
                            </li>
                            <li class="slide">
                                <a href="{{ route('admin.service-request') }}"
                                    class="side-menu__item @if (Route::is('admin.service-request')) active @endif">Demande de service</a>
                            </li>
                            <li class="slide">
                                <a href="{{ route('admin.service') }}"
                                    class="side-menu__item @if (Route::is('admin.service')) active @endif">Services</a>
                            </li>
                        </ul>
                    </li>
                    @php
                        $cl =
                            (Route::is('admin.admins') or Route::is('admin.provider') or Route::is('admin.user'))
                                ? 'active open'
                                : '';
                    @endphp
                    <li class="slide has-sub {{ $cl }}">
                        <a href="javascript:void(0);" class="side-menu__item {{ $cl }}">
                            <i class="bx bxs-user-detail side-menu__icon"></i>
                            <span class="side-menu__label">Utilisateurs </span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Utilisateurs</a>
                            </li>
                            <li class="slide">
                                <a href="{{ route('admin.admins') }}"
                                    class="side-menu__item @if (Route::is('admin.admins')) active @endif">Administrateurs</a>
                            </li>
                            <li class="slide">
                                <a href="{{ route('admin.provider') }}"
                                    class="side-menu__item @if (Route::is('admin.provider')) active @endif">Business</a>
                            </li>
                            <li class="slide">
                                <a href="{{ route('admin.user') }}"
                                    class="side-menu__item @if (Route::is('admin.user')) active @endif">Clients</a>
                            </li>
                        </ul>
                    </li>
                    @php
                        $cl = Route::is('admin.contact') ? 'active open' : '';
                    @endphp
                    <li class="slide has-sub {{ $cl }}">
                        <a href="javascript:void(0);" class="side-menu__item {{ $cl }}">
                            <i class="bx bxs-flag-checkered side-menu__icon"></i>
                            <span class="side-menu__label">Contact</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Contact</a>
                            </li>
                            <li class="slide">
                                <a href="{{ route('admin.contact') }}"
                                    class="side-menu__item @if (Route::is('admin.contact')) active @endif">Contact &
                                    Suggestion</a>
                            </li>
                        </ul>
                    </li>
                    @php
                        $cl =
                            (Route::is('admin.profile') or Route::is('admin.appconfig') or Route::is('admin.category'))
                                ? 'active open'
                                : '';
                    @endphp
                    <li class="slide has-sub {{ $cl }}">
                        <a href="javascript:void(0);" class="side-menu__item {{ $cl }}">
                            <i class="bx bxs-cog side-menu__icon"></i>
                            <span class="side-menu__label">Paramètres</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Paramètres</a>
                            </li>
                            <li class="slide">
                                <a href="{{ route('admin.appconfig') }}"
                                    class="side-menu__item @if (Route::is('admin.appconfig')) active @endif">Configuration</a>
                            </li>
                            <li class="slide">
                                <a href="{{ route('admin.category') }}"
                                    class="side-menu__item @if (Route::is('admin.category')) active @endif">Catégorie
                                    de Business</a>
                            </li>
                            <li class="slide">
                                <a href="{{ route('admin.profile') }}"
                                    class="side-menu__item @if (Route::is('admin.profile')) active @endif">Profil</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if ('provider' == $role)
                    @php
                        $cl =
                            (Route::is('business.service') or Route::is('business.service-request'))
                                ? 'active open'
                                : '';
                    @endphp
                    <li class="slide has-sub {{ $cl }}">
                        <a href="javascript:void(0);" class="side-menu__item {{ $cl }}">
                            <i class="bx bx-home side-menu__icon"></i>
                            <span class="side-menu__label">Dashboard </span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Dashboard</a>
                            </li>
                            <li class="slide">
                                <a href="{{ route('business.service') }}"
                                    class="side-menu__item @if (Route::is('business.service')) active @endif">Services</a>
                            </li>
                            <li class="slide">
                                <a href="{{ route('business.service-request') }}"
                                    class="side-menu__item @if (Route::is('business.service-request')) active @endif">Deamnde
                                    de service</a>
                            </li>
                        </ul>
                    </li>
                    @php
                        $cl = Route::is('business.profile') ? 'active open' : '';
                    @endphp
                    <li class="slide has-sub {{ $cl }}">
                        <a href="javascript:void(0);" class="side-menu__item {{ $cl }}">
                            <i class="bx bxs-cog side-menu__icon"></i>
                            <span class="side-menu__label">Paramètres</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Paramètres</a>
                            </li>
                            <li class="slide">
                                <a href="{{ route('business.profile') }}"
                                    class="side-menu__item @if (Route::is('business.profile')) active @endif">Profil</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if ('user' == $role)
                    @php
                        $cl = Route::is('user.service-request') ? 'active open' : '';
                    @endphp
                    <li class="slide has-sub {{ $cl }}">
                        <a href="javascript:void(0);" class="side-menu__item {{ $cl }}">
                            <i class="bx bx-home side-menu__icon"></i>
                            <span class="side-menu__label">Dashboard </span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Dashboard</a>
                            </li>
                            <li class="slide">
                                <a href="{{ route('user.service-request') }}"
                                    class="side-menu__item @if (Route::is('user.service-request')) active @endif">Demande
                                    de service</a>
                            </li>
                        </ul>
                    </li>
                    @php
                        $cl = Route::is('user.profile') ? 'active open' : '';
                    @endphp
                    <li class="slide has-sub {{ $cl }}">
                        <a href="javascript:void(0);" class="side-menu__item {{ $cl }}">
                            <i class="bx bxs-cog side-menu__icon"></i>
                            <span class="side-menu__label">Paramètres</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Paramètres</a>
                            </li>
                            <li class="slide">
                                <a href="{{ route('user.profile') }}"
                                    class="side-menu__item @if (Route::is('user.profile')) active @endif">Profil</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg>
            </div>
        </nav>
    </div>
</aside>
