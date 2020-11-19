@extends('admin.layout.nav')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Project</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Project</li>
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
                <a role="button" href="{{ route('admin.project.create') }}" class="btn bg-gradient-primary text-white">Add New</a>
                <!-- Card -->
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Project</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Client</th>
                                    <th>Progress</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->type }}</td>
                                    <td>{{ $project->formattedDate() }}</td>
                                    <td style="text-transform: capitalize;">{{ $project->user()->first()->name }}</td>
                                    <td>
                                        <div class="progress border">
                                            <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="{{ number_format($project->countProgress(), 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ number_format($project->countProgress(), 2) }}%;">
                                            {{ floatval(number_format($project->countProgress(), 2)) }} % 
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.project.edit', $project->id) }}"><i style="color: Dodgerblue;" class="far fa-edit"></i></a>
                                        <a class="ml-2" href="{{ route('admin.project.delete', $project->id) }}" onclick="return confirm('Confirm to delete?')"><i style="color: tomato;" class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Client</th>
                                    <th>Progress</th>
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
$("#project").addClass("active");
@endsection