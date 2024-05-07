@php
    //use App\Helper\EnglishToBanglaDate;
    //use App\Helper\NumberToBanglaWord;
    //use Rakibhstu\Banglanumber\NumberToBangla;
    //$numto = new NumberToBangla();

    $authUser = Auth::guard('admin')->user()->load(['userType']);
    $default_role = $authUser->userType->default_role;
@endphp

@extends('admin.layouts.master')
@section('title')
  {{__('admin.menu.site')}} :: {{__('admin.menu.central_committee')}}
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

  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('breadcrumb')
  @include('../admin.layouts.partials.breadcrumb', ['path1' => __('admin.menu.central_committee'), 'route1' => route('admin.central_committee') ])
@endsection


@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">



          <div class="col-sm-2">
            @can('create', app('App\Models\CentralCommittee'))
              <a href="{{ route('admin.central_committee.create') }}" class="btn btn-outline-light form-control btn-add-new">
                  <i class="fas fa-plus"></i> <span>{{ __('admin.common.add') }}</span>
              </a>
            @endcan
          </div>

          <div class="col-sm-10">
            <h1 class="text-info">
              <i class="fas fa-bookmark"></i> {{ __('admin.menu.central_committee') }}
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
                <h3 class="card-title">{{ __('admin.common.list') }} </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>{{__('admin.central_committee.user_type')}}</th>
                    <th>{{__('admin.central_committee.role')}} </th>
                    <th>{{__('admin.central_committee.designation')}} </th>
                    <th>{{__('admin.central_committee.office_designation')}} </th>
                    {{-- <th>{{__('admin.central_committee.division')}} </th>
                    <th>{{__('admin.central_committee.district')}} </th>
                    <th>{{__('admin.central_committee.upazila')}} </th> --}}
                    {{-- <th>{{__('admin.central_committee.area')}} </th>
                    <th>{{__('admin.central_committee.branch')}} </th> --}}
                    <th>{{__('admin.central_committee.name')}}</th>
                    <th>{{__('admin.central_committee.code')}}</th>
                    <th>{{__('admin.central_committee.username')}}</th>
                    <th>{{__('admin.central_committee.email')}}</th>
                    <th>{{__('admin.central_committee.contact')}}</th>

                    <th>{{__('admin.central_committee.created_at')}}</th>
                    <th>{{__('admin.central_committee.status')}}</th>
                    <th>{{__('admin.central_committee.thumb')}}</th>
                    <th>{{__('admin.central_committee.action')}}</th>
                  </tr>
                  </thead>

                  @foreach ($admins as $key => $admin)
                  <tr>
                    <td>{{(app()->getLocale() == 'en') ? $key+1 : engToBnHlp($key+1)}}</td>
                    <td>{{$admin->userType->{'title_'. app()->getLocale()} }}</td>
                    <td>{{$admin->role->{'title_'. app()->getLocale()} }}</td>

                    {{-- <td>{{@$admin->area->{'title_'. app()->getLocale()} }}</td>
                    <td>
                      @if ( @$admin->branch->{'title_'. app()->getLocale()} )
                      {{@$admin->branch->{'title_'. app()->getLocale()} }} - {{(app()->getLocale() == 'en') ? $admin->branch->code : engToBnHlp($admin->branch->code)}}
                      @else
                          -
                      @endif
                    </td> --}}

                    <td>{{@$admin->designation->{'title_'. app()->getLocale()} }}</td>
                    <td>{{@$admin->officeDesignation->{'title_'. app()->getLocale()} }}</td>
                    {{-- <td>{{@$admin->division->{'title_'. app()->getLocale()} }}</td>
                    <td>{{@$admin->district->{'title_'. app()->getLocale()} }}</td>
                    <td>{{@$admin->upazila->{'title_'. app()->getLocale()} }}</td> --}}

                    <td>{{$admin->{'title_'. app()->getLocale()} }}</td>

                    <td>{{(app()->getLocale() == 'en') ? $admin->code : engToBnHlp($admin->code)}}</td>
                    <td>{{$admin->username}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{(app()->getLocale() == 'en') ? @$admin->contact : engToBnHlp($admin->contact)}}</td>

                    <td>{{(app()->getLocale() == 'en') ? date('d-m-Y', strtotime($admin->created_at)) : dateFormatEnglishToBanglaHlp(date('d-m-Y', strtotime($admin->created_at)))}}</td>

                    <td>{{$admin->status}}</td>

                    <td>
                      @if ($admin->thumb)
                        <a style="margin-left: 30%;" target="_blank" href="{{asset('storage/'.$admin->thumb)}}"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
                      @else
                        <a style="margin-left: 30%;" target="_blank" href=""><i class="fa fa-eye-slash fa-2x" aria-hidden="true"></i></a>
                      @endif
                    </td>


                    <td>
                      @can('update', app('App\Models\CentralCommittee'))
                        <a href="{{ route('admin.central_committee.edit', $admin->id) }}" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a>
                      @endcan

                      @can('delete', app('App\Models\CentralCommittee'))
                        <a href="{{ route('admin.central_committee.delete', $admin->id) }}" href1="{{ route('admin.central_committee.delete', [$admin->id,1]) }}"  class="btn btn-xs btn-danger delete"><i class="fas fa-trash-alt"></i></a>
                      @endcan

                      @can('change_password', app('App\Models\CentralCommittee'))
                        <a href="{{ route('admin.change.password', $admin->id) }}"  class="btn btn-xs btn-warning change-password"><i class="fas fa-key"></i></a>
                      @endcan

                    </td>
                  </tr>
                  @endforeach

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div>
              {{ $admins->links() }}
            </div>

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
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.js') }}"></script>
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
    });

  </script>

  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "lengthMenu": [
            [500, 1000, 200, -1],
            [500, 1000, 200, 'All'],
          ],
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "lengthMenu": [
            [500, 1000, 200, -1],
            [500, 1000, 200, 'All'],
          ],
        "paging": false,
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,

      });
    });
  </script>

  <script>

    $(document).ready(function () {
      // Delete Section
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


