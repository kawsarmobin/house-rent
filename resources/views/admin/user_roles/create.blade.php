@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">User Role</li>
</ol>

<div class="card mx-auto">
    <div class="card-header">Create User Role
        <a href="{{ route('admin.user-role.index') }}" class="btn btn-sm btn-outline-primary float-right">
            <i class="fa fa-backspace"></i> Back
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.user-role.store') }}" method="post">
            @csrf @method('post')
            <div class="form-group">
                <div class="form-label-group">
                    <input type="text" name="user_role" id="user_role" class="form-control" placeholder="User role"
                        value="{{ old('user_role') }}">
                    <label for="user_role">User Role</label>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>
        </form>
    </div>
</div>
@endsection