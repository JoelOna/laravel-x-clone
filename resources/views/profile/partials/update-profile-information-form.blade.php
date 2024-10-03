<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
            <section class="min-w-0">
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                        :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                        :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
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
                <div class="mt-4">
                    <x-input-label for="user_bio" :value="__('User Bio')" />
                    <x-text-area id="user_bio" name="user_bio" >{{ old('user_bio', $user->user_bio) }}</x-textarea>
                    <x-input-error :messages="$errors->get('user_bio')" class="mt-2" />
                </div>
                
            </section>
            <section class="min-w-0">
                <div class="mb-4">
                    <x-input-label for="user_location" :value="__('User Location')" />
                    <x-text-input id="user_location" name="user_location" type="text" class="mt-1 block w-full"
                        :value="old('user_location', $user->user_location)" autofocus autocomplete="user_location" />
                    <x-input-error class="mt-2" :messages="$errors->get('user_location')" />
                </div>
                <div>
                    <x-input-label for="user_name_x" :value="__('User Name X')" />
                    <x-text-input id="user_name_x" name="user_name_x" type="text" class="mt-1 block w-full"
                        :value="old('user_name_x', $user->user_name_x)" autofocus autocomplete="user_name_x" />
                    <x-input-error class="mt-2" :messages="$errors->get('user_name_x')" />
                </div>
         
            </section>
           
        </div>
        <section class="gird grid-cols-2">
            <div>
                <x-input-label for="background_image" :value="__('User background image')" />
                <x-upload-img id="background_image" name="background_image" class="mt-1 block w-full" :img_class="'w-8/12 h-42 rounded-sm border border-gray-700 object-contain mx-auto'"
                    :src="old('background_image', $user->background_image)" autofocus autocomplete="background_image" />
                <x-input-error class="mt-2" :messages="$errors->get('background_image')" />
            </div>
            <div>
                <x-input-label for="user_img" :value="__('User Image')" />
                <x-upload-img id="user_img" name="user_img" class="mt-1 block w-full" :img_class="'w-36 h-36 rounded-full border border-gray-700 object-contain'"
                    :src="old('user_img', $user->user_img)" autofocus autocomplete="user_img" />
                <x-input-error class="mt-2" :messages="$errors->get('user_img')" />
            </div>
        </section>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
