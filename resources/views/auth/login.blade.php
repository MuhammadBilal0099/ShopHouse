@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center min-vh-100" style="padding-top: 35px">
        <div class="row w-100 justify-content-center shadow rounded-4 overflow-hidden" style="max-width: 960px; height: 650px;">

            <!-- Image Side -->
            <div class="col-lg-6 col-12 p-0 d-none d-lg-block">
                <img src="{{ asset('assets/images/auth.jpg') }}" alt="Auth Image" class="img-fluid h-100 w-100"
                    style="object-fit: cover;">
            </div>

            <!-- Form Side -->
            <div class="col-lg-6 col-12 bg-white d-flex justify-content-center px-4" style="padding-top: 25px">
                <div class="w-100" style="max-width: 420px;">
                    <h2 class="text-center fw-bold signIn mb-1">Sign In</h2>
                    <p class="text-center shopping mb-4">Sign in to continue shopping</p>

                    @if (session('login_error'))
                        <div class="alert alert-danger text-center">
                            {{ session('login_error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('userLogin') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email *</label>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span></span>
                                <a href="#" class="text-decoration-none signIn f-s">Use Phone Instead</a>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Password *</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required>
                            @error('password')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                            <a href="#" class="text-decoration-none signIn">Forgot Password</a>
                        </div>

                        <button type="submit" class="btn w-100 text-white fw-semibold py-2 mb-3 f-s"
                            style="background-color: #f44316; border-radius: 50px;">Sign In</button>

                        <p class="text-center mt-3 mb-2 text-muted f-s">Don't have an account?
                            <a href="#" class="text-decoration-none signIn fw-semibold">Sign Up</a>
                        </p>

                        <div class="text-center mt-4">
                            <p class="text-muted fw-bold f-s">For quick demo login click below</p>
                        </div>

                        <div class="row g-2">
                            <div class="col-6">
                                <a href="#" class="btn w-100 text-white" style="background-color: #f77e21;">Admin</a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn w-100 text-white"
                                    style="background-color: #00b894;">Customer</a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn w-100 text-white"
                                    style="background-color: #0984e3;">Manager</a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn w-100 text-white"
                                    style="background-color: rgb(168, 85, 247); white-space: nowrap;">POS Operator</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <style>
        body {
            background-color: #fafafa;
        }

        .form-control {
            padding: 10px 12px;
            border-radius: 8px;
        }

        .form-control:focus {
            border-color: #f44316;
            box-shadow: 0 0 0 0.2rem rgba(244, 67, 54, 0.25);
        }

        .signIn {
            color: #f44316;
        }

        .shopping {
            font-size: 18px;
            font-weight: 500;
        }

        .f-s {
            font-size: 13px;
        }
    </style>
@endsection
