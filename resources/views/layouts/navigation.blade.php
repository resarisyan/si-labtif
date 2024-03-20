<div class="nk-sidebar nk-sidebar-fixed is-dark" data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                    class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em
                    class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-sidebar-brand">
            <a href="#" class="logo-link nk-sidebar-logo">
                <x-application-logo />
            </a>
        </div>
    </div>
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Pages</h6>
                    </li>
                    <x-menu-link url="{{ route('dashboard') }}" iconClass="icon ni ni-dashlite">Dashboard</x-menu-link>
                    @role('admin')
                    <x-menu-link url="{{ route('admin.asisten.index') }}" iconClass="icon ni ni-user-list">{{
                        trans('messages.assistant_page') }}</x-menu-link>
                    <x-menu-link url="{{ route('admin.mahasiswa.index') }}" iconClass="icon ni ni-users">{{
                        trans('messages.student_page') }}</x-menu-link>
                    <x-menu-link url="{{ route('admin.jurusan.index') }}" iconClass="icon ni ni-flag">{{
                        trans('messages.major_page') }}</x-menu-link>
                    <x-menu-link url="{{ route('admin.kelas.index') }}" iconClass="icon ni ni-list-thumb">{{
                        trans('messages.class_page') }}</x-menu-link>
                    <x-menu-link url="{{ route('admin.ruangan.index') }}" iconClass="icon ni ni-layout">{{
                        trans('messages.room_page') }}</x-menu-link>
                    <x-menu-link url="{{ route('admin.mata-praktikum.index') }}" iconClass="icon ni ni-template">{{
                        trans('messages.practical_lesson_page') }}</x-menu-link>
                    <x-menu-link url="{{ route('admin.periode.index') }}" iconClass="icon ni ni-calendar">{{
                        trans('messages.period_page') }}</x-menu-link>
                    <x-menu-link class="nk-menu-item has-sub" hasSub="{{ true }}">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                            <span class="nk-menu-text">Home Page</span>
                        </a>
                        <ul class="nk-menu-sub" style="display: none;">
                            <li class="nk-menu-item">
                                <a href="{{ route('admin.home.about.index') }}" class="nk-menu-link"><span
                                        class="nk-menu-text">About</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('admin.home.banner.index') }}" class="nk-menu-link"><span
                                        class="nk-menu-text">Banner</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('admin.home.faq.index') }}" class="nk-menu-link"><span
                                        class="nk-menu-text">Faq</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('admin.home.supporter.index') }}" class="nk-menu-link"><span
                                        class="nk-menu-text">Supporter</span></a>
                            </li>
                        </ul>
                    </x-menu-link>
                    @endrole
                </ul>
            </div>
        </div>
    </div>
</div>