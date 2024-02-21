<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset("assets/adminLTE/plugins/fontawesome-free/css/all.min.css") }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset("assets/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">
    
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset("assets/adminLTE/plugins/daterangepicker/daterangepicker.css")}}">
     <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset("assets/adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
   
     {{-- Public DataTable --}}
    <link href="{{ asset('assets/DataTables/datatables.min.css') }}" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("assets/adminLTE/dist/css/adminlte.min.css") }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="nav-link">
          <p>
            Logout
            <i class="fas fa-power-off"></i>
          </p>
        </button>
      </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset("assets/adminLTE/dist/img/AdminLTELogo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MINING Company</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset("assets/adminLTE/dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->nama_user }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            @can('admin')
            <li class="nav-header">ADMINISTRATOR</li>
            <li class="nav-item">
                <a href="{{ url('dashboard') }}" class="nav-link {{ Request::is('dashboard') || Request::is('/')? 'active':'' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('user')||Request::is('driver')||Request::is('kendaraan')?'menu-open menu-is-opening':'' }}">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Data
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('jabatan') }}" class="nav-link {{ Request::is('jabatan')?'active':'' }} ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Jabatan</p>
                    </a>
                </li>
                  <li class="nav-item">
                    <a href="{{ url('user') }}" class="nav-link {{ Request::is('user')?'active':'' }} ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('driver') }}" class="nav-link {{ Request::is('driver')?'active':'' }} ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Driver</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('kendaraan') }}" class="nav-link {{ Request::is('kendaraan')?'active':'' }} ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kendaraan</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ url('pemesanan') }}" class="nav-link {{ Request::is('pemesanan')?'active':'' }} ">
                    <i class="nav-icon far fa-clipboard"></i>
                <p>
                    Pemesanan
                </p>
                </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('cari-pemesanan') }}" class="nav-link {{ Request::is('cari-pemesanan')?'active':'' }} ">
                  <i class="nav-icon 	fa fa-search"></i>
              <p>
                  Cari Pemesanan
              </p>
              </a>
          </li>
            <li class="nav-item">
                <a href="{{ url('service') }}" class="nav-link {{ Request::is('service')?'active':'' }} ">
                    <i class="nav-icon fas fa-cogs"></i>
                <p>
                    Servis Kendaraan
                </p>
                </a>
            </li>
            @endcan
            @can('user')
              <li class="nav-header">USER</li>
              <li class="nav-item">
                <a href="{{ url('persetujuan') }}" class="nav-link {{ Request::is('servis')?'active':'' }} ">
                    <i class="nav-icon fas fa-cogs"></i>
                <p>
                    Persetujuan
                </p>
                </a>
            </li>
            @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

  @yield('main')

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {{ date('Y') }}.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset("assets/adminLTE/plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset("assets/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("assets/adminLTE/dist/js/adminlte.min.js") }}"></script>

<!-- REQUIRED SCRIPTS -->
<script type="text/javascript">
  $(function () {
      $('#users_tabel').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          {
                extend: 'print',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
          {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                  columns: ':not(:last-child)',
                }
            },
            'colvis'

        ]
      });

      //Date and time picker
      $('#tanggal_beli_sewa').datetimepicker({ 
        icons: { time: 'far fa-clock' },
        format: 'YYYY-MM-DD hh:mm:ss',
      });
      $('#waktu_penggunaan').datetimepicker({ 
        icons: { time: 'far fa-clock' },
        format: 'YYYY-MM-DD hh:mm:ss',
      });
      $('#waktu_pengembalian').datetimepicker({ 
        icons: { time: 'far fa-clock' },
        format: 'YYYY-MM-DD hh:mm:ss',
      });
      $('#tanggal_servis').datetimepicker({ 
        icons: { time: 'far fa-clock' },
        format: 'YYYY-MM-DD hh:mm:ss',
      });

      $('#pemesanan_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                  columns: ':not(:last-child)',
                }
            },
            
            'colvis'
        ]
      });

      //ajax used to search feature but unfinished

      // $('#cariDataPemesanan').submit(function(e) {
      //     e.preventDefault();
      //     $.ajax({
      //         type: 'POST',
      //         url: '{{ route("cari_data") }}',
      //         data: $(this).serialize(),
      //         success: function(response) {
                 
      //             console.log(response);
      //             updateTable(response)
                  
      //         },
      //         error: function(error) {
      //             console.log(error);
      //         }
      //     });
      // });

        $('#cari_data').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                  columns: ':not(:last-child)',
                }
            },
            
            'colvis'
          ]
        });

        var value = @json($value);
        var jenis_kend = @json($label_jenis_kendaraan);
        var options = {
          series: [{
            name: '',
            data: value,
          }],
          
          chart: {
          type: 'bar',
          height: 350
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '55%',
              endingShape: 'rounded'
            },
          },
          dataLabels: {
            enabled: true,
          },
          stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
          },
          xaxis: {
            categories: jenis_kend,
          },
          yaxis: {
            title: {
              text: 'Jumlah Pemakaian'
            }
          },
          fill: {
            opacity: 1
          },
          tooltip: {
            y: {
              formatter: function (val) {
                return  + val + " Pemakaian"
              }
            }
          }
        };

        var chart = new ApexCharts(document.querySelector("#pemakaianJenisKendaraan"), options);
        chart.render();
        var label_kend = @json($label_kendaraan);
        var data_kend = @json($data_kend);
        var options = {
          series: data_kend,
          labels: label_kend,
          chart: {
          type: 'donut',
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#pemakaianKendaraan"), options);
        chart.render();

  });
</script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!-- jQuery -->
<script src="{{ asset("assets/adminLTE/plugins/jquery/jquery.min.js") }}"></script>

<script src="{{ asset("assets/DataTables/datatables.js")}}"></script>
<!-- date-range-picker -->
<script src="{{ asset("assets/adminLTE/plugins/moment/moment.min.js")}}"></script>
<script src="{{ asset("assets/adminLTE/plugins/daterangepicker/daterangepicker.js")}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset("assets/adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}"></script>





</body>
</html>