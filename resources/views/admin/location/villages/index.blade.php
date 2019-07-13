@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Village</li>
</ol>

<div class="row">
    <div class="col-md-4">
        <div class="card mx-auto">
            <div class="card-header">Add Village</div>
            <div class="card-body">
                <form action="{{ route('admin.village.store') }}" method="post">
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
                            <select class="form-control select" name="police_station">
                                <option value="">Select Police Station</option>
                                    @if ($police_stations)
                                        @foreach ($police_stations as $police_station)
                                            <option value="{{ $police_station->id }}">{{ $police_station->police_station }}</option>
                                        @endforeach
                                    @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" name="village" id="village" class="form-control"
                                placeholder="Village" value="{{ old('village') }}">
                            <label for="village">Village</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-outline-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- showing table data -->
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i> All Village</div>
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
                                <th>Village</th>
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
                                <th>Village</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if ($villages)
                            @foreach ($villages as $key => $village)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $village->country->country }}</td>
                                <td>{{ $village->division->division }}</td>
                                <td>{{ $village->city->city }}</td>
                                <td>{{ $village->policeStation->police_station }}</td>
                                <td>{{ $village->village }}</td>
                                <td>
                                    @include('includes.location.village_edit',[
                                    'action'            => route('admin.village.update', $village->id),
                                    'id'                => $village->id,
                                    'country_id'        => $village->country_id,
                                    'division_id'       => $village->division_id,
                                    'city_id'           => $village->city_id,
                                    'police_station_id' => $village->police_station_id,
                                    'village'           => $village->village,
                                    ])

                                    @include('includes._confirm_delete',[
                                    'action' => route('admin.village.destroy', $village->id),
                                    'id'     => $village->id
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