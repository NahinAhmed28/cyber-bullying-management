@php
    //use App\Helper\EnglishToBanglaDate;
    //use App\Helper\NumberToBanglaWord;
    //use Rakibhstu\Banglanumber\NumberToBangla;
    //$numto = new NumberToBangla();
@endphp

@extends('admin.layouts.master')
@section('title')
  {{ $sitesetting->{'title_'. app()->getLocale()} }} :: {{__('admin.menu.dashboard')}}
@endsection

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endsection

@section('breadcrumb')
  @include('../admin.layouts.partials.breadcrumb')
@endsection


@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          {{-- <div class="col-sm-2">
            <a href="{{ route('admin.district.create') }}" class="btn btn-info form-control btn-add-new">
                <i class="fas fa-plus"></i> <span>{{ __('admin.common.add') }}</span>
            </a>
          </div> --}}

          {{-- <div class="col-sm-10">
            <h1 class="text-info">
              <i class="fas fa-bookmark"></i> {{ __('admin.menu.dashboard') }}
            </h1>
          </div> --}}


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
      <section class="content">

      </section>
      <!-- /.content -->
  </div>




@endsection


@section('scripts')

    <!-- DataTables  & Plugins -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

    <!--datatable-->
{{--    <script>--}}
{{--        $(function () {--}}
{{--            $("#example1").DataTable({--}}
{{--                "responsive": true, "lengthChange": false, "autoWidth": false,--}}
{{--                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]--}}
{{--            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');--}}
{{--            $("#example2").DataTable({--}}
{{--                "responsive": true, "lengthChange": false, "autoWidth": false,--}}
{{--                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]--}}
{{--            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');--}}
{{--            $("#example3").DataTable({--}}
{{--                "responsive": true, "lengthChange": false, "autoWidth": false,--}}
{{--                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]--}}
{{--            }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');--}}
{{--        });--}}
{{--    </script>--}}


    <!-- ChartJS -->
{{--    <script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>--}}

    <!--chartjs-->
{{--    <script>--}}
{{--        $(function () {--}}
{{--            var donutData        = {--}}
{{--                labels: [--}}
{{--                    'Saudi Arabia',--}}
{{--                    'Malaysia',--}}
{{--                    'Thailand',--}}
{{--                    'Italy',--}}
{{--                    'USA',--}}
{{--                    'Baharain',--}}
{{--                ],--}}
{{--                datasets: [--}}
{{--                    {--}}
{{--                        data: [700,500,400,600,300,100],--}}
{{--                        backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],--}}
{{--                    }--}}
{{--                ]--}}
{{--            }--}}
{{--            //---------------}}
{{--            //- PIE CHART ---}}
{{--            //---------------}}
{{--            // Get context with jQuery - using jQuery's .get() method.--}}
{{--            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')--}}
{{--            var pieData        = donutData;--}}
{{--            var pieOptions     = {--}}
{{--                maintainAspectRatio : false,--}}
{{--                responsive : true,--}}
{{--            }--}}
{{--            //Create pie or douhnut chart--}}
{{--            // You can switch between pie and douhnut using the method below.--}}
{{--            new Chart(pieChartCanvas, {--}}
{{--                type: 'pie',--}}
{{--                data: pieData,--}}
{{--                options: pieOptions--}}
{{--            })--}}

{{--            var areaChartData = {--}}
{{--                labels  : ['Passpost Renewal', 'Document Correction', 'Police Clearence', 'Expatriate Welfare Card', 'Document Attatchment', ' Certificate Correction', 'Travel Permit'],--}}
{{--                datasets: [--}}
{{--                    {--}}
{{--                        label               : 'This Month',--}}
{{--                        backgroundColor     : 'rgba(60,141,188,0.9)',--}}
{{--                        borderColor         : 'rgba(60,141,188,0.8)',--}}
{{--                        pointRadius          : false,--}}
{{--                        pointColor          : '#3b8bba',--}}
{{--                        pointStrokeColor    : 'rgba(60,141,188,1)',--}}
{{--                        pointHighlightFill  : '#fff',--}}
{{--                        pointHighlightStroke: 'rgba(60,141,188,1)',--}}
{{--                        data                : [28, 48, 40, 19, 86, 27, 90]--}}
{{--                    },--}}

{{--                ]--}}
{{--            }--}}
{{--            //---------------}}
{{--            //- BAR CHART ---}}
{{--            //---------------}}
{{--            var barChartCanvas = $('#barChart').get(0).getContext('2d')--}}
{{--            var barChartData = $.extend(true, {}, areaChartData)--}}
{{--            var temp0 = areaChartData.datasets[0]--}}
{{--            barChartData.datasets[0] = temp0--}}

{{--            var barChartOptions = {--}}
{{--                responsive              : true,--}}
{{--                maintainAspectRatio     : false,--}}
{{--                datasetFill             : false--}}
{{--            }--}}

{{--            new Chart(barChartCanvas, {--}}
{{--                type: 'bar',--}}
{{--                data: barChartData,--}}
{{--                options: barChartOptions--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}
@endsection
