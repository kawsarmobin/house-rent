<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal"
  data-target="#userRoleEdit-{{ $id }}">
  <i class="fa fa-edit"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="userRoleEdit-{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-lite">
        <h5 class="modal-title" id="exampleModalLabel">Update User Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ $action }}" method="post">
        @csrf @method('put')
        <div class="modal-body">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="user_role" id="user_role" class="form-control" placeholder="User role"
                value="{{ $userRole }}">
              <label for="user_role">User Role</label>
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