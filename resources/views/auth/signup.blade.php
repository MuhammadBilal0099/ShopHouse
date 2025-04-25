@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center mt-0 mt-sm-5">
        <div class="row w-100 justify-content-center shadow rounded-4 overflow-hidden"
            style="max-width: 720px; height: auto;">

            <!-- Image Side (hidden on screens < 768px) -->
            <div class="col-md-6 d-none d-md-block p-0">
                <img src="{{ asset('assets/images/auth.jpg') }}" alt="Auth Image"
                    class="img-fluid w-100 h-100" style="object-fit: cover; height: 100%;">
            </div>

            <!-- Form Side -->
            <div class="col-md-6 col-12 bg-white d-flex justify-content-center p-4">
                <div class="w-100" style="max-width: 380px;">
                    <h2 class="text-center fw-bold signIn mb-3">Sign Up</h2>

                    @if (session('login_error'))
                        <div class="alert alert-danger text-center">
                            {{ session('login_error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('userLogin') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold small-text">Name *</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold small-text">Email *</label>
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
                            <label for="password" class="form-label fw-semibold small-text">Password *</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password" required>
                            @error('password')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label small-text" for="remember">Remember Me</label>
                        </div>

                        <button type="submit" class="btn w-100 text-white fw-semibold py-2 mb-3 f-s"
                            style="background-color: #f44316; border-radius: 50px;">Sign Up</button>

                        <p class="text-center text-muted f-s mb-0">Already have an account?
                            <a href="{{route('loginForm')}}" class="text-decoration-none signIn fw-semibold">Sign in</a>
                        </p>
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

        .form-label {
            margin-bottom: 4px;
        }

        .signIn {
            color: #f44316;
        }

        .f-s {
            font-size: 13px;
        }

        .small-text {
            font-size: 14px;
        }

        @media (max-width: 767.98px) {
            .container {
                padding: 20px 10px;
            }

            .shadow {
                box-shadow: none !important;
            }
        }
    </style>
@endsection
