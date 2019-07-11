@extends('layouts.admin')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">House Image</li>
</ol>

<div class="row">
    <div class="col">
        <div class="card mx-auto">
            <div class="card-header">Add House Image</div>
            <div class="card-body">
                <form action="{{ route('admin.house.image.store', $house_info->id) }}" method="post" enctype="multipart/form-data">
                    @csrf @method('post')
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="file" name="images[]" multiple id="image" class="form-control p-4">
                            <label for="image" class="col col-form-label">Image</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-outline-primary float-right">Add Image</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection