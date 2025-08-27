<div class="card">
  <h2>Edit User</h2>
  <form action="." method="post">
    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">

    
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="name" value="<?= $user['name'] ?>">
    </div>


    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" value="<?= $user['email'] ?>">
    </div>


    <div class="form-group">
      <label>Phone</label>
      <input type="text" name="phone" value="<?= $user['phone'] ?>">
    </div>


    <div class="form-group">
      <label>Type</label>
      <select name="type">
        <option <?= $user['type'] === 'user' ? 'selected':'' ?> value="user">User</option>
        <option <?= $user['type'] === 'admin' ? 'selected':'' ?> value="admin">Admin</option>
      </select>
    </div>


    <button type="submit" class="btn btn-primary" name="action" value="update">Update</button>
    <a href="." class="btn btn-secondary">Back</a>
  </form>
</div>
