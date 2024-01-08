@extends('layout.general_layout',[
    'title' => 'Persetujuan',
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
        </div>
    </div>
        <!-- /.row -->
      <!-- /.content -->
</div>
<!-- /.content-wrapper -->

  
@endsection
