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

  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('breadcrumb')
  @include('../admin.layouts.partials.breadcrumb', ['path1' => __('admin.menu.branch'), 'route1' => route('admin.branch') ])
@endsection


@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-2">

            <a href="{{ route('admin.branch.create') }}" class="btn btn-outline-light form-control btn-add-new">
                <i class="fas fa-plus"></i> <span>{{ __('admin.common.add') }}</span>
            </a>
          </div>

          <div class="col-sm-10">
            <h1 class="text-light">
              <i class="fas fa-bookmark"></i> {{ __('admin.menu.branch') }}
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
                  <tr>
                    <th>#</th>
                    <th>{{__('admin.branch.action')}}</th>
                    <th>{{__('admin.branch.code')}}</th>
                    <th>{{__('admin.branch.status')}}</th>
                    <th>{{__('admin.branch.office_type')}}</th>
                    <th>{{__('admin.branch.area')}}</th>

                    <th>{{__('admin.branch.name')}}</th>
                    <th>{{__('admin.branch.email')}}</th>
                    <th>{{__('admin.branch.contact')}}</th>

                    <th>{{__('admin.branch.latitude')}}</th>
                    <th>{{__('admin.branch.longitude')}}</th>

                    <th>{{__('admin.branch.long_url')}}</th>
                    <th>{{__('admin.branch.short_url')}}</th>


                    <th>{{__('admin.branch.address')}}</th>
                    <th>{{__('admin.branch.created_at')}}</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($branches as $key => $branch)
                  <tr>
                    <td>{{(app()->getLocale() == 'en') ? $key+1 : engToBnHlp($key+1)}}</td>
                    <td>
                      @can('update', app('App\Models\Branch'))
                        <a href="{{ route('admin.branch.edit', $branch->id) }}" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a>
                      @endcan

                      @can('delete', app('App\Models\Branch'))
                        <a href="{{ route('admin.branch.delete', $branch->id) }}" href1="{{ route('admin.branch.delete', [$branch->id,1]) }}" class="btn btn-xs btn-danger delete"><i class="fas fa-trash-alt"></i></a>
                      @endcan

                    </td>
                    <td>{{(app()->getLocale() == 'en') ? $branch->code : engToBnHlp($branch->code)}}</td>
                    <td class="{{($branch->status == "Active") ? 'text-primary' : 'text-danger'}} " >{{$branch->status}}</td>

                    <td>{{@$branch->officeType->{'title_'. app()->getLocale()} }}</td>
                    <td>{{@$branch->area->{'title_'. app()->getLocale()} }}</td>
                    <td>{{$branch->{'title_'. app()->getLocale()} }}</td>
                    <td>{{$branch->email}}</td>
                    <td>{{(app()->getLocale() == 'en') ? @$branch->contact : engToBnHlp($branch->contact)}}</td>


                    <td>{{(app()->getLocale() == 'en') ? $branch->latitude : engToBnHlp($branch->latitude)}}</td>
                    <td>{{(app()->getLocale() == 'en') ? $branch->longitude : engToBnHlp($branch->longitude)}}</td>

                    <td><a target="_blank" href="{{ $branch->long_url }}" class="btn btn-xs btn-danger">{{__('admin.branch.long_url')}}</a></td>

                    <td><a target="_blank" href="{{ $branch->short_url }}" class="btn btn-xs btn-danger">{{__('admin.branch.short_url')}}</a></td>

                    <td>{{$branch->{'address_'. app()->getLocale()} }}</td>
                    <td>{{(app()->getLocale() == 'en') ? date('d-m-Y', strtotime($branch->created_at)) : dateFormatEnglishToBanglaHlp(date('d-m-Y', strtotime($branch->created_at)))}}</td>



                  </tr>
                  @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div>
              {{ $branches->links() }}
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


