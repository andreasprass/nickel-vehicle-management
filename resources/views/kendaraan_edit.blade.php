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
            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Edit Kendaraan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('kendaraan/'.$kendaraan->id) }}" method="post">
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Kendaraan</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama_kendaraan" placeholder="Nama Kendaraan" value="{{ $kendaraan->nama_kendaraan }}">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kendaraan</label>
                        <select class="form-select" name="jenis_kendaraan">
                            <option></option>
                            @if($kendaraan->jenis_kendaraan == 'Angkutan Orang')
                            <option value="Angkutan Orang" selected>Angkutan Orang</option>
                            <option value="Angkutan Barang">Angkutan Barang</option>
                            @else
                            <option value="Angkutan Orang" >Angkutan Orang</option>
                            <option value="Angkutan Barang" selected>Angkutan Barang</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Polisi</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="nomor_polisi" placeholder="Nomor Polisi" value="{{ $kendaraan->nomor_polisi }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tahun Pembuatan</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="tahun_pembuatan" placeholder="Tahun Pembuatan" value="{{ $kendaraan->tahun_pembuatan }}">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Beli/Sewa</label>
                          <div class="input-group date" id="tanggal_beli_sewa" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#tanggal_beli_sewa" name="tanggal_beli_sewa" value="{{ $kendaraan->tanggal_beli_sewa }}">
                              <div class="input-group-append" data-target="#tanggal_beli_sewa" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                      </div>
                    <div class="form-group">
                        <label>Status Kendaraan</label>
                        <select class="form-select" name="status_kendaraan">
                            <option></option>
                            @if($kendaraan->status_kendaraan == 1)
                            <option value="1" selected>Hak Milik</option>
                            <option value="2">Sewa</option>
                            @else
                            <option value="1" >Hak Milik</option>
                            <option value="2" selected>Sewa</option>
                            @endif
                        </select>
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <a href="{{ url('kendaraan') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-warning">Submit</button>
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
