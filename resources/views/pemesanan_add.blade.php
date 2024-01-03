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
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Tambah Pemesanan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('pemesanan') }}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label>Driver</label>
                        <select class="form-select" name="id_driver">
                            <option></option>
                            @foreach($drivers as $driver)
                            <option value="{{ $driver->id }}">{{ $driver->nama_driver }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kendaraan</label>
                        <select class="form-select" name="id_kendaraan">
                            <option></option>
                            @foreach($kendaraans as $kendaraan)
                            <option value="{{ $kendaraan->id }}">{{ $kendaraan->nama_kendaraan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Keperluan</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="keperluan" placeholder="Keperluan">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Penggunaan</label>
                          <div class="input-group date" id="waktu_penggunaan" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#waktu_penggunaan" name="waktu_penggunaan">
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
                            <option></option>
                            @foreach($users as $user)
                            @if($user->level == 2)
                            @continue
                            @endif
                            <option value="{{ $user->id }}">{{ $user->nama_user }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Penyetuju 2</label>
                        <select class="form-select" name="penyetuju2">
                            <option></option>
                            @foreach($users as $user)
                            @if($user->level == 2)
                            @continue
                            @endif
                            <option value="{{ $user->id }}">{{ $user->nama_user }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">KM Awal</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="km_awal" placeholder="KM Awal">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Admin</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" disabled value="{{ Auth::user()->nama_user }}" >
                        <input type="hidden" class="form-control" id="exampleInputEmail1" name="id_user" value="{{ Auth::user()->id }}" >
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
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
