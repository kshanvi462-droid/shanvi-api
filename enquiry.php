<!-- Registered Email: kshanvi462@gmail.com -->
<?php
include 'db.php';

if (!isset($_GET['room_id']) || !is_numeric($_GET['room_id'])) {
    die("Room not found.");
}

$room_id = (int) $_GET['room_id'];

$stmt = mysqli_prepare($conn, "SELECT room_name FROM rooms WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $room_id);
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
  <title>Send Enquiry | RoomieFind</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <nav class="navbar">
    <div class="logo">Roomie<span>Find</span></div>
    <a href="rooms.php" class="nav-btn">Back to Rooms</a>
  </nav>

  <section class="enquiry-page">
    <div class="enquiry-card">
      <p class="small-title">ROOM ENQUIRY</p>
      <h1>Interested in <span><?php echo htmlspecialchars($room['room_name']); ?></span>?</h1>
      <p class="enquiry-text">Fill this form and the room owner can contact you.</p>

      <form action="send-enquiry.php" method="POST">
        <input type="hidden" name="room_id" value="<?php echo $room_id; ?>">

        <div class="form-group">
          <label>Your Name</label>
          <input type="text" name="student_name" placeholder="Enter your full name" required>
        </div>

        <div class="form-group">
          <label>Email Address</label>
          <input type="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="form-group">
          <label>Phone Number</label>
          <input type="text" name="phone" placeholder="Enter your phone number" required>
        </div>

        <div class="form-group">
          <label>Message</label>
          <textarea name="message" placeholder="Example: I am interested in this room. Please share more details." required></textarea>
        </div>

        <button type="submit" class="submit-btn">Send Enquiry →</button>
      </form>
    </div>
  </section>

</body>
</html>