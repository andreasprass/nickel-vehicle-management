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
            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Edit Data Servis</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('service/'.$service->id) }}" method="post">
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tempat Servis</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="tempat_servis" placeholder="Tempat Servis" value="{{ $service->tempat_servis }}">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Servis</label>
                          <div class="input-group date" id="tanggal_servis" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-targ1et="#tanggal_servis" name="tanggal_servis" value="{{ $service->tanggal_servis }}">
                              <div class="input-group-append" data-target="#tanggal_servis" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                    </div>
                    <div class="form-group">
                        <label>Kendaraan</label>
                        <select class="form-select" name="id_kendaraan">
                            <option value="{{ $service->id_kendaraan }}">{{ $service->id_kendaraan }}</option>
                            <option></option>
                            @foreach($kendaraans as $kendaraan)
                            @if($kendaraan->id == $service->id_kendaraan)
                            @continue
                            @endif
                            <option value="{{ $kendaraan->id }}">{{ $kendaraan->nama_kendaraan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">List Servis</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="list_servis" placeholder="List Servis" value="{{ $service->list_servis }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Total Biaya</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="total_biaya_servis" placeholder="Total Biaya Servis" value="{{ $service->total_biaya_servis }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">KM Servis</label>
                        {{-- KM Servis Pada Saat Servis --}}
                        <input type="text" class="form-control" id="exampleInputEmail1" name="km_servis_terakhir" placeholder="KM Servis" value="{{ $service->km_servis_terakhir }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">KM Servis Selanjutnya</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="km_servis_selanjutnya" placeholder="KM Servis Selanjutnya" value="{{ $service->km_servis_selanjutnya }}">
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <a href="{{ url('service') }}" class="btn btn-secondary">Kembali</a>
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
