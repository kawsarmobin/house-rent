@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">City</li>
</ol>

<div class="row">
    <div class="col-md-4">
        <div class="card mx-auto">
            <div class="card-header">Add City
                <a href="{{ route('admin.division.index') }}" class="btn btn-sm btn-outline-info float-right ml-1"><i
                    class="fa fa-plus"></i> Add Division</a>
    
                <a href="{{ route('admin.country.index') }}" class="btn btn-sm btn-outline-info float-right"><i
                    class="fa fa-plus"></i> Add Country</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.city.store') }}" method="post">
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
                            <select class="form-control select" name="division">
                                <option value="">Select Division</option>
                                    @if ($divisions)
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->division }}</option>
                                        @endforeach
                                    @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" name="city" id="city" class="form-control"
                                placeholder="City" value="{{ old('city') }}">
                            <label for="city">City</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-outline-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-city"></i> All City</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Country</th>
                                <th>Division</th>
                                <th>City</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Country</th>
                                <th>Division</th>
                                <th>City</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if ($cities)
                            @foreach ($cities as $key => $city)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $city->country->country }}</td>
                                <td>{{ $city->division->division }}</td>
                                <td>{{ $city->city }}</td>
                                <td>
                                    @include('includes.location.city_edit',[
                                    'action' => route('admin.city.update', $city->id),
                                    'id' => $city->id,
                                    'country_id' => $city->country_id,
                                    'division_id' => $city->division_id,
                                    'city' => $city->city,
                                    ])

                                    @include('includes._confirm_delete',[
                                    'action' => route('admin.city.destroy', $city->id),
                                    'id' => $city->id
                                    ])
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated {{ $tableUpdate->isoFormat('LLLL') }}</div>
        </div>
    </div>
</div>
@endsection