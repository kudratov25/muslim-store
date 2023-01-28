<x-main-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <!-- Begin Login Content Area -->
    <div class="page-section mb-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 m-5 mx-auto">
                    <!-- Login Form s-->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">Login</h4>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email')" required autofocus />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                </div>
                                <div class="col-12 mb-20">
                                    <x-input-label for="password" :value="__('Password')" />
                                    <x-text-input id="password" class="block mt-1 w-full" type="password"
                                        name="password" required autocomplete="current-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                </div>
                                <div class="col-md-8 ">
                                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-5 ">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox" name="remember">
                                            <span class="ml-2 text-sm ">{{ __('Remember me') }}</span>
                                        </label>
                                        {{-- <input type="checkbox" id="remember_me">
                                        <label for="remember_me">Remember me</label> --}}
                                    </div>
                                </div>
                                <div class="col-md-4 mt-5 mb-20 text-left text-md-right">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif

                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="register-button mt-0">{{ __('Log in') }}</button>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-end align-middle">
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}">
                                                {{ __('Register new account') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
