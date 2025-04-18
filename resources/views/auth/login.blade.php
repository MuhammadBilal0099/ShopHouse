@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10 width-90">
                <div class="card border-0 rounded-4 overflow-hidden shadow-sm">
                    <div class="row g-0">
                        <!-- Image Side -->
                        <div class="col-md-6 d-none d-md-block">
                            <img src="{{ asset('assets/images/auth.jpg') }}" alt="Fashion"
                                class="img-fluid h-100 w-100 object-fit-cover" style="object-fit: cover;">
                        </div>

                        <!-- Form Side -->
                        <div class="col-md-6 p-4  bg-white">
                            <h2 class="text-center fw-bold mb-2 signIn">Sign In</h2>
                            <p class="text-center mb-4 shopping">Sign in to continue shopping</p>

                            <form method="POST">
                                @csrf

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="email" class="form-label fw-bold mb-0">Email *</label>
                                        <a href="#" class="text-decoration-none font-color">Use Phone Instead</a>
                                    </div>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="password" class="form-label fw-bold">Password *</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required>
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
                                    <a href="#" class="text-decoration-none font-color">Forgot Password?</a>
                                </div>

                                <button type="submit" class="btn w-100 text-white fw-semibold py-2 mb-3"
                                    style="background-color: #f44316;">Sign In</button>

                                <p class="text-center mt-3 mb-2 text-muted fs-20">Don't have an account?
                                    <a href="#" class="text-decoration-none signIn fw-semibold">Sign Up</a>
                                </p>

                                <div class="text-center mt-4">
                                    <p class="text-muted fw-bold fs-20">For quick demo login click below</p>
                                </div>

                                <div class="row g-2">
                                    <div class="col-6">
                                        <a href="#" class="btn w-100 text-white responsive-btn"
                                            style="background-color: #f77e21;">Admin</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn w-100 text-white responsive-btn"
                                            style="background-color: #00b894;">Customer</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn w-100 text-white responsive-btn"
                                            style="background-color: #0984e3;">Manager</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn w-100 text-white responsive-btn"
                                            style="background-color: rgb(168, 85, 247); white-space: nowrap;">POS Operator</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #fafafa;
        }

        .form-control {
            padding: 10px;
            border-radius: 8px;
        }

        .form-control:focus {
            border-color: #f44316;
            box-shadow: 0 0 0 0.2rem rgba(244, 67, 22, 0.25);
        }

        .font-color {
            color: #f44316;
        }

        .btn {
            border-radius: 8px;
            font-size: 16px;
            padding: 10px 0;
        }

        .signIn {
            color: #f44316;
            font-size: 25px;
        }

        .shopping {
            font-size: 16px;
            font-weight: bold;
        }

        .fs-20 {
            font-size: 18px;
        }

        .card {
            border-radius: 1rem;
        }

        .card .img-fluid {
            height: 100%;
            object-fit: cover;
        }

        @media (min-width: 576px) {
            .container {
                max-width: 100%;
            }
        }

        @media (max-width: 1026px) {
            .width-90 {
                width: 90% !important;
            }
        }

        /* @media (min-width: 770px) {
            .width-90 {
                width: 92% !important;
            }
        } */
    </style>
@endsection
