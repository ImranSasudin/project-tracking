@extends('staff.layout.nav')
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
                        <h3 class="card-title">View Project</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('client.project.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $project->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ $project->name }}" class="form-control" placeholder="Enter name" readonly>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="type" value="{{ $project->type }}" class="form-control" placeholder="Enter type" readonly>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" min="{{ date("Y-m-d") }}" value="{{ $project->date }}" class="form-control" placeholder="Enter date" readonly>
                            </div>
                            <div class="form-group">
                                <label>Client Name</label>
                                <input type="text" name="client_name" value="{{ $project->user()->first()->name }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Company</label>
                                <input type="text" name="company" value="{{ $project->user()->first()->company }}" class="form-control" readonly>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        </div>
                    </form>
                </div>
                <a href="javascript: history.go(-1)" class="btn btn-info">Back</a>
                <!-- /.card -->
            </div>
            <div class="col-sm-5">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Project Documents</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('staff.project.file.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $project->id }}">
                        <div class="card-body">
                            <ol>
                                @foreach($files as $file)
                                <li><a href="{{ '/storage/'.$file->file_path }}" target="_blank">{{ $file->file_name }}<a/></li>
                                @endforeach
                            </ol>
                            <div class="form-group">
                                <label>Upload Document</label>
                                <input type="text" name="file_name" class="form-control mb-1" placeholder="Enter file name" required>
                                <input type="file" name="file" class="form-control-file" id="customFile" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
@section('navbar')
$("#project").addClass("active");
@endsection