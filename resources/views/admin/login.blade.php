<x-login-layout>

    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('authenticate') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input name="email" type="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                </div>
                <div class="form-group has-feedback">
                    <input name="name" type="text" class="form-control" placeholder="Name">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                </div>
                <div class="form-group has-feedback">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input name="remember_token" type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
            </div>

            <a href="#">I forgot my password</a><br>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
</x-login-layout>
