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
                <h3>{{ $peminjaman }}</h3>

                <p>Peminjaman</p>
              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
              <a href="{{ url('pemesanan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $pemesanan_selesai }}</h3>

                <p>Pemesanan Selesai</p>
              </div>
              <div class="icon">
                <i class="	fas fa-clipboard-check"></i>
              </div>
              <a href="{{ url('pemesanan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $menunggu_persetujuan }}</h3>

                <p>Menunggu Persetujuan</p>
              </div>
              <div class="icon">
                <i class="far fa-address-card"></i>
              </div>
              <a href="{{ url('pemesanan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $pemesanan_ditolak }}</h3>
                <p>Pemesanan Ditolak</p>
              </div>
              <div class="icon">
                <i class="fas fa-times"></i>
              </div>
              <a href="{{ url('pemesanan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            
          </div>
          <!-- ./col -->
        </div>
        @endcan
            
        @can('admin')
        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pemakaian Jenis Kendaraan</h3>
              </div>
              <div class="card-body">
                <div id="pemakaianJenisKendaraan">

                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pemakaian Kendaraan</h3>
              </div>
              <div class="card-body">
                <div id="pemakaianKendaraan">

                </div>
              </div>
            </div>
          </div>
        </div>
        @endcan
        @can('user')
          <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Perlu Persetujuan</h3>
            </div>
            <div class="card-body">
                <table class="table display table-striped dt-responsive nowrap" style="width:100%" id="pemesanan_table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Driver</th>
                            <th>Kendaraan</th>
                            <th>Tanggal Ambil</th>
                            <th>Tanggal Kembali</th>
                            <th>Kepala Pool</th>
                            <th>Kepala Terkait</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($persetujuans as $persetujuan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $persetujuan->drivers->nama_driver }}</td>
                            <td>{{ $persetujuan->kendaraans->nama_kendaraan }}</td>
                            <td>{{ $persetujuan->waktu_penggunaan }}</td>
                            <td>{{ $persetujuan->waktu_pengembalian }}</td>
                            <td>
                                @if($persetujuan->status_persetujuan1 == 0)
                                    <span class="right badge badge-warning">Menunggu</span>
                                @else
                                    <span class="right badge badge-success">Disetujui</span>
                                @endif
                            </td>
                            <td>
                                @if($persetujuan->status_persetujuan2 == 0)
                                    <span class="right badge badge-warning">Menunggu</span>
                                @else
                                    <span class="right badge badge-success">Disetujui</span>
                                @endif
                            </td>
                            <td>
                                @if($persetujuan->status_pemesanan == 0)
                                    <span class="right badge badge-warning">Menunggu</span>
                                @elseif($persetujuan->status_pemesanan == 1)
                                    <span class="right badge badge-info">Peminjaman</span>
                                @else
                                    <span class="right badge badge-success">Selesai</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url("persetujuan/$persetujuan->id") }}" class="btn btn-info"><span> <i class="fas fa-info"></i></span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Driver</th>
                            <th>Kendaraan</th>
                            <th>Tanggal Ambil</th>
                            <th>Tanggal Kembali</th>
                            <th>Penyetuju 1</th>
                            <th>Penyetuju 2</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        @endcan
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
