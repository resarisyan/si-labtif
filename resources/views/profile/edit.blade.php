<x-app-layout>
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <x-head-content title="{{ trans('messages.account_settings') }}"
                description="{{ trans('messages.account_settings_description') }}" />
        </div>
    </div>
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-stretch">
            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#profile"><em
                            class="icon ni ni-user-fill-c"></em><span>{{ __('Profile Information') }}</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#security"><em
                            class="icon ni ni-lock-alt-fill"></em><span>{{ __('Security Settings') }}</span></a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="profile">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <div class="tab-pane" id="security">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
</x-app-layout>