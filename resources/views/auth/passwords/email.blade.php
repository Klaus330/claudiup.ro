@extends('layouts.app')

@section('content')
<div id="login-page" class="row">
  <div class="col s12 z-depth-4 card-panel">
    <form class="login-form"method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
        @csrf
      <div class="row">
        <div class="input-field col s12 center">
          <h4>Forgot Password</h4>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-5">person_outline</i>
          <input id="username" name="email" type="text" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="red-text" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          <label for="username" class="center-align">Email</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <button class="btn waves-effect waves-light col s12">{{ __('Send Password Reset Link') }}</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
