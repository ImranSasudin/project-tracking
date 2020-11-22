@extends('staff.layout.nav')
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
                <!-- Card -->
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Task</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Project</th>
                                    <th>Task</th>
                                    <th>Description</th>               
                                    <th>Assigned By</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->project()->first()->name }}</td>
                                    <td>{{ $task->taskType()->first()->name }}</td>
                                    <td>
                                        {{ $task->description }} <br><br>
                                        <b>File Attached</b> : <a target="_blank" href="{{ '/storage/'.$task->file_path }}">{{ $task->file_name }}</a>
                                    </td>
                                    <td style="text-transform: capitalize;">{{ $task->user_assignBy()->first()->name }}</td>
                                    <td>{{ $task->status }}</td>
                                    <td>
                                        <a href="{{ route('staff.task.edit', $task->id) }}"><i style="color: Dodgerblue;" class="far fa-edit"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Project</th>
                                    <th>Task</th>
                                    <th>Description</th>               
                                    <th>Assigned By</th>
                                    <th>Status</th>
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
$("#task").addClass("active");
@endsection