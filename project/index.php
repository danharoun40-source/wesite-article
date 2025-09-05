
<?php
session_start();
include "config.php";
$res = $conn->query("SELECT * FROM articles ORDER BY id DESC LIMIT 3");
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title> Home Page </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php"> Articles Platform </a>
    <div>
      <a class="nav-link text-white" href="articles.php">Articles</a>
      <a class="nav-link text-white" href="authors.php">Authors</a>
      <?php if(isset($_SESSION['user'])): ?>
        <a class="btn btn-danger btn-sm" href="logout.php">Logout</a>
      <?php else: ?>
        <a class="btn btn-success btn-sm" href="login.php">Login</a>
      <?php endif; ?>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h2> Lastest Articles</h2>
  <div class="row">
    <?php while($row = $res->fetch_assoc()): ?>
      <div class="col-md-4">
        <div class="card mb-3">
          <div class="card-body">
            <h5><?= $row['title'] ?></h5>
            <p><?= mb_substr($row['content'],0,100) ?>...</p>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
  <a href="articles.php" class="btn btn-primary">More</a>
</div>
</body>
</html>
