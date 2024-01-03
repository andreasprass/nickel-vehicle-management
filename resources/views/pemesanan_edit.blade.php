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
            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Edit Pemesanan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('pemesanan') }}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label>Driver</label>
                        <select class="form-select" name="id_driver">
                            <option value="{{ $pemesanan_edit->id_driver}}">{{ $pemesanan_edit->drivers->nama_driver }}</option>
                            <option></option>
                            @foreach($drivers as $driver)
                            @if($driver->id == $pemesanan_edit->id_driver)
                            @continue   
                            @endif
                                <option value="{{ $driver->id }}">{{ $driver->nama_driver}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kendaraan</label>
                        <select class="form-select" name="id_kendaraan">
                            <option>{{ $pemesanan_edit->kendaraans->nama_kendaraan }}</option>
                            <option></option>
                            @foreach($kendaraans as $kendaraan)
                            @if($kendaraan->id == $pemesanan_edit->id_driver)
                            @continue
                            @endif
                            <option value="{{ $kendaraan->id }}">{{ $kendaraan->nama_kendaraan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Keperluan</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="keperluan" placeholder="Keperluan" value="{{ $pemesanan_edit->keperluan }}">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Penggunaan</label>
                          <div class="input-group date" id="waktu_penggunaan" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#waktu_penggunaan" name="waktu_penggunaan" value="{{ $pemesanan_edit->waktu_penggunaan }}">
                              <div class="input-group-append" data-target="#waktu_penggunaan" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                    </div>
                    {{-- <div class="form-group">
                        <label>Tanggal Pengembalian</label>
                          <div class="input-group date" id="waktu_pengembalian" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#waktu_pengembalian" name="waktu_pengembalian">
                              <div class="input-group-append" data-target="#waktu_pengembalian" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                    </div> --}}
                    <div class="form-group">
                        <label>Penyetuju 1</label>
                        <select class="form-select" name="penyetuju1">
                            <option value="{{ $pemesanan_edit->penyetuju1 }}">{{ $pemesanan_edit->users1->nama_user }}</option>
                            <option></option>
                            @foreach($users as $user)
                            @if($user->level == 2 || $user->id == $pemesanan_edit->penyetuju1)
                            @continue
                            @endif
                            <option value="{{ $user->id }}">{{ $user->nama_user }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Penyetuju 2</label>
                        <select class="form-select" name="penyetuju2">
                            <option value="{{ $pemesanan_edit->penyetuju1 }}">{{ $pemesanan_edit->users2->nama_user }}</option>
                            <option></option>
                            @foreach($users as $user)
                            @if($user->level == 2 || $user->id == $pemesanan_edit->penyetuju2)
                            @continue
                            @endif
                            <option value="{{ $user->id }}">{{ $user->nama_user }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">KM Awal</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="km_awal" placeholder="KM Awal" value="{{ $pemesanan_edit->km_awal }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Admin</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" disabled value="{{ $pemesanan_edit->admin->nama_user }}" >
                        <input type="hidden" class="form-control" id="exampleInputEmail1" name="id_user" value="{{ $pemesanan_edit->id_user}}" >
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <a href="{{ url('pemesanan') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-warning">Save</button>
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
