<!-- Registered Email: kshanvi462@gmail.com -->
<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name == '' || $email == '' || $message == '') {
        die("Please fill all fields.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO contact_messages (name, email, message)
         VALUES (?, ?, ?)"
    );

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: contact.php?success=1");
        exit();
    } else {
        echo "Something went wrong.";
    }

} else {
    header("Location: contact.php");
    exit();
}
?>