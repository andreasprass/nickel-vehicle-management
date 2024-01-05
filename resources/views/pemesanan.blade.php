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
            <a href="{{ url('pemesanan/create') }}" class="btn btn-primary mb-3">Tambah Data Pemesanan <span><i class="fa fa-clipboard"></i></span></a>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Pemesanan</h3>
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
                            @foreach ($pemesanans as $pemesanan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pemesanan->drivers->nama_driver }}</td>
                                <td>{{ $pemesanan->kendaraans->nama_kendaraan }}</td>
                                <td>{{ $pemesanan->waktu_penggunaan }}</td>
                                <td>{{ $pemesanan->waktu_pengembalian }}</td>
                                <td>
                                    @if($pemesanan->status_persetujuan1 == 0)
                                        <span class="right badge badge-warning">Menunggu</span>
                                    @else
                                        <span class="right badge badge-success">Disetujui</span>
                                    @endif
                                </td>
                                <td>
                                    @if($pemesanan->status_persetujuan2 == 0)
                                        <span class="right badge badge-warning">Menunggu</span>
                                    @else
                                        <span class="right badge badge-success">Disetujui</span>
                                    @endif
                                </td>
                                <td>
                                    @if($pemesanan->status_pemesanan == 0)
                                        <span class="right badge badge-warning">Menunggu</span>
                                    @elseif($pemesanan->status_pemesanan == 1)
                                        <span class="right badge badge-info">Peminjaman</span>
                                    @else
                                        <span class="right badge badge-success">Selesai</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url("pemesanan/$pemesanan->id") }}" class="btn btn-info"><span> <i class="fas fa-info"></i></span></a>
                                    <a href="{{ url("pemesanan/$pemesanan->id/edit") }}" class="btn btn-warning"><span> <i class="fas fa-pencil-alt"></i></span></a>
                                    
                                    <form action="{{ url("pemesanan/$pemesanan->id") }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span><i class="fas fa-trash"></i></span></button>
                                    </form>
                                    
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
