<!-- Registered Email: kshanvi462@gmail.com -->
<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $room_name = trim($_POST['room_name'] ?? '');
    $location = trim($_POST['location'] ?? '');
    $rent = trim($_POST['rent'] ?? '');
    $room_type = trim($_POST['room_type'] ?? '');
    $facilities = trim($_POST['facilities'] ?? '');
    $description = trim($_POST['description'] ?? '');

    if ($room_name == '' || $location == '' || $rent == '' || $room_type == '' || $facilities == '') {
        die("Please fill all required fields.");
    }

    if (!is_numeric($rent) || $rent <= 0) {
        die("Rent must be a valid positive number.");
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image = basename($_FILES['image']['name']);
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "uploads/" . $image);
} else {
    $image = "";
}

$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO rooms (room_name, location, rent, room_type, facilities, image, description)
     VALUES (?, ?, ?, ?, ?, ?, ?)"
);

    mysqli_stmt_bind_param(
        $stmt,
        "ssissss",
        $room_name,
        $location,
        $rent,
        $room_type,
        $facilities,
        $image,
        $description
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: rooms.php?success=1");
        exit();
    } else {
        echo "Something went wrong. Please try again.";
    }

} else {
    header("Location: add-room.php");
}
?>