<!-- Registered Email: kshanvi462@gmail.com -->
<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $room_id = trim($_POST['room_id'] ?? '');
    $student_name = trim($_POST['student_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($room_id == '' || $student_name == '' || $email == '' || $phone == '' || $message == '') {
        die("Please fill all fields.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Please enter a valid email address.");
    }

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO enquiries (room_id, student_name, email, phone, message)
         VALUES (?, ?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "issss",
        $room_id,
        $student_name,
        $email,
        $phone,
        $message
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: room-details.php?id=" . $room_id . "&enquiry=success");
        exit();
    } else {
        echo "Something went wrong. Please try again.";
    }

} else {
    header("Location: rooms.php");
    exit();
}
?>