<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', @ $sitesetting->{'title_'. app()->getLocale()} )</title>

    <link rel="stylesheet" href="{{asset('assets/css/font.css')}}">
    @if ($sitesetting->favicon)
        <link href="{{ asset('storage/'.$sitesetting->favicon) }}" type="image/x-icon" rel="shortcut icon" />
    @else
        <link href="{{ asset('site/assets/images/favicon.png') }}" type="image/x-icon" rel="shortcut icon" />
    @endif

    <!-- Google Font: Source Sans Pro -->
    {{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">--}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">



    <!-- Styles -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}"> --}}

    <style>
        .btn-add-new {
            background: #9ab1b5;
            border: 1px solid #c5c0c0;
            margin-top: -3px;
            font-weight: bolder;
        }

        .save{
            background: #9ab1b5;
            border: 1px solid #c5c0c0;
            font-weight: bolder;
        }

        /* over ride for style logo */
        .img-circle {
            border-radius: 0;
        }

        .elevation-3 {
            box-shadow: 0 10px 20px rgba(0,0,0,0),0 0px 0px rgba(0,0,0,.23)!important;
        }

        .al3{
            background-color: rgba(255,255,255,.1)!important;
            color:white!important;
            opacity: .7;
        }
        /* over ride for style logo */

        .select2-selection--single {
            border-color: #80bdff;
            min-height: 40px!important;
        }

        .select2 {
            width: 100%!important;
        }

        /* Paste this css to your style sheet file or under head tag */
        /* This only works with JavaScript,
        if it's not present, don't show loader */
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 1;
            background: url("{{ asset('site/assets/loader/loader-64x/Preloader_2.gif') }}") center no-repeat #fff;
            opacity: 0.7;
        }

        .menu-open .nav-item{
            background-color: rgba(217, 221, 227, 0.87);
            /*color: #74797e;*/
        }


    </style>


    @yield('styles')

</head>





<body class="sidebar-mini control-sidebar-slide-open layout-footer-fixed layout-navbar-fixed layout-fixed sidebar-collapse">
{{-- <body class="layout-fixed control-sidebar-slide-open sidebar-collapse"> --}}
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-dark" style="background-color: #6E4798; ">

        @yield('breadcrumb')

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            {{-- @include('admin.layouts.partials.searchtopnav') --}}
            {{-- @include('admin.layouts.partials.messagedropdownmenu') --}}
            @include('admin.layouts.partials.profiledropdownmenu')
            {{-- @include('admin.layouts.partials.notificationdropdownmenu') --}}
        </ul>
    </nav>

    <!-- Main Sidebar Container -->
    @include('admin.layouts.partials.leftsidebar')

    <div class="se-pre-con"></div>
    @yield('content')


    <!-- Modal -->
    <div class="modal fade" id="myModalPasswordChange" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <p class="lead text-info" style="float: left"> {{__('admin.common.password_confirm_msg')}}</p>
                    <button style="float: right" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-edit-add" role="form" id="password-change"
                          method="POST" enctype="multipart/form-data" autocomplete="off">
                        <!-- PUT Method if we are editing -->

                        {{ csrf_field() }}


                        <div class="form-group">
                            <label for="password">{{ __('admin.common.password') }}</label>
                            <input type="password" name="password"
                                   id="password1" placeholder="{{ __('admin.common.password') }}"
                                   value="{{ old('password') }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">{{ __('admin.common.password_confirmation') }}</label>
                            <input type="password" name="password_confirmation"
                                   id="password_confirmation1" placeholder="{{ __('admin.common.password_confirmation') }}"
                                   value="{{ old('password_confirmation') }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-sm form-control save">
                                <i class="fas fa-save"></i> {{ __('admin.common.save') }}
                            </button>
                        </div>


                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    @include('admin.layouts.partials.footer')
</div>


<!-- ./wrapper -->




<!-- REQUIRED SCRIPTS -->
{{-- @include('admin.layouts.partials.scripts') --}}
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
{{-- <script src="{{ asset('assets/dist/js/demo.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $(document).ready(function () {
        // To stop right click or inspect elements
        // document.addEventListener('contextmenu', function(e) {
        //   e.preventDefault();
        // });

        // $(window).on('keydown',function(event)
        // {
        //   //console.log(event.keyCode);
        //   if(event.keyCode==123)
        //   {
        //       //alert('Entered F12');
        //       return false;
        //   }
        //   else if(event.ctrlKey && event.shiftKey && event.keyCode==73)
        //   {
        //       alert('Entered ctrl+shift+i')
        //       return false;  //Prevent from ctrl+shift+i
        //   }
        //   else if(event.ctrlKey && event.shiftKey && event.keyCode==74)
        //   {
        //       //alert('Entered ctrl+shift+j')
        //       return false;  //Prevent from ctrl+shift+i
        //   }
        //   else if(event.ctrlKey && event.keyCode==73)
        //   {
        //       //alert('Entered ctrl+shift+i')
        //       return false;  //Prevent from ctrl+shift+i
        //   }
        // });

        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });


        $(window).bind('keydown', function (e) {
            var key = e.which;
            //console.log(key);
            if (key == 27) {
                let url = window.location.href;
                let myArray = url.split("/");
                let orurl = url.replace(myArray[myArray.length-1], "");
                //console.log(orurl);
                //window.open(orurl, "_self");
            }
        });

        //loader hide
        $(".se-pre-con").fadeOut(1000);
        $('li.has-child').children('ul').each(function () {
            //let tagName = $(this).prop('tagName');
            let li = $(this).children('li').length;
            if(li == 0){
                $(this).parent().hide();
            }
        });

        $('ul.l3').find('.active').each(function () {
            $(this).parent('li').parent('ul').parent('li').addClass('menu-open');
        });

        $('li.li3').children('ul').each(function () {
            //let tagName = $(this).prop('tagName');
            let li = $(this).children('li').length;
            if(li == 0){
                $(this).parent().hide();
            }
        });

        $('.menu-loader').click(function (e) {
            //alert('hello');
            $(".se-pre-con").fadeIn();
            var key = e.which;
            //console.log(key);
            if(key == 1){
                //$(this).parent().hide();
                $(".se-pre-con").fadeOut();
            }
        });

        $('button').click(function (e) {
            $(".se-pre-con").fadeIn().fadeOut();
            //console.log('any btn clicked');
        });

        $('.search').click(function (e) {
            $(".se-pre-con").fadeIn();
        });

        // $('.save').click(function (e) {
        //   $(".se-pre-con").fadeIn();
        //   //console.log('any btn clicked');
        // });


        // Delete Section
        $(document, 'td').on('click', '.change-password', function (e) {
            e.preventDefault();
            //console.log($(this).attr('href'))
            var route = $(this).attr('href');
            $("#myModalPasswordChange").modal('show');
            $("#myModalPasswordChange").find('form#password-change').attr({action : route});
            //console.log(route);
        });

    });

</script>
<script>
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('message') }}");
    @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
<script>
    $(document).ready(function () {
        $('li.has-child').children('ul').each(function () {
            //let tagName = $(this).prop('tagName');
            let li = $(this).children('li').length;
            if(li == 0){
                $(this).parent().hide();
            }
        });

        $('ul.l3').find('.active').each(function () {
            $(this).parent('li').parent('ul').parent('li').addClass('menu-open');
        });

        $('li.li3').children('ul').each(function () {
            //let tagName = $(this).prop('tagName');
            let li = $(this).children('li').length;
            if(li == 0){
                $(this).parent().hide();
            }
        });


        // Delete Section
        $(document, 'td').on('click', '.change-password', function (e) {
            e.preventDefault();
            //console.log($(this).attr('href'))
            var route = $(this).attr('href');
            $("#myModalPasswordChange").modal('show');
            $("#myModalPasswordChange").find('form#password-change').attr({action : route});
            //console.log(route);
        });

        // @if ((Route::current()->getName() == 'admin.service.create') || (Route::current()->getName() == 'admin.user'))
        //   $("body").addClass("sidebar-collapse");
        //   //$("body").removeClass("sidebar-collapse");
        // @endif

        @if ((Route::current()->getName() == true))
        $("body").addClass("sidebar-collapse");
        //$("body").removeClass("sidebar-collapse");
        @endif


    });
</script>


@yield('scripts')


</body>
</html>
