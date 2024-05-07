@extends('admin.layouts.app')

@section('content')

    <style>
        .login-card {
            border: 0;
            border-radius: 27.5px;
            box-shadow: 0 10px 30px 0 rgba(172, 168, 168, 0.43);
            /*overflow: hidden;*/
        }

        .login-card-img {
            border-radius: 0;
            position: unset;
            -o-object-fit: cover;
            object-fit: cover;
        }

        .login-card .card-body {
            padding: 85px 60px 60px;
        }

        @media (max-width: 422px) {
            .login-card .card-body {
                padding: 35px 24px;
            }
        }

        .login-card-description {
            font-size: 18px;
            color: #000;
            font-weight: bold;
            margin-bottom: 23px;
        }

        .login-card form {
            max-width: 326px;
        }

        .login-card .form-control {
            border: 1px solid #d5dae2;
            padding: 15px 25px;
            margin-bottom: 20px;
            min-height: 45px;
            font-size: 13px;
            line-height: 15;
            font-weight: normal;
        }

        .login-card .form-control::-webkit-input-placeholder {
            color: #919aa3;
        }

        .login-card .form-control::-moz-placeholder {
            color: #919aa3;
        }

        .login-card .form-control:-ms-input-placeholder {
            color: #919aa3;
        }

        .login-card .form-control::-ms-input-placeholder {
            color: #919aa3;
        }

        .login-card .form-control::placeholder {
            color: #919aa3;
        }

        .login-card .login-btn {
            padding: 13px 20px 12px;
            background-color: #000;
            font-size: 17px;
            font-weight: bold;
            line-height: 20px;
            margin-bottom: 24px;
            width: 100%;
            background-color: rgba(252, 79, 16, 0.94);
            color: white;
            border-radius: 10px!important;
        }

        .login-card .login-btn:hover {
            border: 1px solid #000;
            background-color: transparent;
            color: #000;
        }

        .login-card .forgot-password-link {
            font-size: 14px;
            color: #919aa3;
            margin-bottom: 12px;
        }

        .login-card-footer-text {
            font-size: 16px;
            color: #0d2366;
            margin-bottom: 60px;
        }

        @media (max-width: 767px) {
            .login-card-footer-text {
                margin-bottom: 24px;
            }
        }

        .login-card-footer-nav a {
            font-size: 14px;
            color: #919aa3;
        }

        /* Zoom out and fit content within the container */
        @media (min-width: 768px) {
            .container {
                display: flex;
                justify-content: center;
                max-height: 100vh;
                /*overflow: hidden;*/
            }

            .col-md-6 {
                padding: 0;
            }

            .col-md-6 img {
                width: 100%;
                height: auto;
            }
        }
    </style>

    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <img src="{{ asset('site/assets/images/login_banner.png') }}" alt="login" class="login-card-img">
                </div>
                <div class="col-md-6" style="background-color: whitesmoke">

                    <div class="card-body" style="padding-top: 55px !important;">
                        {{-- @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif --}}
                        <img src="{{ asset('site/assets/images/loginArrow.png') }}" alt="login" style="width: 20%" class="mb-2">

                        <div class="bg-white py-5 mb-5">
                            <div class="brand-wrapper text-center ">
                                <img src="{{ asset('site/assets/images/logo.png') }}" alt="logo" class="logo">
                            </div>
                            <br>

                            <p class="login-card-description text-center">{{ __('admin.login.title')}}</p>

                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <form method="POST" action="{{ route('admin.login') }}">
                                            {{-- {{ csrf_field() }} --}}
                                            <div class="form-group">
                                                <label for="email" class="sr-only">{{ __('admin.login.email') }}</label>
                                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @if (Session::has('error'))
                                                    <span class="text-danger">
                                    <strong>{{ Session::get('error') }}</strong>
                                </span>
                                                @else
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                @endif
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="password" class="sr-only">{{ __('admin.login.password') }}</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn login-btn">
                                                {{ __('admin.login.save') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center">
                            <img src="{{ asset('site/assets/images/footer_logo.png') }}" alt="login" class="login-card-img mb-2 p-3 bg-white"
                                 style="border-radius: 10px">
                        <h6 class="text-center mt-1">কপিরাইট এক্সেস টু ইনফরমেশন, প্রধানমন্ত্রী কার্যালয়</h6>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
