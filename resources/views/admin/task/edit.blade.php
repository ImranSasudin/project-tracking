@extends('admin.layout.nav')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Task</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Task</li>
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
                        <h3 class="card-title">Update Task</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admin.task.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $task->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Project</label>
                                <input type="text"  class="form-control" value="{{ $task->project()->first()->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Task Type</label>
                                <input type="text"  class="form-control" value="{{ $task->taskType()->first()->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Staff</label>
                                <input type="text"  class="form-control" value="{{ $task->user()->first()->name }}" readonly>                            
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" placeholder="Enter task description" required>{{ $task->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>File</label>
                                <input type="text" name="file_name" class="form-control mb-1" value="{{ $task->file_name }}" placeholder="Enter file name" required>
                                <input type="file" name="file" class="form-control-file" id="customFile">
                            </div>
                        </div> <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <a href="javascript: history.go(-1)" class="btn btn-info">Back</a>
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
$("#task").addClass("active");
@endsection