@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">House Info</li>
</ol>

<div class="card mx-auto">
    <div class="card-header">Add House Info
        <a href="{{ route('admin.house-info.index') }}" class="btn btn-sm btn-outline-primary float-right">
            <i class="fa fa-backspace"></i> Back
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.house-info.store') }}" method="post" enctype="multipart/form-data">
            @csrf @method('post')

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <div class="form-label-group">
                            <select class="form-control select" name="landlord">
                                <option value="">Select Landlord</option>
                                @if ($landlords)
                                @foreach ($landlords as $landlord)
                                <option value="{{ $landlord->id }}">{{ $landlord->name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="form-label-group">
                            <select class="form-control select" name="house_type">
                                <option value="">Select House Type</option>
                                @if ($housetypes)
                                @foreach ($housetypes as $housetype)
                                <option value="{{ $housetype->id }}">{{ $housetype->name }}</option>
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
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title"
                                value="{{ old('title') }}">
                            <label for="title">Title</label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" name="house_address" id="house_address" class="form-control"
                                placeholder="House Address" value="{{ old('house_address') }}">
                            <label for="house_address">Address</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Adding house details information -->
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="number" name="bed_room" id="bed_room" class="form-control"
                                placeholder="No of bed rooms" value="{{ old('bed_room') }}" min="1" max="15">
                            <label for="bed_room" class="col col-form-label">No of bed rooms</label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="number" name="wash_room" id="wash_room" class="form-control"
                                placeholder="No of wash rooms" value="{{ old('wash_room') }}" min="1" max="7">
                            <label for="wash_room" class="col col-form-label">No of wash rooms</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="number" name="porches" id="porches" class="form-control"
                                placeholder="No of porches" value="{{ old('porches') }}" min="1" max="7">
                            <label for="porches" class="col col-form-label">No of porches</label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="number" name="drawing_room" id="drawing_room" class="form-control"
                                placeholder="No of drawing rooms" value="{{ old('drawing_room') }}" min="1" max="10">
                            <label for="drawing_room" class="col col-form-label">No of drawing rooms</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="number" name="dining_room" id="dining_room" class="form-control"
                                placeholder="No of dining rooms" value="{{ old('dining_room') }}" min="1" max="10">
                            <label for="dining_room" class="col col-form-label">No of dining rooms</label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="number" name="store_room" id="store_room" class="form-control"
                                placeholder="No of store rooms" value="{{ old('store_room') }}" min="1" max="10">
                            <label for="store_room" class="col col-form-label">No of store rooms</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="file" name="images[]" multiple id="image">
                            <label for="image" class="col col-form-label">Image</label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="number" name="rent_amount" id="rent_amount" class="form-control"
                                placeholder="No of rent amount" value="{{ old('rent_amount') }}" min="500">
                            <label for="rent_amount" class="col col-form-label"><i class="fb-taka"></i> Rent
                                amount</label>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>
        </form>
    </div>
</div>
@endsection