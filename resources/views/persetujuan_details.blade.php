@extends('layout.dashboard_layout',[
    'title' => 'Pemesanan',
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Detail Pemesanan -  NOPOL Kendaraan : <b>{{ $persetujuan->kendaraans->nomor_polisi }}</b>- 
                        @if($persetujuan->status_pemesanan == 0)
                            <span class="right badge badge-warning">Menunggu</span>
                        @elseif($persetujuan->status_pemesanan == 1)
                            <span class="right badge badge-info">Peminjaman</span>
                        @else
                            <span class="right badge badge-success">Selesai</span>
                        @endif
                    </h3>
        
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                      <div class="row">
                        <div class="col-12 col-sm-3">
                          <div class="info-box bg-light">
                            <div class="info-box-content">
                              <span class="info-box-text text-center text-muted">KM Awal</span>
                              <span class="info-box-number text-center text-muted mb-0">{{ $persetujuan->km_awal }}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-3">
                          <div class="info-box bg-light">
                            <div class="info-box-content">
                              <span class="info-box-text text-center text-muted">KM Akhir</span>
                              <span class="info-box-number text-center text-muted mb-0">{{ $persetujuan->km_akhir }}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-3">
                          <div class="info-box bg-light">
                            <div class="info-box-content">
                              <span class="info-box-text text-center text-muted">BBM</span>
                              <span class="info-box-number text-center text-muted mb-0">{{ $persetujuan->bbm }}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Konsumsi BBM</span>
                                <span class="info-box-number text-center text-muted mb-0">{{ $persetujuan->konsumsi_bbm }}</span>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <h4>Detail</h4>
                            <div class="post">
                              <div class="user-block">
                                <p> 
                                    Driver :
                                    {{ $persetujuan->drivers->nama_driver }}
                                </p>
                                
                                <p>
                                    Keperluan :
                                    {{$persetujuan->keperluan}}
                                </p>
                            </div>
                              <!-- /.user-block -->
                              
                            </div>
        
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-primary"><i class="fas fa-car"></i> Kendaraan : {{ $persetujuan->kendaraans->nama_kendaraan }} </h3>
                        <div class="row">
                            <div class="col-6 text-muted">
                                <p class="text-sm">Penyetuju 1
                                    <b class="d-block">{{ $persetujuan->users1->nama_user }}</b>
                                </p>
                                <p class="text-sm">Penyetuju 2
                                    <b class="d-block">{{ $persetujuan->users2->nama_user }}</b>
                                </p>
                            </div>
                            <div class="col-6 text-muted">
                                <p class="text-sm">Status 1
                                    <b class="d-block">
                                        @if($persetujuan->status_persetujuan1 == 0)
                                        <span class="right badge badge-warning">Menunggu</span>
                                        @else
                                            <span class="right badge badge-success">Disetujui</span>
                                        @endif
                                    </b>
                                </p>
                                <p class="text-sm">Status 2
                                    <b class="d-block">
                                        @if($persetujuan->status_persetujuan2 == 0)
                                        <span class="right badge badge-warning">Menunggu</span>
                                        @else
                                            <span class="right badge badge-success">Disetujui</span>
                                        @endif
                                    </b>
                                </p>
                            </div>
                        </div>
        
                      <h5 class="mt-5 text-muted">Date</h5>
                      <ul class="list-unstyled">
                        <li>
                          <a href="" class="btn-link text-secondary"><i class="far fa-calendar"></i>  Waktu Penggunaan :  {{ $persetujuan->waktu_penggunaan }}</a>
                        </li>
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-calendar-check"></i>  Waktu Pengembalian : {{ $persetujuan->waktu_pengembalian }}</a>
                          </li>
                      </ul>
                      <div class="text-center mt-5 mb-3">
                        {{-- <a href="#" class="btn btn-sm btn-primary">Add files</a> --}}
                        <a href="{{ url('persetujuan') }}" class="btn btn-sm btn-secondary">Kembali</a>
                        <form action="{{ url("persetujuan/$persetujuan->id") }}" method="post" class="d-inline">
                            @csrf
                            @method('put')
                            <button class="btn btn-sm btn-info" type="submit" onclick="return confirm('Are you sure?')">Disetujui</button>
                        </form>
                        {{-- <form action="{{ url("persetujuan/$persetujuan->id") }}" method="post" class="d-inline">
                            @csrf
                            @method('put')
                            <button class="btn btn-sm btn-warning" onclick="return confirm('Are you sure?')">Batal</button>
                        </form> --}}
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
    </div>
        <!-- /.row -->
      <!-- /.content -->
</div>
<!-- /.content-wrapper -->

  
@endsection
