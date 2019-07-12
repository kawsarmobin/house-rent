<button type="button" class="badge badge-secondary" data-toggle="modal"
  data-target="#division_edit-{{ $id }}">
  <i class="fa fa-edit"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="division_edit-{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-lite">
        <h5 class="modal-title" id="exampleModalLabel">Update Division</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ $action }}" method="post">
        @csrf @method('put')
        <div class="modal-body">

            <div class="form-group">
                <div class="form-label-group">
                    <select class="form-control select" name="country">
                        <option value="">Select Country</option>
                            @if ($countries)
                                @foreach ($countries as $country)
                                    <option {{ $country->id == $country_id ? 'selected' : ''  }} value="{{ $country->id }}">{{ $country->country }}</option>
                                @endforeach
                            @endif
                    </select>
                </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="division" id="division" class="form-control" placeholder="Division"
                  value="{{ $division }}">
                <label for="division">Division</label>
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-sm btn-outline-success">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>