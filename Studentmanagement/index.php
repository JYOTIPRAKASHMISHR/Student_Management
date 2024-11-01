<?php

error_reporting(E_ALL); // Report all errors
ini_set('display_errors', 0); // Suppress error display, but log errors
session_start(); // Start the session

// Check if a message exists in the session
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];

    // Display the message in a JavaScript alert
    echo "<script type='text/javascript'> 
        alert('$message');
    </script>";

    // Unset the session message after displaying it
    unset($_SESSION['message']);
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM teacher";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <nav>
        <label class="logo">Your School</label>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Admission</a></li>
            <li><a href="login.php" class="login-btn">Login</a></li>
        </ul>
    </nav>
    
    <div class="section1">
        <label class="imgtext">We Teach Students With Care</label>
        <img class="mainimg" src="download.jpg" alt="Background Image" style="display: none;"> <!-- Hidden as it's a background image -->
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome" src="school.webp" alt="Welcome to Your School">
            </div>
            <div class="col-md-8">
                <h1>Welcome to Your School</h1>
                <p>
                    Welcome to your school. We are thrilled to have you as part of our vibrant community. 
                    This is a place where you can learn, grow, and discover your passions. Embrace every 
                    opportunity that comes your way, and don't hesitate to reach out for help or support. 
                    Remember, your unique contributions make our school a better place. Together, let’s 
                    create lasting friendships, inspire one another, and strive for excellence in all we do. 
                    Here’s to an exciting year ahead filled with new experiences.
                </p>
            </div>
        </div>
    </div>

    <center><h1>Our Teachers</h1></center>
    <div class="container">
        <div class="row">
            <?php while($info = $result->fetch_assoc()): ?>
                <div class="col-md-4">
                   <img src="<?php echo $info['image']; ?>" alt="Teacher Image" class="teacher-img">

                    <h3><?php echo $info['name']; ?></h3>
                    <h3><?php echo $info['email']; ?></h3>
                    <h3><?php echo $info['phone']; ?></h3>
                     <h3><?php echo $info['description']; ?></h3>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <center><h1>Our Course</h1></center>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="course1.jpg" alt="Graphics Designer" class="course-img">
                <h2>Graphics Designer</h2>
            </div>
            <div class="col-md-4">
                <img src="course2.jpg" alt="Web Development" class="course-img">
                <h2>Web Development</h2>
            </div>
            <div class="col-md-4">
                <img src="course3.jpg" alt="Digital Marketing" class="course-img">
                <h2>Digital Marketing</h2>
            </div>
        </div>
    </div>

    <center>
        <h1>Admission Form</h1>
    </center>
    <div align="center" class="admission_form">
        <form action="data_cheak.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" placeholder="Enter your message" required></textarea>
            </div>
            <div>
                <button type="submit" name="apply">Apply</button>
            </div>
        </form>
    </div>

    <footer class="footer">
        <h3 class="footer-title">Designed by Jyotiprakash Mishra</h3>
    </footer>

</body>
</html>
