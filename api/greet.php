<?php
header('Content-Type: application/json');
$raw_name = isset($_GET['name']) ? $_GET['name'] : 'Guest';
$clean_name = htmlspecialchars($raw_name, ENT_QUOTES, 'UTF-8');
$response = [
    "message" => "Hello, " . $clean_name . "! Welcome to your Mini API Project."
];
echo json_encode($response);
?>