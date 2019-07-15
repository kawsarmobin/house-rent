@extends('layouts.admin')

@section('content')

<style>
    .table-less-p tbody tr th,
    .table-less-p tbody tr td {
        padding: 5px !important;
    }
</style>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">House Information</li>
</ol>

<div class="card mx-auto">
    <div class="card-header bg-dark text-white">Show All House Information
        <a href="{{ route('admin.house-info.index') }}" class="btn btn-sm btn-outline-light float-right">
            <i class="fa fa-backspace"></i> Back
        </a>
        <a href="{{ route('admin.house-info.create') }}" class="btn btn-sm btn-outline-light float-right mr-1">
            <i class="fa fa-plus"></i> Add New
        </a>
    </div>
    <div class="card-body">

        <div class="row">
            <!-- house information -->
            <div class="col-md-6 mb-3">
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
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-borderless table-less-p">
                            <tbody>
                                <tr>
                                    <th>Bed Room</th>
                                    <td>:</td>
                                    <td>{{ $houseInfo->houseDetails->bed_room }}</td>
                                </tr>
                                <tr>
                                    <th>Wash Room</th>
                                    <td>:</td>
                                    <td>{{ $houseInfo->houseDetails->wash_room }}</td>
                                </tr>
                                <tr>
                                    <th>Porches</th>
                                    <td>:</td>
                                    <td>{{ $houseInfo->houseDetails->porches }}</td>
                                </tr>
                                <tr>
                                    <th>Drawing Room</th>
                                    <td>:</td>
                                    <td>{{ $houseInfo->houseDetails->drawing_room }}</td>
                                </tr>
                                <tr>
                                    <th>Dining Room</th>
                                    <td>:</td>
                                    <td>{{ $houseInfo->houseDetails->dining_room }}</td>
                                </tr>
                                <tr>
                                    <th>Store Room</th>
                                    <td>:</td>
                                    <td>{{ $houseInfo->houseDetails->store_room }}</td>
                                </tr>
                                <tr>
                                    <th>Rent Amount</th>
                                    <td>:</td>
                                    <td><i class="fb-taka"></i> {{ $houseInfo->houseDetails->rent_amount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- show house location -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white"> Location</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6" style="border-right: 1px solid silver">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th>Country</th>
                                            <td>:</td>
                                            <td>{{ $houseInfo->houseLocation->country->country }}</td>
                                        </tr>
                                        <tr>
                                            <th>City</th>
                                            <td>:</td>
                                            <td>{{ $houseInfo->houseLocation->city->city }}</td>
                                        </tr>
                                        <tr>
                                            <th>Village</th>
                                            <td>:</td>
                                            <td>{{ $houseInfo->houseLocation->village->village }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tbody>

                                        <tr>
                                            <th>Division</th>
                                            <td>:</td>
                                            <td>{{ $houseInfo->houseLocation->division->division }}</td>
                                        </tr>

                                        <tr>
                                            <th>Police Station</th>
                                            <td>:</td>
                                            <td>{{ $houseInfo->houseLocation->policeStation->police_station }}</td>
                                        </tr>

                                        <tr>
                                            <th>Word</th>
                                            <td>:</td>
                                            <td>{{ $houseInfo->houseLocation->word->word }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- showing image -->
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="form-row">
                            @if ($houseInfo->houseImages)
                            @foreach ($houseInfo->houseImages as $image)
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <img src="{{ $image->thumb }}" class="img-thumbnail zoom"
                                            alt="{{ $image->image }}">
                                        <!-- delete one by one image -->
                                        @include('includes._confirm_delete',[
                                        'action' => route('admin.house.image.destroy', [$houseInfo->id, $image->id]),
                                        'id' => $image->id
                                        ])
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <!-- add more image -->
                        <a href="{{ route('admin.house.image.create', $houseInfo->id) }}"
                            class="btn btn-sm btn-outline-primary">Add more image</a>
                    </div>
                </div>
            </div>
        </div>

        <a class="btn btn-sm btn-outline-primary float-right mt-3"
            href="{{ route('admin.house-info.edit', $houseInfo->id) }}"> Update all information
        </a>
    </div>
</div>

@endsection