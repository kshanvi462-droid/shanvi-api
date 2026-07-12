<!-- Registered Email: kshanvi462@gmail.com -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | RoomieFind</title>
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

<section class="contact-page">

    <h1>Contact Us</h1>
    <p>Have questions? We'd love to help you find your perfect room.</p>

    <div class="contact-box">

        <div class="contact-info">
            <h2>Get in Touch</h2>

            <p>📍 Bhagalpur, Bihar, India</p>
            <p>📞 +91 9876543210</p>
            <p>📧 support@roomiefind.com</p>

            <h3>Office Hours</h3>
            <p>Monday - Saturday</p>
            <p>9:00 AM - 6:00 PM</p>
        </div>

        <div class="contact-form">

            <form action="contact-save.php"method="post">

                <input type="text" name="name" placeholder="Your Name" required>

                <input type="email" name="email" placeholder="Your Email" required>

                <textarea name="message" rows="6" placeholder="Your Message"></textarea>

                <button type="submit">Send Message</button>

            </form>

        </div>

    </div>

<h2 style="margin-top:50px;text-align:center;">Our Location</h2>

<iframe
src="https://www.google.com/maps?q=Bhagalpur,Bihar&output=embed"
width="100%"
height="350"
style="border:0;border-radius:15px;margin-top:20px;"
loading="lazy">
</iframe>

</section>

</body>
</html>