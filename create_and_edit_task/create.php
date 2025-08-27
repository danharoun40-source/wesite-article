<div class="card">
  <h2>Create New User</h2>
  <form action="." method="post">
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="name">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email">
    </div>
    <div class="form-group">
      <label>Phone</label>
      <input type="text" name="phone">
    </div>
    <div class="form-group">
      <label>Type</label>
      <select name="type">
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary" name="action" value="store">Save</button>
    <a href="." class="btn btn-secondary">Back</a>
  </form>
</div>
