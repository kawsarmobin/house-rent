@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">User personal info</li>
</ol>

<div class="card mx-auto">
    <div class="card-header"><i class="fas fa-eye"></i> View your all personal info
        <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-primary float-right">
            <i class="fa fa-backspace"></i> Back
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="text-center">
                    <div class="card">
                        <div class="card-body">
                            <p><strong>Name:</strong> {{ $user->name }}</p>
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            @if ($upis)
                                @foreach ($upis as $upi)
                                <p><strong>Phone number:</strong> {{ $upi->phone ? $upi->phone : 'No data available' }}</p>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card mt-3 mb-3">
                    <div class="card-body">
                        <span><strong>Permissions:</strong></span>
                        <span class="badge badge-secondary">{{ $user->user_status }}</span> | 
                        <span class="badge badge-secondary">{{ $user->admin_or_not }}</span> | 
                        <span class="badge badge-secondary">{{ $user->verified }}</span>
                        <hr>
                        <p class="text-center"><strong>User role:</strong> {{ $user->user_role->type_of_user }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-center mb-3">
                            <div class="card-body">
                                @if ($upis)
                                    @foreach ($upis as $upi)
                                        <img class="img-thumbnail" src="{{ $upi->image ? $upi->image : '' }}" alt="{{ $upi->image ? $upi->image : 'No data available' }}" >
                                    @endforeach
                                @endif
                                <p>Avatar</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card text-center">
                            <div class="card-body">
                                    @if ($upis)
                                    @foreach ($upis as $upi)
                                    <img class="img-thumbnail" src="{{ $upi->identity_proof ? $upi->identity_proof : '' }}" alt="{{ $upi->identity_proof ? $upi->identity_proof : 'No data available' }}">
                                    <p>{{ $upi->identity_scan ? $upi->identity_scan : '' }}</p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.user.personal-info.create', $user->id) }}" class="form-control btn btn-sm btn-outline-secondary float-right mx-3 mt-2">
                <i class="fa fa-backward"></i> Update Information <i class="fa fa-forward"></i>
            </a>
        </div>
    </div>
</div>
@endsection