@extends('layout.dashboard_layout',[
    'title' => 'Jabatan',
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
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Pilih Jabatan Kepala Pool</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('simpan_kepala_pool') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                        <label>Pilih Jabatan</label>
                        <select class="form-select" name="id">
                            <option value="{{ $jabatan_pengelola_pool->id }}">{{ $jabatan_pengelola_pool->nama_jabatan }}</option>  
                            <hr>
                            @foreach($jabatans as $jabatan)
                            @if($jabatan->id == $jabatan_pengelola_pool->id  )
                             @continue
                            @endif
                            <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <a href="{{ url('jabatan') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-info">Submit</button>
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
