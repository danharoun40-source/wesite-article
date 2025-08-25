
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$host = "localhost";
$user = "root";
$pass = "";
$db   = "books_db";

$conn = new mysqli($host, $user, $pass, $db);

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $author = $_SESSION['user'];

    $result = $conn->query("SELECT id FROM users WHERE username='$author'");
    $row = $result->fetch_assoc();
    $author_id = $row['id'];

    $conn->query("INSERT INTO books (title, description, author_id) VALUES ('$title','$description','$author_id')");
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Add a book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
<div class="container">
    <div class="d-flex justify-content-between">
        <h3>Welcome , <?php echo $_SESSION['user']; ?></h3>
        <a href="index.php?logout=true" class="btn btn-danger">logout</a>
    </div>
    <hr>
    <h4>Add a new book </h4>
    <form method="POST" class="mb-4">
        <input type="text" name="title" class="form-control mb-2" placeholder="Book title" required>
        <textarea name="description" class="form-control mb-2" placeholder="Book description" required></textarea>
        <button type="submit" name="add" class="btn btn-success">addition</button>
    </form>

    <h4> Book list 📚 </h4>
    <ul class="list-group">
        <?php
        $books = $conn->query("SELECT b.title, b.description, u.username FROM books b JOIN users u ON b.author_id=u.id");
        while ($book = $books->fetch_assoc()) {
            echo "<li class='list-group-item'><strong>{$book['title']}</strong> - {$book['description']} <em>(Written by {$book['username']})</em></li>";
        }
        ?>
    </ul>
</div>
</body>
</html>
