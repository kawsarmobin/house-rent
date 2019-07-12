@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Country</li>
</ol>

<div class="row">
    <div class="col-md-5">
        <div class="card mx-auto">
            <div class="card-header">Add Country</div>
            <div class="card-body">
                <form action="{{ route('admin.country.store') }}" method="post">
                    @csrf @method('post')
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" name="country" id="country" class="form-control"
                                placeholder="Country" value="{{ old('country') }}">
                            <label for="country">Country</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-outline-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @if (count($countries))
    <div class="col-md-7">
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i> Countrys</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if ($countries)
                            @foreach ($countries as $key => $country)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $country->country }}</td>
                                <td>
                                    @include('includes.location.country_edit',[
                                    'action' => route('admin.country.update', $country->id),
                                    'id' => $country->id,
                                    'country' => $country->country,
                                    ])

                                    @include('includes._confirm_delete',[
                                    'action' => route('admin.country.destroy', $country->id),
                                    'id' => $country->id
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