@extends(Auth::user()->role == 'admin' ? 'admin.layout.nav' : (Auth::user()->role == 'staff' ? 'staff.layout.nav' : 'client.layout.nav'))
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Account Info</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Update Account</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Account</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('account.update') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ $user->name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{ $user->email }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" name="phone" class="form-control" placeholder="Enter phone number" value="{{ $user->phone }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" name="address" placeholder="Enter address" required>{{ $user->address }}</textarea>
                                    </div>
                                </div>
                                @if (Auth::user()->role == 'client')
                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" name="company" class="form-control" placeholder="Enter company name" value="{{ $user->company }}" required>
                                </div>
                                @endif
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
            <div class="col-sm-5">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Password</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('account.update.password') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Current Password</label>
                                <input type="password" name="currentPass" class="form-control" placeholder="Enter current password" required>
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="newPass" class="form-control" placeholder="Enter new password" required>
                            </div>
                            <div class="form-group">
                                <label>Re-enter New password</label>
                                <input type="password" name="reNewPass" class="form-control" placeholder="Re-enter new password" required>
                            </div>
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