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
        action="{{ !$edit ? route('admin.caseincomplete.store') : route('admin.caseincomplete.update', $application->id) }}"
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
                    <div class="col-md-4">
                        <!-- card start -->
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title text-info">{{ __('admin.caseincomplete.victim_info') }}</h3>
                            </div>

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name_en">{{ __('admin.caseincomplete.name_en') }}</label>
                                    <input type="text" name="name_en" id="name_en"
                                        placeholder="{{ __('admin.caseincomplete.name_en') }}"
                                        value="{{ $edit?$application->name_en:old('name_en') }}"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="name_bn">{{ __('admin.caseincomplete.name_bn') }}</label>
                                    <input type="text" name="name_bn" id="name_bn"
                                        placeholder="{{ __('admin.caseincomplete.name_bn') }}"
                                        value="{{ $edit?$application->name_bn:old('name_bn') }}"
                                        class="form-control">
                                </div>


                                <div class="form-group">
                                    <label for="dob">{{ __('admin.caseincomplete.dob') }} </label>
                                    <input type="text" name="dob" id="dob"
                                        placeholder="{{ __('admin.caseincomplete.dob') }}"
                                        value="{{ ($edit)? $application->dob : '' }}"
                                        class="form-control">
                                </div>

                                @if ($edit)
                                    <div class="form-group">
                                    <label for="division_id">{{ __('admin.caseincomplete.victim') }} {{ __('admin.admin.division') }} <!--<span style="color: red"> * </span>--></label>
                                    <select class="form-control select2" name="division_id" id="division_id">
                                        <option value="">{{ __('admin.common.select') }}</option>
                                        @foreach ($divisions as $key => $item)
                                        <option value="{{ $item->id }}" {{($application->division_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->bbs_code }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                @else
                                    <div class="form-group">
                                    <label for="division_id">{{ __('admin.caseincomplete.victim') }} {{ __('admin.admin.division') }} <!--<span style="color: red"> * </span>--></label>
                                    <select class="form-control select2" name="division_id" id="division_id">
                                        <option value="">{{ __('admin.common.select') }}</option>
                                        @foreach ($divisions as $key => $item)
                                        <option value="{{ $item->id }}" {{(old('division_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} </option>
                                        @endforeach
                                    </select>
                                    </div>
                                @endif


                                @if ($edit)
                                    <div class="form-group">
                                    <label for="district_id">{{ __('admin.caseincomplete.victim') }} {{ __('admin.admin.district') }} <!--<span style="color: red"> * </span>--></label>
                                    <select class="form-control select2" name="district_id" id="district_id">
                                        <option value="">{{ __('admin.common.select') }}</option>
                                        @foreach ($districts as $key => $item)
                                        <option value="{{ $item->id }}" {{($application->district_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->bbs_code }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                @else
                                    <div class="form-group">
                                    <label for="district_id">{{ __('admin.caseincomplete.victim') }} {{ __('admin.admin.district') }} <!--<span style="color: red"> * </span>--></label>
                                    <select class="form-control select2" name="district_id" id="district_id">
                                        <option value="">{{ __('admin.common.select') }}</option>
                                        @foreach ($districts as $key => $item)
                                        <option value="{{ $item->id }}" {{(old('district_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} </option>
                                        @endforeach
                                    </select>
                                    </div>
                                @endif


                                @if ($edit)
                                    <div class="form-group">
                                    <label for="upazila_id">{{ __('admin.caseincomplete.victim') }} {{ __('admin.admin.upazila') }} <!--<span style="color: red"> * </span>--></label>
                                    <select class="form-control select2" name="upazila_id" id="upazila_id">
                                        <option value="">{{ __('admin.common.select') }}</option>
                                        @foreach ($upazilas as $key => $item)
                                        <option value="{{ $item->id }}" {{($application->upazila_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->bbs_code }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                @else
                                    <div class="form-group">
                                    <label for="upazila_id">{{ __('admin.caseincomplete.victim') }} {{ __('admin.admin.upazila') }} <!--<span style="color: red"> * </span>--></label>
                                    <select class="form-control select2" name="upazila_id" id="upazila_id">
                                        <option value="">{{ __('admin.common.select') }}</option>
                                        @foreach ($upazilas as $key => $item)
                                        <option value="{{ $item->id }}" {{(old('upazila_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} </option>
                                        @endforeach
                                    </select>
                                    </div>
                                @endif

                                @if ($edit)
                                    <div class="form-group">
                                    <label for="thana_id">{{ __('admin.caseincomplete.victim') }} {{ __('admin.admin.thana') }}</label>
                                    <select class="form-control select2" name="thana_id" id="thana_id">
                                        <option value="">{{ __('admin.common.select') }}</option>
                                        @foreach ($thanas as $key => $item)
                                        <option value="{{ $item->id }}" {{($application->thana_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->bbs_code }} </option>
                                        @endforeach
                                    </select>
                                    </div>
                                @else
                                    <div class="form-group">
                                    <label for="thana_id">{{ __('admin.caseincomplete.victim') }} {{ __('admin.admin.thana') }}</label>
                                    <select class="form-control select2" name="thana_id" id="thana_id">
                                        <option value="">{{ __('admin.common.select') }}</option>

                                        {{-- @foreach ($thanas as $key => $item)
                                        <option value="{{ $item->id }}" {{(old('thana_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                                        @endforeach --}}
                                    </select>
                                    </div>
                                @endif


                            </div>

                        </div>
                        <!-- card start -->
                    </div>
                    <!-- col end -->

                    <!-- col start -->
                    <div class="col-md-4">
                        <!-- card start -->
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title text-info">{{ __('admin.caseincomplete.victim_info') }}</h3>
                            </div>

                            <div class="card-body">
                                {{-- <div class="form-group">
                                    <label for="email">{{ __('admin.caseincomplete.email') }}</label>
                                    <input type="email" name="email" id="email"
                                        placeholder="{{ __('admin.caseincomplete.email') }}"
                                        value="{{ $edit?$application->email:old('email') }}"
                                        class="form-control">
                                </div> --}}

                                {{-- <div class="form-group">
                                    <label for="nid">{{ __('admin.caseincomplete.nid') }}</label>
                                    <input type="text" name="nid" id="nid"
                                        placeholder="{{ __('admin.caseincomplete.nid') }}"
                                        value="{{ $edit?$application->nid:old('nid') }}"
                                        class="form-control" minlength="10" maxlength="17" onkeypress='validate(event)'>
                                </div>

                                <div class="form-group">
                                  <label for="passport">{{ __('admin.caseincomplete.passport') }}</label>
                                  <input type="text" name="passport" id="passport"
                                      placeholder="{{ __('admin.caseincomplete.passport') }}"
                                      value="{{ $edit?$application->passport:old('passport') }}"
                                      class="form-control" minlength="11" maxlength="15" onkeypress='validate(event)'>
                                </div> --}}



                                <div class="form-group">
                                    <label for="title_bn"
                                        style="padding-right:20%;padding-top: 3%;">{{ __('admin.caseincomplete.gender') }}
                                        : </label> <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender" value="1"
                                                {{ ($edit && ($application->gender)) ? 'checked' : '' }}>{{ __('admin.caseincomplete.male') }}
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender" value="0"
                                                {{ ($edit && (!$application->gender)) ? 'checked' : '' }}>{{ __('admin.caseincomplete.female') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="class_en">{{ __('admin.caseincomplete.class_en') }}</label>
                                    <input type="text" name="class_en" id="class_en"
                                        placeholder="{{ __('admin.caseincomplete.class_en') }}"
                                        value="{{ $edit?$application->class_en:old('class_en') }}"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="class_bn">{{ __('admin.caseincomplete.class_bn') }}</label>
                                    <input type="text" name="class_bn" id="class_bn"
                                        placeholder="{{ __('admin.caseincomplete.class_bn') }}"
                                        value="{{ $edit?$application->class_bn:old('class_bn') }}"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="school_en">{{ __('admin.caseincomplete.school_en') }}</label>
                                    <input type="text" name="school_en" id="school_en"
                                        placeholder="{{ __('admin.caseincomplete.school_en') }}"
                                        value="{{ $edit?$application->school_en:old('school_en') }}"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="school_bn">{{ __('admin.caseincomplete.school_bn') }}</label>
                                    <input type="text" name="school_bn" id="school_bn"
                                        placeholder="{{ __('admin.caseincomplete.school_bn') }}"
                                        value="{{ $edit?$application->school_bn:old('school_bn') }}"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label
                                        for="address_en">{{ __('admin.caseincomplete.address_en') }}</label>
                                    <textarea rows="1" id="address_en" class="form-control"
                                        placeholder="{{ __('admin.caseincomplete.address_en') }}"
                                        name="address_en"
                                        required>{{ $edit?$application->address_en:old('address_en') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label
                                        for="address_bn">{{ __('admin.caseincomplete.address_bn') }}</label>
                                    <textarea rows="1" id="address_bn" class="form-control"
                                        placeholder="{{ __('admin.caseincomplete.address_bn') }}"
                                        name="address_bn"
                                        required>{{ $edit?$application->address_bn:old('address_bn') }}</textarea>
                                </div>


                                {{-- <div class="form-group">
                                    <label for="title_bn"
                                        style="padding-right:8%;padding-top: 3%;">{{ __('admin.caseincomplete.marital') }}: </label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="marital" value="1"
                                                {{ ($edit && ($application->marital)) ? 'checked' : '' }}>{{ __('admin.caseincomplete.married') }}
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="marital" value="0"
                                                {{ ($edit && (!$application->marital)) ? 'checked' : '' }}>{{ __('admin.caseincomplete.unmarried') }}
                                        </label>
                                    </div>
                                </div> --}}

                            </div>

                        </div>
                        <!-- card start -->
                    </div>
                    <!-- col end -->


                    <!-- col start -->
                    <div class="col-md-4">
                        <!-- card start -->
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title text-info">{{ __('admin.caseincomplete.victim_info') }}</h3>
                            </div>

                            <div class="card-body">


                                <div class="form-group">
                                    <label
                                        for="guardian_en">{{ __('admin.caseincomplete.guardian_en') }}</label>
                                    <input type="text" name="guardian_en" id="guardian_en"
                                        placeholder="{{ __('admin.caseincomplete.guardian_en') }}"
                                        value="{{ $edit?$application->guardian_en:old('guardian_en') }}"
                                        class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label
                                        for="guardian_bn">{{ __('admin.caseincomplete.guardian_bn') }}</label>
                                    <input type="text" name="guardian_bn" id="guardian_bn"
                                        placeholder="{{ __('admin.caseincomplete.guardian_bn') }}"
                                        value="{{ $edit?$application->guardian_bn:old('guardian_bn') }}"
                                        class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label
                                        for="guardian_contact">{{ __('admin.caseincomplete.guardian_contact') }}</label>
                                    <input type="text" name="guardian_contact" id="guardian_contact"
                                        placeholder="{{ __('admin.caseincomplete.guardian_contact') }}"
                                        value="{{ $edit?$application->guardian_contact:old('guardian_contact') }}"
                                        class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label
                                        for="contact">{{ __('admin.caseincomplete.contact') }}</label>
                                    <input type="text" name="contact" id="contact"
                                        placeholder="{{ __('admin.caseincomplete.contact') }}"
                                        value="{{ $edit?$application->contact:old('contact') }}"
                                        class="form-control" required>
                                </div>

                                {{-- <div class="form-group">
                                    <label
                                        for="spouse_en">{{ __('admin.caseincomplete.spouse_en') }}</label>
                                    <input type="text" name="spouse_en" id="spouse_en"
                                        placeholder="{{ __('admin.caseincomplete.spouse_en') }}"
                                        value="{{ $edit?$application->spouse_en:old('spouse_en') }}"
                                        class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label
                                        for="spouse_bn">{{ __('admin.caseincomplete.spouse_bn') }}</label>
                                    <input type="text" name="spouse_bn" id="spouse_bn"
                                        placeholder="{{ __('admin.caseincomplete.spouse_bn') }}"
                                        value="{{ $edit?$application->spouse_bn:old('spouse_bn') }}"
                                        class="form-control" required>
                                </div> --}}

                                <div class="form-group">
                                    <label for="dsign">
                                        {{ __('admin.caseincomplete.dsign') }} <span
                                            class="text-warning">
                                            ({{ __('admin.common.file_size_100') }})</span>
                                    </label>
                                    <input style="padding-top: 4px;" type="file" name="dsign" id="dsign"
                                        class="form-control">
                                    @if($edit && $application->dsign)
                                        <a target="_blank"
                                            href="{{ asset('storage/'.$application->dsign) }}">Show</a>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <!-- card start -->
                    </div>
                    <!-- col end -->




                    <!-- col start -->
                    <div class="col-md-3">
                        <!-- card start -->
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title text-info">{{ __('admin.caseincomplete.application_info') }}</h3>
                            </div>

                            <div class="card-body">


                                <div class="form-group">
                                    <label
                                        for="title_en">{{ __('admin.caseincomplete.title_en') }}</label>
                                    <textarea rows="1" id="title_en" class="form-control"
                                        placeholder="{{ __('admin.caseincomplete.title_en') }}"
                                        name="title_en"
                                        required>{{ $edit?$application->title_en:old('title_en') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label
                                        for="title_bn">{{ __('admin.caseincomplete.title_bn') }}</label>
                                    <textarea rows="1" id="title_bn" class="form-control"
                                        placeholder="{{ __('admin.caseincomplete.title_bn') }}"
                                        name="title_bn"
                                        required>{{ $edit?$application->title_bn:old('title_bn') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label
                                        for="title_details_en">{{ __('admin.caseincomplete.title_details_en') }}</label>
                                    <textarea rows="1" id="title_details_en" class="form-control"
                                        placeholder="{{ __('admin.caseincomplete.title_details_en') }}"
                                        name="title_details_en"
                                        required>{{ $edit?$application->title_details_en:old('title_details_en') }}</textarea>
                                </div>

                            </div>

                        </div>
                        <!-- card start -->
                    </div>
                    <!-- col end -->

                    <!-- col start -->
                    <div class="col-md-3">
                        <!-- card start -->
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title text-info">{{ __('admin.caseincomplete.application_info') }}</h3>
                            </div>

                            <div class="card-body">

                                <div class="form-group">
                                    <label
                                        for="title_details_bn">{{ __('admin.caseincomplete.title_details_bn') }}</label>
                                    <textarea rows="1" id="title_details_bn" class="form-control"
                                        placeholder="{{ __('admin.caseincomplete.title_details_bn') }}"
                                        name="title_details_bn"
                                        required>{{ $edit?$application->title_details_bn:old('title_details_bn') }}</textarea>
                                </div>

                                @if($edit)
                                    <div class="form-group">
                                        <label for="case_type_id">{{ __('admin.caseincomplete.case_type') }}<!--<span style="color: red"> * </span>--></label>
                                        <select class="form-control select2" name="case_type_id" id="case_type_id" required>
                                            <option value="">{{ __('admin.common.select') }}</option>


                                            @foreach($case_types as $key => $item)
                                                <option value="{{ $item->id }}" {{ ($application->case_type_id == $item->id) ? 'selected' : '' }}>{{ $item->{'title_'. app()->getLocale()} }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="case_type_id">{{ __('admin.caseincomplete.case_type') }} <!--<span style="color: red"> * </span>--></label>
                                        <select class="form-control select2" name="case_type_id" id="case_type_id" required>
                                            <option value="">{{ __('admin.common.select') }}</option>
                                            @foreach($case_types as $key => $item)
                                                <option value="{{ $item->id }}"
                                                    {{ (old('case_type_id') == $item->id) ? 'selected' : '' }}>
                                                    {{ $item->{'title_'. app()->getLocale()} }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                @if($edit)
                                    <div class="form-group">
                                        <label for="case_category_id">{{ __('admin.caseincomplete.case_category') }}<!--<span style="color: red"> * </span>--></label>
                                        <select class="form-control select2" name="case_category_id" id="case_category_id" required>
                                            <option value="">{{ __('admin.common.select') }}</option>
                                            @foreach($case_categories as $key => $item)
                                                <option value="{{ $item->id }}" {{ ($application->case_category_id == $item->id) ? 'selected' : '' }}>{{ $item->{'title_'. app()->getLocale()} }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="case_category_id">{{ __('admin.caseincomplete.case_category') }} <!--<span style="color: red"> * </span>--></label>
                                        <select class="form-control select2" name="case_category_id" id="case_category_id" required>
                                            <option value="">{{ __('admin.common.select') }}</option>
                                            @foreach($case_categories as $key => $item)
                                                <option value="{{ $item->id }}"
                                                    {{ (old('case_category_id') == $item->id) ? 'selected' : '' }}>
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
                                <h3 class="card-title text-info">{{ __('admin.caseincomplete.documents_info') }}</h3>
                            </div>

                            <div class="card-body">
                                @if ($edit)
                                    @if (count($application->file) > 0 )
                                        @foreach ($application->file as $key=>$file)
                                        <input type="hidden" name="arraydata[file{{$key+1}}][id]" value="{{$file->id}}">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="arraydata[file{{$key+1}}][title_en]" id="title_en{{$key+1}}" placeholder="{{ __('admin.caseincomplete.file_title_en') }}" value="{{@$file->title_en}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="arraydata[file{{$key+1}}][title_bn]" id="title_bn{{$key+1}}" placeholder="{{ __('admin.caseincomplete.file_title_bn') }}" value="{{@$file->title_bn}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input style="padding-top: 4px;" type="file" name="arraydata[file{{$key+1}}][thumb]" id="thumb{{$key+1}}" class="form-control">
                                                    <a target="_blank" href="{{ asset('storage/'.$file->thumb) }}">Show</a>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                @can('delete_single_file', app('App\Models\Caseincomplete'))
                                                <div class="form-group">
                                                    <a style="margin-top: 7px;" href="{{ route('admin.application_file.delete', $file->id) }}" href1="{{ route('admin.application_file.delete', [$file->id,1]) }}" class="btn btn-xs btn-danger deletes"><i class="fas fa-trash-alt"></i></a>
                                                </div>
                                                @endcan
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="arraydata[file1][title_en]" id="title_en" placeholder="{{ __('admin.caseincomplete.file_title_en') }}" value="{{@$file->title_en}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="arraydata[file1][title_bn]" id="title_bn" placeholder="{{ __('admin.caseincomplete.file_title_bn') }}" value="{{@$file->title_bn}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input style="padding-top: 4px;" type="file" name="arraydata[file1][thumb]" id="thumb" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <button disabled id="delete0" class="delete btn btn-danger btn-round form-control"><span> <i class="fa fa-minus" aria-hidden="true"></i></span> </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="arraydata[file1][title_en]" id="title_en" placeholder="{{ __('admin.caseincomplete.file_title_en') }}" value="{{@$file->title_en}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="arraydata[file1][title_bn]" id="title_bn" placeholder="{{ __('admin.caseincomplete.file_title_bn') }}" value="{{@$file->title_bn}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input style="padding-top: 4px;" type="file" name="arraydata[file1][thumb]" id="thumb" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <button disabled id="delete0" class="delete btn btn-danger btn-round form-control"><span> <i class="fa fa-minus" aria-hidden="true"></i></span> </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @can('update_evidence_files', app('App\Models\Caseincomplete'))
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
                                @endcan

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
        $sender_guardian_contact = $('#guardian_contact');
        senderContact();
        senderGuardianContact();

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

        function senderGuardianContact() {
            $($sender_guardian_contact).keyup(function (e) {
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
            @if (count($application->file) > 0)
                let x = {{count($application->file)}};
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
                $(wrapper).append('<div class="row">' +
                    '<div class="col-md-3">' +
                      '<div class="form-group">' +
                        '<input type="text" name="arraydata[file'+ x +'][title_en]" id="title_en'+ x +'" placeholder="{{ __('admin.caseincomplete.file_title_en') }}" value="" class="form-control">' +
                      '</div>' +
                    '</div>' +
                    '<div class="col-md-3">' +
                      '<div class="form-group">' +
                        '<input type="text" name="arraydata[file'+ x +'][title_bn]" id="title_bn'+ x +'" placeholder="{{ __('admin.caseincomplete.file_title_bn') }}" value="" class="form-control">' +
                      '</div>' +
                    '</div>' +
                    '<div class="col-md-3">' +
                      '<div class="form-group">' +
                        '<input style="padding-top: 4px;" type="file" name="arraydata[file'+ x +'][thumb]" id="thumb'+ x +'" class="form-control">' +
                      '</div>' +
                    '</div>' +
                    '<div class="col-md-3">' +
                      '<div class="form-group">' +
                        '<button id="delete'+ x +'" class="delete btn btn-danger btn-round form-control"><span> <i class="fa fa-minus" aria-hidden="true"></i></span></button>' +
                      '</div>' +
                    '</div>' +
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
