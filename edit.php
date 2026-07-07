<?php
include "db.php";

$id = $_GET["id"];

$sql = "SELECT * FROM books WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$book = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$book) {
    die("Book not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $category = $_POST["category"];
    $price = $_POST["price"];

    $sql = "UPDATE books
            SET title = ?, author = ?, category = ?, price = ?
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $author, $category, $price, $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h1>Edit Book</h1>

    <form method="POST">
        <label>Book Title</label>
        <input type="text" name="title"
               value="<?php echo htmlspecialchars($book["title"]); ?>" required>

        <label>Author Name</label>
        <input type="text" name="author"
               value="<?php echo htmlspecialchars($book["author"]); ?>" required>

        <label>Category</label>
        <input type="text" name="category"
               value="<?php echo htmlspecialchars($book["category"]); ?>" required>

        <label>Price</label>
        <input type="number" step="0.01" name="price"
               value="<?php echo htmlspecialchars($book["price"]); ?>" required>

        <button type="submit">Update Book</button>
    </form>

    <br>
    <a href="index.php">Back to Dashboard</a>
</div>

</body>
</html>