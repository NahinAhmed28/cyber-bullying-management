@php
    $edit = false;
    if(!empty($application)){
    if($application->id !=''){
    $edit=true;
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

@endsection

@section('breadcrumb')
  @include('../admin.layouts.partials.breadcrumb', ['path1' => __('admin.menu.admin'), 'route1' => route('admin.admin') ])
@endsection

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-2">
                    <a href="{{ route('admin.case') }}"
                        class="btn btn-outline-light form-control btn-add-new">
                        <i class="fas fa-backward"></i> <span>{{ __('admin.common.back') }}</span>
                    </a>
                </div>

                <div class="col-sm-10">
                    <h1 class="text-info">
                        @if($edit)
                            <i class="fas fa-bookmark"></i> {{ __('admin.common.update') }}
                            {{ __('admin.menu.case') }}
                            {{ __('admin.common.info') }}
                        @else
                            <i class="fas fa-bookmark"></i> {{ __('admin.common.add') }}
                            {{ __('admin.menu.case') }}
                            {{ __('admin.common.info') }}
                        @endif

                    </h1>
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


    <form class="form-edit-add" application="form" id="application_entry_form"
        action="{{ route('admin.caseincomplete.update_step_info', $application->id) }} }}"
        method="POST" enctype="multipart/form-data" autocomplete="off">
        <!-- PUT Method if we are editing -->
        @if($edit)
            <input type="hidden" name="id" value="{{ $application->id }}">
            {{ method_field("PUT") }}
        @endif
        {{ csrf_field() }}

        <section class="content" style="margin-top: -10px;">
            <div class="container-fluid">
                <div class="row">

                    <!-- col start -->
                    <div class="col-md-12">
                        <!-- card start -->
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title text-info">{{ __('admin.caseincomplete.step_info') }}</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="step_date">{{ __('admin.caseincomplete.step_date') }} </label>
                                            <input type="text" name="step_date" id="step_date"
                                                placeholder="{{ __('admin.caseincomplete.step_date') }}"
                                                value="{{ ($edit)? $application->step_date : '' }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        @if($edit)
                                            <div class="form-group">
                                                <label for="case_status_id">{{ __('admin.caseincomplete.case_status') }}<!--<span style="color: red"> * </span>--></label>
                                                <select class="form-control select2" name="case_status_id" id="case_status_id" required>
                                                    <option value="">{{ __('admin.common.select') }}</option>
                                                    @foreach($case_statuses as $key => $item)
                                                        <option value="{{ $item->id }}" {{ ($application->case_status_id == $item->id) ? 'selected' : '' }}>{{ $item->{'title_'. app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label for="case_status_id">{{ __('admin.caseincomplete.case_status') }} <!--<span style="color: red"> * </span>--></label>
                                                <select class="form-control select2" name="case_status_id" id="case_status_id" required>
                                                    <option value="">{{ __('admin.common.select') }}</option>
                                                    @foreach($case_statuses as $key => $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ (old('case_status_id') == $item->id) ? 'selected' : '' }}>
                                                            {{ $item->{'title_'. app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        @if($edit)
                                            <div class="form-group">
                                                <label for="risk_id">{{ __('admin.caseincomplete.risk') }}<!--<span style="color: red"> * </span>--></label>
                                                <select class="form-control select2" name="risk_id" id="risk_id" required>
                                                    <option value="">{{ __('admin.common.select') }}</option>
                                                    @foreach($risks as $key => $item)
                                                        <option value="{{ $item->id }}" {{ ($application->risk_id == $item->id) ? 'selected' : '' }}>{{ $item->{'title_'. app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label for="risk_id">{{ __('admin.caseincomplete.risk') }} <!--<span style="color: red"> * </span>--></label>
                                                <select class="form-control select2" name="risk_id" id="risk_id" required>
                                                    <option value="">{{ __('admin.common.select') }}</option>
                                                    @foreach($risks as $key => $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ (old('risk_id') == $item->id) ? 'selected' : '' }}>
                                                            {{ $item->{'title_'. app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- card start -->
                    </div>
                    <!-- col end -->

                    <!-- col start -->
                    <div class="col-md-12">
                        <!-- card start -->
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title text-info">{{ __('admin.caseincomplete.step_info') }}</h3>
                            </div>

                            <div class="card-body">
                                @if ($edit)
                                    @if (count($application->step) > 0 )
                                        @foreach ($application->step as $key=>$step)
                                        <input type="hidden" name="arraydata[step{{$key+1}}][id]" value="{{$step->id}}">


                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="step_details_en">{{ __('admin.caseincomplete.step_details_en') }}</label>
                                                    <textarea rows="1" class="form-control"
                                                        placeholder="{{ __('admin.caseincomplete.step_details_en') }}"
                                                        name="arraydata[step{{$key+1}}][step_details_en]" required>{{$step->step_details_en}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="step_details_bn">{{ __('admin.caseincomplete.step_details_bn') }}</label>
                                                    <textarea rows="1" class="form-control"
                                                        placeholder="{{ __('admin.caseincomplete.step_details_bn') }}"
                                                        name="arraydata[step{{$key+1}}][step_details_bn]" required>{{$step->step_details_bn}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="users">{{ __('admin.caseincomplete.users') }}</label>
                                                    <select class="form-control select2" name="arraydata[step{{$key+1}}][users]">
                                                        <option value="">{{ __('admin.common.select') }}</option>
                                                        @foreach ($admins as $key => $item)
                                                        <option value="{{ $item->id }}" @if (@$application->users)
                                                                            {{(in_array(@$item->id, json_decode(@$application->users))) ? 'selected' : ''}}
                                                                            @endif >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="step_details_bn" style="visibility: hidden">NONE</label> <br>
                                                    <a style="margin-top: 7px;" href="{{ route('admin.caseincomplete.delete_step_info', $step->id) }}" href1="{{ route('admin.caseincomplete.delete_step_info', [$step->id,1]) }}" class="btn btn-xs btn-danger deletes"><i class="fas fa-trash-alt"></i></a>
                                                </div>
                                            </div>

                                            <div class="col-md-12"><hr></div>

                                        </div>


                                        @endforeach
                                    @else
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="step_details_en">{{ __('admin.caseincomplete.step_details_en') }}</label>
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.caseincomplete.step_details_en') }}"
                                                    name="arraydata[step1][step_details_en]" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="step_details_bn">{{ __('admin.caseincomplete.step_details_bn') }}</label>
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.caseincomplete.step_details_bn') }}"
                                                    name="arraydata[step1][step_details_bn]" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="users">{{ __('admin.caseincomplete.users') }}</label>
                                                <select class="form-control select2" name="arraydata[step1][users]">
                                                    <option value="">{{ __('admin.common.select') }}</option>
                                                    @foreach ($admins as $key => $item)
                                                    <option value="{{ $item->id }}">{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <button style="margin-top:32px" disabled id="delete0" class="delete btn btn-danger btn-round form-control"><span> <i class="fa fa-minus" aria-hidden="true"></i></span> </button>
                                            </div>
                                        </div>

                                        <div class="col-md-12"><hr></div>

                                    </div>
                                    @endif
                                @else
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="step_details_en">{{ __('admin.caseincomplete.step_details_en') }}</label>
                                            <textarea rows="1" class="form-control"
                                                placeholder="{{ __('admin.caseincomplete.step_details_en') }}"
                                                name="arraydata[step1][step_details_en]" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="step_details_bn">{{ __('admin.caseincomplete.step_details_bn') }}</label>
                                            <textarea rows="1" class="form-control"
                                                placeholder="{{ __('admin.caseincomplete.step_details_bn') }}"
                                                name="arraydata[step1][step_details_bn]" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="users">{{ __('admin.caseincomplete.users') }}</label>
                                            <select class="form-control select2" name="arraydata[step1][users]">
                                                <option value="">{{ __('admin.common.select') }}</option>
                                                @foreach ($admins as $key => $item)
                                                <option value="{{ $item->id }}">{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <button disabled id="delete0" class="delete btn btn-danger btn-round form-control"><span> <i class="fa fa-minus" aria-hidden="true"></i></span> </button>
                                        </div>
                                    </div>

                                    <div class="col-md-12"><hr></div>

                                </div>
                                @endif

                                <div class="append_area"></div>

                                <div class="row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <a onclick="return false;"
                                                class="add_form_field btn btn-primary btn-round form-control" href="#">
                                                {{ __('admin.common.add_more') }} &nbsp; <i
                                                    class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- card start -->
                    </div>
                    <!-- col end -->

                    
                    <!-- col start -->
                    <div class="col-md-12">
                        <!-- card start -->
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title text-info">{{ __('admin.common.save_it') }}</h3>
                            </div>

                            <div class="card-body">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-sm form-control save">
                                        <i class="fas fa-save"></i> {{ __('admin.common.save') }}
                                    </button>
                                </div>


                            </div>
                        </div>
                        <!-- card start -->
                    </div>
                    <!-- col end -->
                </div>
            </div>
        </section>
    </form>

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

            $sender_contact = $('#contact');
            senderContact();

            function senderContact() {
                $($sender_contact).keyup(function (e) {
                    let value = $(this).val();
                    if (value.length == 11) {
                        $(this).removeClass('is-invalid');
                        $(this).css("background", "none");
                    } else {
                        $(this).addClass('is-invalid');
                    }
                });
            }

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
                            '<textarea rows="1" class="form-control" placeholder="{{ __('admin.caseincomplete.step_details_en') }}" name="arraydata[step'+ x +'][step_details_en]" required></textarea>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-md-4">'+
                        '<div class="form-group">'+
                            '<textarea rows="1" class="form-control" placeholder="{{ __('admin.caseincomplete.step_details_bn') }}" name="arraydata[step'+ x +'][step_details_bn]" required></textarea>'+
                        '</div>'+
                    '</div>'+

                    '<div class="col-md-3">'+
                        '<div class="form-group">'+
                            '<select class="form-control select2" name="arraydata[step'+ x +'][users]">'+
                                '<option value="">{{ __('admin.common.select') }}</option>'+
                                @foreach ($admins as $key => $item)
                                '<option value="{{ $item->id }}">{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>'+
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



            $('#area_id').on('change', function(e){
                var area_id = e.target.value;
                var route = "{{route('get.branch_by_area')}}/"+area_id;
                //console.log(area_id);
                $.get(route, function(data) {
                //console.log(data);
                $('#branch_id').empty();
                $('#branch_id').append('<option value="">{{ __('admin.common.select') }} {{ __('admin.user.branch') }}</option>');
                $.each(data, function(index,data){
                    $('#branch_id').append('<option value="' + data.id + '">' + data.title_{{app()->getLocale()}} + ' - ' + data.code +  '</option>');
                });
                });
            });


            $('#state_id').on('change', function(e){
            var state_id = e.target.value;
            var route = "{{route('get.division')}}/"+state_id;
            //console.log(state_id);
            $.get(route, function(data) {
            //console.log(data);
            $('#division_id').empty();
            $('#division_id').append('<option value="">{{ __('admin.common.select') }}</option>');
            $.each(data, function(index,data){
                $('#division_id').append('<option value="' + data.id + '">' + data.title_{{app()->getLocale()}} + ' - ' + data.bbs_code +  '</option>');
            });
            });
        });

        $('#division_id').on('change', function(e){
            var division_id = e.target.value;
            var route = "{{route('get.district')}}/"+division_id;
            //console.log(division_id);
            $.get(route, function(data) {
            //console.log(data);
            $('#district_id').empty();
            $('#district_id').append('<option value="">{{ __('admin.common.select') }}</option>');
            $.each(data, function(index,data){
                $('#district_id').append('<option value="' + data.id + '">' + data.title_{{app()->getLocale()}} + ' - ' + data.bbs_code +  '</option>');
            });
            });
        });


        $('#district_id').on('change', function(e){
            var district_id = e.target.value;
            var route = "{{route('get.upazila')}}/"+district_id;
            //console.log(district_id);
            $.get(route, function(data) {
            //console.log(data);
            $('#upazila_id').empty();
            $('#upazila_id').append('<option value="">{{ __('admin.common.select') }}</option>');
            $.each(data, function(index,data){
                $('#upazila_id').append('<option value="' + data.id + '">' + data.title_{{app()->getLocale()}} + ' - ' + data.bbs_code +  '</option>');
            });
            });
        });

        $('#district_id').on('change', function(e){
            var district_id = e.target.value;
            var route = "{{route('get.thana')}}/"+district_id;
            //console.log(district_id);
            $.get(route, function(data) {
            //console.log(data);
            $('#thana_id').empty();
            $('#thana_id').append('<option value="">{{ __('admin.common.select') }}</option>');
            $.each(data, function(index,data){
                $('#thana_id').append('<option value="' + data.id + '">' + data.title_{{app()->getLocale()}} + ' - ' + data.bbs_code +  '</option>');
            });
            });
        });



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


@endsection
