
<?php
session_start();
include "config.php";
$id = $_GET['id'];
$res = $conn->query("SELECT * FROM articles WHERE id=$id");
$article = $res->fetch_assoc();

if(isset($_POST['update'])){
  $title = $_POST['title'];
  $content = $_POST['content'];
  $conn->query("UPDATE articles SET title='$title', content='$content' WHERE id=$id");
  header("Location: articles.php");
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title> Edit Artile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<h2>Edit Article</h2>
<form method="POST">
  <input type="text" name="title" class="form-control mb-2" value="<?= $article['title'] ?>">
  <textarea name="content" class="form-control mb-2"><?= $article['content'] ?></textarea>
  <button name="update" class="btn btn-primary">Save</button>
</form>
</body>
</html>
