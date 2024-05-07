<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', @ $sitesetting->{'title_'. app()->getLocale()} )</title>

    @if($sitesetting->favicon)
        <link href="{{ asset('storage/'.$sitesetting->favicon) }}" type="image/x-icon"
            rel="shortcut icon" />
    @else
        <link href="{{ asset('site/assets/images/favicon.png') }}" type="image/x-icon"
            rel="shortcut icon" />
    @endif

    <!-- Scripts -->
    <script src="{{ asset('assets/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <footer class="main-footer">
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div style="text-align: center;">
                    <img src="{{ asset('site/assets/images/footer_logo.png') }}" title="{{(app()->getLocale() == 'en') ? 'Planning and Implementation' : 'পরিকল্পনা ও বাস্তবায়ন'}}">
                </div>
            </div>
            <div class="col-md-6">
                <div style="text-align: center; font-weight:bold">
                    @if (@$sitesetting->{'footer_'. app()->getLocale()} )
                        {!! $sitesetting->{'footer_'. app()->getLocale()} !!}
                    @else
                        {{(app()->getLocale() == 'en') ? ' © 2023 - Cyber Crime Prevention Committee for Teens and a2i (Aspire to Innovate)' : ' © ২০২৩ - কিশোর কিশোরীদের জন্য সাইবার অপরাধ প্রতিরোধ কমিটি এবং a2i (Aspire to Innovate)'}}
                    @endif
                </div>
            </div>
            <div class="col-md-3">
                <div style="text-align: center;">
                    <img src="{{ asset('site/assets/images/np-logo-set.png') }}" title="{{(app()->getLocale() == 'en') ? 'Planning and Implementation' : 'পরিকল্পনা ও বাস্তবায়ন'}}">
                </div>
            </div>
        </div>
        <hr>

    </footer>




    <!-- REQUIRED SCRIPTS -->
    {{-- @include('admin.layouts.partials.scripts') --}}
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    {{-- <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
    --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    @yield('scripts')
</body>

</html>
