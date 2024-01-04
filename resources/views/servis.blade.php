@extends('layout.dashboard_layout',[
    'title' => 'Servis Kendaraan',
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
            <a href="{{ url('service/create') }}" class="btn btn-primary mb-3">Tambah Data Servis <span><i class="fa fa-cogs"></i></span></a>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Servis</h3>
                </div>
                <div class="card-body">
                    <table class="table display table-striped dt-responsive nowrap" style="width:100%" id="users_tabel">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tempat Servis</th>
                                <th>Kendaraan</th>
                                <th>Tanggal</th>
                                <th>Total Biaya</th>
                                <th>KM Terakhir</th>
                                <th>KM Selanjutnya</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $service->tempat_servis }}</td>
                                <td>{{ $service->kendaraans->nama_kendaraan }}</td>
                                <td>{{ $service->tanggal_servis }}</td>
                                <td>{{ $service->total_biaya_servis }}</td>
                                <td>{{ $service->km_servis_terakhir }}</td>
                                <td>{{ $service->km_servis_selanjutnya }}</td>
                                <td>
                                    <a href="{{ url("service/$service->id") }}" class="btn btn-info"><span> <i class="fas fa-info"></i></span></a>
                                    <a href="{{ url("service/$service->id/edit") }}" class="btn btn-warning"><span> <i class="fas fa-pencil-alt"></i></span></a>
                                    <form action="{{ url('service/'.$service->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus ini?')"><span><i class="fas fa-trash"></i></span></button>
                                    </form>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tempat Servis</th>
                                <th>Kendaraan</th>
                                <th>Tanggal</th>
                                <th>Total Biaya</th>
                                <th>KM Terakhir</th>
                                <th>KM Selanjutnya</th>
                                <th>Action</th>
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
