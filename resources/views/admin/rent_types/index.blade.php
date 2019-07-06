@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Rent Type</li>
</ol>

<div class="row">
    <div class="col-md-5">
        <div class="card mx-auto">
            <div class="card-header">Add Rent Type</div>
            <div class="card-body">
                <form action="{{ route('admin.rent-type.store') }}" method="post">
                    @csrf @method('post')
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Rent Type" value="{{ old('name') }}">
                            <label for="name">Rent Type</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @if (count($rentTypes))
    <div class="col-md-7">
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i> Rent Types</div>
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
                            @if ($rentTypes)
                            @foreach ($rentTypes as $key => $rentType)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $rentType->name }}</td>
                                <td>
                                    @include('includes.rent_type_edit',[
                                    'action' => route('admin.rent-type.update', $rentType->id),
                                    'id' => $rentType->id,
                                    'rentType' => $rentType->name,
                                    ])

                                    @include('includes._confirm_delete',[
                                    'action' => route('admin.rent-type.destroy', $rentType->id),
                                    'id' => $rentType->id
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