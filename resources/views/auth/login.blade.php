@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div class="logo d-flex align-items-center justify-content-center">
                            <img src="{{ asset('logo.jpeg') }}" alt="Logo" >
                        </div>
                    </div>
                    <p class="mt-4 mb-4 text-center sign-text">memomo へサイン</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row d-flex justify-content-center mb-0">

                            <div class="col-md-6">
                                <input id="email"
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}"
                                required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row d-flex justify-content-center">
                            <div class="col-md-6 d-flex justify-content-center">
                                <input id="password"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                required autocomplete="current-password">
                                <div class="input-group-prepend">
                                    <button class="input-group-text">→</button>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row d-flex justify-content-center mt-5">
                            <div class="col-md-6 d-flex justify-content-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        サインインしたままにする
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr style="width: 400px;">
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    パスワード忘れた？
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
@endsection
