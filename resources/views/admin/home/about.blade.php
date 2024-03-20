<x-app-layout>
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <x-head-content title="{{ trans('messages.home_about') }}"
                description="{{ trans('messages.home_about_description') }}" />
        </div>
    </div>
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-stretch">
            <div class="card-inner pt-0 mt-3">
                <form method="post" class="gy-3" action="{{ route('admin.home.about.update') }}"
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
                                    autocomplete="title" value="{{ $about->title }}" />
                                <x-input-error :version='2' class="mt-2" :messages="$errors->get('title')" />
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
                                    $about->description }}</x-input-text-area>
                                <x-input-error :version='2' class="mt-2" :messages="$errors->get('description')" />
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <x-input-label class="form-label" for="image_1" :value="__('Image 1')" />
                                <span class="form-note">Specify the image 1 of your Profile. The image should be
                                    500x720.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <x-input-file id="image_1" name="image_1" :value="__('500 x 720')" />
                                <x-input-error :version='2' class="mt-2" :messages="$errors->get('image_1')" />
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <x-input-label class="form-label" for="image_2" :value="__('Image 2')" />
                                <span class="form-note">Specify the image 2 of your Profile. The image should be
                                    353x287.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <x-input-file id="image_2" name="image_2" :value="__('353 x 287')" />
                                <x-input-error :version='2' class="mt-2" :messages="$errors->get('image_2')" />
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <x-input-label class="form-label" for="image_3" :value="__('Image 3')" />
                                <span class="form-note">Specify the image 3 of your Profile. The image should be
                                    224x237.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <x-input-file id="image_3" name="image_3" :value="__('224 x 237')" />
                                <x-input-error :version='2' class="mt-2" :messages="$errors->get('image_3')" />
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
