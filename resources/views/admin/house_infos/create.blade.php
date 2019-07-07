@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">House Info</li>
</ol>

<div class="card mx-auto">
    <div class="card-header">Add House Info
        <a href="{{ route('admin.house-info.index') }}" class="btn btn-sm btn-outline-primary float-right">
            <i class="fa fa-backspace"></i> Back
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.house-info.store') }}" method="post">
            @csrf @method('post')
            <div class="form-group">
                <div class="form-label-group">
                    <select class="form-control select" name="landlord">
                        <option value="">Select Landlord</option>
                            @if ($landlords)
                                @foreach ($landlords as $landlord)
                                    <option value="{{ $landlord->id }}">{{ $landlord->name }}</option>
                                @endforeach
                            @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <select class="form-control select" name="house_type">
                        <option value="">Select House Type</option>
                            @if ($housetypes)
                                @foreach ($housetypes as $housetype)
                                    <option value="{{ $housetype->id }}">{{ $housetype->name }}</option>
                                @endforeach
                            @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input type="text" name="title" id="title" class="form-control" placeholder="title"
                        value="{{ old('title') }}">
                    <label for="title">Title</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input type="text" name="house_address" id="house_address" class="form-control" placeholder="house_address"
                        value="{{ old('house_address') }}">
                    <label for="house_address">Address</label>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>
        </form>
    </div>
</div>
@endsection