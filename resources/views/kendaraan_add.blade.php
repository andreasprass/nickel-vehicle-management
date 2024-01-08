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

    <<!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Tambah Kendaraan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('kendaraan') }}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Kendaraan</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama_kendaraan" placeholder="Nama Kendaraan">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kendaraan</label>
                        <select class="form-select" name="jenis_kendaraan">
                            <option></option>
                            <option value="Angkutan Orang">Angkutan Orang</option>
                            <option value="Angkutan Barang">Angkutan Barang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Polisi</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="nomor_polisi" placeholder="Nomor Polisi">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tahun Pembuatan</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="tahun_pembuatan" placeholder="Tahun Pembuatan">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Beli/Sewa</label>
                          <div class="input-group date" id="tanggal_beli_sewa" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#tanggal_beli_sewa" name="tanggal_beli_sewa">
                              <div class="input-group-append" data-target="#tanggal_beli_sewa" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                      </div>
                    <div class="form-group">
                        <label>Status Kendaraan</label>
                        <select class="form-select" name="status_kendaraan">
                            <option></option>
                            <option value="1">Hak Milik</option>
                            <option value="2">Sewa</option>
                        </select>
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <a href="{{ url('kendaraan') }}" class="btn btn-secondary">Kembali</a>
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
