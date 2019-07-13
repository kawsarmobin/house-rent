@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Customer Type</li>
</ol>

<div class="row">
    <div class="col-md-5">
        <div class="card mx-auto">
            <div class="card-header">Add Customer Type</div>
            <div class="card-body">
                <form action="{{ route('admin.customer-type.store') }}" method="post">
                    @csrf @method('post')
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" name="type" id="type" class="form-control"
                                placeholder="Customer Type" value="{{ old('type') }}">
                            <label for="type">Customer Type</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-outline-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @if (count($customer_types))
    <div class="col-md-7">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-user-astronaut"></i> Customer Types
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Customer Type</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if ($customer_types)
                            @foreach ($customer_types as $key => $customer_type)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $customer_type->type }}</td>
                                <td>
                                    @include('includes.customer_type_edit',[
                                    'action' => route('admin.customer-type.update', $customer_type->id),
                                    'id' => $customer_type->id,
                                    'customer_type' => $customer_type->type,
                                    ])

                                    @include('includes._confirm_delete',[
                                    'action' => route('admin.customer-type.destroy', $customer_type->id),
                                    'id' => $customer_type->id
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