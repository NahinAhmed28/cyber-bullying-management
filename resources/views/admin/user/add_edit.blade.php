@php
    //use App\Helper\EnglishToBanglaDate;
    //use App\Helper\NumberToBanglaWord;
    //use Rakibhstu\Banglanumber\NumberToBangla;
    //$numto = new NumberToBangla();
@endphp

@php
  $edit = false;
  if(!empty($user)){
     if($user->id !=''){
         $edit=true;
     }
  }
@endphp


@extends('admin.layouts.master')
@section('title')
  {{__('admin.menu.site')}} :: {{__('admin.menu.dashboard')}}
@endsection

@section('styles')
  <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datepicker/bootstrap-datepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/bs-stepper/css/bs-stepper.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/dropzone/min/dropzone.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.css') }}">

  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
  <link href="http://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet">


  <style>
    input.form-check-input {
      width: 20px;
      height: 20px;
      padding: 10px;
    }
    .form-check-label {
      margin: 4px 5px;
    }
  </style>
@endsection

@section('breadcrumb')
  @include('../admin.layouts.partials.breadcrumb', ['path1' => __('admin.menu.user'), 'route1' => route('admin.user') ])
@endsection

@section('content')
  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-2">
            <a href="{{ route('admin.user') }}" class="btn btn-outline-light form-control btn-add-new">
                <i class="fas fa-backward"></i> <span>{{ __('admin.common.back') }}</span>
            </a>
          </div>

          <div class="col-sm-10">
            <h1 class="text-light">
              @if ($edit)
                <i class="fas fa-bookmark"></i> {{ __('admin.common.update') }} {{ __('admin.menu.user') }} {{ __('admin.common.info') }}
              @else
                <i class="fas fa-bookmark"></i> {{ __('admin.common.add') }} {{ __('admin.menu.user') }} {{ __('admin.common.info') }}
              @endif

            </h1>
          </div>

        </div>
      </div>
    </section>

    @if (count($errors) || Session::has('success'))

      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-0">
            <div class="col-md-12">
                @if(count($errors))
                  <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{__('admin.common.error_whoops')}}</strong> {{__('admin.common.error_heading')}}
                    <br/>
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
                        <strong>{{__('admin.common.success_heading')}}</strong> {{Session::get('success')}}
                    </div>
                @endif
                <br>
            </div>
          </div>
        </div>
      </section>
    @endif


    <form class="form-edit-add" role="form" id="user_entry_form"
                action="{{!$edit ? route('admin.user.store') : route('admin.user.update', $user->id)}}"
                method="POST" enctype="multipart/form-data" autocomplete="off">
              <!-- PUT Method if we are editing -->
              @if($edit)
                  <input type="hidden" name="id" value="{{$user->id}}">
                  {{ method_field("PUT") }}
              @endif
              {{ csrf_field() }}

      <section class="content" style="margin-top: -10px;">
        <div class="container-fluid">

            <!-- 1st row start -->
            <div class="row">
              <!-- col start -->
              <div class="col-md-6">
                <!-- card start -->
                <div class="card">

                  <div class="card-header">
                    <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
                  </div>

                  <div class="card-body">

                    <div class="form-group">
                      <label for="title_en">{{ __('admin.user.title_en') }}</label>
                      <input type="text" name="title_en"
                      id="title_en" placeholder="{{ __('admin.user.title_en') }}"
                      value="{{ $edit?$user->title_en:old('title_en') }}"
                      class="form-control" required autofocus tabindex="0">
                    </div>

                    <div class="form-group">
                      <label for="title_bn">{{ __('admin.user.title_bn') }}</label>
                      <input type="text" name="title_bn"
                      id="title_bn" placeholder="{{ __('admin.user.title_bn') }}"
                      value="{{ $edit?$user->title_bn:old('title_bn') }}"
                      class="form-control" required>
                    </div>

                    <!-- Location -->
                    @if ($edit)
                      <div class="form-group">
                        <label for="division_id">{{ __('admin.user.division') }} <!--<span style="color: red"> * </span>--></label>
                        <select class="form-control select2" name="division_id" id="division_id" required>
                          <option value="">{{ __('admin.common.select') }} {{ __('admin.user.division') }}</option>
                          @foreach ($divisions as $key => $item)
                            <option value="{{ $item->id }}" {{($user->division_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->bbs_code }}</option>
                          @endforeach
                        </select>
                      </div>
                    @else
                      <div class="form-group">
                        <label for="division_id">{{ __('admin.user.division') }} <!--<span style="color: red"> * </span>--></label>
                        <select class="form-control select2" name="division_id" id="division_id" required>
                          <option value="">{{ __('admin.common.select') }} {{ __('admin.user.division') }}</option>
                          @foreach ($divisions as $key => $item)
                            <option value="{{ $item->id }}" {{(old('division_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} </option>
                          @endforeach
                        </select>
                      </div>
                    @endif


                    @if ($edit)
                      <div class="form-group">
                        <label for="district_id">{{ __('admin.user.district') }} <!--<span style="color: red"> * </span>--></label>
                        <select class="form-control select2" name="district_id" id="district_id" required>
                          <option value="">{{ __('admin.common.select') }} {{ __('admin.user.district') }}</option>
                          @foreach ($districts as $key => $item)
                            <option value="{{ $item->id }}" {{($user->district_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->bbs_code }}</option>
                          @endforeach
                        </select>
                      </div>
                    @else
                      <div class="form-group">
                        <label for="district_id">{{ __('admin.user.district') }} <!--<span style="color: red"> * </span>--></label>
                        <select class="form-control select2" name="district_id" id="district_id" required>
                          <option value="">{{ __('admin.common.select') }} {{ __('admin.user.district') }}</option>
                          @foreach ($districts as $key => $item)
                            <option value="{{ $item->id }}" {{(old('district_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} </option>
                          @endforeach
                        </select>
                      </div>
                    @endif


                    @if ($edit)
                      <div class="form-group">
                        <label for="upazila_id">{{ __('admin.user.upazila') }} <!--<span style="color: red"> * </span>--></label>
                        <select class="form-control select2" name="upazila_id" id="upazila_id" required>
                          <option value="">{{ __('admin.common.select') }} {{ __('admin.user.upazila') }}</option>
                          @foreach ($upazilas as $key => $item)
                            <option value="{{ $item->id }}" {{($user->upazila_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->bbs_code }}</option>
                          @endforeach
                        </select>
                      </div>
                    @else
                      <div class="form-group">
                        <label for="upazila_id">{{ __('admin.user.upazila') }} <!--<span style="color: red"> * </span>--></label>
                        <select class="form-control select2" name="upazila_id" id="upazila_id" required>
                          <option value="">{{ __('admin.common.select') }} {{ __('admin.user.upazila') }}</option>
                          @foreach ($upazilas as $key => $item)
                            <option value="{{ $item->id }}" {{(old('upazila_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} </option>
                          @endforeach
                        </select>
                      </div>
                    @endif

                    @if ($edit)
                      <div class="form-group">
                        <label for="thana_id">{{ __('admin.user.thana') }} <!--<span style="color: red"> * </span>--></label>
                        <select class="form-control select2" name="thana_id" id="thana_id" required>
                          <option value="">{{ __('admin.common.select') }} {{ __('admin.user.thana') }}</option>
                          @foreach ($thanas as $key => $item)
                            <option value="{{ $item->id }}" {{($user->thana_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->bbs_code }}</option>
                          @endforeach
                        </select>
                      </div>
                    @else
                      <div class="form-group">
                        <label for="thana_id">{{ __('admin.user.thana') }} <!--<span style="color: red"> * </span>--></label>
                        <select class="form-control select2" name="thana_id" id="thana_id" required>
                          <option value="">{{ __('admin.common.select') }} {{ __('admin.user.thana') }}</option>
                          @foreach ($thanas as $key => $item)
                            <option value="{{ $item->id }}" {{(old('thana_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} </option>
                          @endforeach
                        </select>
                      </div>
                    @endif
                    <!-- Location -->

                  </div>
                </div>
                <!-- card start -->
              </div>
              <!-- col end -->

              <!-- col start -->
              <div class="col-md-6">
                <!-- card start -->
                <div class="card">

                  <div class="card-header"></div>

                  <div class="card-body">

                    <div class="form-group">
                      <label for="father_en">{{ __('admin.user.father_en') }}</label>
                      <input type="text" name="father_en"
                      id="father_en" placeholder="{{ __('admin.user.father_en') }}"
                      value="{{ $edit?$user->father_en:old('father_en') }}"
                      class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label for="father_bn">{{ __('admin.user.father_bn') }}</label>
                      <input type="text" name="father_bn"
                      id="father_bn" placeholder="{{ __('admin.user.father_bn') }}"
                      value="{{ $edit?$user->father_bn:old('father_bn') }}"
                      class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label for="contact">{{ __('admin.user.contact') }}</label>
                      <input type="text" name="contact"
                      id="contact" placeholder="{{ __('admin.user.contact') }}"
                      value="{{ $edit?$user->contact:old('contact') }}" {{$edit?'required':'required'}}
                      class="form-control" minlength="11" maxlength="15" onkeypress='validate(event)'>
                    </div>

                    <div class="form-group">
                      <label for="nid">{{ __('admin.user.nid') }}</label>
                      <input type="text" name="nid"
                      id="nid" placeholder="{{ __('admin.user.nid') }}"
                      value="{{ $edit?$user->nid:old('nid') }}"
                      class="form-control" minlength="10" maxlength="17" onkeypress='validate(event)'>
                    </div>

                    {{-- <div class="form-group">
                      <label for="branch_contact">{{ __('admin.user.branch_contact') }}</label>
                      <input type="number" name="branch_contact"
                      id="branch_contact" placeholder="{{ __('admin.user.branch_contact') }}"
                      value="{{ $edit?$user->branch_contact:old('branch_contact') }}" {{$edit?'required':'required'}}
                      class="form-control">
                    </div> --}}

                    <div class="form-group">
                      <label for="address_en">{{ __('admin.user.address_en') }}</label>
                      <textarea rows="1" id="address_en" class="form-control" placeholder="{{ __('admin.user.address_en') }}"
                      name="address_en" required>{{ $edit?$user->address_en:old('address_en') }}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="address_bn">{{ __('admin.user.address_bn') }}</label>
                      <textarea rows="1" id="address_bn" class="form-control" placeholder="{{ __('admin.user.address_bn') }}"
                      name="address_bn" required>{{ $edit?$user->address_bn:old('address_bn') }}</textarea>
                    </div>

                  </div>
                </div>
                <!-- card start -->
              </div>
              <!-- col end -->
            </div>
            <!-- 1st row end -->

            <!-- 2nd row start -->
            <div class="row">
              <!-- col start -->
              <div class="col-md-6">
                <!-- card start -->
                <div class="card">

                  <div class="card-header">
                    <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
                  </div>

                  <div class="card-body">

                    <div class="form-group">
                      <label for="bayat_date">{{ __('admin.user.bayat_date') }} </label>
                      <input type="text" name="bayat_date"
                      id="bayat_date" placeholder="{{ __('admin.user.bayat_date') }}"
                      value="{{($edit)? $user->bayat_date : ''}}"
                      class="form-control" required>
                    </div>

                    @if ($edit)
                      <div class="form-group">
                        <label for="branch_id">{{ __('admin.user.branch') }} <!--<span style="color: red"> * </span>--></label>
                        <select class="form-control select2" name="branch_id" id="branch_id" required>
                          <option value="">{{ __('admin.common.select') }} {{ __('admin.user.branch') }}</option>
                          @foreach ($branches as $key => $item)
                            <option value="{{ $item->id }}" {{($user->branch_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                          @endforeach
                        </select>
                      </div>
                    @else
                      <div class="form-group">
                        <label for="branch_id">{{ __('admin.user.branch') }} <!--<span style="color: red"> * </span>--></label>
                        <select class="form-control select2" name="branch_id" id="branch_id" required>
                          <option value="">{{ __('admin.common.select') }} {{ __('admin.user.branch') }}</option>

                          @foreach ($branches as $key => $item)
                            <option value="{{ $item->id }}" {{(old('branch_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                          @endforeach
                        </select>
                      </div>
                    @endif

                    @if ($edit)
                      <div class="form-group">
                        <label for="branch_unit_id">{{ __('admin.user.branch_unit') }} <!--<span style="color: red"> * </span>--></label>
                        <select class="form-control select2" name="branch_unit_id" id="branch_unit_id" required>
                          <option value="">{{ __('admin.common.select') }} {{ __('admin.user.branch_unit') }}</option>
                          @foreach ($branch_units as $key => $item)
                            <option value="{{ $item->id }}" {{($user->branch_unit_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                          @endforeach
                        </select>
                      </div>
                    @else
                      <div class="form-group">
                        <label for="branch_unit_id">{{ __('admin.user.branch_unit') }} <!--<span style="color: red"> * </span>--></label>
                        <select class="form-control select2" name="branch_unit_id" id="branch_unit_id" required>
                          <option value="">{{ __('admin.common.select') }} {{ __('admin.user.branch_unit') }}</option>

                          {{-- @foreach ($branch_units as $key => $item)
                            <option value="{{ $item->id }}" {{(old('branch_unit_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
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
              <div class="col-md-6">
                <!-- card start -->
                <div class="card">

                  <div class="card-header"></div>

                  <div class="card-body">

                    @if ($edit)
                      <div class="form-group">
                        <label for="caliph_id">{{ __('admin.user.caliph') }} <!--<span style="color: red"> * </span>--></label>
                        <select class="form-control select2" name="caliph_id" id="caliph_id" required>
                          <option value="">{{ __('admin.common.select') }} {{ __('admin.user.caliph') }}</option>
                          @foreach ($caliphs as $key => $item)
                            <option value="{{ $item->id }}" {{($user->caliph_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                          @endforeach
                        </select>
                      </div>
                    @else
                      <div class="form-group">
                        <label for="caliph_id">{{ __('admin.user.caliph') }} <!--<span style="color: red"> * </span>--></label>
                        <select class="form-control select2" name="caliph_id" id="caliph_id" required>
                          <option value="">{{ __('admin.common.select') }} {{ __('admin.user.caliph') }}</option>

                          @foreach ($caliphs as $key => $item)
                            <option value="{{ $item->id }}" {{(old('caliph_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                          @endforeach
                        </select>
                      </div>
                    @endif

                    @if ($edit)
                      <div class="form-group">
                        <label for="president_id">{{ __('admin.user.president') }} <!--<span style="color: red"> * </span>--></label>
                        <select class="form-control select2" name="president_id" id="president_id" required>
                          <option value="">{{ __('admin.common.select') }} {{ __('admin.user.president') }} </option>
                          @foreach ($presidents as $key => $item)
                            <option value="{{ $item->id }}" {{($user->president_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                          @endforeach
                        </select>
                      </div>
                    @else
                      <div class="form-group">
                        <label for="president_id">{{ __('admin.user.president') }} <!--<span style="color: red"> * </span>--></label>
                        <select class="form-control select2" name="president_id" id="president_id" required>
                          <option value="">{{ __('admin.common.select') }} {{ __('admin.user.president') }} </option>

                          @foreach ($presidents as $key => $item)
                            <option value="{{ $item->id }}" {{(old('president_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                          @endforeach
                        </select>
                      </div>
                    @endif

                    @if ($edit)
                      <div class="form-group">
                        <label for="vice_president_id">{{ __('admin.user.vice_president') }} <!--<span style="color: red"> * </span>--></label>
                        <select class="form-control select2" name="vice_president_id" id="vice_president_id" required>
                          <option value="">{{ __('admin.common.select') }} {{ __('admin.user.vice_president') }}</option>
                          @foreach ($vice_presidents as $key => $item)
                            <option value="{{ $item->id }}" {{($user->vice_president_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                          @endforeach
                        </select>
                      </div>
                    @else
                      <div class="form-group">
                        <label for="vice_president_id">{{ __('admin.user.vice_president') }} <!--<span style="color: red"> * </span>--></label>
                        <select class="form-control select2" name="vice_president_id" id="vice_president_id" required>
                          <option value="">{{ __('admin.common.select') }} {{ __('admin.user.vice_president') }}</option>

                          {{-- @foreach ($vice_presidents as $key => $item)
                            <option value="{{ $item->id }}" {{(old('vice_president_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                          @endforeach --}}
                        </select>
                      </div>
                    @endif



                    {{-- <div class="form-group">
                      <label for="office_contact">{{ __('admin.user.office_contact') }}</label>
                      <input type="text" name="office_contact"
                      id="office_contact" placeholder="{{ __('admin.user.office_contact') }}"
                      value="{{ $edit?$user->office_contact:old('office_contact') }}" {{$edit?'required':'required'}}
                      class="form-control" required>
                    </div> --}}

                  </div>
                </div>
                <!-- card start -->
              </div>
              <!-- col end -->
            </div>
            <!-- 2nd row end -->

            <!-- 3rd row start -->
            <div class="row">
              <!-- col start -->
              <div class="col-md-6">
                <!-- card start -->
                <div class="card">

                  <div class="card-header"></div>

                  <div class="card-body">
                    @if ($edit)
                    <div class="form-group">
                      @foreach ($conditions as $key=>$item)
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="condition{{$item->id}}" name="conditions[]"
                          value="{{$item->id}}" {{(in_array($item->id,$conditions_arr)) ? 'checked' : ''}}>
                          <label class="form-check-label" for="condition{{$item->id}}">{{$item->{'title_'. app()->getLocale()} }}</label>
                        </div>
                      @endforeach
                    </div>
                    @else
                    <div class="form-group">
                      @foreach ($conditions as $key=>$item)
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="condition{{$item->id}}" name="conditions[]" value="{{$item->id}}">
                          <label class="form-check-label" for="condition{{$item->id}}">{{$item->{'title_'. app()->getLocale()} }}</label>
                        </div>
                      @endforeach
                    </div>
                    @endif

                    <div class="row" id="pre_member_info">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="user_code">{{ __('admin.user.user_code') }}</label>
                          <input type="number" name="user_code"
                          id="user_code" placeholder="{{ __('admin.user.user_code') }}"
                          value="{{ $edit?$user->user_code:old('user_code') }}" {{$edit?'':''}}
                          class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="unit_code">{{ __('admin.user.unit_code') }}</label>
                          <input type="number" name="unit_code"
                          id="unit_code" placeholder="{{ __('admin.user.unit_code') }}"
                          value="{{ $edit?$user->unit_code:old('unit_code') }}" {{$edit?'':''}}
                          class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="you_unit_code">{{ __('admin.user.you_unit_code') }}</label>
                          <input type="number" name="you_unit_code"
                          id="you_unit_code" placeholder="{{ __('admin.user.you_unit_code') }}"
                          value="{{ $edit?$user->you_unit_code:old('you_unit_code') }}" {{$edit?'':''}}
                          class="form-control">
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

                  <div class="card-header"></div>

                  <div class="card-body">
                    {{-- <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="check1" name="colors" value="{{(app()->getLocale() == 'en') ? 'Class' : 'শ্রেণী'}}">
                      <label class="form-check-label" for="check1">{{(app()->getLocale() == 'en') ? 'Class' : 'শ্রেণী'}}</label>
                    </div> --}}

                    {{-- <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="check2" name="colors" value="{{(app()->getLocale() == 'en') ? 'Yellow' : 'হলুদ'}}">
                      <label class="form-check-label" for="check2">{{(app()->getLocale() == 'en') ? 'Yellow' : 'হলুদ'}}</label>
                    </div>

                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="check3" name="colors" value="{{(app()->getLocale() == 'en') ? 'White' : 'সাদা'}}">
                      <label class="form-check-label" for="check3">{{(app()->getLocale() == 'en') ? 'White' : 'সাদা'}}</label>
                    </div>

                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="check4" name="colors" value="{{(app()->getLocale() == 'en') ? 'Green' : 'সবুজ'}}">
                      <label class="form-check-label" for="check4">{{(app()->getLocale() == 'en') ? 'Green' : 'সবুজ'}}</label>
                    </div>

                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="check5" name="colors" value="{{(app()->getLocale() == 'en') ? 'Red' : 'লাল'}}">
                      <label class="form-check-label" for="check5">{{(app()->getLocale() == 'en') ? 'Red' : 'লাল'}}</label>
                    </div> --}}
                    <div class="form-group">
                      <label for="thumb">
                          {{ __('admin.user.thumb') }} <span
                                  class="text-warning"> ({{ __('admin.common.file_size_100') }})</span>
                      </label>
                      <input style="padding: 3px;" type="file" name="thumb" id="thumb"
                            class="form-control">
                      @if($edit && $user->thumb)
                          <a target="_blank"
                            href="{{asset('storage/'.$user->thumb)}}">Show</a>
                      @endif
                    </div>
                    <hr>

                    @if ($edit)
                    <div class="form-group">
                      @foreach ($colors as $key=>$item)
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="color{{$item->id}}" name="colors[]"
                          value="{{$item->id}}" {{(in_array($item->id,$colors_arr)) ? 'checked' : ''}}>
                          <label class="form-check-label" for="color{{$item->id}}">{{$item->{'title_'. app()->getLocale()} }}</label>
                        </div>
                      @endforeach
                    </div>
                    @else
                    <div class="form-group">
                      @foreach ($colors as $key=>$item)
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="color{{$item->id}}" name="colors[]" value="{{$item->id}}">
                          <label class="form-check-label" for="color{{$item->id}}">{{$item->{'title_'. app()->getLocale()} }}</label>
                        </div>
                      @endforeach
                    </div>
                    @endif

                    <hr>
                    <div class="form-group" >
                      <div class="form-check" >
                        <input type="checkbox" class="form-check-input" id="agreements" name="agreements">
                        <label class="form-check-label" for="agreements" id="agreements_text" title="{{ __('admin.user.agreements_text') }}">{{ __('admin.common.agreements') }}</label>
                      </div>
                    </div>

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
            <!-- 3rd row end -->
        </div>
      </section>
    </form>

  </div>
@endsection

@section('scripts')
  <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
  <script src="{{asset('assets/plugins/sweetalert2/sweetalert2.js')}}"></script>

  <script src="{{ asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>

  <script src="{{ asset('assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>

  <script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

  <script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
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
      if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
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
      function senderContact(){
        $($sender_contact).keyup(function (e) {
          let value = $(this).val();
          if(value.length == 11){
            $(this).removeClass('is-invalid');
            $(this).css("background","none");
          }else{
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

      $("#bayat_date").datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        //startDate: '-3d'
      }).datepicker( @if($edit && @$user->bayat_date)   @else 'update', new Date() @endif);


      @if ((Route::current()->getName() == 'admin.user.create') || (Route::current()->getName() == 'admin.user.edit'))
        $("body").addClass("sidebar-collapse");
        //$("body").removeClass("sidebar-collapse");
      @endif
    });

    // Location
    $(document).ready(function () {
      $('#division_id').on('change', function(e){
        var division_id = e.target.value;
        var route = "{{route('get.district')}}/"+division_id;
        //console.log(division_id);
        $.get(route, function(data) {
          //console.log(data);
          $('#district_id').empty();
          $('#district_id').append('<option value="">{{ __('admin.common.select') }} {{ __('admin.user.district') }}</option>');
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
          $('#upazila_id').append('<option value="">{{ __('admin.common.select') }} {{ __('admin.user.upazila') }} </option>');
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
          $('#thana_id').append('<option value="">{{ __('admin.common.select') }} {{ __('admin.user.thana') }} </option>');
          $.each(data, function(index,data){
            $('#thana_id').append('<option value="' + data.id + '">' + data.title_{{app()->getLocale()}} + ' - ' + data.bbs_code +  '</option>');
          });
        });
      });

      // Location

      $('#branch_id').on('change', function(e){
        var branch_id = e.target.value;
        var route = "{{route('get.branch_unit')}}/"+branch_id;
        console.log(branch_id);

        $.get(route, function(data) {
          //console.log(data);
          $('#branch_unit_id').empty();
          $('#branch_unit_id').append('<option value="">{{ __('admin.common.select') }} {{ __('admin.user.branch_unit') }}</option>');
          $.each(data, function(index,data){
            $('#branch_unit_id').append('<option value="' + data.id + '">' + data.title_{{app()->getLocale()}} + ' - ' + data.code +  '</option>');
          });
        });


      });

      // $('#branch_id').on('change', function(e){
      //   var branch_id = e.target.value;
      //   var route = "{{route('get.caliph')}}/"+branch_id;
      //   //console.log(branch_id);
      //   if (branch_id) {
      //     $.get(route, function(data) {
      //       //console.log(data);
      //       $('#caliph_id').empty();
      //       $('#caliph_id').append('<option value="">{{ __('admin.common.select') }} {{ __('admin.user.caliph') }}</option>');
      //       $.each(data, function(index,data){
      //         $('#caliph_id').append('<option value="' + data.id + '">' + data.title_{{app()->getLocale()}} + ' - ' + data.code +  '</option>');
      //       });
      //     });
      //   }

      // });


      $('#branch_id').on('change', function(e){
        var branch_id = e.target.value;
        var route = "{{route('get.vice_president')}}/"+branch_id;
        //console.log(branch_id);
        if (branch_id) {
          $.get(route, function(data) {
            //console.log(data);
            $('#vice_president_id').empty();
            $('#vice_president_id').append('<option value="">{{ __('admin.common.select') }} {{ __('admin.user.vice_president') }}</option>');
            $.each(data, function(index,data){
              $('#vice_president_id').append('<option value="' + data.id + '">' + data.title_{{app()->getLocale()}} + ' - ' + data.code +  '</option>');
            });
          });
        }

      });


      $('#branch_id').on('change', function(e){
        $(".se-pre-con").fadeIn();
        var branch_id = e.target.value;
        var route = "{{route('get.president')}}/"+branch_id;
        //console.log(president_id);
        if (branch_id) {
          $.get(route, function(data) {
            $(".se-pre-con").fadeOut();
            //console.log(data);
            $('#president_id').empty();
            $('#president_id').append('<option value="">{{ __('admin.common.select') }} {{ __('admin.user.president') }}</option>');
            $.each(data, function(index,data){
              $('#president_id').append('<option value="' + data.id + '">' + data.title_{{app()->getLocale()}} + ' - ' + data.code +  '</option>');
            });
          });
        }else{
          $(".se-pre-con").fadeOut();
        }
      });






      $("#agreements_text").click(function (e) {
        e.preventDefault();
        var $title = $(this).find(".title");
        if (!$title.length) {
          $(this).append('<span class="title" style="color:red">' + "<br />" + $(this).attr("title") + '</span>');
        } else {
          $title.remove();
        }
      });

      var $save = $(".save");
      var $pre_member_info = $("#pre_member_info");
      var $user_code = $("#user_code");
      var $unit_code = $("#unit_code");
      var $you_unit_code = $("#you_unit_code");
      @if (in_array(9,$conditions_arr))
      $pre_member_info.show();
      @else
      $pre_member_info.hide();
      @endif

      $("#condition9").change(function (e) {
        e.preventDefault();
        var condition_val = this.checked ? e.target.value : 0;
        //console.log(condition_val);
        if (condition_val != 0) {
          $user_code.val(null);
          $unit_code.val(null);
          $you_unit_code.val(null);
          $pre_member_info.show();
        } else {
          $user_code.val(null);
          $unit_code.val(null);
          $you_unit_code.val(null);
          $pre_member_info.hide();
        }
      });

      $save.hide();
      $("#agreements").change(function (e) {
        e.preventDefault();
        var agreements_val = this.checked ? e.target.value : 0;
        //console.log(agreements_val);
        if (agreements_val != 0) {
          $save.show();
        } else {
          $save.hide();
        }
      });

      // Form Submit

      //Form Submit Confirmation
      $('#user_entry_form').submit(function(event) {
        event.preventDefault();
        var form = $(this)[0];
        Swal.fire({
          title: "{{__('admin.common.submit_confirm_msg')}}",
          showDenyButton: true,
          showCancelButton: false,
          confirmButtonText: "{{__('admin.common.save')}}",
          denyButtonText: "{{__('admin.common.not_save')}}",
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            $(".se-pre-con").fadeIn().fadeOut();
            form.submit();
          } else if (result.isDenied) {
            //Swal.fire("{{__('admin.common.not_save1')}}", '', 'info');
            //console.log('he');
            //$service_type_id.focus();
            //$sender_contact.focus();
          }
        })
      });


    });
  </script>

@endsection


