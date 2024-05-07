@php
  $edit = false;
  if(!empty($branch)){
     if($branch->id !=''){
         $edit=true;
     }
  }

  $authUser = Auth::guard('admin')->user()->load(['userType']);
  $default_role = $authUser->userType->default_role;
@endphp


@extends('admin.layouts.master')
@section('title')
  {{__('admin.menu.site')}} :: {{__('admin.menu.branch')}}
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

@endsection

@section('breadcrumb')
  @include('../admin.layouts.partials.breadcrumb', ['path1' => __('admin.menu.branch'), 'route1' => route('admin.branch') ])
@endsection

@section('content')

  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-2">
            <a href="{{ route('admin.branch') }}" class="btn btn-outline-light form-control btn-add-new">
                <i class="fas fa-backward"></i> <span>{{ __('admin.common.back') }}</span>
            </a>
          </div>

          <div class="col-sm-10">
            <h1 class="text-light">
              @if ($edit)
                <i class="fas fa-bookmark"></i> {{ __('admin.common.update') }} {{ __('admin.menu.branch') }} {{ __('admin.common.info') }}
              @else
                <i class="fas fa-bookmark"></i> {{ __('admin.common.add') }} {{ __('admin.menu.branch') }} {{ __('admin.common.info') }}
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


<form class="form-edit-add" branch="form" id="upazila_entry_form"
              action="{{!$edit ? route('admin.branch.store') : route('admin.branch.update', $branch->id)}}"
              method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
            @if($edit)
                <input type="hidden" name="id" value="{{$branch->id}}">
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

                  @if ($edit)
                    <div class="form-group">
                      <label for="office_type_id">{{ __('admin.branch.office_type') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="office_type_id" id="office_type_id" required>
                        @foreach ($office_types as $key => $item)
                          <option value="{{ $item->id }}" {{($branch->office_type_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>
                        @endforeach
                      </select>
                    </div>
                  @else
                    <div class="form-group">
                      <label for="office_type_id">{{ __('admin.branch.office_type') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="office_type_id" id="office_type_id" required>
                        @foreach ($office_types as $key => $item)
                          <option value="{{ $item->id }}" {{(old('office_type_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>
                        @endforeach
                      </select>
                    </div>
                  @endif

                  {{-- @if ($edit)
                    <div class="form-group">
                      <label for="association_id">{{ __('admin.branch.association') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="association_id" id="association_id" required>
                        <option value="">{{ __('admin.common.select') }}</option>
                        @foreach ($associations as $key => $item)
                          <option value="{{ $item->id }}" {{($branch->association_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>
                        @endforeach
                      </select>
                    </div>
                  @else
                    <div class="form-group">
                      <label for="association_id">{{ __('admin.branch.association') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="association_id" id="association_id" required>
                        <option value="">{{ __('admin.common.select') }}</option>
                        @foreach ($associations as $key => $item)
                          <option value="{{ $item->id }}" {{(old('association_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->code }} </option>
                        @endforeach
                      </select>
                    </div>
                  @endif --}}


                  @if ($edit)
                    <div class="form-group">
                      <label for="area_id">{{ __('admin.branch.area') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="area_id" id="area_id" required>
                        <option value="">{{ __('admin.common.select') }}</option>
                        @foreach ($areas as $key => $item)
                          <option value="{{ $item->id }}" {{($branch->area_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                        @endforeach
                      </select>
                    </div>
                  @else
                    <div class="form-group">
                      <label for="area_id">{{ __('admin.branch.area') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="area_id" id="area_id" required>
                        <option value="">{{ __('admin.common.select') }}</option>

                        @foreach ($areas as $key => $item)
                          <option value="{{ $item->id }}" {{(old('area_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                        @endforeach
                      </select>
                    </div>
                  @endif

                  <div class="form-group">
                    <label for="code">{{ __('admin.branch.code') }}</label> ({{__('admin.common.en_lang_use')}})
                    <input type="number" name="code"
                     id="code" placeholder="{{ __('admin.branch.code') }}"
                     value="{{ $edit?$branch->code:old('code') }}"
                     class="form-control" >
                  </div>


                  <div class="form-group">
                    <label for="latitude">{{ __('admin.branch.latitude') }}</label>
                    <input type="text" name="latitude"
                     id="latitude" placeholder="{{ __('admin.branch.latitude') }}"
                     value="{{ $edit?$branch->latitude:old('latitude') }}" {{$edit?'':''}}
                     class="form-control" >
                  </div>

                  <div class="form-group">
                    <label for="longitude">{{ __('admin.branch.longitude') }}</label>
                    <input type="text" name="longitude"
                     id="longitude" placeholder="{{ __('admin.branch.longitude') }}"
                     value="{{ $edit?$branch->longitude:old('longitude') }}" {{$edit?'':''}}
                     class="form-control" >
                  </div>


                  <div class="form-group">
                    <label for="email">{{ __('admin.branch.email') }}</label>
                    <input type="email" name="email"
                     id="email" placeholder="{{ __('admin.branch.email') }}"
                     value="{{ $edit?$branch->email:old('email') }}"
                     class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="contact">{{ __('admin.branch.contact') }}</label>
                    <textarea rows="1" id="contact" class="form-control" placeholder="{{ __('admin.branch.contact') }}"
                    name="contact">{{ $edit?$branch->contact:old('contact') }}</textarea>
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
                    <label for="title_en">{{ __('admin.branch.title_en') }}</label>
                    <input type="text" name="title_en"
                     id="title_en" placeholder="{{ __('admin.branch.title_en') }}"
                     value="{{ $edit?$branch->title_en:old('title_en') }}"
                     class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label for="title_bn">{{ __('admin.branch.title_bn') }}</label>
                    <input type="text" name="title_bn"
                     id="title_bn" placeholder="{{ __('admin.branch.title_bn') }}"
                     value="{{ $edit?$branch->title_bn:old('title_bn') }}"
                     class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="address_en">{{ __('admin.branch.address_en') }}</label>
                    <textarea rows="1" id="address_en" class="form-control" placeholder="{{ __('admin.branch.address_en') }}"
                    name="address_en">{{ $edit?$branch->address_en:old('address_en') }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="address_bn">{{ __('admin.branch.address_bn') }}</label>
                    <textarea rows="1" id="address_bn" class="form-control" placeholder="{{ __('admin.branch.address_bn') }}"
                    name="address_bn">{{ $edit?$branch->address_bn:old('address_bn') }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="long_url">{{ __('admin.branch.long_url') }}</label>
                    <textarea rows="1" id="long_url" class="form-control" placeholder="{{ __('admin.branch.long_url') }}"
                    name="long_url">{{ $edit?$branch->long_url:old('long_url') }}</textarea>
                  </div>


                  <div class="form-group">
                    <label for="short_url">{{ __('admin.branch.short_url') }}</label>
                    <textarea rows="1" id="short_url" class="form-control" placeholder="{{ __('admin.branch.short_url') }}"
                    name="short_url">{{ $edit?$branch->short_url:old('short_url') }}</textarea>
                  </div>







                  @if ($edit)
                  <div class="form-group">
                    <label for="status">{{ __('admin.branch.status') }}  </label><br>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary1" value="1" name="status"
                      {{ ($branch->status == '1') ? 'checked' : '' }}>
                      <label for="radioPrimary1">
                        {{(app()->getLocale() == 'en') ? App\Models\Status::EN[1] : App\Models\Status::BN[1]}}
                      </label>
                    </div>
                    <div class="icheck-danger d-inline">
                      <input type="radio" id="radioPrimary2" value="0" name="status"
                      {{ ($branch->status == '0') ? 'checked' : '' }}>
                      <label for="radioPrimary2">
                        {{(app()->getLocale() == 'en') ? App\Models\Status::EN[0] : App\Models\Status::BN[0]}}
                      </label>
                    </div>
                  </div>
                  @else
                  <div class="form-group">
                    <label for="status">{{ __('admin.branch.status') }}  </label><br>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary1" value="1" name="status"
                      {{ (old('status') == '1') ? 'checked' : '' }}>
                      <label for="radioPrimary1">
                        {{(app()->getLocale() == 'en') ? App\Models\Status::EN[1] : App\Models\Status::BN[1]}}
                      </label>
                    </div>
                    <div class="icheck-danger d-inline">
                      <input type="radio" id="radioPrimary2" value="0" name="status"
                      {{ (old('status') == '0') ? 'checked' : '' }}>
                      <label for="radioPrimary2">
                        {{(app()->getLocale() == 'en') ? App\Models\Status::EN[0] : App\Models\Status::BN[0]}}
                      </label>
                    </div>
                  </div>
                  @endif

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
  <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>

  <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

  <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


  <script>
    $(document).ready(function () {
      $('.select2').select2();
      $(".date_picker").datepicker({
          autoclose: true,
          todayHighlight: true,
          format: 'yyyy-mm-dd',
          //startDate: '-3d'
      }).datepicker(
          @if (!@$parameters['from_date'])
              'update',
              new Date()
          @endif );

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


      $('#association_id').on('change', function(e){
        var association_id = e.target.value;
        var route = "{{route('get.area')}}/"+association_id;
        //console.log(association_id);
        $.get(route, function(data) {
          //console.log(data);
          $('#area_id').empty();
          $('#area_id').append('<option value="">{{ __('admin.common.select') }}</option>');
          $.each(data, function(index,data){
            $('#area_id').append('<option value="' + data.id + '">' + data.title_{{app()->getLocale()}} + ' - ' + data.code +  '</option>');
          });
        });
      });



    });
  </script>
@endsection


