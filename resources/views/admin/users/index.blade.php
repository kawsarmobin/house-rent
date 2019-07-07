@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Users</li>
</ol>

<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i> All User
    <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-outline-primary float-right"><i
        class="fa fa-plus"></i> Add New</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>User Role</th>
            <th>Permissions</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>User Role</th>
            <th>Permissions</th>
            <th>Actions</th>
          </tr>
        </tfoot>
        <tbody>
          @if ($users)
          @foreach ($users as $key => $user)
          <tr>
            <th scope="row">{{ ++$key }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->user_role_type }}</td>
            <td>
              <span class="badge badge-secondary">{{ $user->user_status }}</span> | <span class="badge badge-secondary">{{ $user->admin_or_not }}</span> | <span class="badge badge-secondary">{{ $user->verified }}</span>
            </td>
            <td>
              <!-- user permission -->
              @if (auth()->user()->id !== $user->id)
              <a href="{{ route('user.permissions.status', $user->id) }}" class="badge {{ $user->status ? 'badge-danger' : 'badge-success' }}">
                  {{ $user->status ? 'Deactive' : 'Active' }}</a> |
                <a href="{{ route('user.permissions.admin-or-not', $user->id) }}" class="badge {{ $user->is_admin ? 'badge-danger' : 'badge-success' }}">
                  {{ $user->is_admin ? 'Remove Admin' : 'Make Admin' }}</a> |
                <a href="{{ route('user.permissions.verified', $user->id) }}" class="badge {{ $user->is_verified ? 'badge-danger' : 'badge-success' }}">
                  {{ $user->is_verified ? 'Unverified' : 'Verified' }}</a>
              @else
              <span class="text-danger">Unauthorized</span>
              @endif 
              <hr>
              <!-- user edit -->
              <a href="{{ route('admin.users.edit', $user->id) }}" class="badge badge-primary">
                <i class="fa fa-edit"></i>
              </a> |
              <!-- user view all data -->
              <a href="{{ route('admin.user.personal-info.index', $user->id) }}" class="badge badge-info"><i class="fa fa-eye"></i></a> |
              <!-- user destroy -->
              @include('includes._confirm_delete',[
                'action' => route('admin.users.destroy', $user->id),
                'id' => $user->id
              ])
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated {{ $tableUpdate->isoFormat('LLLL') }}</div>
</div>
@endsection