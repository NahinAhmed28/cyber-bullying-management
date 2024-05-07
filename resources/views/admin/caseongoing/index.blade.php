@php
    //use App\Helper\EnglishToBanglaDate;
    //use App\Helper\NumberToBanglaWord;
    //use Rakibhstu\Banglanumber\NumberToBangla;
    //$numto = new NumberToBangla();

    use App\Models\Status;
    use App\Models\Admin;
    $authUser = Auth::guard('admin')->user()->load(['userType']);
@endphp

@extends('admin.layouts.master')
@section('title')
  {{__('admin.menu.site')}} :: {{__('admin.menu.dashboard')}}
@endsection




@section('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet">

@endsection

@section('breadcrumb')
  @include('../admin.layouts.partials.breadcrumb', ['path1' => __('admin.menu.caseongoing'), 'route1' => route('admin.caseongoing') ])
@endsection


@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          {{-- <div class="col-sm-2">

            <a href="{{ route('admin.caseongoing.create') }}" class="btn btn-outline-light form-control btn-add-new">
                <i class="fas fa-plus"></i> <span>{{ __('admin.common.add') }}</span>
            </a>
          </div> --}}

          <div class="col-sm-12">
            <h1 class="text-light">
              <i class="fas fa-bookmark"></i> {{ __('admin.menu.caseongoing') }}
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


    <!-- Main content -->
    <section class="content" style="margin-top: -10px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ __('admin.common.list') }}


                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                  <div class="text-bold row text-center border py-2">
                      {{-- <div class="col-md-3">
                          <a href="{{route('admin.caseongoing')}}" style="color: {{$retVal = (Route::current()->getName() == 'admin.caseongoing') ? 'blue' : 'black' }} ">
                            {{ __('admin.menu.cases') }} -
                            ( {{(app()->getLocale() == 'en') ? $totalApplication : dateFormatEnglishToBanglaHlp($totalApplication) }} )
                          </a>
                      </div> --}}
                      {{-- @foreach($caseTypesWithCount as $caseType)
                          <div class="col-md-3">
                              <a href="{{ route('admin.caseongoing', ['cid' => $caseType->id]) }}"
                                 style="color: {{ (Route::currentRouteName() == 'admin.caseongoing' && Route::current()->parameter('cid') == $caseType->id) ? 'blue' : 'black' }};
                                    border-bottom: {{ (Route::currentRouteName() == 'admin.caseongoing' && Route::current()->parameter('cid') == $caseType->id) ? '2px solid #6E4798' : 'none' }}">
                                  {{ $caseType->{'title_' . app()->getLocale()} }} -
                                  ({{ (app()->getLocale() == 'en') ? $caseType->ongoingapplications_count : dateFormatEnglishToBanglaHlp($caseType->ongoingapplications_count) }})
                              </a>
                          </div>
                      @endforeach --}}
                      @php
                        $total_count = 0;
                      @endphp
                      @foreach ($applications as $tkey => $application)
                        @php
                          if ($authUser->userType->default_role <= Admin::DEFAULT_ROLE_LIST[4]){
                            $total_count += 1;
                          }
                          elseif (in_array($authUser->id, json_decode(@$application->users)))
                            $total_count += 1;
                          else{
                          }
                        @endphp
                      @endforeach

                      <div class="col-md-3">
                        <a href="{{route('admin.caseongoing')}}" style="color: {{$retVal = (Route::current()->getName() == 'admin.caseongoing') ? 'blue' : 'black' }} ">
                          {{ __('admin.menu.cases') }} -
                          ( {{(app()->getLocale() == 'en') ? $total_count : dateFormatEnglishToBanglaHlp($total_count) }} )
                        </a>
                      </div>
                      

                      @foreach($caseTypesWithCount as $caseType)

                          @php
                              $count = 0;
                              foreach ($caseType->ongoingapplications as $key => $value) {
                                if ($authUser->userType->default_role <= Admin::DEFAULT_ROLE_LIST[4]){
                                  $count += 1;
                                }
                                elseif (in_array($authUser->id, json_decode(@$value->users)))
                                  $count += 1;
                                else{
                                }
                              }
                          @endphp

                          <div class="col-md-3">
                              <a href="{{ route('admin.caseongoing', ['cid' => $caseType->id]) }}"
                                 style="color: {{ (Route::currentRouteName() == 'admin.caseongoing' && Route::current()->parameter('cid') == $caseType->id) ? 'blue' : 'black' }};
                                    border-bottom: {{ (Route::currentRouteName() == 'admin.caseongoing' && Route::current()->parameter('cid') == $caseType->id) ? '2px solid #6E4798' : 'none' }}">
                                  {{ $caseType->{'title_' . app()->getLocale()} }} -
                                  ({{ (app()->getLocale() == 'en') ? $count : dateFormatEnglishToBanglaHlp($count) }})
                              </a>
                          </div>
                      @endforeach
                  </div>


                  <div style="overflow-x:auto;" style="border-radius: 25px !important;">
                      <table id="example1" class="table table-hover">
                          <thead>
                          <tr style="background-color: #6E4798;" class="text-light">
                              <th>#{{ __('admin.caseongoing.code') }}</th>
                              <th>{{ __('admin.caseongoing.name') }}</th>
                              <th>{{ __('admin.caseongoing.address') }}</th>
                              <th>{{ __('admin.caseongoing.created_at') }}</th>
                              <th class="text-center">{{ __('admin.caseongoing.case_status') }}</th>
                              <th colspan="2">{{ __('admin.caseongoing.download_pdf') }}</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($applications as $key => $application)

                          @if ($authUser->userType->default_role <= Admin::DEFAULT_ROLE_LIST[4])
                              <tr style="cursor: pointer" onclick="redirectToEdit(event, '{{ route('admin.caseongoing.show', ['id' => @$application->id]) }}')">
                                          <td style="width: 5%;" class="text-center">{{ (app()->getLocale() == 'en') ? $application->code : engToBnHlp($application->code) }}</td>
                                          <td style="width: 20%;">
                                                  {{ $application->{'name_' . app()->getLocale()} }}
                                                  <span class="mx-1 p-1 rounded-circle border border-danger font-weight-bold"
                                                        style="background-color: rgba(246,118,53,0.74);color: orangered">
                                                    {{(app()->getLocale() == 'en') ? ageCal($application->dob) : dateFormatEnglishToBanglaHlp(ageCal($application->dob))}}
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-user" style="color: {{$application->gender ==1 ? 'blue':'red'}}"></i>
                                                  </span>
                                          </td>
                                          <td style="width: 20%;">{{ $application->{'address_' . app()->getLocale()} }}</td>
                                          <td style="width: 20%;">{{ (app()->getLocale() == 'en') ? date('d-m-Y', strtotime($application->created_at)) : dateFormatEnglishToBanglaHlp(date('d-m-Y', strtotime($application->created_at))) }}</td>
                                          <td style="width: 20%;" class="text-center">
                                                      <span class="
                                                   {{ isset($application->caseStatus) ?
                                                ($application->caseStatus->id === 1 ? 'btn btn-outline-secondary' :
                                                ($application->caseStatus->id === 2 ? 'btn btn-outline-warning' :
                                                ($application->caseStatus->id === 3 ? 'btn btn-outline-danger' :
                                                ($application->caseStatus->id === 4 ? 'btn btn-outline-primary' :
                                                ($application->caseStatus->id === 5 ? 'btn btn-outline-info' :
                                                ($application->caseStatus->id === 6 ? 'btn btn-outline-success' :
                                                 'btn btn-outline-secondary'))))))
                                                : '' }}">
                                                          {{ $application->caseStatus->{'title_' . app()->getLocale()} ?? '-' }}
                                                      </span>

                                          </td>
                                  <td style="width: 12%; white-space: nowrap; overflow: hidden;">
                                              <span class="px-2 py-1"
                                                     style="background-color: rgba(110,71,152,0.39);color: #543279;border-radius: 10px">
                                                  Download PDF
                                              </span>
                                  </td>
                                  <td style="width: 2%;" >
                                      <div class="dropdown" id="dropdownContainer" style="white-space: normal; word-wrap: break-word;">
                                          <button type="button" class="btn btn-outline-secondary dropdown-toggle border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              &#x2026;
                                          </button>
                                          <div class="dropdown-menu">
                                              @can('update', app('App\Models\Caseongoing'))
                                                  <a class="btn btn-xs btn-primary" href="{{ route('admin.caseongoing.edit', $application->id) }}">
                                                      <i class="fas fa-edit"></i> {{ __('admin.common.edit') }}
                                                  </a>
                                              @endcan

                                              @can('delete', app('App\Models\Caseongoing'))
                                                  <a class="btn btn-xs btn-danger" href="{{ route('admin.caseongoing.delete', $application->id) }}" data-href="{{ route('admin.caseongoing.delete', [$application->id, 1]) }}" class="delete">
                                                      <i class="fas fa-trash-alt"></i> {{ __('admin.common.delete') }}
                                                  </a>
                                              @endcan
                                              @can('edit_step_info', app('App\Models\Caseongoing'))
                                                  <a href="{{ route('admin.caseongoing.edit_step_info', $application->id) }}" class=" btn btn-xs btn-warning">
                                                      {{ __('admin.caseongoing.update_step_info_ans') }}
                                                  </a>
                                              @endcan
                                              @can('edit_addmember_info', app('App\Models\Caseongoing'))
                                                  <a href="{{ route('admin.caseongoing.edit_addmember_info', $application->id) }}" class="btn btn-xs btn-info">
                                                      {{ __('admin.caseongoing.update_addmember_info_ans') }}
                                                  </a>
                                              @endcan
                                          </div>
                                      </div>
                                  </td>

                                  </tr>
                              <tr style="cursor: pointer" onclick="redirectToEdit(event, '{{ route('admin.caseongoing.show', ['id' => @$application->id]) }}')">
                                      <td colspan="6" class="font-weight-bold">{{ $application->{'title_' . app()->getLocale()} }}</td>
                                  </tr>
                              <tr style="cursor: pointer" onclick="redirectToEdit(event, '{{ route('admin.caseongoing.show', ['id' => @$application->id]) }}')">
                                  <td colspan="4">{{ $application->{'title_details_' . app()->getLocale()} }}</td>
                                  <td colspan="1"> {{ __('admin.caseongoing.case_category') }} : <br>
                                      <span class="p-1 border border-secondary font-weight-bold" style="color: #05003A">
                                         <i class="fa fa-map-pin" style="color:#6E4798 "></i>
                                          {{ $application->caseCategory->{'title_' . app()->getLocale()} }}
                                      </span>
                                  </td>
                                  <td colspan="2"> <span class="font-weight-bolder">{{ __('admin.caseongoing.timer') }} : </span> <br>
                                      <span class="p-1 border border-secondary font-weight-bold" style="color: #05003A">
                                          <i class="fas fa-hourglass-half" style="color:#6E4798 "></i>

                                          {{ (app()->getLocale() == 'en') ?
                                         findTimer($application->created_at,app()->getLocale())  :
                                          dateFormatEnglishToBanglaHlp( findTimer($application->created_at,app()->getLocale())) }}
                                      </span>

                                  </td>
                              </tr>
                              <tr style="cursor: pointer" onclick="redirectToEdit(event, '{{ route('admin.caseongoing.show', ['id' => @$application->id]) }}')">
                                  <td colspan="7">
                                      <div class="m-2 p-2">
                                          <i class="ri-corner-down-right-line text-secondary" style="font-size: 24px "></i>
                                          <span class="text-secondary" >{{ (app()->getLocale() == 'en') ? "Working Group Member:" : "ওয়ার্কিং গ্রুপ মেম্বারঃ" }} </span>

                                          @php
                                              if ($application->users) {
                                                    $admins = \App\Models\Admin::with('officeDesignation','designation')->whereIn('id', json_decode($application->users))->get();
                                              } else {
                                                    $admins = \App\Models\Admin::with('officeDesignation','designation')->whereIn('id', [])->get();
                                              }
                                          @endphp

                                          @foreach ($admins as $item)
                                            <span style="border: 1px solid #6E4798" class="p-1 mx-1 text-bold">
                                              <i class="ri-map-pin-user-line px-1" style="color: #6E4798;"></i>
                                                    {{--{{$item->{'title_'. app()->getLocale()} }} ,--}}
                                                    {{$item->designation->{'title_'. app()->getLocale()} }}
                                              </span>
                                          @endforeach

                                      </div>
                                  </td>
                              </tr>
                          @elseif (in_array($authUser->id, json_decode(@$application->users)))
                              <tr style="cursor: pointer" onclick="redirectToEdit(event, '{{ route('admin.caseongoing.show', ['id' => @$application->id]) }}')">
                                          <td style="width: 5%;" class="text-center">{{ (app()->getLocale() == 'en') ? $application->code : engToBnHlp($application->code) }}</td>
                                          <td style="width: 20%;">
                                                  {{ $application->{'name_' . app()->getLocale()} }}
                                                  <span class="mx-1 p-1 rounded-circle border border-danger font-weight-bold"
                                                        style="background-color: rgba(246,118,53,0.74);color: orangered">
                                                    {{(app()->getLocale() == 'en') ? ageCal($application->dob) : dateFormatEnglishToBanglaHlp(ageCal($application->dob))}}
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-user" style="color: {{$application->gender ==1 ? 'blue':'red'}}"></i>
                                                  </span>
                                          </td>
                                          <td style="width: 20%;">{{ $application->{'address_' . app()->getLocale()} }}</td>
                                          <td style="width: 20%;">{{ (app()->getLocale() == 'en') ? date('d-m-Y', strtotime($application->created_at)) : dateFormatEnglishToBanglaHlp(date('d-m-Y', strtotime($application->created_at))) }}</td>
                                          <td style="width: 20%;" class="text-center">
                                                      <span class="
                                                   {{ isset($application->caseStatus) ?
                                                ($application->caseStatus->id === 1 ? 'btn btn-outline-secondary' :
                                                ($application->caseStatus->id === 2 ? 'btn btn-outline-warning' :
                                                ($application->caseStatus->id === 3 ? 'btn btn-outline-danger' :
                                                ($application->caseStatus->id === 4 ? 'btn btn-outline-primary' :
                                                ($application->caseStatus->id === 5 ? 'btn btn-outline-info' :
                                                ($application->caseStatus->id === 6 ? 'btn btn-outline-success' :
                                                 'btn btn-outline-secondary'))))))
                                                : '' }}">
                                                          {{ $application->caseStatus->{'title_' . app()->getLocale()} ?? '-' }}
                                                      </span>

                                          </td>
                                  <td style="width: 12%; white-space: nowrap; overflow: hidden;">
                                              <span class="px-2 py-1"
                                                     style="background-color: rgba(110,71,152,0.39);color: #543279;border-radius: 10px">
                                                  Download PDF
                                              </span>
                                  </td>
                                  <td style="width: 2%;" >
                                      <div class="dropdown" id="dropdownContainer" style="white-space: normal; word-wrap: break-word;">
                                          <button type="button" class="btn btn-outline-secondary dropdown-toggle border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              &#x2026;
                                          </button>
                                          <div class="dropdown-menu">
                                              @can('update', app('App\Models\Caseongoing'))
                                                  <a class="btn btn-xs btn-primary" href="{{ route('admin.caseongoing.edit', $application->id) }}">
                                                      <i class="fas fa-edit"></i> {{ __('admin.common.edit') }}
                                                  </a>
                                              @endcan

                                              @can('delete', app('App\Models\Caseongoing'))
                                                  <a class="btn btn-xs btn-danger" href="{{ route('admin.caseongoing.delete', $application->id) }}" data-href="{{ route('admin.caseongoing.delete', [$application->id, 1]) }}" class="delete">
                                                      <i class="fas fa-trash-alt"></i> {{ __('admin.common.delete') }}
                                                  </a>
                                              @endcan
                                              @can('edit_step_info', app('App\Models\Caseongoing'))
                                                  <a href="{{ route('admin.caseongoing.edit_step_info', $application->id) }}" class=" btn btn-xs btn-warning">
                                                      {{ __('admin.caseongoing.update_step_info_ans') }}
                                                  </a>
                                              @endcan
                                              @can('edit_addmember_info', app('App\Models\Caseongoing'))
                                                  <a href="{{ route('admin.caseongoing.edit_addmember_info', $application->id) }}" class="btn btn-xs btn-info">
                                                      {{ __('admin.caseongoing.update_addmember_info_ans') }}
                                                  </a>
                                              @endcan
                                          </div>
                                      </div>
                                  </td>

                                  </tr>
                              <tr style="cursor: pointer" onclick="redirectToEdit(event, '{{ route('admin.caseongoing.show', ['id' => @$application->id]) }}')">
                                      <td colspan="6" class="font-weight-bold">{{ $application->{'title_' . app()->getLocale()} }}</td>
                                  </tr>
                              <tr style="cursor: pointer" onclick="redirectToEdit(event, '{{ route('admin.caseongoing.show', ['id' => @$application->id]) }}')">
                                  <td colspan="4">{{ $application->{'title_details_' . app()->getLocale()} }}</td>
                                  <td colspan="1"> {{ __('admin.caseongoing.case_category') }} : <br>
                                      <span class="p-1 border border-secondary font-weight-bold" style="color: #05003A">
                                         <i class="fa fa-map-pin" style="color:#6E4798 "></i>
                                          {{ $application->caseCategory->{'title_' . app()->getLocale()} }}
                                      </span>
                                  </td>
                                  <td colspan="2"> <span class="font-weight-bolder">{{ __('admin.caseongoing.timer') }} : </span> <br>
                                      <span class="p-1 border border-secondary font-weight-bold" style="color: #05003A">
                                          <i class="fas fa-hourglass-half" style="color:#6E4798 "></i>

                                          {{ (app()->getLocale() == 'en') ?
                                         findTimer($application->created_at,app()->getLocale())  :
                                          dateFormatEnglishToBanglaHlp( findTimer($application->created_at,app()->getLocale())) }}
                                      </span>

                                  </td>
                              </tr>
                              <tr style="cursor: pointer" onclick="redirectToEdit(event, '{{ route('admin.caseongoing.show', ['id' => @$application->id]) }}')">
                                  <td colspan="7">
                                      <div class="m-2 p-2">
                                          <i class="ri-corner-down-right-line text-secondary" style="font-size: 24px "></i>
                                          <span class="text-secondary" >{{ (app()->getLocale() == 'en') ? "Working Group Member:" : "ওয়ার্কিং গ্রুপ মেম্বারঃ" }} </span>

                                          @php
                                              if ($application->users) {
                                                    $admins = \App\Models\Admin::with('officeDesignation','designation')->whereIn('id', json_decode($application->users))->get();
                                              } else {
                                                    $admins = \App\Models\Admin::with('officeDesignation','designation')->whereIn('id', [])->get();
                                              }
                                          @endphp

                                          @foreach ($admins as $item)
                                            <span style="border: 1px solid #6E4798" class="p-1 mx-1 text-bold">
                                              <i class="ri-map-pin-user-line px-1" style="color: #6E4798;"></i>
                                                    {{--{{$item->{'title_'. app()->getLocale()} }} ,--}}
                                                    {{$item->designation->{'title_'. app()->getLocale()} }}
                                              </span>
                                          @endforeach

                                      </div>
                                  </td>
                              </tr>
                          @else
                          
                          @endif
                          @endforeach

                          </tbody>
                      </table>

                      {{ $applications->links() }}


                  </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>




@endsection



@section('scripts')

    <script>
        function redirectToEdit(event, url) {
            if (event.target.classList.contains('dropdown-toggle')) {
                // Clicked on the dropdown button, do nothing
                return;
            }

            if (url) {
                window.location.href = url;
            }
        }
    </script>
<script src="{{asset('assets/plugins/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>

<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  $(document).ready(function () {
    $(document, 'td').on('click', '.delete', function (e) {
        e.preventDefault();
        //console.log($(this).attr('href'))
        var route = $(this).attr('href');
        var route1 = $(this).attr('href1');
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


