@extends('layout.dashboard_layout',[
    'title' => 'Servis',
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
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Tambah Data Servis</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('servis') }}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tempat Servis</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="tempat_servis" placeholder="Tempat Servis">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Servis</label>
                          <div class="input-group date" id="tanggal_servis" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#tanggal_servis" name="tanggal_servis">
                              <div class="input-group-append" data-target="#tanggal_servis" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                    </div>
                    <div class="form-group">
                        <label>Kendaraan</label>
                        <select class="form-select" name="id_kendaraan">
                            <option></option>
                            @foreach($kendaraans as $kendaraan)
                            <option value="{{ $kendaraan->id }}">{{ $kendaraan->nama_kendaraan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">List Servis</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="list_servis" placeholder="List Servis">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Total Biaya</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="total_biaya_servis" placeholder="Total Biaya Servis">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">KM Servis</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="km_servis_terakhir" placeholder="KM Servis">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">KM Servis Selanjutnya</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="km_servis_selanjutnya" placeholder="KM Servis Selanjutnya">
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <a href="{{ url('servis') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
        </div>
    </div>
        <!-- /.row -->
      <!-- /.content -->
</div>
<!-- /.content-wrapper -->

  
@endsection
