<!-- Registered Email: kshanvi462@gmail.com -->
<?php
include 'db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Room not found.");
}

$id = (int) $_GET['id'];

$stmt = mysqli_prepare($conn, "SELECT * FROM rooms WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$room = mysqli_fetch_assoc($result);

if (!$room) {
    die("Room not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($room['room_name']); ?> | RoomieFind</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <nav class="navbar">
    <div class="logo">Roomie<span>Find</span></div>

    <div class="nav-links">
      <a href="index.php">Home</a>
      <a href="rooms.php">Rooms</a>
      <a href="about.php">About</a>
      <a href="contact.php">Contact</a>
    </div>

    <a href="add-room.php" class="nav-btn">List Your Room</a>
  </nav>

  <section class="details-page">
    <a class="back-link" href="rooms.php">← Back to Rooms</a>

    <div class="details-card">
      <div class="details-image">
        <div class="no-image">🏠</div>
      </div>

      <div class="details-content">
        <span class="room-type"><?php echo htmlspecialchars($room['room_type']); ?></span>

        <h1><?php echo htmlspecialchars($room['room_name']); ?></h1>

        <p class="details-location">
          📍 <?php echo htmlspecialchars($room['location']); ?>
        </p>

        <div class="details-price">
          ₹<?php echo htmlspecialchars($room['rent']); ?>
          <p><strong>⭐ Rating:</strong> 4.8/5</p>
          <a href="https://wa.me/919000000000" target="_blank">
    📱 Contact on WhatsApp
</a>
          <span>/ month</span>
        </div>

        <div class="details-info">
          <h3>Facilities</h3>
          <p><?php echo htmlspecialchars($room['facilities']); ?></p>

          <h3>About this stay</h3>
          <p>
            <?php
              echo !empty($room['description'])
                ? htmlspecialchars($room['description'])
                : "A comfortable stay for students near college.";
            ?>
          </p>
        </div>

        <a class="enquiry-btn" href="enquiry.php?room_id=<?php echo $room['id']; ?>">Send Enquiry →</a>
      </div>
    </div>
  </section>

</body>
</html>