@extends('layouts.app')
@section('content')
    <div class="container contain-spac">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="title-style">
                        <h4>Inventory Management System</h4>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters ">
                            <div class="col-md-6 ">
                                <div class="text-center ">
                                    <img src="images/official_logo1.png" class="logo-off" alt="logo">
                                </div><br>
                                <h5 class="cha-font text-center">B Scientific Instrument</h5>
                            </div>
                            <div class="col-md-6 vertical">
                                <h5 class="card-title text-center">Login</h5><br>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row mb-2 justify-content-center">
                                        {{-- <label for="email"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}
                                        <div class="col-md-8">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email"
                                                placeholder="Username" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><br>

                                    <div class="row mb-2 justify-content-center">
                                        {{-- <label for="password"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

                                        <div class="col-md-8">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password" placeholder="password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><br>

                                    {{-- <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}

                                    <div class="row mb-0 justify-content-center">
                                        <div class="col-md-8  ">
                                            <button type="submit" class=" btn btn-primary ">
                                                {{ __('LOGIN') }}
                                            </button>
                                            <button type="#" class=" btn btn-primary float-end ">
                                                {{ __('EXIT') }}
                                            </button>

                                        </div><br><br>


                                        @if (Route::has('password.request'))
                                            {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a> --}}
                                            {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Haven’t account ?  Sign up.') }}
                                    </a> --}}
                                        @endif

                                        <div class="row mb-3 justify-content-center">
                                            @if (Route::has('password.request'))
                                                {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a> --}}
                                                <a class="btn btn-link" {{-- href="{{ route('password.request') }} --}} href="{{ url('/') }}" ">
                                                                    {{ __('Haven’t account ?  Sign up.') }}
                                                                </a>
                                         @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .title-style {
        text-align: center;
        font-family: inter;
        size: 55px;
        padding: var(--bs-card-cap-padding-y) var(--bs-card-cap-padding-x);
    }

    .logo-off {
        width: 174px !important;
        margin-top: 32px;
    }

    .cha-font {
        font-family: inter;
    }

    .card-title {
        font-family: inter;
        size: 40px;
    }

    .vertical {
        border-left: 5px solid #D9D9D9;
        left: 50%;
    }

    .card-body {
        padding: 0px !important;
    }

    .contain-spac {
        padding-top: 5.5rem !important;
        padding-bottom: 1.5rem !important;
    }
</style>
