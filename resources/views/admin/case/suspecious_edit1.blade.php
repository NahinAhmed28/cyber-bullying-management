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
                    <a href="{{ route('admin.application') }}"
                        class="btn btn-outline-light form-control btn-add-new">
                        <i class="fas fa-backward"></i> <span>{{ __('admin.common.back') }}</span>
                    </a>
                </div>

                <div class="col-sm-10">
                    <h1 class="text-info">
                        @if($edit)
                            <i class="fas fa-bookmark"></i> {{ __('admin.common.update') }}
                            {{ __('admin.menu.application') }}
                            {{ __('admin.common.info') }}
                        @else
                            <i class="fas fa-bookmark"></i> {{ __('admin.common.add') }}
                            {{ __('admin.menu.application') }}
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
        action=""
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
                                <h3 class="card-title text-info">{{ __('admin.case.suspicious_info') }}</h3>
                            </div>

                            <div class="card-body">
                                @if ($edit)
                                    @if (count($application->suspect) > 0 )
                                        @foreach ($application->suspect as $key=>$suspect)
                                        <input type="hidden" name="arraydata[suspect{{$key+1}}][id]" value="{{$suspect->id}}">
                                        {{-- <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="arraydata[suspect{{$key+1}}][title_en]" id="title_en{{$key+1}}" placeholder="{{ __('admin.case.suspect_title_en') }}" value="{{$suspect->name}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="arraydata[suspect{{$key+1}}][title_bn]" id="title_bn{{$key+1}}" placeholder="{{ __('admin.case.suspect_title_bn') }}" value="{{$suspect->name}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input style="padding-top: 4px;" type="file" name="arraydata[suspect{{$key+1}}][thumb]" id="thumb{{$key+1}}" class="form-control">
                                                    <a target="_blank" href="{{ asset('storage/'.$suspect->thumb) }}">Show</a>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <a style="margin-top: 7px;" href="{{ route('admin.application_suspect.delete', $suspect->id) }}" href1="{{ route('admin.application_suspect.delete', [$suspect->id,1]) }}" class="btn btn-xs btn-danger deletes"><i class="fas fa-trash-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>   --}}

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="suspicious_name_en">{{ __('admin.case.suspicious_name_en') }}</label>
                                                    <input type="text" name="arraydata[suspect{{$key+1}}][name_en]"
                                                        placeholder="{{ __('admin.case.suspicious_name_en') }}"
                                                        value="{{$suspect->name_en}}"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="arraydata[suspect{{$key+1}}][name_bn]"
                                                        placeholder="{{ __('admin.case.suspicious_name_bn') }}"
                                                        value="{{$suspect->name_bn}}"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <textarea rows="1" class="form-control"
                                                        placeholder="{{ __('admin.case.suspicious_details_en') }}"
                                                        name="arraydata[suspect{{$key+1}}][suspicious_details_en]" required>{{$suspect->suspicious_details_en}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <textarea rows="1" class="form-control"
                                                        placeholder="{{ __('admin.case.suspicious_details_bn') }}"
                                                        name="arraydata[suspect{{$key+1}}][suspicious_details_bn]" required>{{$suspect->suspicious_details_bn}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="arraydata[suspect{{$key+1}}][guardian_en]"
                                                        placeholder="{{ __('admin.case.suspicious_guardian_en') }}"
                                                        value="{{$suspect->suspicious_guardian_en}}"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="arraydata[suspect{{$key+1}}][guardian_bn]"
                                                        placeholder="{{ __('admin.case.suspicious_guardian_bn') }}"
                                                        value="{{$suspect->suspicious_guardian_bn}}"
                                                        class="form-control">
                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <textarea rows="1" class="form-control"
                                                        placeholder="{{ __('admin.case.suspicious_address_en') }}"
                                                        name="arraydata[suspect{{$key+1}}][suspicious_address_en]" required>{{$suspect->suspicious_address_en}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <textarea rows="1" class="form-control"
                                                        placeholder="{{ __('admin.case.suspicious_address_bn') }}"
                                                        name="arraydata[suspect{{$key+1}}][suspicious_address_bn]" required>{{$suspect->suspicious_address_bn}}</textarea>
                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" name="arraydata[suspect{{$key+1}}][suspicious_contact]"
                                                        placeholder="{{ __('admin.case.suspicious_contact') }}"
                                                        value="{{$suspect->suspicious_contact}}"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" name="arraydata[suspect{{$key+1}}][guardian_contact]"
                                                        placeholder="{{ __('admin.case.suspicious_guardian_contact') }}"
                                                        value="{{$suspect->suspicious_guardian_contact}}"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <textarea rows="1" class="form-control"
                                                        placeholder="{{ __('admin.case.suspicious_details_en') }}"
                                                        name="arraydata[suspect{{$key+1}}][suspicious_details_en]" required>{{$suspect->suspicious_details_en}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <textarea rows="1" class="form-control"
                                                        placeholder="{{ __('admin.case.suspicious_details_bn') }}"
                                                        name="arraydata[suspect{{$key+1}}][suspicious_details_bn]" required>{{$suspect->suspicious_details_bn}}</textarea>
                                                </div>
                                            </div>



                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" name="arraydata[suspect{{$key+1}}][suspicious_age]"
                                                        placeholder="{{ __('admin.case.suspicious_age') }}"
                                                        value="{{$suspect->suspicious_age}}"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input style="padding-top: 4px;" type="file" name="arraydata[suspect{{$key+1}}][ssign]" class="form-control">
                                                    <a target="_blank" href="{{ asset('storage/'.$suspect->ssign) }}">Show</a>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group" style="margin-top: 8px;">
                                                    <label for="title_bn">{{ __('admin.case.gender') }}: </label>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input {{ ($application->gender) ? 'checked' : '' }} type="radio" class="form-check-input" name="arraydata[suspect{{$key+1}}][gender]" value="1">{{ __('admin.case.suspicious_male') }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input {{ (!$application->gender) ? 'checked' : '' }} type="radio" class="form-check-input" name="arraydata[suspect{{$key+1}}][gender]" value="0">{{ __('admin.case.suspicious_female') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <a style="margin-top: 7px;" href="{{ route('admin.delete_suspicious_info', $suspect->id) }}" href1="{{ route('admin.delete_suspicious_info', [$suspect->id,1]) }}" class="btn btn-xs btn-danger deletes"><i class="fas fa-trash-alt"></i></a>
                                                </div>
                                            </div>

                                            <div class="col-md-12"><hr></div>

                                        </div>


                                        @endforeach
                                    @else
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="arraydata[suspect1][name_en]"
                                                    placeholder="{{ __('admin.case.suspicious_name_en') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="arraydata[suspect1][name_bn]"
                                                    placeholder="{{ __('admin.case.suspicious_name_bn') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.case.suspicious_details_en') }}"
                                                    name="arraydata[suspect1][suspicious_details_en]" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.case.suspicious_details_bn') }}"
                                                    name="arraydata[suspect1][suspicious_details_bn]" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="arraydata[suspect1][guardian_en]"
                                                    placeholder="{{ __('admin.case.suspicious_guardian_en') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="arraydata[suspect1][guardian_bn]"
                                                    placeholder="{{ __('admin.case.suspicious_guardian_bn') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.case.suspicious_address_en') }}"
                                                    name="arraydata[suspect1][suspicious_address_en]" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.case.suspicious_address_bn') }}"
                                                    name="arraydata[suspect1][suspicious_address_bn]" required></textarea>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="number" name="arraydata[suspect1][suspicious_contact]"
                                                    placeholder="{{ __('admin.case.suspicious_contact') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="number" name="arraydata[suspect1][guardian_contact]"
                                                    placeholder="{{ __('admin.case.suspicious_guardian_contact') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.case.suspicious_details_en') }}"
                                                    name="arraydata[suspect1][suspicious_details_en]" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.case.suspicious_details_bn') }}"
                                                    name="arraydata[suspect1][suspicious_details_bn]" required></textarea>
                                            </div>
                                        </div>



                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="number" name="arraydata[suspect1][suspicious_age]"
                                                    placeholder="{{ __('admin.case.suspicious_age') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input style="padding-top: 4px;" type="file" name="arraydata[suspect1][ssign]" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group" style="margin-top: 8px;">
                                                <label for="title_bn">{{ __('admin.case.gender') }}: </label>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="arraydata[suspect1][gender]" value="1">{{ __('admin.case.suspicious_male') }}
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="arraydata[suspect1][gender]" value="0">{{ __('admin.case.suspicious_female') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <button disabled id="delete0" class="delete btn btn-danger btn-round form-control"><span> <i class="fa fa-minus" aria-hidden="true"></i></span> </button>
                                            </div>
                                        </div>

                                        <div class="col-md-12"><hr></div>

                                    </div>
                                    @endif
                                @else
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="arraydata[suspect1][name_en]"
                                                    placeholder="{{ __('admin.case.suspicious_name_en') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="arraydata[suspect1][name_bn]"
                                                    placeholder="{{ __('admin.case.suspicious_name_bn') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.case.suspicious_details_en') }}"
                                                    name="arraydata[suspect1][suspicious_details_en]" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.case.suspicious_details_bn') }}"
                                                    name="arraydata[suspect1][suspicious_details_bn]" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="arraydata[suspect1][guardian_en]"
                                                    placeholder="{{ __('admin.case.suspicious_guardian_en') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="arraydata[suspect1][guardian_bn]"
                                                    placeholder="{{ __('admin.case.suspicious_guardian_bn') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.case.suspicious_address_en') }}"
                                                    name="arraydata[suspect1][suspicious_address_en]" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.case.suspicious_address_bn') }}"
                                                    name="arraydata[suspect1][suspicious_address_bn]" required></textarea>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="number" name="arraydata[suspect1][suspicious_contact]"
                                                    placeholder="{{ __('admin.case.suspicious_contact') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="number" name="arraydata[suspect1][guardian_contact]"
                                                    placeholder="{{ __('admin.case.suspicious_guardian_contact') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.case.suspicious_details_en') }}"
                                                    name="arraydata[suspect1][suspicious_details_en]" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.case.suspicious_details_bn') }}"
                                                    name="arraydata[suspect1][suspicious_details_bn]" required></textarea>
                                            </div>
                                        </div>



                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="number" name="arraydata[suspect1][suspicious_age]"
                                                    placeholder="{{ __('admin.case.suspicious_age') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input style="padding-top: 4px;" type="file" name="arraydata[suspect1][ssign]" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group" style="margin-top: 8px;">
                                                <label for="title_bn">{{ __('admin.case.gender') }}: </label>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="arraydata[suspect1][gender]" value="1">{{ __('admin.case.suspicious_male') }}
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="arraydata[suspect1][gender]" value="0">{{ __('admin.case.suspicious_female') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
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
                    <div class="col-md-6">
                        <!-- card start -->
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title text-info">{{ __('admin.case.suspicious_info') }}</h3>
                            </div>

                            <div class="card-body">


                                <div class="form-group">
                                    <label for="name_en">{{ __('admin.case.suspicious_name_en') }}</label>
                                    <input type="text" name="name_en" id="name_en"
                                        placeholder="{{ __('admin.case.suspicious_name_en') }}"
                                        value="{{ $edit?$application->name_en:old('name_en') }}"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="name_bn">{{ __('admin.case.suspicious_name_bn') }}</label>
                                    <input type="text" name="name_bn" id="name_bn"
                                        placeholder="{{ __('admin.case.suspicious_name_bn') }}"
                                        value="{{ $edit?$application->name_bn:old('name_bn') }}"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label
                                        for="suspicious_details_en">{{ __('admin.case.suspicious_details_en') }}</label>
                                    <textarea rows="1" id="suspicious_details_en" class="form-control"
                                        placeholder="{{ __('admin.case.suspicious_details_en') }}"
                                        name="suspicious_details_en"
                                        required>{{ $edit?$application->suspicious_details_en:old('suspicious_details_en') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label
                                        for="suspicious_details_bn">{{ __('admin.case.suspicious_details_bn') }}</label>
                                    <textarea rows="1" id="suspicious_details_bn" class="form-control"
                                        placeholder="{{ __('admin.case.suspicious_details_bn') }}"
                                        name="suspicious_details_bn"
                                        required>{{ $edit?$application->suspicious_details_bn:old('suspicious_details_bn') }}</textarea>
                                </div>


                                <div class="form-group">
                                    <label for="dob">{{ __('admin.case.suspicious_dob') }} </label>
                                    <input type="text" name="dob" id="suspicious_dob"
                                        placeholder="{{ __('admin.case.suspicious_dob') }}"
                                        value="{{ ($edit)? $application->dob : '' }}"
                                        class="form-control">
                                </div>



                                <div class="form-group">
                                    <label for="title_bn"
                                        style="padding-right:20%;padding-top: 3%;">{{ __('admin.case.suspicious_gender') }}
                                        : </label>
                                        <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender" value="1"
                                                {{ ($edit && ($application->gender)) ? 'checked' : '' }}>{{ __('admin.case.suspicious_male') }}
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender" value="0"
                                                {{ ($edit && (!$application->gender)) ? 'checked' : '' }}>{{ __('admin.case.suspicious_female') }}
                                        </label>
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="class_en">{{ __('admin.case.suspicious_class_en') }}</label>
                                    <input type="text" name="class_en" id="class_en"
                                        placeholder="{{ __('admin.case.suspicious_class_en') }}"
                                        value="{{ $edit?$application->class_en:old('class_en') }}"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="class_bn">{{ __('admin.case.suspicious_class_bn') }}</label>
                                    <input type="text" name="class_bn" id="class_bn"
                                        placeholder="{{ __('admin.case.suspicious_class_bn') }}"
                                        value="{{ $edit?$application->class_bn:old('class_bn') }}"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="school_en">{{ __('admin.case.suspicious_school_en') }}</label>
                                    <input type="text" name="school_en" id="school_en"
                                        placeholder="{{ __('admin.case.suspicious_school_en') }}"
                                        value="{{ $edit?$application->school_en:old('school_en') }}"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="school_bn">{{ __('admin.case.suspicious_school_bn') }}</label>
                                    <input type="text" name="school_bn" id="school_bn"
                                        placeholder="{{ __('admin.case.suspicious_school_bn') }}"
                                        value="{{ $edit?$application->school_bn:old('school_bn') }}"
                                        class="form-control">
                                </div> --}}

                                @if($edit)
                                    <div class="form-group">
                                        <label for="guardian_type_id">{{ __('admin.case.guardian_type') }}<!--<span style="color: red"> * </span>--></label>
                                        <select class="form-control select2" name="guardian_type_id" id="guardian_type_id" required>
                                            <option value="">{{ __('admin.common.select') }}</option>


                                            @foreach($guardian_types as $key => $item)
                                                <option value="{{ $item->id }}" {{ ($application->guardian_type_id == $item->id) ? 'selected' : '' }}>{{ $item->{'title_'. app()->getLocale()} }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="guardian_type_id">{{ __('admin.case.guardian_type') }} <!--<span style="color: red"> * </span>--></label>
                                        <select class="form-control select2" name="guardian_type_id" id="guardian_type_id" required>
                                            <option value="">{{ __('admin.common.select') }}</option>
                                            @foreach($guardian_types as $key => $item)
                                                <option value="{{ $item->id }}"
                                                    {{ (old('guardian_type_id') == $item->id) ? 'selected' : '' }}>
                                                    {{ $item->{'title_'. app()->getLocale()} }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif


                            </div>

                        </div>
                        <!-- card start -->
                    </div>
                    <!-- col end -->


                    <!-- col start -->
                    <div class="col-md-6">
                        <!-- card start -->
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title text-info">{{ __('admin.case.suspicious_info') }}</h3>
                            </div>

                            <div class="card-body">

                              <div class="form-group">
                                    <label
                                        for="address_en">{{ __('admin.case.suspicious_address_en') }}</label>
                                    <textarea rows="1" id="address_en" class="form-control"
                                        placeholder="{{ __('admin.case.suspicious_address_en') }}"
                                        name="address_en"
                                        required>{{ $edit?$application->address_en:old('address_en') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label
                                        for="address_bn">{{ __('admin.case.suspicious_address_bn') }}</label>
                                    <textarea rows="1" id="address_bn" class="form-control"
                                        placeholder="{{ __('admin.case.suspicious_address_bn') }}"
                                        name="address_bn"
                                        required>{{ $edit?$application->address_bn:old('address_bn') }}</textarea>
                                </div>


                                <div class="form-group">
                                    <label
                                        for="guardian_en">{{ __('admin.case.suspicious_guardian_en') }}</label>
                                    <input type="text" name="guardian_en" id="guardian_en"
                                        placeholder="{{ __('admin.case.suspicious_guardian_en') }}"
                                        value="{{ $edit?$application->guardian_en:old('guardian_en') }}"
                                        class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label
                                        for="guardian_bn">{{ __('admin.case.suspicious_guardian_bn') }}</label>
                                    <input type="text" name="guardian_bn" id="guardian_bn"
                                        placeholder="{{ __('admin.case.suspicious_guardian_bn') }}"
                                        value="{{ $edit?$application->guardian_bn:old('guardian_bn') }}"
                                        class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label
                                        for="guardian_contact">{{ __('admin.case.suspicious_guardian_contact') }}</label>
                                    <input type="text" name="guardian_contact" id="guardian_contact"
                                        placeholder="{{ __('admin.case.suspicious_guardian_contact') }}"
                                        value="{{ $edit?$application->guardian_contact:old('guardian_contact') }}"
                                        class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label
                                        for="contact">{{ __('admin.case.suspicious_contact') }}</label>
                                    <input type="text" name="contact" id="contact"
                                        placeholder="{{ __('admin.case.suspicious_contact') }}"
                                        value="{{ $edit?$application->contact:old('contact') }}"
                                        class="form-control" required>
                                </div>


                                <div class="form-group">
                                    <label for="ssign">
                                        {{ __('admin.case.ssign') }} <span
                                            class="text-warning">
                                            ({{ __('admin.common.suspect_size_100') }})</span>
                                    </label>
                                    <input style="padding-top: 4px;" type="file" name="ssign" id="ssign"
                                        class="form-control">
                                    @if($edit && $application->ssign)
                                        <a target="_blank"
                                            href="{{ asset('storage/'.$application->ssign) }}">Show</a>
                                    @endif
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
        //Timepicker
        $('#receive_time').datetimepicker({
            format: 'LT'
        })

        $("#dob").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
            //startDate: '-3d'
        }).datepicker(@if($edit && @$application -> dob) @else 'update', new Date() @endif);

        $("#suspicious_dob").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
            //startDate: '-3d'
        }).datepicker(@if($edit && @$application -> suspicious_dob) @else 'update', new Date() @endif);



        // Add more area

        var max_fields = 20;
        var wrapper = $(".append_area");
        var add_button = $(".add_form_field");

        @if ($edit)
            @if (count($application->suspect) > 0)
                let x = {{count($application->suspect)}};
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
                '<div class="col-md-3">'+
                    '<div class="form-group">'+
                        '<input type="text" name="arraydata[suspect'+ x +'][name_en]" placeholder="{{ __('admin.case.suspicious_name_en') }}" value="" class="form-control">'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-3">'+
                    '<div class="form-group">'+
                        '<input type="text" name="arraydata[suspect'+ x +'][name_bn]" placeholder="{{ __('admin.case.suspicious_name_bn') }}" value="" class="form-control">'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-3">'+
                    '<div class="form-group">'+
                        '<textarea rows="1" class="form-control" placeholder="{{ __('admin.case.suspicious_details_en') }}" name="arraydata[suspect'+ x +'][suspicious_details_en]" required></textarea>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-3">'+
                    '<div class="form-group">'+
                        '<textarea rows="1" class="form-control" placeholder="{{ __('admin.case.suspicious_details_bn') }}" name="arraydata[suspect'+ x +'][suspicious_details_bn]" required></textarea>'+
                    '</div>'+
                '</div>'+

                '<div class="col-md-3">'+
                    '<div class="form-group">'+
                        '<input type="text" name="arraydata[suspect'+ x +'][guardian_en]" placeholder="{{ __('admin.case.suspicious_guardian_en') }}" value="" class="form-control">'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-3">'+
                    '<div class="form-group">'+
                        '<input type="text" name="arraydata[suspect'+ x +'][guardian_bn]" placeholder="{{ __('admin.case.suspicious_guardian_bn') }}" value="" class="form-control">'+
                    '</div>'+
                '</div>'+


                '<div class="col-md-3">'+
                    '<div class="form-group">'+
                        '<textarea rows="1" class="form-control" placeholder="{{ __('admin.case.suspicious_address_en') }}" name="arraydata[suspect'+ x +'][suspicious_address_en]" required></textarea>'+
                    '</div>'+
                '</div>'+

                '<div class="col-md-3">'+
                    '<div class="form-group">'+
                        '<textarea rows="1" class="form-control" placeholder="{{ __('admin.case.suspicious_address_bn') }}" name="arraydata[suspect'+ x +'][suspicious_address_bn]" required></textarea>'+
                    '</div>'+
                '</div>'+


                '<div class="col-md-3">'+
                    '<div class="form-group">'+
                        '<input type="number" name="arraydata[suspect'+ x +'][suspicious_contact]" placeholder="{{ __('admin.case.suspicious_contact') }}" value="" class="form-control">'+
                    '</div>'+
                '</div>'+

                '<div class="col-md-3">'+
                    '<div class="form-group">'+
                        '<input type="number" name="arraydata[suspect'+ x +'][guardian_contact]" placeholder="{{ __('admin.case.suspicious_guardian_contact') }}" value="" class="form-control">'+
                    '</div>'+
                '</div>'+

                '<div class="col-md-3">'+
                    '<div class="form-group">'+
                        '<textarea rows="1" class="form-control" placeholder="{{ __('admin.case.suspicious_details_en') }}" name="arraydata[suspect'+ x +'][suspicious_details_en]" required></textarea>'+
                    '</div>'+
                '</div>'+

                '<div class="col-md-3">'+
                    '<div class="form-group">'+
                        '<textarea rows="1" class="form-control" placeholder="{{ __('admin.case.suspicious_details_bn') }}" name="arraydata[suspect'+ x +'][suspicious_details_bn]" required></textarea>'+
                    '</div>'+
                '</div>'+



                '<div class="col-md-3">'+
                    '<div class="form-group">'+
                        '<input type="number" name="arraydata[suspect'+ x +'][suspicious_age]" placeholder="{{ __('admin.case.suspicious_age') }}" value="" class="form-control">'+
                    '</div>'+
                '</div>'+

                '<div class="col-md-3">'+
                    '<div class="form-group">'+
                        '<input style="padding-top: 4px;" type="file" name="arraydata[suspect'+ x +'][ssign]" class="form-control">'+
                    '</div>'+
                '</div>'+

                '<div class="col-md-3">'+
                    '<div class="form-group" style="margin-top: 8px;">'+
                        '<label for="title_bn">{{ __('admin.case.gender') }}: </label>'+
                        '<div class="form-check-inline">'+
                            '<label class="form-check-label">'+
                                '<input type="radio" class="form-check-input" name="arraydata[suspect'+ x +'][gender]" value="1">{{ __('admin.case.suspicious_male') }}'+
                            '</label>'+
                        '</div>'+
                        '<div class="form-check-inline">'+
                            '<label class="form-check-label">'+
                                '<input type="radio" class="form-check-input" name="arraydata[suspect'+ x +'][gender]" value="0">{{ __('admin.case.suspicious_female') }}'+
                            '</label>'+
                        '</div>'+
                    '</div>'+
                '</div>'+


                '<div class="col-md-3">' +
                    '<div class="form-group">' +
                    '<button id="delete'+ x +'" class="delete btn btn-danger btn-round form-control"><span> <i class="fa fa-minus" aria-hidden="true"></i></span></button>' +
                    '</div>' +
                '</div>' +

                '<div class="col-md-12"><hr> <br /></div>'+

            '</div>');
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
