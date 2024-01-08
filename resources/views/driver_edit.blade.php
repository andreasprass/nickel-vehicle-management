@extends('layout.general_layout',[
    'title' => 'Driver',
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
                  <h3 class="card-title">Edit Driver</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('driver/'.$driver->id) }}" method="post">
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama_driver" placeholder="Nama" value="{{ $driver->nama_driver }}">
                    </div>
                    <div class="form-group">
                        <label>SIM</label>
                        <select class="form-select" name="sim">
                            <option selected>-- Pilih --</option>
                            @if($driver->sim == 'SIM B')
                                <option value="SIM B" selected>SIM B</option>
                                <option value="SIM A">SIM A</option>
                            @elseif($driver->sim == 'SIM A')
                                <option value="SIM B" >SIM B</option>
                                <option value="SIM A" selected>SIM A</option>
                            @else
                                <option value="SIM B" >SIM B</option>
                                <option value="SIM A" >SIM A</option>
                            @endif
                        </select>
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
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
