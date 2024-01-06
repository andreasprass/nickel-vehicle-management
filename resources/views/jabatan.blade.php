@extends('layout.dashboard_layout',[
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

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <a href="{{ url('jabatan/create') }}" class="btn btn-primary mb-3">Tambah Data Jabatan <span><i class="	fa fa-id-badge"></i></span></a>
            <a href="{{ route('pilih_kepala_pool') }}" class="btn btn-info mb-3">Pilih Jabatan Sebagai Kepala Pengelola Pool <span><i class="	fa fa-id-badge"></i></span></a>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Jabatan</h3>
                </div>
                <div class="card-body">
                    <table class="table display table-striped dt-responsive nowrap" style="width:100%" id="users_tabel">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jabatan</th>
                                <th>Pengelola Pool</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jabatans as $jabatan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jabatan->nama_jabatan }}</td>
                                <td>
                                    @if($jabatan->kepala_pool == 0)
                                    -
                                    @else
                                        <span class="right badge badge-info">Pengelola Pool</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url("jabatan/$jabatan->id/edit") }}" class="btn btn-warning"><span> <i class="fas fa-pencil-alt"></i></span></a>
                                    
                                    <form action="{{ url("jabatan/$jabatan->id") }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span><i class="fas fa-trash"></i></span></button>
                                    </form>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Jabatan</th>
                                <th>Pengelola Pool</th>
                                <th>Action</th>
                            </tr>
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
