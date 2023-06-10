@extends('layouts.app')

@section('content')

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Login -->
            <div class="card" style="border: 5px orange groove;">
                <div class="card-header  text-white" style="background-color: rgb(255, 149, 0)"><h4 class="mb-2 text-center">{{ __('Login') }} 👋</h4></div>
                <div class="card-body">

                    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">{{ __('Password') }}</label>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                            <div class="input-group input-group-merge">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input my-1" type="checkbox" name="remember" id="remember" style="width: 25px; height: 25px;"
                                {{old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label mx-2" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-outline-warning d-grid w-100" type="submit"> {{ __('Login') }}</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>New on our platform?</span>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            <span>Create an account</span>
                        </a>
                        @endif
                    </p>
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>
</div>
@endsection
