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
        <a href="{{ route('admin.house-info.create') }}" class="btn btn-sm btn-outline-primary float-right mr-1">
            <i class="fa fa-plus"></i> Add New
        </a>
    </div>
    <div class="card-body">

        <div class="row">
            <!-- house information -->
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
            <!-- house details -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>bed_room</th>
                                    <td>:</td>
                                    <td>{{ $houseInfo->houseDetails->bed_room }}</td>
                                </tr>
                                <tr>
                                    <th>wash_room</th>
                                    <td>:</td>
                                    <td>{{ $houseInfo->houseDetails->wash_room }}</td>
                                </tr>
                                <tr>
                                    <th>porches</th>
                                    <td>:</td>
                                    <td>{{ $houseInfo->houseDetails->porches }}</td>
                                </tr>
                                <tr>
                                    <th>drawing_room</th>
                                    <td>:</td>
                                    <td>{{ $houseInfo->houseDetails->drawing_room }}</td>
                                </tr>
                                <tr>
                                    <th>dining_room</th>
                                    <td>:</td>
                                    <td>{{ $houseInfo->houseDetails->dining_room }}</td>
                                </tr>
                                <tr>
                                    <th>store_room</th>
                                    <td>:</td>
                                    <td>{{ $houseInfo->houseDetails->store_room }}</td>
                                </tr>
                                <tr>
                                    <th>rent_amount</th>
                                    <td>:</td>
                                    <td><i class="fb-taka"></i> {{ $houseInfo->houseDetails->rent_amount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- showing image -->
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="form-row">
                            @if ($houseInfo->houseImages)
                                @foreach ($houseInfo->houseImages as $item)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <img src="{{ $item->image }}" class="img-thumbnail" alt="Cinque Terre"
                                                width="304" height="236">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('admin.house-info.edit', $houseInfo->id) }}"
            class="btn btn-sm btn-primary float-right mt-3">Update
            all information</a>
    </div>
</div>
@endsection