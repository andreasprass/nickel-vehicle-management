@extends('layout.general_layout',[
    'title' => 'Cari Pemesanan',
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
                    <h3 class="card-title">Cari Data Pemesanan Telah Selesai</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('cari_data') }}" id="cariDataPemesanan" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Tanggal Mulai</label>
                                <div class="input-group date" id="waktu_penggunaan" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#waktu_penggunaan" name="waktu_penggunaan">
                                    <div class="input-group-append" data-target="#waktu_penggunaan" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label>Tanggal Selesai</label>
                                <div class="input-group date" id="waktu_pengembalian" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#waktu_pengembalian" name="waktu_pengembalian">
                                    <div class="input-group-append" data-target="#waktu_pengembalian" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <a href="{{ url("cari-pemesanan") }}" class="btn btn-secondary col-12"><span>Reset</span></a>
                            </div>
                            <div class="form-group col-6">
                                <button type="submit" class="btn btn-primary col-12">Cari Data Pemesanan  <i class="nav-icon fa fa-search"></i></button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Pemesanan</h3>
                </div>
                <div class="card-body">
                    <table class="table display table-striped dt-responsive nowrap" style="width:100%" id="cari_data">
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
        {{-- Container fluid --}}
    </div>
        <!-- /.row -->
      <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection