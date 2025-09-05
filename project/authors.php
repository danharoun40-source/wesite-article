
<?php
include "config.php";
$res = $conn->query("SELECT u.name, COUNT(a.id) as total FROM users u LEFT JOIN articles a ON u.id=a.user_id GROUP BY u.id");
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>Authors</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<h2>Authors</h2>
<ul class="list-group">
<?php while($row=$res->fetch_assoc()): ?>
  <li class="list-group-item d-flex justify-content-between">
    <?= $row['name'] ?>
    <span class="badge bg-primary"><?= $row['total'] ?> Article</span>
  </li>
<?php endwhile; ?>
</ul>
</body>
</html>
