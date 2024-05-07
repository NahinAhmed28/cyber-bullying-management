@php
    //use App\Helper\EnglishToBanglaDate;
    //use App\Helper\NumberToBanglaWord;
    //use Rakibhstu\Banglanumber\NumberToBangla;
    //$numto = new NumberToBangla();
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
  @include('../admin.layouts.partials.breadcrumb', ['path1' => __('admin.menu.branch_user'), 'route1' => route('admin.branch_user') ])
@endsection


@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">



          <div class="col-sm-2">
            @can('create', app('App\Models\BranchUser'))
              <a href="{{ route('admin.branch_user.create') }}" class="btn btn-outline-light form-control btn-add-new">
                  <i class="fas fa-plus"></i> <span>{{ __('admin.common.add') }}</span>
              </a>
            @endcan
          </div>

          <div class="col-sm-10">
            <h1 class="text-light">
              <i class="fas fa-bookmark"></i> {{ __('admin.menu.branch_user') }}
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
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>{{__('admin.branch_user.action')}}</th>
                    <th>{{__('admin.branch_user.status')}}</th>
                    <th>{{__('admin.branch_user.branch')}} </th>
                    <th>{{__('admin.branch_user.username')}}</th>
                    <th>{{__('admin.branch_user.email')}}</th>
                    <th>{{__('admin.branch_user.contact')}}</th>
                    <th>{{__('admin.branch_user.user_type')}}</th>
                    <th>{{__('admin.branch_user.role')}} </th>
                    <th>{{__('admin.branch_user.name')}}</th>
                    <th>{{__('admin.branch_user.code')}}</th>


                    <th>{{__('admin.branch_user.created_at')}}</th>

                    <th>{{__('admin.branch_user.thumb')}}</th>

                  </tr>
                  </thead>

                  @foreach ($branch_users as $key => $admin)
                  <tr>
                    <td>{{(app()->getLocale() == 'en') ? $key+1 : engToBnHlp($key+1)}}</td>
                    <td>
                      @can('update', app('App\Models\BranchUser'))
                        <a href="{{ route('admin.branch_user.edit', $admin->id) }}" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a>
                      @endcan

                      @can('delete', app('App\Models\BranchUser'))
                        <a href="{{ route('admin.branch_user.delete', $admin->id) }}" href1="{{ route('admin.branch_user.delete', [$admin->id,1]) }}"  class="btn btn-xs btn-danger delete"><i class="fas fa-trash-alt"></i></a>
                      @endcan

                      @can('change_password', app('App\Models\BranchUser'))
                        <a href="{{ route('admin.change.password', $admin->id) }}"  class="btn btn-xs btn-warning change-password"><i class="fas fa-key"></i></a>
                      @endcan

                    </td>
                    <td class="{{($admin->status == "Active") ? 'text-primary' : 'text-danger'}} " >{{$admin->status}}</td>
                    <td>{{@$admin->branch->{'title_'. app()->getLocale()} }}</td>
                    <td>{{$admin->username}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{(app()->getLocale() == 'en') ? @$admin->contact : engToBnHlp($admin->contact)}}</td>
                    <td>{{$admin->userType->{'title_'. app()->getLocale()} }}</td>
                    <td>{{$admin->role->{'title_'. app()->getLocale()} }}</td>

                    <td>{{$admin->{'title_'. app()->getLocale()} }}</td>

                    <td>{{(app()->getLocale() == 'en') ? $admin->code : engToBnHlp($admin->code)}}</td>

                    <td>{{(app()->getLocale() == 'en') ? date('d-m-Y', strtotime($admin->created_at)) : dateFormatEnglishToBanglaHlp(date('d-m-Y', strtotime($admin->created_at)))}}</td>



                    <td>
                      @if ($admin->thumb)
                        <a style="margin-left: 30%;" target="_blank" href="{{asset('storage/'.$admin->thumb)}}"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
                      @else
                        <a style="margin-left: 30%;" target="_blank" href=""><i class="fa fa-eye-slash fa-2x" aria-hidden="true"></i></a>
                      @endif
                    </td>
                  </tr>
                  @endforeach

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


{{-- <script type="text/javascript">
  $(function () {
    var table = $('#example1').DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: false,
        autoWidth: false,
        responsive: true,
        processing: false,
        serverSide: false,
        buttons : ["copy", "csv", "excel", "pdf", "print", "colvis"],
        ajax: "{{ route('admin.branch_user.datatable') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'user_type.name', name: 'user_type_id'},
            {data: 'admin.name', name: 'admin_id'},
            {data: 'title_{{app()->getLocale()}}', name: 'title_{{app()->getLocale()}}'},
            {data: 'username', name: 'username'},
            {data: 'email', name: 'email'},

            {data: 'created_at', name: 'created_at', orderable: true,searchable: true},
            {data: 'status', name: 'status'},
            {data: 'thumb', name: 'thumb', orderable: false,searchable: false},
            {data: 'action',name: 'action', orderable: false, searchable: false},
        ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script> --}}


{{-- <script>
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
</script> --}}

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
  // $(document).ready(function () {
  //   $(document, 'td').on('click', '.delete', function (e) {
  //       e.preventDefault();
  //       //console.log($(this).attr('href'))
  //       var route = $(this).attr('href');
  //       Swal.fire({
  //         title: "{{__('admin.common.confirm_msg')}}",
  //         showDenyButton: false,
  //         showCancelButton: true,
  //         confirmButtonText: 'Delete',
  //         denyButtonText: `Don't save`,
  //         confirmButtonColor: 'tomato',
  //       }).then((result) => {
  //         /* Read more about isConfirmed, isDenied below */
  //         if (result.isConfirmed) {
  //           window.location.href = route;
  //           //console.log(route);
  //         } else if (result.isDenied) {
  //           Swal.fire('Changes are not saved', '', 'info')
  //         }
  //       })

  //   });
  // });
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


