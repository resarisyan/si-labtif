<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ms-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                        class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="html/index.html" class="logo-link">
                    <x-application-logo />
                </a>
            </div>
            <div class="nk-header-news d-none d-xl-block">
                <div class="nk-news-list">
                    <a class="nk-news-item" href="https://www.youtube.com/@labtifunsur5948">
                        <div class="nk-news-icon">
                            <em class="icon ni ni-card-view"></em>
                        </div>
                        <div class="nk-news-text">
                            <p>
                                <span>Labtif Unsur</span> now available on YouTube Channel
                            </p>
                            <em class="icon ni ni-external"></em>
                        </div>
                    </a>
                </div>
            </div>
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                                <div class="user-info d-none d-md-block">
                                    <div class="user-status">{{ Auth::user()->roles[0]->name }}</div>
                                    <div class="user-name dropdown-indicator">
                                        {{ Auth::user()->name }}
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        @php
                                        $initialsArray = array_map(function($word) {
                                        return strtoupper(substr($word, 0, 1));
                                        }, explode(' ', Auth::user()->name));
                                        $initials = implode('', array_slice($initialsArray, 0, 2));
                                        @endphp
                                        <span>{{ $initials }}</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{ Auth::user()->name }}</span>
                                        <span class="sub-text">{{ Auth::user()->email }}m</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <a href="{{ route('profile.edit') }}"><em
                                                class="icon ni ni-setting-alt"></em><span>Account
                                                Setting</span></a>
                                    </li>
                                    <li>
                                        <a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark
                                                Mode</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button id="logout" type="submit" class="btn btn-danger">
                                                <em class="icon ni ni-signout"></em><span>Sign out</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>