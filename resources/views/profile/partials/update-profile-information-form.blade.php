<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('السيرة الذاتية') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("اذا كنت ترغب في تعديل سيرتك الذاتية وبريدك الإلكتروني.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('الاسم')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('البريد الإلكتروني')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
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

        <div>
            <x-input-label for="mobile" :value="__('رقم الجوال')" />
            <x-text-input id="mobile" name="mobile" type="text" class="mt-1 block w-full" :value="old('mobile', $user->mobile)" required autofocus autocomplete="mobile" />
            <x-input-error class="mt-2" :messages="$errors->get('mobile')" />
        </div>

        <div>
            <x-input-label for="skills" :value="__('المهارات')" />
            <x-text-input id="skills" name="skills" type="text" class="mt-1 block w-full" :value="old('skills', $user->skills)" autofocus autocomplete="skills" />
            <x-input-error class="mt-2" :messages="$errors->get('skills')" />
        </div>

        <div>
            <x-input-label for="wisdom" :value="__('حكمة')" />
            <x-text-input id="wisdom" name="wisdom" type="text" class="mt-1 block w-full" :value="old('wisdom', $user->wisdom)" autofocus autocomplete="wisdom" />
            <x-input-error class="mt-2" :messages="$errors->get('wisdom')" />
        </div>

        {{-- <div>
            <x-input-label for="image" :value="__('صورة الملف الشخصي')" />
            <input id="image" name="image" type="file" class="mt-1 block w-full">
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div> --}}
        <label>صورة الملف الشخصي القديمة</label>
        <img @if (isset($user['image'])) width="100px" height="100px" src="{{asset('admin/images/admin_images/'.$user['image'])}}"  @endif  class="img-fluid animated" alt="">
        <div class="form-group">
            <label  for="image">إضافة صورة الملف الشخصي</label>
            <input type="file" class="form-control"  id="image" hidden
             name="image">
        </div>
        <div class="input-group mb-3" >
            <span style="cursor: pointer" class="input-group-text" id="text_input_span_id">قم بإضافة صورتك الشخصية</span>
            <input type="text" id='text_input_id'  class="form-control"  placeholder="صورة الملف الشخصي" >
          </div>
        

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('حفظ') }}</x-primary-button>

           

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
