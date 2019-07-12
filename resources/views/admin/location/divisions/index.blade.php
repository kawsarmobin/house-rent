@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Division</li>
</ol>

<div class="row">
    <div class="col-md-5">
        <div class="card mx-auto">
            <div class="card-header">Add Division</div>
            <div class="card-body">
                <form action="{{ route('admin.division.store') }}" method="post">
                    @csrf @method('post')
                    <div class="form-group">
                        <div class="form-label-group">
                            <select class="form-control select" name="country">
                                <option value="">Select Country</option>
                                    @if ($countries)
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->country }}</option>
                                        @endforeach
                                    @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" name="division" id="division" class="form-control"
                                placeholder="Division" value="{{ old('division') }}">
                            <label for="division">Division</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-outline-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @if (count($divisions))
    <div class="col-md-7">
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i> All Division</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Country</th>
                                <th>Division</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Country</th>
                                <th>Division</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if ($divisions)
                            @foreach ($divisions as $key => $division)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $division->country->country }}</td>
                                <td>{{ $division->division }}</td>
                                <td>
                                    @include('includes.location.division_edit',[
                                    'action' => route('admin.division.update', $division->id),
                                    'id' => $division->id,
                                    'country_id' => $division->country_id,
                                    'division' => $division->division,
                                    ])

                                    @include('includes._confirm_delete',[
                                    'action' => route('admin.division.destroy', $division->id),
                                    'id' => $division->id
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