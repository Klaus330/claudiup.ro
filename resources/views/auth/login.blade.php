@extends('layouts.app')

@section('content')
<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
    <form class="login-form" action="{{ route('login') }}" aria-label="{{ __('Login') }}" method="POST">
        @csrf
      <div class="row">
        <div class="input-field col s12 center">
          <img src="/images/logo3.png" alt="" class="circle responsive-img valign profile-image-login">
          <p class="center login-form-text">Claudiu Popa - Webiste</p>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-5">person_outline</i>
          <input id="email" name="email" type="text" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback red-text" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif   
          <label for="email" class="center-align">Email</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-5">lock_outline</i>
          <input id="password"  name="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback red-text" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m12 l12 ml-2 mt-3">
          <input type="checkbox" name='remember' id="remember-me" {{ old('remember') ? 'checked' : '' }}>
          <label for="remember-me">Remember me</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <button type="submit"     class="btn waves-effect waves-light col s12">Login</button>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6 m6 l6">
          <p class="margin right-align medium-small"><a href="{{ route('password.request') }}">Forgot password ?</a></p>
        </div>
      </div>
    </form>
    </div>
</div>
@endsection

