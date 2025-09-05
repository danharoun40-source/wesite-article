
<?php
session_start();
include "config.php";
$res = $conn->query("SELECT a.*, u.name as author FROM articles a JOIN users u ON a.user_id=u.id ORDER BY a.id DESC");
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title> All Articles</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<h2> All Articles</h2>
<a href="index.php" class="btn btn-secondary mb-3">Back</a>
<?php while($row=$res->fetch_assoc()): ?>
  <div class="card mb-3">
    <div class="card-body">
      <h5><?= $row['title'] ?></h5>
      <p><?= $row['content'] ?></p>
      <small>Written by : <?= $row['author'] ?></small><br>
      <?php if(isset($_SESSION['user']) && $_SESSION['user']['id']==$row['user_id']): ?>
        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
      <?php endif; ?>
    </div>
  </div>
<?php endwhile; ?>
</body>
</html>
