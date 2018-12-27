@extends('layouts.app')

@section('content')

<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
    <form class="login-form" method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
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
          <input id="email" name="email" type="text" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="red-text" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif   
          <label for="email" class="center-align">Email</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-5">lock_outline</i>
          <input id="password"  name="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback red-text" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          <label for="password">Password</label>
        </div>
      </div>

      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-5">lock_outline</i>
          <input id="password" name="password_confirmation" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback red-text" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          <label for="password">Password confirmation</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <button type="submit"     class="btn waves-effect waves-light col s12">Confirm</button>
        </div>
      </div>
    </form>
    </div>
</div>
@endsection
