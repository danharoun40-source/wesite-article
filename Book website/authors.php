
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "books_db11";

$conn = new mysqli($host, $user, $pass, $db);
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>The authors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
<div class="container">
    <h3> The authors 👨‍💻</h3>
    <ul class="list-group">
        <?php
        $authors = $conn->query("SELECT DISTINCT u.username FROM books b JOIN users u ON b.author_id=u.id");
        while ($author = $authors->fetch_assoc()) {
            echo "<li class='list-group-item'>{$author['username']}</li>";
        }
        ?>
    </ul>
    <br>
    <a href="index.php" class="btn btn-secondary">Back to the main page</a>
</div>
</body>
</html>
