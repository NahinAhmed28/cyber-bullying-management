@php
    use Illuminate\Support\Facades\Session;
    $otps = Session::get('otps');
@endphp
@extends('admin.layouts.app')

@section('content')

    <style>
        .login-card-description {
            font-size: 18px;
            color: #000;
            font-weight: bold;
            margin-bottom: 23px;
        }

        .login-btn {
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

        .login-btn:hover {
            background-color: rgba(252, 122, 16, 0.94);
            color: whitesmoke;
        }

        .form-input-title{
            font-size: 12px;
            font-weight:bold ;
        }
        @media (min-width: 768px) {
            .col-md-6 img {
                margin-left: 25%;
            }

        }


        .password-input {
            position: relative;
        }

        #lock-icon {
            position: absolute;
            top: 50%;
            left: 10px; /* Adjust the left position as needed for the desired gap */
            transform: translateY(-50%);
        }

        #password {
            padding-left: 30px; /* Adjust the padding to control the gap between the lock icon and the input text */
            width: 100%;
        }

        #toggler {
            position: absolute;
            top: 50%;
            right: 10px; /* Adjust the right position as needed for the eye icon */
            transform: translateY(-50%);
        }

        @media (max-width: 767px) {
            /* Apply styles for screens less than 768px wide */
            .secend-column {
                background-image: url('{{ asset('site/assets/images/login_banner.png') }}');
                background-size: cover;
                background-repeat: no-repeat;
            }

            .first-column img {
                display: none; /* Hide the image on small screens */
            }
        }


    </style>

    <div class="row" >
        <div class="col-md-6 first-column" >
            <img id="loginSidebar" src="{{ asset('site/assets/images/login_banner.png') }}" alt="login" class="" >
        </div>
        <div class="col-md-6 secend-column" style="background-color: whitesmoke">
            <img src="{{ asset('site/assets/images/loginArrow.png') }}" alt="login" style="width: 10%" class="mb-2 ml-5">

            <div class="bg-white py-5 mb-5 w-75 mx-auto">
                <!-- Add the 'mx-auto' class to center the content horizontally -->
                <div class="text-center">
                    <img src="{{ asset('site/assets/images/logo.png') }}" alt="logo" class="ml-1">
                </div>
                <br>

                <p class="login-card-description text-center">{{ __('admin.login.title')}}</p>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            {{-- @if(Session::has('error'))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{__('admin.common.success_heading')}}</strong> {{Session::get('error')}}
                                </div>
                            @endif --}}
                            @if ($otps == true)

                                <form method="POST" action="{{ route('admin.loginotp') }}">
                                    {{-- {{ csrf_field() }} --}}
                                    <div class="form-group">
                                        <label for="otp" class="form-input-title">{{ __('admin.login.otp') }}</label>
                                        <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror" name="otp" value="{{ old('otp') }}" required>
                                        
                                        @if (Session::has('error'))
                                        <span class="text-danger">
                                            <strong>{{ Session::get('error') }}</strong>
                                        </span>
                                        @endif
                                    
                                    </div>
                                    <button type="submit" class="btn login-btn">
                                        {{ __('admin.login.save') }}
                                    </button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('admin.login') }}">
                                    {{-- {{ csrf_field() }} --}}
                                    <div class="form-group">
                                        <label for="email" class="form-input-title">{{ __('admin.login.email') }}</label>
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
                                        <label for="password" class="form-input-title">{{ __('admin.login.password') }}</label>
                                        <div class="password-input">
                                            <i id="lock-icon" class="fas fa-lock"></i>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            <span><i id="toggler" class="far fa-eye"></i></span>
                                        </div>
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
                            @endif
                            
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const toggler = document.getElementById('toggler');

        toggler.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggler.className = 'far fa-eye-slash'; // Change the class to the crossed eye icon
            } else {
                passwordInput.type = 'password';
                toggler.className = 'far fa-eye'; // Change the class back to the normal eye icon
            }
        });
    </script>


@endsection

@php
    if(Session::get('check_count') == 2){
        Session::forget(['otps','otp','email','password','check_count']);
    }
    
@endphp
