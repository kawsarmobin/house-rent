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
    <div class="card-header">Add User personal info
        <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-primary float-right">
            <i class="fa fa-backspace"></i> Back
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.user.personal-info.store', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('post')
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="card">
                            <div class="card-body">
                                <p><strong>Name:</strong> {{ $user->name }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="file" name="image" id="image" class="">
                                    <label for="image">Avatar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="Phone number" value="{{ old('phone') }}">
                                    <label for="phone">Phone number</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <select class="form-control select" name="identity_proof_type">
                                        <option value="">Select Identity Proof Type</option>
                                        <option value="1">Passport</option>
                                        <option value="2">Birth Certificate</option>
                                        <option value="0">National ID Card</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="file" name="identity_proof" id="identity_proof" class="form-control">
                                    <label for="identity_proof">Identity proof</label>
                                    <small style="margin-left: 1px">Upload your NID / passport / birth certificate scan copy</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="form-control btn btn-sm btn-outline-secondary float-right mx-3 mt-2">
                    <i class="fa fa-backward"></i> Submit <i class="fa fa-forward"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection