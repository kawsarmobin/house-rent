@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">User Role</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i> User Roles
        <a href="{{ route('admin.user-role.create') }}" class="btn btn-sm btn-outline-primary float-right"><i
            class="fa fa-plus"></i> Add New</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if ($userRoles)
                    @foreach ($userRoles as $key => $userRole)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $userRole->type_of_user }}</td>
                        <td>
                            @include('includes.user_role_edit',[
                            'action' => route('admin.user-role.update', $userRole->id),
                            'id' => $userRole->id,
                            'userRole' => $userRole->type_of_user,
                            ])

                            @include('includes._confirm_delete',[
                            'action' => route('admin.user-role.destroy', $userRole->id),
                            'id' => $userRole->id
                            ])
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
@endsection