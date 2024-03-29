@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">House Info</li>
</ol>

<div class="card mb-3">
    <div class="card-header bg-dark text-white">
        <i class="fas fa-warehouse"></i> House Info
        <a href="{{ route('admin.house-info.create') }}" class="btn btn-sm btn-outline-light float-right"><i
            class="fa fa-plus"></i> Add New</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Landlord</th>
                        <th>House Type</th>
                        <th>Title</th>
                        <th>House Address</th>
                        <th>Approval</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Landlord</th>
                        <th>House Type</th>
                        <th>Title</th>
                        <th>House Address</th>
                        <th>Approval</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if ($houseInfos)
                    @foreach ($houseInfos as $key => $houseInfo)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $houseInfo->user->name }}</td>
                        <td>{{ $houseInfo->houseType->name }}</td>
                        <td>{{ $houseInfo->title }}</td>
                        <td>{{ $houseInfo->house_address }}</td>
                        <td>
                            <span class="badge badge-secondary">{{ $houseInfo->approval }}</span>
                            <a href="{{ route('admin.house-info.approval', $houseInfo->id) }}" class="badge badge-warning">{{ $houseInfo->approved ? 'Unapproval' : 'Approved' }}</a>
                        </td>
                        <td>
                            <!-- edit -->
                            <a href="{{ route('admin.house-info.edit', $houseInfo->id) }}" class="badge badge-info"><i class="fa fa-edit"></i></a>
                            <!-- show -->
                            <a href="{{ route('admin.house-info.show', $houseInfo->id) }}" class="badge badge-secondary"><i class="fa fa-eye"></i></a>
                            <!-- destroy -->
                            @include('includes._confirm_delete',[
                            'action' => route('admin.house-info.destroy', $houseInfo->id),
                            'id' => $houseInfo->id
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