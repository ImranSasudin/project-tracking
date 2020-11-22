@extends('client.layout.nav')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Progress</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Progress</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col -->
            <div class="col-sm-7">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">View Progress</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Num.</th>
                                    <th>Description</th>
                                    <th>Percentage ({{ floatval(number_format($project->countProgress(), 2)) }}%)</th>
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
                                    <td>{!! $progress->project_id != null ? '<i style="color: green;" class="fas fa-check-circle"></i>' : '' !!}</td>
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
                        <a href="javascript: history.go(-1)" class="btn btn-info">Back</a>
                    </div>
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