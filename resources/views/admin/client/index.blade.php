@extends('admin.layout.nav')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Client</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">User Management</a></li>
                    <li class="breadcrumb-item active">Client</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @if( Session::has( 'success' ))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  {{ Session::get( 'success' ) }}
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
            
     
     
            <a role="button" href="{{ route('admin.client.create') }}" class="btn bg-gradient-primary text-white">Add New</a>
                <!-- Card -->
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Client</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->company }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>{{ $client->address }}</td>
                                    <td>
                                        <a href="{{ route('admin.client.edit', $client->id) }}"><i style="color: Dodgerblue;" class="far fa-edit"></i></a>
                                        <a class="ml-2" href="{{ route('admin.client.delete', $client->id) }}" onclick="return confirm('Confirm to delete?')"><i style="color: tomato;" class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Company</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
@section('navbar')
$("#user").parent().addClass("menu-open");
$("#user").addClass("active");
$("#client").addClass("active");
@endsection