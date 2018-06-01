@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      {{--<div class="login-box">--}}
        <form class="form-signin text-center" method="POST" action="{{ route('login') }}" style="padding-top: 80px!important;">
          @csrf
          {{--<img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">--}}
          <h1 class="h3 mb-3 font-weight-normal">{{ __('Login') }}</h1>

          <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
          <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                 placeholder="Email Address" name="email" value="{{ old('email') }}" required autofocus>
          @if ($errors->has('email'))
            <span class="invalid-feedback">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
          @endif

          <label for="password" class="sr-only">Password</label>
          <input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                 placeholder="Password" name="password" required>
          @if ($errors->has('password'))
            <span class="invalid-feedback">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
          @endif
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox"
                     name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
          </a>
          <a class="btn btn-link float-right" href="{{ route('register') }}">{{ __('Register') }}</a>
          <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
        </form>
      {{--</div>--}}
    </div>
  </div>
@endsection
