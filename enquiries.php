<!-- Registered Email: kshanvi462@gmail.com -->
<?php
include 'db.php';

$sql = "SELECT enquiries.*, rooms.room_name 
        FROM enquiries 
        JOIN rooms ON enquiries.room_id = rooms.id 
        ORDER BY enquiries.id DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enquiries Dashboard | RoomieFind</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <nav class="navbar">
    <div class="logo">Roomie<span>Find</span></div>
    <a href="rooms.php" class="nav-btn">Back to Rooms</a>
  </nav>

  <section class="dashboard-page">
    <div class="dashboard-heading">
      <p class="small-title">OWNER DASHBOARD</p>
      <h1>Student Enquiries</h1>
      <p>View all students who are interested in your room listings.</p>
    </div>

    <div class="table-card">
      <?php if (mysqli_num_rows($result) > 0) { ?>

        <div class="table-scroll">
          <table>
            <thead>
              <tr>
                <th>Student Name</th>
                <th>Room</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
              </tr>
            </thead>

            <tbody>
              <?php while ($enquiry = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td><?php echo htmlspecialchars($enquiry['student_name']); ?></td>
                  <td><?php echo htmlspecialchars($enquiry['room_name']); ?></td>
                  <td><?php echo htmlspecialchars($enquiry['email']); ?></td>
                  <td><?php echo htmlspecialchars($enquiry['phone']); ?></td>
                  <td><?php echo htmlspecialchars($enquiry['message']); ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

      <?php } else { ?>

        <div class="empty-dashboard">
          <h2>No enquiries yet.</h2>
          <p>When students send enquiries, they will appear here.</p>
        </div>

      <?php } ?>
    </div>
  </section>

</body>
</html>