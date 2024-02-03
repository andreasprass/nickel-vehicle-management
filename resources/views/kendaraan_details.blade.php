@extends('layout.kendaraan_layout',[
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
            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail Kendaraan</h3>
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
                            <div class="form-group">
                                <label>Kendaraan</label>
                                <h5>{{ $kendaraan->nama_kendaraan }}</h5>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kendaraan</label>
                                <h5>{{ $kendaraan->jenis_kendaraan }}</h5>
                            </div>
                            <div class="form-group">
                                <label>Nomor Polisi</label>
                                <h5>{{ $kendaraan->nomor_polisi }}</h5>
                            </div>
                            <div class="form-group">
                                <label>Tahun Pembuatan</label>
                                <h5>{{ $kendaraan->tahun_pembuatan }}</h5>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Beli/Sewa</label>
                                <h5>{{ $kendaraan->tanggal_beli_sewa }}</h5>
                            </div>
                            <div class="form-group">
                                <label>Status Kendaraan</label>
                                @if($kendaraan->status_kendaraan == null)
                                <h5> - </h5>
                                @elseif( $kendaraan->status_kendaraan == 2)
                                <h5>Sewa</h5>
                                @else
                                <h5>Hak Milik</h5>
                                @endif
                            </div>
                            <div class="form-group">
                              <label>Status Servis</label>
                              <h5 class="badge badge-{{ $status_servis_color }} d-block w-25">{{ $status_servis }}</h5>
                            </div>
                        </div>   
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Statistik Penggunaan Kendaraan</h3>
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
                          <div id="stats-penggunaan-kendaraan"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

        </div>
    </div>
        <!-- /.row -->
      <!-- /.content -->
</div>
<!-- /.content-wrapper -->

  
@endsection
