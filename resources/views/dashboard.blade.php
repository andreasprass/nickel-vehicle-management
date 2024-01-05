@extends('layout.dashboard_layout',[
    'title' => 'Dashboard',
])
@section('main')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Home</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @can('admin')
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $kendaraanCount }}</h3>

                <p>Kendaraan</p>
              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
              <a href="{{ url('kendaraan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $pemesanan_active_count }}</h3>

                <p>Pemesanan Aktif</p>
              </div>
              <div class="icon">
                <i class="fas fa-clipboard"></i>
              </div>
              <a href="{{ url('pemesanan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $driversCount }}</h3>

                <p>Driver</p>
              </div>
              <div class="icon">
                <i class="far fa-address-card"></i>
              </div>
              <a href="{{ url('driver') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $pemesanan_perlu_persetujuan }}</h3>
                <p>Meununggu Persetujuan</p>
              </div>
              <div class="icon">
                <i class="fas fa-hourglass-half"></i>
              </div>
              <a href="{{ url('pemesanan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            
          </div>
          <!-- ./col -->
        </div>
        @endcan
            
        <div class="row">
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
