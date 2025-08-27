
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? "Dashboard" ?></title>
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
    .btn { padding:8px 12px; border:none; border-radius:5px; cursor:pointer; }
    .btn-primary { background:#28a745; color:white; }
    .btn-warning { background:#ffc107; }
    .btn-danger { background:#dc3545; color:white; }
    .btn-secondary { background:#6c757d; color:white; }
    .form-group { margin-bottom:15px; }
    label { display:block; margin-bottom:5px; }
    input, select { width:100%; padding:8px; border:1px solid #ccc; border-radius:5px; }
  </style>
</head>
<body>
  <header>
    <h1>My Admin Dashboard</h1>
  </header>
  <nav>
    <a href=".">Users</a>
    <a href="?action=create">Add User</a>
  </nav>
  <div class="container">
    <?php if(isset($_SESSION['success'])): ?>
      <div class="card" style="background:#d4edda; color:#155724;">
        <?= $_SESSION['success']; unset($_SESSION['success']); ?>
      </div>
    <?php endif; ?>
    <?= $content ?>
  </div>
</body>
</html>
