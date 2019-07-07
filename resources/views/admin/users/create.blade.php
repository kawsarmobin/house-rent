@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Users</li>
</ol>

<div class="card mx-auto">
    <div class="card-header">Create User
        <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-primary float-right">
            <i class="fa fa-backspace"></i> Back
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.users.store') }}" method="post" autocomplete="off">
            @csrf @method('post')
            <div class="form-group">
                <div class="form-label-group">
                    <select class="form-control select" name="user_role">
                        <option value="">Select User Role</option>
                            @if ($user_roles)
                                @foreach ($user_roles as $key => $user_role)
                                    <option value="{{ $key }}">{{ $user_role }}</option>
                                @endforeach
                            @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                        value="{{ old('name') }}">
                    <label for="name">Name</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email Address"
                        value="{{ old('email') }}">
                    <label for="email">Email Address</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                        value="hr123456">
                    <label for="password">Password</label>
                    <small style="padding-left: 1px"><strong>Default password:</strong> hr123456</small>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4 pr-md-0">
                        <div class="form-label-group">
                            <select class="form-control select" name="user_type">
                                <option value="">Select User Type</option>
                                <option value="1">Admin</option>
                                <option value="0">Regular User</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 pr-md-0">
                        <div class="form-label-group">
                            <select class="form-control select" name="status">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-label-group">
                            <select class="form-control select" name="verify">
                                <option value="">Select Verify</option>
                                <option value="1">Verified</option>
                                <option value="0">Unverified</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>
        </form>
    </div>
</div>
@endsection