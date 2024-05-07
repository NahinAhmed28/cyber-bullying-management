@php
  $edit = false;
  if(!empty($branch_unit)){
     if($branch_unit->id !=''){
         $edit=true;
     }
  }
@endphp


@extends('admin.layouts.master')
@section('title')
  {{__('admin.menu.site')}} :: {{__('admin.menu.branch_unit')}}
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
  @include('../admin.layouts.partials.breadcrumb', ['path1' => __('admin.menu.branch_unit'), 'route1' => route('admin.branch_unit') ])
@endsection

@section('content')

  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-2">
            <a href="{{ route('admin.branch_unit') }}" class="btn btn-outline-light form-control btn-add-new">
                <i class="fas fa-backward"></i> <span>{{ __('admin.common.back') }}</span>
            </a>
          </div>

          <div class="col-sm-10">
            <h1 class="text-light">
              @if ($edit)
                <i class="fas fa-bookmark"></i> {{ __('admin.common.update') }} {{ __('admin.menu.branch_unit') }} {{ __('admin.common.info') }}
              @else
                <i class="fas fa-bookmark"></i> {{ __('admin.common.add') }} {{ __('admin.menu.branch_unit') }} {{ __('admin.common.info') }}
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


<form class="form-edit-add" branch_unit="form" id="size_entry_form"
              action="{{!$edit ? route('admin.branch_unit.store') : route('admin.branch_unit.update', $branch_unit->id)}}"
              method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
            @if($edit)
                <input type="hidden" name="id" value="{{$branch_unit->id}}">
                {{ method_field("PUT") }}
            @endif
            {{ csrf_field() }}

    <section class="content" style="margin-top: -10px;">
      <div class="container-fluid">
          <div class="row">
            <!-- col start -->
            <div class="col-md-6">
              <!-- card start -->
              <div class="card">

                <div class="card-header">
                  <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
                </div>

                <div class="card-body">

                  {{-- <div class="form-group">
                    <label for="name">{{ __('admin.branch_unit.name') }}</label>
                    <input type="text" name="name"
                     id="name" placeholder="{{ __('admin.branch_unit.name') }}"
                     value="{{ $edit?$branch_unit->name:old('name') }}"
                     class="form-control" >
                  </div> --}}

                  @if ($edit)
                    <div class="form-group">
                      <label for="association_id">{{ __('admin.branch_unit.association') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="association_id" id="association_id" required>
                        <option value="">{{ __('admin.common.select') }}</option>
                        @foreach ($associations as $key => $item)
                          <option value="{{ $item->id }}" {{($branch_unit->association_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>
                        @endforeach
                      </select>
                    </div>
                  @else
                    <div class="form-group">
                      <label for="association_id">{{ __('admin.branch_unit.association') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="association_id" id="association_id" required>
                        <option value="">{{ __('admin.common.select') }}</option>
                        @foreach ($associations as $key => $item)
                          <option value="{{ $item->id }}" {{(old('association_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>
                        @endforeach
                      </select>
                    </div>
                  @endif

                  @if ($edit)
                    <div class="form-group">
                      <label for="area_id">{{ __('admin.branch_unit.area') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="area_id" id="area_id" required>
                        <option value="">{{ __('admin.common.select') }}</option>
                        @foreach ($areas as $key => $item)
                          <option value="{{ $item->id }}" {{($branch_unit->area_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                        @endforeach
                      </select>
                    </div>
                  @else
                    <div class="form-group">
                      <label for="area_id">{{ __('admin.branch_unit.area') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="area_id" id="area_id" required>
                        <option value="">{{ __('admin.common.select') }}</option>

                        @foreach ($areas as $key => $item)
                          <option value="{{ $item->id }}" {{(old('area_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                        @endforeach
                      </select>
                    </div>
                  @endif

                  @if ($edit)
                    <div class="form-group">
                      <label for="branch_id">{{ __('admin.branch_unit.branch') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="branch_id" id="branch_id" required>
                        <option value="">{{ __('admin.common.select') }}</option>
                        @foreach ($branches as $key => $item)
                          <option value="{{ $item->id }}" {{($branch_unit->branch_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                        @endforeach
                      </select>
                    </div>
                  @else
                    <div class="form-group">
                      <label for="branch_id">{{ __('admin.branch_unit.branch') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="branch_id" id="branch_id" required>
                        <option value="">{{ __('admin.common.select') }}</option>

                        @foreach ($branches as $key => $item)
                          <option value="{{ $item->id }}" {{(old('branch_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                        @endforeach
                      </select>
                    </div>
                  @endif


                  <div class="form-group">
                    <label for="title_en">{{ __('admin.branch_unit.title_en') }}</label>
                    <input type="text" name="title_en"
                     id="title_en" placeholder="{{ __('admin.branch_unit.title_en') }}"
                     value="{{ $edit?$branch_unit->title_en:old('title_en') }}"
                     class="form-control" >
                  </div>

                  <div class="form-group">
                    <label for="title_bn">{{ __('admin.branch_unit.title_bn') }}</label>
                    <input type="text" name="title_bn"
                     id="title_bn" placeholder="{{ __('admin.branch_unit.title_bn') }}"
                     value="{{ $edit?$branch_unit->title_bn:old('title_bn') }}"
                     class="form-control">
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
                  <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
                </div>

                <div class="card-body">

                  {{-- <div class="form-group">
                    <label for="mobile">{{ __('admin.branch_unit.mobile') }}</label>
                    <input type="number" name="mobile"
                     id="mobile" placeholder="{{ __('admin.branch_unit.mobile') }}"
                     value="{{ $edit?$branch_unit->mobile:old('mobile') }}"
                     class="form-control" >
                  </div>  --}}

                  <div class="form-group">
                    <label for="contact">{{ __('admin.branch_unit.contact') }}</label>
                    <input type="number" name="contact"
                     id="contact" placeholder="{{ __('admin.branch_unit.contact') }}"
                     value="{{ $edit?$branch_unit->contact:old('contact') }}"
                     class="form-control" >
                  </div>


                  <div class="form-group">
                    <label for="address_en">{{ __('admin.branch_unit.address_en') }}</label>
                    <textarea rows="1" id="address_en" class="form-control" placeholder="{{ __('admin.branch_unit.address_en') }}"
                    name="address_en" required>{{ $edit?$branch_unit->address_en:old('address_en') }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="address_bn">{{ __('admin.branch_unit.address_bn') }}</label>
                    <textarea rows="1" id="address_bn" class="form-control" placeholder="{{ __('admin.branch_unit.address_bn') }}"
                    name="address_bn" required>{{ $edit?$branch_unit->address_bn:old('address_bn') }}</textarea>
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
    $(document).ready(function() {
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



      $('#area_id').on('change', function(e){
        var area_id = e.target.value;
        var route = "{{route('get.branch_by_area')}}/"+area_id;
        //console.log(area_id);
        $.get(route, function(data) {
          //console.log(data);
          $('#branch_id').empty();
          $('#branch_id').append('<option value="">{{ __('admin.common.select') }}</option>');
          $.each(data, function(index,data){
            $('#branch_id').append('<option value="' + data.id + '">' + data.title_{{app()->getLocale()}} + ' - ' + data.code +  '</option>');
          });
        });
      });



    });

  </script>
@endsection


