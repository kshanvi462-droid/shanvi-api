<?php
include "db.php";

$sql = "SELECT * FROM books ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!--kshanvi462@gmail.com-->

<!DOCTYPE html>
<html>
<head>
    <title>Books Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Books Admin Dashboard</h1>

    <a class="add-btn" href="add.php">+ Add New Book</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Book Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <?php foreach ($books as $book): ?>
        <tr>
            <td><?php echo htmlspecialchars($book["id"]); ?></td>
            <td><?php echo htmlspecialchars($book["title"]); ?></td>
            <td><?php echo htmlspecialchars($book["author"]); ?></td>
            <td><?php echo htmlspecialchars($book["category"]); ?></td>
            <td>₹<?php echo htmlspecialchars($book["price"]); ?></td>
            <td>
                <a href="edit.php?id=<?php echo $book["id"]; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $book["id"]; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>
</div>

</body>
</html>