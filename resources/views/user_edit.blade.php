@extends('layout.dashboard_layout',[
    'title' => 'User',
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
                  <h3 class="card-title">Edit User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('update_user') }}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama_user" placeholder="Nama" value="{{ $user->nama_user }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email" value="{{ $user->email }}">
                      </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" value="{{ $user->password }}">
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-select" name="level">
                            @if($user->level == 2)
                                <option>-- Pilih --</option>
                                <option value="2" selected>Admin</option>
                                <option value="1">Staff</option>
                            @elseif($user->level == 1)
                                <option>-- Pilih --</option>
                                <option value="2" >Admin</option>
                                <option value="1" selected>Staff</option>
                            @else
                                <option>-- Pilih --</option>
                                <option value="2">Admin</option>
                                <option value="1">Staff</option>
                            @endif

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select class="form-select" name="id_jabatan">
                            @if($user->id_jabatan == 2)
                                <option>-- Pilih --</option>
                                <option value="2" selected>Manager</option>
                                <option value="1">Supervisor</option>
                            @elseif($user->id_jabatan == 1)
                                <option>-- Pilih --</option>
                                <option value="2">Manager</option>
                                <option value="1" selected>Supervisor</option>
                            @else
                                <option>-- Pilih --</option>
                                <option value="2">Manager</option>
                                <option value="1">Supervisor</option>
                            @endif
                        </select>
                      </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <a href="{{ route('user') }}" class="btn btn-secondary">Kembali</a>
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
