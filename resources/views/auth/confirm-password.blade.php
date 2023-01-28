<x-main-layout>
    <style>
        .header-bottom {
            margin-bottom: 0;
        }
    </style>
    <x-nav-status>
        {{ __('Confirm Password') }}
    </x-nav-status>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="my-5 p-3 card">
                    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                    </div>
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <!-- Password -->
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full py-2" type="password" name="password"
                            required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <div class="mt-4">
                            <button type="submit" class="register-button mt-0">
                                {{ __('Confirm') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-main-layout>
