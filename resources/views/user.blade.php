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
            <a href="{{ url('user/create') }}" class="btn btn-primary mb-3">Tambah User <span><i class="fa fa-user-plus"></i></span></a>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data User</h3>
                </div>
                <div class="card-body">
                    <table class="table display table-striped dt-responsive nowrap" style="width:100%" id="users_tabel">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->nama_user }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->level == 1)
                                            <i class="bi bi-check-circle-fill text-success"> </i> - 
                                        @else
                                            <i class="bi bi-x-circle"> </i>Admin
                                        
                                    @endif 
                                </td>
                                <td>
                                    @if($user->id_jabatan == 3)
                                        <i class="bi bi-check-circle-fill text-success"> </i> Manager
                                    @elseif($user->id_jabatan == 2)
                                        <i class="bi bi-x-circle"> </i> Supervisor
                                    @else
                                        <i class="bi bi-x-circle"> </i> Staff
                                    @endif 
                                </td>
                                <td>
                                    <a href="{{ url('user/'.$user->id.'/edit') }}" class="btn btn-warning"><span> <i class="fas fa-pencil-alt"></i></span></a>
                                    
                                    <form action="{{ url('user/'.$user->id) }}" method="post" class="d-inline">
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Jabatan</th>
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
