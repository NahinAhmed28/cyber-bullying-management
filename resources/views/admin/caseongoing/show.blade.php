@php
    $edit = false;
    if(!empty($application)){
        if($application->id !=''){
            $edit=true;
            //dd($edit);
        }
    }
@endphp


@extends('admin.layouts.master')
@section('title')
    {{ __('admin.menu.site') }} :: {{ __('admin.menu.dashboard') }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datepicker/bootstrap-datepicker.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/dropzone/min/dropzone.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    <style>
        .add-member-button{
            font-weight: 700; font-size:12px ; color: #6E4798; border-radius:15px; border:1px solid #6E4798
        }
        .add-member-button:hover{
            background-color: #6E4798;
            color: white;
        }
        .download-pdf-btn{
            font-weight: 700; font-size:14px ;
            background-color: #6E4798;
            color: white;
            border-radius:10px; border:1px solid #6E4798

        }
        .download-pdf-btn:hover{
            color: #6E4798;
            background-color: white;
        }
    </style>
    <style>
        .custom-card-body {
            padding: 0; /* Remove padding */
            margin: 0; /* Remove margin */
        }

        /* Bootstrap 4 text input with search icon */

        .has-search .form-control {
            padding-left: 2.375rem;
        }

        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }
    </style>

@endsection

@section('breadcrumb')
    @include('../admin.layouts.partials.breadcrumb', ['path1' => __('admin.menu.case'), 'route1' => route('admin.admin') ])
@endsection

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-2">
                        <a href="{{ URL::previous() }}"
                           class="btn btn-outline-light form-control btn-add-new">
                            <i class="fas fa-backward"></i> <span>{{ __('admin.common.back') }}</span>
                        </a>
                    </div>

                    <div class="col-sm-4">
                        <h5 class="text-light">{{ __('admin.caseongoing.name') }} :  {{ $application->{'name_' . app()->getLocale()} }}</h5>
                        <span class="text-light" style="font-size: 12px">{{ __('admin.caseongoing.address') }} :  {{ $application->{'address_' . app()->getLocale()} }}</span>
                    </div>

                    <div class="col-sm-2">
                        <span class="text-light text-bold" style="font-size: 16px">{{ __('admin.caseongoing.code') }} :
                            <span class="p-1" style="background-color: #ab75e7;border-radius: 5px"># {{ (app()->getLocale() == 'en') ? $application->code : engToBnHlp($application->code) }}</span> </span>
                    </div>
                    <div class="col-sm-4">
                        <span class="text-light text-bold" style="font-size: 16px">
                             {{__('admin.common.case_created')}} :
                            <span style="background-color: #FFFFFF12;border-radius: 15px" class="p-2" >
                                {{(app()->getLocale() == 'en') ? $application->created_at->format('d/m/Y :  h:i A') : dateFormatEnglishToBanglaHlp($application->created_at->format('d/m/Y :  h:i A')) }}
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </section>

        @if(count($errors) || Session::has('success'))

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-0">
                        <div class="col-md-12">
                            @if(count($errors))
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{ __('admin.common.error_whoops') }}</strong>
                                    {{ __('admin.common.error_heading') }}
                                    <br />
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{ __('admin.common.success_heading') }}</strong>
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <br>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <section class="content" style="margin-top: -10px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#home">{{ __('admin.common.case_feed') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu1">{{ __('admin.common.case_assets') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu2">{{ __('admin.common.case_members') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu3">{{ __('admin.common.case_details') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-header -->
                        </div>
                        <div class="card">
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade show active">
                                    @include('admin.caseongoing.running.case_feed')
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    @include('admin.caseongoing.running.case_asset')
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    @include('admin.caseongoing.running.case_member')
                                </div>
                                <div id="menu3" class="tab-pane fade">
                                    @include('admin.caseongoing.running.case_details_info')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>




@endsection


@section('scripts')


    <script src="{{asset('assets/plugins/sweetalert2/sweetalert2.js')}}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script
        src="{{ asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}">
    </script>
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script
        src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>

    <script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}">
    </script>
    <script src="{{ asset('assets/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropzone/min/dropzone.min.js') }}"></script>



    <script>
        function validate(evt) {
            var theEvent = evt || window.event;
            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }

        $(document).ready(function () {
            // Validation

            $(window).bind('keydown', function (e) {
                var key = e.which;
                // console.log(key);
            });
           
            // Validation


            $('.select2').select2();
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Timepicker
            $('#receive_time').datetimepicker({
                format: 'LT'
            })

            $("#step_date").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                //startDate: '-3d'
            }).datepicker(@if($edit && @$application -> step_date) @else 'update', new Date() @endif);

            $("#step_dob").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                //startDate: '-3d'
            }).datepicker(@if($edit && @$application -> step_dob) @else 'update', new Date() @endif);





            // Add more area

            var max_fields = 20;
            var wrapper = $(".append_area");
            var add_button = $(".add_form_field");

            @if ($edit)
            @if (count($application->step) > 0)
            let x = {{count($application->step)}};
            @else
            let x = 1;
            @endif
            @else
            let x = 1;
            @endif


            $(add_button).click(function (e) {
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    $(wrapper).append('<div class="row">'+

                    '<div class="col-md-4">'+
                        '<div class="form-group">'+
                            '<textarea rows="1" class="form-control" placeholder="{{ __('admin.caseongoing.step_details_en') }}" name="arraydata[step'+ x +'][step_details_en]" required></textarea>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-md-4">'+
                        '<div class="form-group">'+
                            '<textarea rows="1" class="form-control" placeholder="{{ __('admin.caseongoing.step_details_bn') }}" name="arraydata[step'+ x +'][step_details_bn]" required></textarea>'+
                        '</div>'+
                    '</div>'+

                    '<div class="col-md-3">'+
                        '<div class="form-group">'+
                            '<select class="form-control select2" name="arraydata[step'+ x +'][users]">'+
                                '<option value="">{{ __('admin.common.select') }}</option>'+
                                @foreach ($admins as $key => $item)
                                '<option value="{{ $item->id }}">{{ $item->officeDesignation->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>'+
                                @endforeach
                            '</select>'+
                        '</div>'+
                    '</div>'+

                    '<div class="col-md-1">' +
                        '<div class="form-group">' +
                        '<button id="delete'+ x +'" class="delete btn btn-danger btn-round form-control"><span> <i class="fa fa-minus" aria-hidden="true"></i></span></button>' +
                        '</div>' +
                    '</div>' +

                    '<div class="col-md-12"><hr> <br /></div>'+

                '</div>');

                $('.select2').select2();
                } else {
                    alert('You Reached the limits')
                }
            });



            $(wrapper).on("click", ".delete", function (e) {
                e.preventDefault();
                $(this).parent('div').parent('div').parent('div').remove();
                x--;

            })

            @can('edit_step_info', app('App\Models\Caseongoing'))

            


            $('#caseStatus').on('change', function(e){
                var case_status_id = e.target.value;
                //console.log(case_status_id);
                if (case_status_id == 4) {
                    return false;
                }
                var application_id = "{{$application->id}}";
                var route = "{{route('admin.caseongoing.case_status_change')}}/"+application_id+"/"+case_status_id;
                //console.log(route);

                var redirect = "{{route('admin.caseongoing')}}";

                Swal.fire({
                    title: "{{__('admin.common.status_confirm_msg')}}",
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: "{{__('admin.common.yes')}}",
                    denyButtonText: "{{__('admin.common.no')}}",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        //Soft Delete
                        $.get(route, function(data) {
                            //console.log(data);
                            //alert(data.result);
                            toastr.options =
                            {
                                "closeButton" : true,
                                "progressBar" : true
                            }
                            toastr.success(data.result);
                            setTimeout(() => {
                                window.location.href = redirect;
                            }, 2000);
                        });
                    } else if (result.isDenied) {
                        //Force Delete
                        return false;
                    }
                });
            });

            @endcan

            $(document, 'td').on('click', '.deletes', function (e) {
                e.preventDefault();
                //console.log($(this).attr('href'))
                var route = $(this).attr('href');
                var route1 = $(this).attr('href1');
                //console.log(route, route1);
                //return false;

                Swal.fire({
                    title: "{{__('admin.common.confirm_msg')}}",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Soft Delete',
                    denyButtonText: `Force Delete`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        //Soft Delete
                        window.location.href = route;
                    } else if (result.isDenied) {
                        //Force Delete
                        window.location.href = route1;
                    }
                })
            });


        });

    </script>


    <!-- Summernote -->
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function () {
            // Summernote
            $('#summernote_en').summernote();
            $('#summernote_bn').summernote();

            // CodeMirror
            // CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            //     mode: "htmlmixed",
            //     theme: "monokai"
            // });
        });
    </script>
@endsection
