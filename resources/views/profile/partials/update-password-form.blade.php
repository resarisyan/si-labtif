<div class="card-inner pt-0">
    <h4 class="title nk-block-title"> {{ __('Security Settings') }}</h4>
    <p> {{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
    <form method="post" action="{{ route('password.update') }}" class="gy-3 form-settings">
        @csrf
        @method('put')
        <div class="row g-3 align-center">
            <div class="col-lg-5">
                <div class="form-group">
                    <x-input-label class="form-label" for="update_password_current_password"
                        :value="__('Current Password')" />
                    <span class="form-note">Your current password.</span>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group">
                    <x-input-text id="update_password_current_password" name="current_password" type="password" required
                        autocomplete="current-password" />
                    <x-input-error :version='2' class="mt-2"
                        :messages="$errors->updatePassword->get('current_password')" />
                </div>
            </div>
        </div>
        <div class="row g-3 align-center">
            <div class="col-lg-5">
                <div class="form-group">
                    <x-input-label class="form-label" for="update_password_password" :value="__('New Password')" />
                    <span class="form-note">Your new password.</span>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group">
                    <x-input-text id="update_password_password" name="password" type="password" required
                        autocomplete="new-password" />
                    <x-input-error :version='2' class="mt-2" :messages="$errors->updatePassword->get('password')" />
                </div>
            </div>
        </div>
        <div class="row g-3 align-center">
            <div class="col-lg-5">
                <div class="form-group">
                    <x-input-label class="form-label" for="update_password_password_confirmation"
                        :value="__('Confirm Password')" />
                    <span class="form-note">Confirm your new password.</span>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group">
                    <x-input-text id="update_password_password_confirmation" name="password_confirmation"
                        type="password" required autocomplete="new-password" />
                    <x-input-error :version='2' class="mt-2"
                        :messages="$errors->updatePassword->get('password_confirmation')" />
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-lg-12">
                <div class="form-group mt-2">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                    @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>