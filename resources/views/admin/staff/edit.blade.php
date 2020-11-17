@extends('admin.layout.nav')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Staff</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">User Management</a></li>
                    <li class="breadcrumb-item active">Staff</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Staff</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admin.staff.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $staff->id }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ $staff->name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{ $staff->email }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" name="phone" class="form-control" placeholder="Enter phone number" value="{{ $staff->phone }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" name="address" placeholder="Enter address" required>{{ $staff->address }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="role" class="form-control" required>
                                            <option value="staff" {{ $staff->role == 'staff' ? 'selected' : '' }}>Staff</option>
                                            <option value="admin" {{ $staff->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group " id="manager" style="display:none;">
                                        <label for="exampleInputPassword1">Manager</label>
                                        <select name="manager" class="form-control select2" required>
                                            @if($staff->user()->first() == null)
                                            <option value="" disabled selected>-- Please Select --</option>
                                            @endif
                                            @foreach($admins as $admin)
                                            <option value="{{ $admin->id }}" {{ $staff->user()->first() != null && $staff->user()->first()->id == $admin->id ? 'selected' : '' }}>{{ $admin->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
@section('navbar')
$("#user").parent().addClass("menu-open");
$("#user").addClass("active");
$("#staff").addClass("active");
$(document).ready(function() {
    var input_manager = $("select[name='manager']");
    if($("select[name='role']").val() == "staff"){
        $('#manager').show();
        input_manager.attr('required', 'required');
    } else if($("select[name='role']").val() == "admin"){
        $('#manager').hide();
        input_manager.removeAttr('required');
    }
});
$("select[name='role']").on('change', function(){
    var input_manager = $("select[name='manager']");
    if($("select[name='role']").val() == "staff"){
        $('#manager').show();
        input_manager.attr('required', 'required');
    } else if($("select[name='role']").val() == "admin"){
        $('#manager').hide();
        input_manager.removeAttr('required');
    }
});

@endsection