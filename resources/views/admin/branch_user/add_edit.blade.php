@php
  use App\Models\Admin;
  $edit = false;
  if(!empty($branch_user)){
     if($branch_user->id !=''){
         $edit=true;
     }
  }

  $authUser = Auth::guard('admin')->user()->load(['userType']);

  //dd($authUser->userType->default_role, Admin::ESCOperator);
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
  @include('../admin.layouts.partials.breadcrumb', ['path1' => __('admin.menu.branch_user'), 'route1' => route('admin.branch_user') ])
@endsection

@section('content')

  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-2">
            <a href="{{ route('admin.branch_user') }}" class="btn btn-outline-light form-control btn-add-new">
                <i class="fas fa-backward"></i> <span>{{ __('admin.common.back') }}</span>
            </a>
          </div>

          <div class="col-sm-10">
            <h1 class="text-light">
              @if ($edit)
                <i class="fas fa-bookmark"></i> {{ __('admin.common.update') }} {{ __('admin.menu.branch_user') }} {{ __('admin.common.info') }}
              @else
                <i class="fas fa-bookmark"></i> {{ __('admin.common.add') }} {{ __('admin.menu.branch_user') }} {{ __('admin.common.info') }}
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


<form class="form-edit-add" role="form" id="admin_entry_form"
              action="{{!$edit ? route('admin.branch_user.store') : route('admin.branch_user.update', $branch_user->id)}}"
              method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
            @if($edit)
                <input type="hidden" name="id" value="{{$branch_user->id}}">
                {{ method_field("PUT") }}
            @endif
            {{ csrf_field() }}

    <section class="content" style="margin-top: -10px;">
      <div class="container-fluid">
          <div class="row">
            <!-- col start -->
            <div class="col-4">
              <!-- card start -->
              <div class="card">

                <div class="card-header">
                  <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
                </div>




                <div class="card-body">

                  @if ($edit)
                    <div class="form-group">
                      <label for="user_type_id">{{ __('admin.branch_user.user_type') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="user_type_id" id="user_type_id" required>
                        <option value="">{{ __('admin.common.select') }}</option>
                        @foreach ($user_types as $key => $item)
                          <option value="{{ $item->id }}" {{($branch_user->user_type_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>
                        @endforeach
                      </select>
                    </div>
                  @else
                    <div class="form-group">
                      <label for="user_type_id">{{ __('admin.branch_user.user_type') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="user_type_id" id="user_type_id" required>
                        <option value="">{{ __('admin.common.select') }}</option>
                        @foreach ($user_types as $key => $item)
                          <option value="{{ $item->id }}" {{(old('user_type_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>
                        @endforeach
                      </select>
                    </div>
                  @endif


                  @if ($edit)
                    <div class="form-group">
                      <label for="role_id">{{ __('admin.branch_user.role') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="role_id" id="role_id" required>
                        <option value="">{{ __('admin.common.select') }}</option>
                        @foreach ($roles as $key => $item)
                          <option value="{{ $item->id }}" {{($branch_user->role_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>
                        @endforeach
                      </select>
                    </div>
                  @else
                    <div class="form-group">
                      <label for="role_id">{{ __('admin.branch_user.role') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="role_id" id="role_id" required>
                        <option value="">{{ __('admin.common.select') }}</option>
                        @foreach ($roles as $key => $item)
                          <option value="{{ $item->id }}" {{(old('role_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>
                        @endforeach
                      </select>
                    </div>
                  @endif

                  @if ($edit)
                    <div class="form-group">
                      <label for="area_id">{{ __('admin.admin.area') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="area_id" id="area_id">
                        <option value="">{{ __('admin.common.select') }}</option>
                        @foreach ($areas as $key => $item)
                          <option value="{{ $item->id }}" {{($branch_user->area_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                        @endforeach
                      </select>
                    </div>
                  @else
                    <div class="form-group">
                      <label for="area_id">{{ __('admin.admin.area') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="area_id" id="area_id">
                        <option value="">{{ __('admin.common.select') }}</option>

                        @foreach ($areas as $key => $item)
                          <option value="{{ $item->id }}" {{(old('area_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                        @endforeach
                      </select>
                    </div>
                  @endif


                  @if ($edit)
                    <div class="form-group">
                      <label for="branch_id">{{ __('admin.admin.branch') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="branch_id" id="branch_id">
                        <option value="">{{ __('admin.common.select') }}</option>
                        @foreach ($branches as $key => $item)
                          <option value="{{ $item->id }}" {{($branch_user->branch_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                        @endforeach
                      </select>
                    </div>
                  @else
                    <div class="form-group">
                      <label for="branch_id">{{ __('admin.admin.branch') }} <!--<span style="color: red"> * </span>--></label>
                      <select class="form-control select2" name="branch_id" id="branch_id">
                        <option value="">{{ __('admin.common.select') }}</option>

                        {{-- @foreach ($branches as $key => $item)
                          <option value="{{ $item->id }}" {{(old('branch_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                        @endforeach --}}
                      </select>
                    </div>
                  @endif


                  {{-- @if ($edit)
                  <div class="form-group">

                    @if ($branch_user->area)

                    @foreach (json_decode($branch_user->area) as $item)
                      <label class="checkbox-inline">
                        @if ($item == 1)
                          <input checked name="area[]" type="checkbox" value="{{$item}}">KCS-P
                        @elseif($item == 2)
                          <input checked name="area[]" type="checkbox" value="{{$item}}">KCS-CON
                        @elseif($item == 3)
                          <input checked name="area[]" type="checkbox" value="{{$item}}">KCS-CON(Cash)
                        @elseif($item == 4)
                          <input checked name="area[]" type="checkbox" value="{{$item}}">KCS-Commission
                        @else
                          <input checked name="area[]" type="checkbox" value="{{$item}}">KCS-D
                        @endif
                      </label>
                    @endforeach
                    @php
                        $array1 = ["1","2","3","4","5"];
                        $array2 = json_decode($branch_user->area);
                        $results = array_diff($array1, $array2);
                    @endphp

                    @foreach ($results as $item)
                    <label class="checkbox-inline">
                      @if ($item == 1)
                        <input name="area[]" type="checkbox" value="{{$item}}">KCS-P
                      @elseif($item == 2)
                        <input name="area[]" type="checkbox" value="{{$item}}">KCS-CON
                      @elseif($item == 3)
                        <input name="area[]" type="checkbox" value="{{$item}}">KCS-CON(Cash)
                      @elseif($item == 4)
                        <input name="area[]" type="checkbox" value="{{$item}}">KCS-Commission
                      @else
                        <input name="area[]" type="checkbox" value="{{$item}}">KCS-D
                      @endif
                    </label>
                    @endforeach
                    @else
                    @php
                      $results = ["1","2","3","4","5"];
                    @endphp
                    @foreach ($results as $item)
                    <label class="checkbox-inline">
                      @if ($item == 1)
                        <input name="area[]" type="checkbox" value="{{$item}}">KCS-P
                      @elseif($item == 2)
                        <input name="area[]" type="checkbox" value="{{$item}}">KCS-CON
                      @elseif($item == 3)
                        <input name="area[]" type="checkbox" value="{{$item}}">KCS-CON(Cash)
                      @elseif($item == 4)
                        <input name="area[]" type="checkbox" value="{{$item}}">KCS-Commission
                      @else
                        <input name="area[]" type="checkbox" value="{{$item}}">KCS-D
                      @endif
                    </label>
                    @endforeach
                    @endif
                  </div>
                  @else
                  <div class="form-group">
                    @foreach ($service_types as $key=>$item)
                      <label class="checkbox-inline">
                        <input name="area[]" type="checkbox" value="{{$item->id}}">{{$item->{'title_'. app()->getLocale()} }}
                      </label>
                    @endforeach
                  </div>
                  @endif --}}



                </div>
              </div>
              <!-- card start -->
            </div>
            <!-- col end -->


            <!-- col start -->
            <div class="col-4">
              <!-- card start -->
              <div class="card">

                <div class="card-header">
                  <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
                </div>

                <div class="card-body">


                  <div class="form-group">
                    <label for="title_en">{{ __('admin.branch_user.title_en') }}</label>
                    <input type="text" name="title_en"
                     id="title_en" placeholder="{{ __('admin.branch_user.title_en') }}"
                     value="{{ $edit?$branch_user->title_en:old('title_en') }}"
                     class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label for="title_bn">{{ __('admin.branch_user.title_bn') }}</label>
                    <input type="text" name="title_bn"
                     id="title_bn" placeholder="{{ __('admin.branch_user.title_bn') }}"
                     value="{{ $edit?$branch_user->title_bn:old('title_bn') }}"
                     class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="username">{{ __('admin.branch_user.username') }}</label>
                    <input type="text" name="username"
                     id="username" placeholder="{{ __('admin.branch_user.username') }}"
                     value="{{ $edit?$branch_user->username:old('username') }}" {{$edit?'required':'required'}}
                     class="form-control" >
                  </div>

                  {{-- @if (true)
                  <div class="form-group">
                    <label for="office_en">{{ __('admin.branch_user.office_en') }}</label>
                    <textarea rows="1" id="office_en" class="form-control" placeholder="{{ __('admin.branch_user.office_en') }}"
                    name="office_en">{{ $edit?$branch_user->office_en:old('office_en') }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="office_bn">{{ __('admin.branch_user.office_bn') }}</label>
                    <textarea rows="1" id="office_bn" class="form-control" placeholder="{{ __('admin.branch_user.office_bn') }}"
                    name="office_bn">{{ $edit?$branch_user->office_bn:old('office_bn') }}</textarea>
                  </div>
                  @endif



                  <div class="form-group">
                    <label for="address_en">{{ __('admin.branch_user.address_en') }}</label>
                    <textarea rows="1" id="address_en" class="form-control" placeholder="{{ __('admin.branch_user.address_en') }}"
                    name="address_en" required>{{ $edit?$branch_user->address_en:old('address_en') }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="address_bn">{{ __('admin.branch_user.address_bn') }}</label>
                    <textarea rows="1" id="address_bn" class="form-control" placeholder="{{ __('admin.branch_user.address_bn') }}"
                    name="address_bn" required>{{ $edit?$branch_user->address_bn:old('address_bn') }}</textarea>
                  </div> --}}


                  <div class="form-group">
                    <label for="email">{{ __('admin.branch_user.email') }}</label>
                    <input type="email" name="email"
                     id="email" placeholder="{{ __('admin.branch_user.email') }}"
                     value="{{ $edit?$branch_user->email:old('email') }}" {{$edit?'required':'required'}}
                     class="form-control" >
                  </div>

                  @if ($edit)
                  <div class="form-group">
                    <label for="status">{{ __('admin.branch_user.status') }}  </label><br>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary1" value="1" name="status"
                      {{ ($branch_user->status == '1') ? 'checked' : '' }}>
                      <label for="radioPrimary1">
                        {{(app()->getLocale() == 'en') ? App\Models\Status::EN[1] : App\Models\Status::BN[1]}}
                      </label>
                    </div>
                    <div class="icheck-danger d-inline">
                      <input type="radio" id="radioPrimary2" value="0" name="status"
                      {{ ($branch_user->status == '0') ? 'checked' : '' }}>
                      <label for="radioPrimary2">
                        {{(app()->getLocale() == 'en') ? App\Models\Status::EN[0] : App\Models\Status::BN[0]}}
                      </label>
                    </div>
                  </div>
                  @else
                  <div class="form-group">
                    <label for="status">{{ __('admin.branch_user.status') }}  </label><br>
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



                </div>
              </div>
              <!-- card start -->
            </div>
            <!-- col end -->


            <!-- col start -->
            <div class="col-4">
              <!-- card start -->
              <div class="card">

                <div class="card-header">
                  <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
                </div>

                <div class="card-body">



                  <div class="form-group">
                    <label for="contact">{{ __('admin.branch_user.contact') }}</label> <span class="text-info">({{__('admin.common.en_lang_use')}}) </span>
                    <input type="text" name="contact"
                     id="contact" placeholder="{{ __('admin.branch_user.contact') }}"
                     value="{{ $edit?$branch_user->contact:old('contact') }}"
                     class="form-control" >
                  </div>

                  <div class="form-group">
                    <label for="password">{{ __('admin.branch_user.password') }}</label>
                    <input type="password" name="password"
                     id="password" placeholder="{{ __('admin.branch_user.password') }}"
                     value="{{ $edit?'':old('password') }}" {{$edit?'disabled':'required'}}
                     class="form-control" >
                  </div>

                  <div class="form-group">
                    <label for="password_confirmation">{{ __('admin.branch_user.password_confirmation') }}</label>
                    <input type="password" name="password_confirmation"
                     id="password_confirmation" placeholder="{{ __('admin.branch_user.password_confirmation') }}"
                     value="{{ $edit?'':old('password_confirmation') }}" {{$edit?'disabled':''}}
                     class="form-control" >
                  </div>


                  <div class="form-group">
                    <label for="thumb">
                        {{ __('admin.branch_user.thumb') }} <span
                                class="text-warning">({{__('admin.common.max_size')}})</span>
                    </label>
                    <input style="padding: 3px;" type="file" name="thumb" id="thumb"
                           class="form-control" {{$edit?'':''}}>
                    @if($edit && $branch_user->thumb)
                        <a target="_blank"
                           href="{{asset('storage/'.$branch_user->thumb)}}">Show</a>
                    @endif
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

      // $('#state_id').on('change', function(e){
      //   var state_id = e.target.value;
      //   var route = "{{route('get.division')}}/"+state_id;
      //   //console.log(state_id);
      //   $.get(route, function(data) {
      //     //console.log(data);
      //     $('#division_id').empty();
      //     $('#division_id').append('<option value="">{{ __('admin.common.select') }}</option>');
      //     $.each(data, function(index,data){
      //       $('#division_id').append('<option value="' + data.id + '">' + data.title_{{app()->getLocale()}} + ' - ' + data.bbs_code +  '</option>');
      //     });
      //   });
      // });

      // $('#division_id').on('change', function(e){
      //   var division_id = e.target.value;
      //   var route = "{{route('get.district')}}/"+division_id;
      //   //console.log(division_id);
      //   $.get(route, function(data) {
      //     //console.log(data);
      //     $('#district_id').empty();
      //     $('#district_id').append('<option value="">{{ __('admin.common.select') }}</option>');
      //     $.each(data, function(index,data){
      //       $('#district_id').append('<option value="' + data.id + '">' + data.title_{{app()->getLocale()}} + ' - ' + data.bbs_code +  '</option>');
      //     });
      //   });
      // });


      // $('#district_id').on('change', function(e){
      //   var district_id = e.target.value;
      //   var route = "{{route('get.branch')}}/"+district_id;
      //   console.log(district_id);
      //   $.get(route, function(data) {
      //     //console.log(data);
      //     $('#branch_id').empty();
      //     $('#branch_id').append('<option value="">{{ __('admin.common.select') }}</option>');
      //     $.each(data, function(index,data){
      //       $('#branch_id').append('<option value="' + data.id + '">' + data.title_{{app()->getLocale()}} + ' - ' + data.code +  '</option>');
      //     });
      //   });
      // });

      $('#area_id').on('change', function(e){
        $('#branch_id').empty();
        $('#branch_id').append('<option value="">{{ __('admin.common.select') }}</option>');
        var area_id = e.target.value;
        var route = "{{route('get.branch_by_area')}}/"+area_id;
        //console.log(area_id);
        $.get(route, function(data) {
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


