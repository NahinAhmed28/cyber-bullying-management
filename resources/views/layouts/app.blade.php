<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.head')

    @yield('styles')
</head>
<body>
<div class="wrapper">

      <!--/ Body Content start -->
        @yield('content')
      <!--/ Body Content end -->


    <!-- Footer -->
      @include('layouts.partials.footer')
    <!-- End Footer -->

</div>
        <!-- Javascript Files
        ================================================== -->

    <script type="text/javascript" src="{{asset('assets/landing-page-main/js/bootstrap.min.js')}}"></script>

    <!-- Owl Carousel -->
    <script type="text/javascript" src="{{asset('assets/landing-page-main/js/owl.carousel.min.js')}}"></script>

    <!-- ---Custom Js File--- -->
    <script type="text/javascript" src="{{asset('assets/landing-page-main/js/custom.js')}}"></script>

    <script>
        feather.replace()
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>


{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>--}}





        @yield('scripts')

    </div>
</body>
</html>
