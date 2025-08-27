<?php
session_start();
require __DIR__ . '/conn.php';

$title = "Users List"; 

$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);

if(!$stmt){
    die("Prepared failed: " . $conn->error);
}

if(!$stmt->execute()){
    die("Execute failed: " . $stmt->error);
}

$result = $stmt->get_result();
if(!$result){
    die("Get result failed: " . $stmt->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?></title>
  <style>
    body { font-family: Arial, sans-serif; margin:0; background:#f5f5f5; }
    header { background:#333; color:white; padding:15px; }
    nav { background:#444; padding:10px; }
    nav a { color:white; margin-right:10px; text-decoration:none; }
    .container { padding:20px; }
    .card { background:white; padding:20px; margin-bottom:20px; border-radius:8px; box-shadow:0 2px 4px rgba(0,0,0,0.1); }
    table { width:100%; border-collapse: collapse; margin-top:15px; }
    th, td { border:1px solid #ccc; padding:10px; text-align:left; }
    th { background:#eee; }
    .btn { padding:6px 10px; border:none; border-radius:5px; cursor:pointer; text-decoration:none; }
    .btn-warning { background:#ffc107; color:black; }
    .btn-danger { background:#dc3545; color:white; }
    .btn-primary { background:#28a745; color:white; }
  </style>
</head>
<body>
  <header>
    <h1>My Admin Dashboard</h1>
  </header>
  <nav>
    <a href="index.php">Users</a>
    <a href="create.php">Add User</a>
  </nav>
  <div class="container">

    <?php if(isset($_SESSION['success'])): ?>
      <div class="card" style="background:#d4edda; color:#155724;">
        <?= $_SESSION['success']; unset($_SESSION['success']); ?>
      </div>
    <?php endif; ?>

    <div class="card">
      <h2>Users List</h2>
      <table>
        <thead>
          <tr>
            <th>#</th><th>Name</th><th>Email</th><th>Phone</th><th>Type</th><th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php while($user = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['phone'] ?></td>
            <td><?= $user['type'] ?></td>
            <td>
              <a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
              <form action="delete.php" method="post" style="display:inline-block;">
                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
              </form>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>