<div class="card-inner pt-0">
    <h4 class="title nk-block-title"> {{ __('Profile Information') }}</h4>
    <p> {{ __("Update your account's profile information and email address.") }}</p>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form method="post" action="{{ route('profile.update') }}" class="gy-3 form-settings">
        @csrf
        @method('patch')
        <div class="row g-3 align-center">
            <div class="col-lg-5">
                <div class="form-group">
                    <x-input-label class="form-label" for="name" :value="__('Name')" />
                    <span class="form-note">Specify the name of your Profile.</span>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group">
                    <x-input-text id="name" name="name" type="text" :value="old('name', $user->name)" required autofocus
                        autocomplete="name" />
                    <x-input-error :version='2' class="mt-2" :messages="$errors->get('name')" />
                </div>
            </div>
        </div>
        <div class="row g-3 align-center">
            <div class="col-lg-5">
                <div class="form-group">
                    <x-input-label class="form-label" for="email" :value="__('Email')" />
                    <span class="form-note">Specify the email address of your Profile.</span>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group">
                    <x-input-text id="email" name="email" type="email" :value="old('email', $user->email)" required
                        autofocus autocomplete="email" />
                    <x-input-error :version='2' class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-lg-12">
                <div class="form-group mt-2">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                    @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>