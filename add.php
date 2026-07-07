<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $category = $_POST["category"];
    $price = $_POST["price"];

    $sql = "INSERT INTO books (title, author, category, price)
            VALUES (?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $author, $category, $price]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h1>Add New Book</h1>

    <form method="POST">
        <label>Book Title</label>
        <input type="text" name="title" required>

        <label>Author Name</label>
        <input type="text" name="author" required>

        <label>Category</label>
        <input type="text" name="category" required>

        <label>Price</label>
        <input type="number" step="0.01" name="price" required>

        <button type="submit">Add Book</button>
    </form>

    <br>
    <a href="index.php">Back to Dashboard</a>
</div>

</body>
</html>