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
  @include('../admin.layouts.partials.breadcrumb', ['path1' => __('admin.menu.application'), 'route1' => route('admin.application') ])
@endsection


@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-2">

            <a href="{{ route('admin.case.create') }}" class="btn btn-outline-light form-control btn-add-new">
                <i class="fas fa-plus"></i> <span>{{ __('admin.common.add') }}</span>
            </a>
          </div>

          <div class="col-sm-10">
            <h1 class="text-light">
              <i class="fas fa-bookmark"></i> {{ __('admin.menu.application') }}
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
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr style="background-color: #6E4798; border-radius: 25px;" class="text-light">
                    <th>#</th>
                    <th>{{__('admin.case.code')}}</th>
                    <th>{{__('admin.case.name')}}</th>

                    <th>{{ __('admin.case.victim') }} {{ __('admin.admin.division') }}</th>
                    <th>{{ __('admin.case.victim') }} {{ __('admin.admin.district') }}</th>
                    <th>{{ __('admin.case.victim') }} {{ __('admin.admin.upazila') }}</th>
                    <th>{{ __('admin.case.victim') }} {{ __('admin.admin.thana') }}</th>

                    <th>{{__('admin.case.address')}}</th>

                    <th>{{__('admin.case.guardian')}}</th>
                    <th>{{__('admin.case.dob')}}</th>
                    <th>{{__('admin.case.age')}}</th>
                    <th>{{__('admin.case.gender')}}</th>
                    <th>{{__('admin.case.contact')}}</th>
                    <th>{{__('admin.case.guardian_contact')}}</th>

                    <th>{{__('admin.case.class')}}</th>
                    <th>{{__('admin.case.school')}}</th>


                    <th>{{__('admin.case.title')}}</th>
                    <th>{{__('admin.case.title_details')}}</th>
                    <th>{{__('admin.case.created_at')}}</th>

                    <th>{{__('admin.case.update_suspicious_info')}}</th>
                    <th>{{__('admin.case.update_step_info')}}</th>
                    <th>{{__('admin.case.update_addmember_info')}}</th>

                    <th>{{__('admin.case.action')}}</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($applications as $key => $application)
                  <tr>
                    <td>{{(app()->getLocale() == 'en') ? $key+1 : engToBnHlp($key+1)}}</td>
                    <td>{{(app()->getLocale() == 'en') ? $application->code : engToBnHlp($application->code)}}</td>
                    <td>{{$application->{'name_'. app()->getLocale()} }}</td>

                    <td>{{@$application->division->{'title_'. app()->getLocale()} }}</td>
                    <td>{{@$application->district->{'title_'. app()->getLocale()} }}</td>
                    <td>{{@$application->upazila->{'title_'. app()->getLocale()} }}</td>
                    <td>{{@$application->thana->{'title_'. app()->getLocale()} }}</td>
                    <td>{{$application->{'address_'. app()->getLocale()} }}</td>


                    <td>{{$application->{'guardian_'. app()->getLocale()} }}</td>
                    <td>{{(app()->getLocale() == 'en') ? dateFormat($application->dob) :dateFormatEnglishToBanglaHlp(dateFormat($application->dob)) }}</td>
                    <td>
                      {{(app()->getLocale() == 'en') ? ageCal($application->dob) : dateFormatEnglishToBanglaHlp(ageCal($application->dob))}}
                    </td>

                    <td>{{ (app()->getLocale() == 'en') ? Status::EN10[$application->gender] : Status::BN10[$application->gender] }}</td>
                    <td>{{(app()->getLocale() == 'en') ? $application->contact : engToBnHlp($application->contact)}}</td>
                    <td>{{(app()->getLocale() == 'en') ? $application->guardian_contact : engToBnHlp($application->guardian_contact)}}</td>


                    <td>{{$application->{'class_'. app()->getLocale()} }}</td>
                    <td>{{$application->{'school_'. app()->getLocale()} }}</td>


                    <td>{{$application->{'title_'. app()->getLocale()} }}</td>
                    <td>{{$application->{'title_details_'. app()->getLocale()} }}</td>
                    <td>{{(app()->getLocale() == 'en') ? date('d-m-Y', strtotime($application->created_at)) : dateFormatEnglishToBanglaHlp(date('d-m-Y', strtotime($application->created_at)))}}</td>


                    <td>
                      @can('edit_suspicious_info', app('App\Models\Application'))
                        <a href="{{ route('admin.case.edit_suspicious_info', $application->id) }}" class="btn btn-xs btn-primary">
                          {{__('admin.case.update_suspicious_info_ans')}}
                        </a>
                      @endcan
                    </td>

                    <td>
                      @can('edit_step_info', app('App\Models\Application'))
                        <a href="{{ route('admin.case.edit_step_info', $application->id) }}" class="btn btn-xs btn-warning">
                          {{__('admin.case.update_step_info_ans')}}
                        </a>
                      @endcan
                    </td>

                    <td>
                      @can('edit_addmember_info', app('App\Models\Application'))
                        <a href="{{ route('admin.case.edit_addmember_info', $application->id) }}" class="btn btn-xs btn-info">
                          {{__('admin.case.update_addmember_info_ans')}}
                        </a>
                      @endcan
                    </td>


                    <td>
                      @can('update', app('App\Models\Application'))
                        <a href="{{ route('admin.case.edit', $application->id) }}" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a>
                      @endcan

                      @can('delete', app('App\Models\Application'))
                        <a href="{{ route('admin.case.delete', $application->id) }}" href1="{{ route('admin.case.delete', [$application->id,1]) }}" class="btn btn-xs btn-danger delete"><i class="fas fa-trash-alt"></i></a>
                      @endcan

                    </td>
                  </tr>
                  @endforeach

                  </tbody>
                </table>


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


