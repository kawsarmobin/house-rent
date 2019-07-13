@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Word</li>
</ol>

<div class="col">
    <div class="card mx-auto">
        <div class="card-header">Add Word
            <a href="{{ route('admin.village.index') }}" class="btn btn-sm btn-outline-info float-right ml-1"><i
                class="fa fa-plus"></i> Add Village</a>

            <a href="{{ route('admin.police-station.index') }}" class="btn btn-sm btn-outline-info float-right ml-1"><i
                class="fa fa-plus"></i> Add Police Station</a>

            <a href="{{ route('admin.city.index') }}" class="btn btn-sm btn-outline-info float-right ml-1"><i
                class="fa fa-plus"></i> Add City</a>

            <a href="{{ route('admin.division.index') }}" class="btn btn-sm btn-outline-info float-right ml-1"><i
                class="fa fa-plus"></i> Add Division</a>

            <a href="{{ route('admin.country.index') }}" class="btn btn-sm btn-outline-info float-right"><i
                class="fa fa-plus"></i> Add Country</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.word.store') }}" method="post">
                @csrf @method('post')

                <div class="form-row">
                    <div class="col">
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
                    </div>
                    <div class="col">
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
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
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
                    </div>
                    <div class="col">
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
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <div class="form-label-group">
                                <select class="form-control select" name="village">
                                    <option value="">Select Village</option>
                                        @if ($villages)
                                            @foreach ($villages as $village)
                                                <option value="{{ $village->id }}">{{ $village->village }}</option>
                                            @endforeach
                                        @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="form">
                                <input type="text" name="word" id="word" class="form-control"
                                    placeholder="Word" value="{{ old('word') }}" style="height:0;padding:18px">
                            </div>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-sm btn-outline-primary float-right">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- showing table data -->
<div class="col mt-3">
    <div class="card mb-3">
        <div class="card-header"><i class="fas fa-table"></i> All Word</div>
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
                            <th>Word</th>
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
                            <th>Word</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if ($words)
                        @foreach ($words as $key => $word)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $word->country->country }}</td>
                            <td>{{ $word->division->division }}</td>
                            <td>{{ $word->city->city }}</td>
                            <td>{{ $word->policeStation->police_station }}</td>
                            <td>{{ $word->village->village }}</td>
                            <td>{{ $word->word }}</td>
                            <td>
                                @include('includes.location.word_edit',[
                                'action'            => route('admin.word.update', $word->id),
                                'id'                => $word->id,
                                'country_id'        => $word->country_id,
                                'division_id'       => $word->division_id,
                                'city_id'           => $word->city_id,
                                'police_station_id' => $word->police_station_id,
                                'village_id'        => $word->village_id,
                                'word'              => $word->word,
                                ])

                                @include('includes._confirm_delete',[
                                'action' => route('admin.word.destroy', $word->id),
                                'id'     => $word->id
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
@endsection