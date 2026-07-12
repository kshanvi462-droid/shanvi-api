<!-- Registered Email: kshanvi462@gmail.com -->
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Your Room | RoomieFind</title>
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

  <section class="form-page">
    <div class="form-intro">
      <p class="small-title">FOR ROOM & PG OWNERS</p>
      <h1>List your space.<br><span>Help a student.</span></h1>
      <p>
        Add your room details so students can easily find a safe,
        comfortable and affordable place to stay.
      </p>

      <div class="form-benefits">
        <div>
          <span>✓</span>
          <p>Reach students near your area</p>
        </div>
        <div>
          <span>✓</span>
          <p>Show rent, facilities and room type</p>
        </div>
        <div>
          <span>✓</span>
          <p>Receive student enquiries directly</p>
        </div>
      </div>
    </div>

    <div class="room-form-card">
      <h2>Add Room Details</h2>
      <p class="form-subtitle">Fill the details carefully.</p>

      <form action="save-room.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label>Room / PG Name</label>
          <input type="text" name="room_name" placeholder="Example: Sunshine Girls PG" required>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" placeholder="Example: Near GP Banka" required>
          </div>

          <div class="form-group">
            <label>Monthly Rent (₹)</label>
            <input type="number" name="rent" placeholder="Example: 3500" required>
          </div>
        </div>

        <div class="form-group">
          <label>Room Type</label>
          <select name="room_type" required>
            <option value="">Select room type</option>
            <option value="Single Room">Single Room</option>
            <option value="Double Sharing">Double Sharing</option>
            <option value="Triple Sharing">Triple Sharing</option>
            <option value="Girls PG">Girls PG</option>
            <option value="Boys PG">Boys PG</option>
          </select>
        </div>

        <div class="form-group">
          <label>Facilities</label>
          <textarea name="facilities" placeholder="Example: Wi-Fi, Bed, Fan, Attached Bathroom, Food" required></textarea>
        </div>

        <div class="form-group">
          <label>Room Image URL (optional)</label>
          <input type="text" name="image" placeholder="Paste an image link here">
        </div>

        <div class="form-group">
          <label>Room Description</label>
          <textarea name="description" placeholder="Write a short and clear description about the room"></textarea>
      <label>Room Image</label>
<input type="file" name="image" accept="image/*" required>
        </div>

        <button type="submit" class="submit-btn">Publish Room Listing →</button>

      </form>
    </div>
  </section>

</body>
</html>