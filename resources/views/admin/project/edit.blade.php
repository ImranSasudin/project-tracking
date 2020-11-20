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
        <div class="row">
            <div class="col-sm-5">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Project</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admin.project.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $project->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ $project->name }}" class="form-control" placeholder="Enter name" required>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="type" value="{{ $project->type }}" class="form-control" placeholder="Enter type" required>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" min="{{ date("Y-m-d") }}" value="{{ $project->date }}" class="form-control" placeholder="Enter date" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Client</label>
                                <select name="client" class="form-control select2" required>
                                    @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ $client->id == $project->client_id ? 'selected' : '' }}>{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <a href="javascript: history.go(-1)" class="btn btn-info">Back</a>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-sm-7">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Progress</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admin.project.update.progress') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $project->id }}">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Num.</th>
                                        <th>Description</th>
                                        <th>Percentage (%)</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($progress as $progress)
                                    <tr>
                                        <td>{{ $progress->number }})</td>
                                        <td>{{ $progress->description }}</td>
                                        @if($progress->percentage != null)
                                        <td>{{ $progress->percentage }}</td>
                                        <td><input type="checkbox" id="{{ $progress->id }}" name="checklist[]" value="{{ $progress->id }}" {{ $progress->project_id != null ? 'checked' : '' }}></td>
                                        @else
                                        <td colspan="2" class="bg-secondary"></td>
                                        @endif
                                    </tr>                                   
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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