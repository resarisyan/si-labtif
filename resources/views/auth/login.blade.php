<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Sign-In</h4>
            <div class="nk-block-des">
                <p>Access the Aslabti system panel using your email and password.</p>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <x-input-label for="credential" :value="__('Email/Username')" />
            <x-input-text id="credential" type="text" name="credential" :value="old('credential')" required autofocus
                autocomplete="credential" placeholder="Enter your email address or username" />
            <x-input-error :version='2' class="mt-2" :messages="$errors->get('email')" />
            <x-input-error :version='2' class="mt-2" :messages="$errors->get('username')" />
        </div>
        <div class="form-group">
            <x-input-label for="password" :value="__('Password')">
            </x-input-label>
            <x-input-text id="password" type="password" name="password" required autocomplete="current-password"
                placeholder="Enter your password">
                <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                </a>
            </x-input-text>
            <x-input-error :version='2' class="mt-2" :messages="$errors->get('password')" />
        </div>
        <div class="form-group">
            <x-primary-button>{{ __('Log in') }}</x-primary-button>
        </div>
    </form>
</x-guest-layout>