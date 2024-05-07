@php
  $edit = false;
  if(!empty($service)){
     if($service->id !=''){
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
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/bs-stepper/css/bs-stepper.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/dropzone/min/dropzone.min.css') }}">
@endsection

@section('breadcrumb')
  @include('../admin.layouts.partials.breadcrumb', ['path1' => __('admin.menu.service'), 'route1' => route('admin.service') ])
@endsection

@section('content')

  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-2">
            <a href="{{ route('admin.service') }}" class="btn btn-outline-light form-control btn-add-new">
                <i class="fas fa-backward"></i> <span>{{ __('admin.common.back') }}</span>
            </a>
          </div>

          <div class="col-sm-10">
            <h1 class="text-light">
              @if ($edit)
                <i class="fas fa-bookmark"></i> {{ __('admin.common.update') }} {{ __('admin.menu.service') }} {{ __('admin.common.info') }}
              @else
                <i class="fas fa-bookmark"></i> {{ __('admin.common.add') }} {{ __('admin.menu.service') }} {{ __('admin.common.info') }}
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


<form class="form-edit-add" service="form" id="service_entry_form"
              action="{{!$edit ? route('admin.service.store') : route('admin.service.update', $service->id)}}"
              method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
            @if($edit)
                <input type="hidden" name="id" value="{{$service->id}}">
                {{ method_field("PUT") }}
            @endif
            {{ csrf_field() }}

    <section class="content" style="margin-top: -10px;">
      <div class="container-fluid">
          <div class="row">
            <!-- col start -->
            <div class="col-6">
              <!-- card start -->
              <div class="card">

                <div class="card-header">
                  <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
                </div>

                <div class="card-body">

                  {{-- <div class="form-group">
                    <label for="name">{{ __('admin.service.name') }}</label>
                    <input type="text" name="name"
                     id="name" placeholder="{{ __('admin.service.name') }}"
                     value="{{ $edit?$service->name:old('name') }}"
                     class="form-control" >
                  </div> --}}
                  @if ($edit)
                    <div class="form-group">
                      <label for="category_id">{{ __('admin.service.category') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="category_id" id="category_id" required>
                        @foreach ($categories as $key => $item)
                          <option value="{{ $item->id }}" {{($service->category_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}</option>
                        @endforeach
                      </select>
                    </div>
                  @else
                    <div class="form-group">
                      <label for="category_id">{{ __('admin.service.category') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="category_id" id="category_id" required>
                        @foreach ($categories as $key => $item)
                          <option value="{{ $item->id }}" {{(old('category_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}</option>
                        @endforeach
                      </select>
                    </div>
                  @endif


                  @if ($edit)
                    <div class="form-group">
                      <label for="service_type_id">{{ __('admin.service.service_type') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="service_type_id" id="service_type_id" required>
                        @foreach ($service_types as $key => $item)
                          <option value="{{ $item->id }}" {{($service->service_type_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}</option>
                        @endforeach
                      </select>
                    </div>
                  @else
                    <div class="form-group">
                      <label for="service_type_id">{{ __('admin.service.service_type') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="service_type_id" id="service_type_id" required>
                        @foreach ($service_types as $key => $item)
                          <option value="{{ $item->id }}" {{(old('service_type_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}</option>
                        @endforeach
                      </select>
                    </div>
                  @endif

                  <div class="form-group">
                    <label for="title_en">{{ __('admin.service.title_en') }}</label>
                    <input type="text" name="title_en"
                     id="title_en" placeholder="{{ __('admin.service.title_en') }}"
                     value="{{ $edit?$service->title_en:old('title_en') }}"
                     class="form-control" >
                  </div>

                  <div class="form-group">
                    <label for="title_bn">{{ __('admin.service.title_bn') }}</label>
                    <input type="text" name="title_bn"
                     id="title_bn" placeholder="{{ __('admin.service.title_bn') }}"
                     value="{{ $edit?$service->title_bn:old('title_bn') }}"
                     class="form-control">
                  </div>

                </div>

              </div>
              <!-- card start -->
            </div>
            <!-- col end -->


            <!-- col start -->
            <div class="col-6">
              <!-- card start -->
              <div class="card">

                <div class="card-header">
                  <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
                </div>

                <div class="card-body">

                  <div class="form-group">
                    <label for="govt_charge">{{ __('admin.service.govt_charge') }}</label> <span class="text-info">({{__('admin.common.en_lang_use')}}) </span>
                    <input type="number" name="govt_charge"
                     id="govt_charge" placeholder="{{ __('admin.service.govt_charge') }}"
                     value="{{ $edit?$service->govt_charge:old('govt_charge')??0 }}"
                     class="form-control" >
                  </div>

                  <div class="form-group">
                    <label for="service_charge">{{ __('admin.service.service_charge') }}</label> <span class="text-info">({{__('admin.common.en_lang_use')}}) </span>
                    <input type="number" name="service_charge"
                     id="service_charge" placeholder="{{ __('admin.service.service_charge') }}"
                     value="{{ $edit?$service->service_charge:old('service_charge')??0 }}"
                     class="form-control" >
                  </div>

                  <div class="form-group">
                    <label for="total_charge">{{ __('admin.service.total_charge') }}</label> <span class="text-info">({{__('admin.common.en_lang_use')}}) </span>
                    <input disabled type="number" name="total_charge"
                     id="total_charge" placeholder="{{ __('admin.service.total_charge') }}"
                     value="{{ $edit?$service->total_charge:old('total_charge')??0 }}"
                     class="form-control" >
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
      </div>
    </section>
  </form>

  </div>




@endsection


@section('scripts')

  <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>

  <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

  <script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/dropzone/min/dropzone.min.js') }}"></script>

  <script>
    $(document).ready(function () {
      $('.select2').select2();
      // $(".date_picker").datepicker({
      //     autoclose: true,
      //     todayHighlight: true,
      //     format: 'yyyy-mm-dd',
      //     //startDate: '-3d'
      // }).datepicker(
      //     @if (!@$parameters['from_date'])
      //         'update',
      //         new Date()
      //     @endif );

      $govt_charge = $('#govt_charge');
      $service_charge = $('#service_charge');
      $total_charge = $('#total_charge');
      var total_charge = 0;

      function GovtCharge(){
        $($govt_charge).keyup(function (e) {
          total_charge = parseFloat($(this).val()) + parseFloat($service_charge.val());
          $total_charge.val(total_charge);
        });
      }

      function ServiceCharge(){
        $($service_charge).keyup(function (e) {
          // if ($(this).val() == "") {
          //   $(this).val(0)
          // }
          total_charge = parseFloat($(this).val()) + parseFloat($govt_charge.val());
          $total_charge.val(total_charge);
        });
      }

      GovtCharge();
      ServiceCharge();
    });
  </script>

@endsection


