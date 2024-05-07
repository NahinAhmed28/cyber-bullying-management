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
  @include('../admin.layouts.partials.breadcrumb', ['path1' => __('admin.menu.user'), 'route1' => route('admin.user') ])
@endsection


@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">



          <div class="col-sm-2">
            @can('create', app('App\Models\User'))
              <a href="{{ route('admin.user.create') }}" class="btn btn-outline-light form-control btn-add-new">
                  <i class="fas fa-plus"></i> <span>{{ __('admin.common.add') }}</span>
              </a>
            @endcan
          </div>

          <div class="col-sm-10">
            <h1 class="text-light">
              <i class="fas fa-bookmark"></i> {{ __('admin.menu.user') }}
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

    @can('search', app('App\Models\User'))
      <section class="content-header">
        <div class="container-fluid">

            <form class="form-edit-add" sale="form" id="user_search_form"
              action="{{route('admin.user.search')}}"
              method="POST" enctype="multipart/form-data" autocomplete="off">
              {{ csrf_field() }}

              <div class="row">


                <div class="col-md-4">
                  <div class="form-group">
                    <label for="code">{{__('admin.user.code')}} {{__('admin.common.lt_en')}} </label>
                    <input type="text" name="code"
                    id="code" placeholder="{{__('admin.user.code')}} {{__('admin.common.lt_en')}}"
                    value="{{@$parameters['code']}}"
                    class="form-control">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="contact">{{__('admin.user.contact')}} </label>
                    <input type="text" name="contact"
                    id="contact" placeholder="{{__('admin.user.contact')}}"
                    value="{{@$parameters['contact']}}"
                    class="form-control">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="submit" style="visibility: hidden">{{__('admin.user.search')}}</label>
                    <button type="submit" id="submit1" class="btn btn-info btn-sm form-control save">
                      <i class="fas fa-save"></i> {{ __('admin.common.search') }}
                    </button>
                  </div>
                </div>

              </div>

            </form>

            <hr>
        </div>
      </section>
    @endcan


    <!-- Main content -->
    <section class="content" style="margin-top: -10px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ __('admin.common.list') }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>{{__('admin.user.code')}}</th>
                    <th>{{__('admin.user.name')}}</th>
                    <th>{{__('admin.user.father')}}</th>
                    <th>{{__('admin.user.address')}}</th>
                    <th>{{__('admin.user.contact_view')}}</th>
                    <th>{{__('admin.user.bayat_date')}}</th>
                    <th>{{__('admin.user.branch')}}</th>
                    <th>{{__('admin.user.caliph')}}</th>
                    <th>{{__('admin.user.president')}}</th>
                    <th>{{__('admin.user.vice_president')}}</th>
                    <th>{{__('admin.user.thumb')}}</th>
                    <th>{{__('admin.user.action')}}</th>
                  </tr>
                  </thead>

                  @foreach ($users as $key => $user)
                  <tr>
                    <td>{{(app()->getLocale() == 'en') ? $key+1 : engToBnHlp($key+1)}}</td>
                    <td>{{(app()->getLocale() == 'en') ? $user->code : engToBnHlp($user->code)}}</td>

                    <td>{{$user->{'title_'. app()->getLocale()} }}</td>
                    <td>{{$user->{'father_'. app()->getLocale()} }}</td>
                    <td>
                      {{$user->{'address_'. app()->getLocale()} }} ,
                      {{$user->thana->{'title_'. app()->getLocale()} }} ,
                      {{$user->district->{'title_'. app()->getLocale()} }}


                    </td>

                    <td>{{(app()->getLocale() == 'en') ? @$user->contact : engToBnHlp($user->contact)}}</td>

                    <td>{{(app()->getLocale() == 'en') ? date('d-m-Y', strtotime($user->bayat_date)) : dateFormatEnglishToBanglaHlp(date('d-m-Y', strtotime($user->bayat_date)))}}</td>

                    <td>{{$user->branch->{'title_'. app()->getLocale()} }}</td>
                    <td>{{$user->caliph->{'title_'. app()->getLocale()} }}</td>
                    <td>{{$user->president->{'title_'. app()->getLocale()} }}</td>
                    <td>{{$user->vicePresident->{'title_'. app()->getLocale()} }}</td>
                    <td>
                      @if ($user->thumb)
                        {{-- <a style="margin-left: 30%;" target="_blank" href="{{asset('storage/'.$user->thumb)}}"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a> --}}
                        <a style="margin-left: 5%;" target="_blank" href="{{asset('storage/'.$user->thumb)}}">
                          <img style="max-height:100px; border: 2px solid #f1efef;" src="{{asset('storage/'.$user->thumb)}}" alt="{{$user->{'title_'. app()->getLocale()} }}">
                        </a>
                        @else
                        {{-- <a style="margin-left: 30%;" target="_blank" href=""><i class="fa fa-eye-slash fa-2x" aria-hidden="true"></i></a> --}}
                        <a style="margin-left: 5%;" target="_blank" href="{{asset('storage/'.$user->thumb)}}">
                          <img style="max-height:100px; border: 2px solid #f1efef;" src="{{ asset('assets/dist/img/avatar.png') }}" alt="{{$user->{'title_'. app()->getLocale()} }}">
                        </a>
                        @endif
                    </td>


                    <td>
                      @can('update', app('App\Models\User'))
                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a>
                      @endcan

                      @can('view', app('App\Models\User'))
                        <a href="{{ route('admin.user.view', $user->id) }}" class="btn btn-xs btn-info"><i class="fas fa-eye"></i></a>
                      @endcan

                      @can('print', app('App\Models\User'))
                        <a href="{{ route('admin.user.print', $user->id) }}" class="btn btn-xs btn-warning"><i class="fas fa-print"></i></a>
                      @endcan

                      @can('delete', app('App\Models\User'))
                        <a href="{{ route('admin.user.delete', $user->id) }}" href1="{{ route('admin.user.delete', [$user->id,1]) }}"  class="btn btn-xs btn-danger delete"><i class="fas fa-trash-alt"></i></a>
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
              {{ $users->links() }}
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
        ajax: "{{ route('admin.user.datatable') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
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
@php

@endphp

@php
if (!$users->hasPages()) {
  Session::forget(['page','code','contact']);
}
@endphp
@endsection


