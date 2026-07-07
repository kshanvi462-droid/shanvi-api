<?php
include "db.php";

$id = $_GET["id"];

$sql = "DELETE FROM books WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: index.php");
exit;
?>