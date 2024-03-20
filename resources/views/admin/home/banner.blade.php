<x-app-layout>
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <x-head-content title="{{ trans('messages.home_banner') }}"
                description="{{ trans('messages.home_banner_description') }}" />
        </div>
    </div>
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-stretch">
            <div class="card-inner pt-0 mt-3">
                <form method="post" class="gy-3" action="{{ route('admin.home.banner.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <x-input-label class="form-label" for="title" :value="__('Title')" />
                                <span class="form-note">Specify the title of your About Page.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <x-input-text name="title" id="title" title="title" type="text" required autofocus
                                    autocomplete="title" value="{{ $banner->title }}" />
                                <x-input-error :version='2' class="mt-2" :messages="$errors->get('title')" />
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <x-input-label class="form-label" for="caption" :value="__('Caption')" />
                                <span class="form-note">Specify the caption address of your Banner.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <x-input-text name="caption" id="caption" caption="caption" type="text" required
                                    autofocus autocomplete="caption" value="{{ $banner->caption }}" />
                                <x-input-error :version='2' class="mt-2" :messages="$errors->get('caption')" />
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <x-input-label class="form-label" for="description" :value="__('Description')" />
                                <span class="form-note">Specify the description address of your Profile.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <x-input-text-area id="description" name="description" required>{{
                                    $banner->description }}</x-input-text-area>
                                <x-input-error :version='2' class="mt-2" :messages="$errors->get('description')" />
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <x-input-label class="form-label" for="image" :value="__('Image')" />
                                <span class="form-note">Specify the image of your Banner. The image should be
                                    925x827.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <x-input-file id="image" name="image" :value="__('500 x 720')" />
                                <x-input-error :version='2' class="mt-2" :messages="$errors->get('image')" />
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div class="form-group mt-2">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                @if (session('status') === 'about-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
