@extends('layouts.auth')

@section('content')
        <body class="hold-transition login-page">
        <div class="login-box">
          <div class="login-logo">
            <a href="#"><b>Cyclife</a>
          </div>
          <!-- /.login-logo -->
          <div class="login-box-body">
            <p class="login-box-msg">Giriş yap</p>
        
            <form action="{{ route('login') }}" method="POST">
                @csrf
              <div class="form-group has-feedback">
                <input id="email" type="email" placeholder="Mail Adresi" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input id="password" type="password" placeholder="Parola" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="row">
                <div class="col-xs-8">
                  <div class="checkbox icheck">
                    <label>
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Login') }}</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
        
        
            <a href="#">Parola Sıfırla</a><br>
            <a href="{{ route('register') }}" class="text-center">Üye Ol</a>
        
          </div>
          <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
@endsection

