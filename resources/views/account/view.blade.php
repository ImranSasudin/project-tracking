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
                    <li class="breadcrumb-item active">View Account</li>
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
                <div class="col-6">
                    <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    {{ Session::get( 'success' ) }}
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">View Account</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="" method="">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" name="phone" class="form-control" value="{{ $user->phone }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" name="address" readonly>{{ $user->address }}</textarea>
                                    </div>
                                </div>
                                @if (Auth::user()->role == 'client')
                                    <div class="form-group">
                                            <label>Company</label>
                                            <input type="text" name="company" class="form-control" value="{{ $user->company }}"  readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('account.edit') }}" class="btn btn-primary">Update</a>
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