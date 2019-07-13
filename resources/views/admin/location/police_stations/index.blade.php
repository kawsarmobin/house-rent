@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Police Staion</li>
</ol>

<div class="row">
    <div class="col-md-4">
        <div class="card mx-auto">
            <div class="card-header">Add Police Staion</div>
            <div class="card-body">
                <form action="{{ route('admin.police-station.store') }}" method="post">
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
                            <select class="form-control select" name="city">
                                <option value="">Select City</option>
                                    @if ($cities)
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->city }}</option>
                                        @endforeach
                                    @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" name="police_station" id="police_station" class="form-control"
                                placeholder="Police Station" value="{{ old('police_station') }}">
                            <label for="police_station">Police Station</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-outline-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i> All City</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Country</th>
                                <th>Division</th>
                                <th>City</th>
                                <th>Police Station</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Country</th>
                                <th>Division</th>
                                <th>City</th>
                                <th>Police Station</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if ($police_stations)
                            @foreach ($police_stations as $key => $police_station)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $police_station->country->country }}</td>
                                <td>{{ $police_station->division->division }}</td>
                                <td>{{ $police_station->city->city }}</td>
                                <td>{{ $police_station->police_station }}</td>
                                <td>
                                    @include('includes.location.police_station_edit',[
                                    'action' => route('admin.police-station.update', $police_station->id),
                                    'id' => $police_station->id,
                                    'country_id' => $police_station->country_id,
                                    'division_id' => $police_station->division_id,
                                    'city_id' => $police_station->city_id,
                                    'police_station' => $police_station->police_station,
                                    ])

                                    @include('includes._confirm_delete',[
                                    'action' => route('admin.police-station.destroy', $police_station->id),
                                    'id' => $police_station->id
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