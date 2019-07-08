@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">House Information</li>
</ol>

<div class="card mx-auto">
    <div class="card-header">Show All House Information
        <a href="{{ route('admin.house-info.index') }}" class="btn btn-sm btn-outline-primary float-right">
            <i class="fa fa-backspace"></i> Back
        </a>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>Landlord</th>
                                    <td>:</td>
                                    <td>{{ $houseInfo->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td>:</td>
                                    <td>{{ $houseInfo->houseType->name }}</td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td>:</td>
                                    <td>{{ $houseInfo->title }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>:</td>
                                    <td>{{ $houseInfo->house_address }}</td>
                                </tr>
                                <tr>
                                    <th>Approval</th>
                                    <td>:</td>
                                    <td>{{ $houseInfo->approval }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body"></div>
                </div>
            </div>
        </div>

        <a href="{{ route('admin.house-info.edit', $houseInfo->id) }}" class="btn btn-sm btn-primary float-right">Update all information</a>
    </div>
</div>
@endsection