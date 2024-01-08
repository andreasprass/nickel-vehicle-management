@extends('layout.general_layout',[
    'title' => 'Kendaraan',
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
            <a href="{{ url('kendaraan/create') }}" class="btn btn-primary mb-3">Tambah Data Kendaraan <span><i class="fa fa-car"></i></span></a>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Kendaraan</h3>
                </div>
                <div class="card-body">
                    <table class="table display table-striped dt-responsive nowrap" style="width:100%" id="users_tabel">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Nopol</th>
                                <th>Tahun</th>
                                <th>Tanggal Beli/Sewa</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kendaraans as $kendaraan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kendaraan->nama_kendaraan }}</td>
                                <td>{{ $kendaraan->jenis_kendaraan }}</td>
                                <td>{{ $kendaraan->nomor_polisi }}</td>
                                <td>{{ $kendaraan->tahun_pembuatan }}</td>
                                <td>{{ $kendaraan->tanggal_beli_sewa }}</td>
                                <td>
                                    @if($kendaraan->status_kendaraan == 1)
                                    Hak Milik
                                    @else
                                    Sewa
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url("kendaraan/$kendaraan->id/edit") }}" class="btn btn-warning"><span> <i class="fas fa-pencil-alt"></i></span></a>
                                    
                                    <form action="{{ url("kendaraan/$kendaraan->id") }}" method="post" class="d-inline">
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
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Nopol</th>
                                <th>Tahun</th>
                                <th>Tanggal Beli/Sewa</th>
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
