<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="add_accounts_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
             <div class="col-3">
              <label>Full Name:</label> <input type="text" name="full_name_accounts" id="full_name_accounts" class="form-control" autocomplete="off">
            </div>
            <div class="col-3">
              <label>Username:</label> <input type="text" name="username_accounts" id="username_accounts" class="form-control" autocomplete="off">
            </div>
             <div class="col-3">
              <label>Password:</label> <input type="password" name="password_accounts" id="password_accounts" class="form-control" autocomplete="off">
            </div>
           
            <div class="col-3">
              <label>Role:</label>
              <select id="role_accounts" class="form-control">
                <option value="">Select Role</option>
                <option value="student">Student</option>
                <option value="admin">Admin</option>
              </select>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="#" class="btn btn-danger" onclick="register_user()">Register User</a>
      </div>
    </div>
  </div>
</div>