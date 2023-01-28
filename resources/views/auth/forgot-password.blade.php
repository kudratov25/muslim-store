<x-main-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <!-- Begin Login Content Area -->
    <div class="page-section mb-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 m-5 mx-auto">
                    <!-- Login Form s-->
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">{{__('Forgot your password?')}}</h4>
                            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email')" required autofocus />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-warning mt-0">
                                        {{ __('Email Password Reset Link') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
