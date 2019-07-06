@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">House Type</li>
</ol>

<div class="row">
    <div class="col-md-5">
        <div class="card mx-auto">
            <div class="card-header">Create House Type</div>
            <div class="card-body">
                <form action="{{ route('admin.house-type.store') }}" method="post">
                    @csrf @method('post')
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="House Type" value="{{ old('name') }}">
                            <label for="name">House Type</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @if (count($houseTypes))
    <div class="col-md-7">
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i> House Types</div>
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
                            @if ($houseTypes)
                            @foreach ($houseTypes as $key => $houseType)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $houseType->name }}</td>
                                <td>
                                    @include('includes.house_type_edit',[
                                    'action' => route('admin.house-type.update', $houseType->id),
                                    'id' => $houseType->id,
                                    'houseType' => $houseType->name,
                                    ])

                                    @include('includes._confirm_delete',[
                                    'action' => route('admin.house-type.destroy', $houseType->id),
                                    'id' => $houseType->id
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
    </div>
    @endif
</div>
@endsection