@extends('layouts.app')


@section('styles')

@endsection

@section('content')

    <!--start navbar section-->
    @include('layouts.partials.navbar')
    <!--end navbar section-->

    <!--start  slider section-->
    @include('layouts.partials.slider')
    <!--end slider section-->

    <!-- Start About Section -->
    @include('layouts.partials.contents.about')
    <!-- End About Section -->

    <!-- Start Service Section -->
    @include('layouts.partials.contents.service')
    <!-- End Service Section -->

    <!-- start tutorial section -->
    @include('layouts.partials.contents.tutorial')
    <!-- end tutorial section -->

    <!-- Start datacenter Section -->
    @include('layouts.partials.contents.datacenter')
    <!-- End datacenter Section -->

    <!-- Start Online Share Section -->
    @include('layouts.partials.contents.onlineshare')
    <!-- End Online Share Section -->

    <!-- Start We Do -->
    @include('layouts.partials.contents.wedo')
    <!-- End We Do -->

    <!-- start faq -->
    @include('layouts.partials.contents.faq')
    <!-- end faq  -->

    <!-- start help section -->
    @include('layouts.partials.contents.help')
    <!-- end help section -->

    <!-- Start site help  section-->
    @include('layouts.partials.contents.sitehelp')
    <!-- End site help  section -->


@endsection

@section('scripts')

    <script>
        $(function () {
            $(document).scroll(function () {
                var $nav = $(".fixed-top");
                $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
            });
        });
    </script>

@endsection


