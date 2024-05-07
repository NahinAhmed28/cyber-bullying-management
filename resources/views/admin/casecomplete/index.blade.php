@php
    //use App\Helper\EnglishToBanglaDate;
    //use App\Helper\NumberToBanglaWord;
    //use Rakibhstu\Banglanumber\NumberToBangla;
    //$numto = new NumberToBangla();

    use App\Models\Status;
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

@endsection

@section('breadcrumb')
  @include('../admin.layouts.partials.breadcrumb', ['path1' => __('admin.menu.casecomplete'), 'route1' => route('admin.casecomplete') ])
@endsection


@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          {{-- <div class="col-sm-2">

            <a href="{{ route('admin.casecomplete.create') }}" class="btn btn-outline-light form-control btn-add-new">
                <i class="fas fa-plus"></i> <span>{{ __('admin.common.add') }}</span>
            </a>
          </div> --}}

          <div class="col-sm-12">
            <h1 class="text-light">
              <i class="fas fa-bookmark"></i> {{ __('admin.menu.casecomplete') }}
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
                      <div class="col-md-3">
                          <a href="{{route('admin.casecomplete')}}" style="color: {{$retVal = (Route::current()->getName() == 'admin.casecomplete') ? 'blue' : 'black' }} ">
                            {{ __('admin.menu.cases') }} -
                            ( {{(app()->getLocale() == 'en') ? $totalApplication : dateFormatEnglishToBanglaHlp($totalApplication) }} )
                          </a>
                      </div>
                      @foreach($caseTypesWithCount as $caseType)
                          <div class="col-md-3">
                              <a href="{{ route('admin.casecomplete', ['cid' => $caseType->id]) }}"
                                 style="color: {{ (Route::currentRouteName() == 'admin.casecomplete' && Route::current()->parameter('cid') == $caseType->id) ? 'blue' : 'black' }};
                                    border-bottom: {{ (Route::currentRouteName() == 'admin.casecomplete' && Route::current()->parameter('cid') == $caseType->id) ? '2px solid #6E4798' : 'none' }}">
                                  {{ $caseType->{'title_' . app()->getLocale()} }} -
                                  ({{ (app()->getLocale() == 'en') ? $caseType->completeapplications_count : dateFormatEnglishToBanglaHlp($caseType->completeapplications_count) }})
                              </a>
                          </div>
                      @endforeach
                  </div>


                  <div style="overflow-x:auto;" style="border-radius: 25px !important;">
                      <table id="example1" class="table table-hover">
                          <thead>
                          <tr style="background-color: #6E4798;" class="text-light">
                              <th>{{ __('admin.casecomplete.code') }}</th>
                              <th>{{ __('admin.casecomplete.name') }}</th>
                              <th>{{ __('admin.casecomplete.address') }}</th>
                              <th>{{ __('admin.casecomplete.created_at') }}</th>
                              <th>{{ __('admin.casecomplete.case_status') }}</th>
                              <th>{{ __('admin.casecomplete.download_pdf') }}</th>
                              <th>{{ __('admin.casecomplete.action') }}</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($applications as $key => $application)
                              <tr onclick="redirectToEdit(event, '{{ route('admin.casecomplete.show', ['id' => @$application->id]) }}')">
                                          <td style="width: 15%;" class="text-center">{{ (app()->getLocale() == 'en') ? $application->code : engToBnHlp($application->code) }}</td>
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
                                          <td style="width: 15%;">{{ $application->{'address_' . app()->getLocale()} }}</td>
                                          <td style="width: 10%;">{{ (app()->getLocale() == 'en') ? date('d-m-Y', strtotime($application->created_at)) : dateFormatEnglishToBanglaHlp(date('d-m-Y', strtotime($application->created_at))) }}</td>
                                  <td class="align-middle p-0
                                    {{ isset($application->caseStatus) ?
                                        ($application->caseStatus->id === 1 ? 'text-warning' :
                                        ($application->caseStatus->id === 2 ? 'text-primary' :
                                        ($application->caseStatus->id === 3 ? 'text-success' : 'text-secondary')))
                                        : '' }}
                                  " style="width: 15%;">


                                      {{ $application->caseStatus->{'title_' . app()->getLocale()} ?? '-' }}

                                          </td>
                                          <td> <span class="px-2 py-1"
                                                     style="background-color: rgba(110,71,152,0.39);color: #543279;border-radius: 10px">
                                                  Download PDF </span>
                                          </td>
                                          <td>
                                              <div class="dropdown" id="dropdownContainer">
                                                  <button type="button" class="btn btn-outline-secondary dropdown-toggle border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      &#x2026;
                                                  </button>
                                                  <div class="dropdown-menu">
                                                      @can('update', app('App\Models\Casecomplete'))
                                                          <a class="btn btn-xs btn-primary" href="{{ route('admin.casecomplete.edit', $application->id) }}">
                                                              <i class="fas fa-edit"></i> {{ __('admin.common.edit') }}
                                                          </a>
                                                      @endcan

                                                      @can('delete', app('App\Models\Casecomplete'))
                                                          <a class="btn btn-xs btn-danger" href="{{ route('admin.casecomplete.delete', $application->id) }}" data-href="{{ route('admin.casecomplete.delete', [$application->id, 1]) }}" class="delete">
                                                              <i class="fas fa-trash-alt"></i> {{ __('admin.common.delete') }}
                                                          </a>
                                                      @endcan
                                                      @can('edit_step_info', app('App\Models\Casecomplete'))
                                                          <a href="{{ route('admin.casecomplete.edit_step_info', $application->id) }}" class=" btn btn-xs btn-warning">
                                                              {{ __('admin.casecomplete.update_step_info_ans') }}
                                                          </a>
                                                      @endcan
                                                      @can('edit_addmember_info', app('App\Models\Casecomplete'))
                                                          <a href="{{ route('admin.casecomplete.edit_addmember_info', $application->id) }}" class="btn btn-xs btn-info">
                                                              {{ __('admin.casecomplete.update_addmember_info_ans') }}
                                                          </a>
                                                      @endcan
                                                  </div>
                                              </div>
                                          </td>
                                  </tr>
                              <tr onclick="redirectToEdit(event, '{{ route('admin.casecomplete.show', ['id' => @$application->id]) }}')">
                                      <td colspan="6" class="font-weight-bold">{{ $application->{'title_' . app()->getLocale()} }}</td>
                                  </tr>
                              <tr onclick="redirectToEdit(event, '{{ route('admin.casecomplete.show', ['id' => @$application->id]) }}')">
                                  <td colspan="3">{{ $application->{'title_details_' . app()->getLocale()} }}</td>
                                  <td colspan="2"> {{ __('admin.casecomplete.case_category') }} : <br>
                                      <span class="p-1 border border-secondary font-weight-bold" style="color: #05003A">
                                         <i class="fa fa-map-pin" style="color:#6E4798 "></i>
                                          {{ $application->caseCategory->{'title_' . app()->getLocale()} }}
                                      </span>
                                  </td>
                                  <td colspan="2"> <span class="font-weight-bolder">{{ __('admin.casecomplete.timer') }} : </span> <br>
                                      <span class="p-1 border border-secondary font-weight-bold" style="color: #05003A">
                                          <i class="fas fa-hourglass-half" style="color:#6E4798 "></i>

                                          {{ (app()->getLocale() == 'en') ?
                                         findTimer($application->created_at,app()->getLocale())  :
                                          dateFormatEnglishToBanglaHlp( findTimer($application->created_at,app()->getLocale())) }}
                                      </span>

                                  </td>
                              </tr>
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


