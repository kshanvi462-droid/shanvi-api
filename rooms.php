<!-- Registered Email: kshanvi462@gmail.com -->
<?php
include 'db.php';

$search = "";

if (isset($_GET['search']) && $_GET['search'] != "") {

    $search = mysqli_real_escape_string($conn, $_GET['search']);

    $sql = "SELECT * FROM rooms
            WHERE room_name LIKE '%$search%'
            OR location LIKE '%$search%'
            ORDER BY id DESC";

} else {

    $sql = "SELECT * FROM rooms ORDER BY id DESC";
}

$result = mysqli_query($conn, $sql);
?>
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rooms | RoomieFind</title>
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

  <section class="rooms-page">
    <div class="rooms-heading">
      <form method="GET" class="search-form">
    <input
        type="text"
        name="search"
        placeholder="Search by room name or location..."
        <form method="GET">
    <select name="type">
        <option value="">All Types</option>
        <option value="Girls PG">Girls PG</option>
        <option value="Boys PG">Boys PG</option>
        <option value="Hostel">Hostel</option>
        <option value="Flat">Flat</option>
    </select>

    <button type="submit">Filter</button>
</form>
        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">

    <button type="submit">Search</button>
</form>
      <p class="small-title">AVAILABLE STAYS</p>
      <h1>Find your perfect room</h1>
      <p>Browse safe and affordable rooms near your college.</p>
    </div>

    <div class="rooms-grid">

      <?php if (mysqli_num_rows($result) > 0) { ?>

        <?php while ($room = mysqli_fetch_assoc($result)) { ?>
          <div class="room-card">
            <?php if (!empty($room['image'])) { ?>
    <img src="uploads/<?php echo htmlspecialchars($room['image']); ?>" alt="Room Image" style="width:100%;height:200px;object-fit:cover;">
<?php } ?>
            <div class="room-image">
              <div class="no-image">🏠</div>
            </div>

            <div class="room-card-content">
              <span class="room-type"><?php echo htmlspecialchars($room['room_type']); ?></span>

              <h2><?php echo htmlspecialchars($room['room_name']); ?></h2>

              <p class="room-location">
                📍 <?php echo htmlspecialchars($room['location']); ?>
              </p>

              <p class="room-facilities">
                <?php echo htmlspecialchars($room['facilities']); ?>
              </p>

              <div class="room-card-bottom">
                <strong>
                  ₹<?php echo htmlspecialchars($room['rent']); ?>
                  <span>/ month</span>
                </strong>

                <a href="room-details.php?id=<?php echo $room['id']; ?>">View Details →</a>
              </div>
            </div>
          </div>
        <?php } ?>

      <?php } else { ?>

        <div class="empty-room">
          <h2>No rooms listed yet.</h2>
          <p>Add your first room from the List Your Room button.</p>
        </div>

      <?php } ?>

    </div>
  </section>

</body>
</html>