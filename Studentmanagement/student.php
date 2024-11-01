<?php
session_start(); // Start the session at the top

// Database connection details
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

// Connect to the database
$data = mysqli_connect($host, $user, $password, $db);

// Check connection
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the session variable 'username' is set
if (isset($_SESSION['username'])) {
    $name = $_SESSION['username'];
} else {
    die("You must be logged in to access this page.");
}

// SQL query to fetch user details
$sql = "SELECT * FROM user WHERE username='$name'";
$result = mysqli_query($data, $sql);

// Fetch the result
$info = mysqli_fetch_assoc($result); // Corrected function name
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style3.css">
    <style>
        /* Main content container */
        .main-content {
            display: flex;
            justify-content: center;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        /* Overview section styling */
        .overview {
            max-width: 500px;
            background-color: #f3f8fb;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        /* Heading styling */
        .overview h2 {
            color: #1a73e8;
            margin-bottom: 25px;
            font-size: 24px;
        }

        /* Form group styling */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        /* Label styling */
        .form-group label {
            color: #333;
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
        }

        /* Input styling */
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #b3d7ff;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        /* Update button styling */
        .update-button {
            display: inline-block;
            padding: 12px 25px;
            font-size: 16px;
            color: white;
            background: linear-gradient(90deg, #007bff, #1a73e8);
            border-radius: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        /* Update button hover effect */
        .update-button:hover {
            background: linear-gradient(90deg, #0056b3, #1558d6);
        }
    </style>
</head>
<body>
    <header class="header">
        <h1> Student Dashboard</h1>
        <a href="logout.php" class="logout-button">Logout</a>
    </header>
    <div class="dashboard">
        <aside class="sidebar">
            <ul>
                <li><a href="settings.php">Add Course</a></li>
                <li><a href="settings.php">View Course</a></li>
                <li><a href="student.php">Profile</a></li>
                <li><a href="courses.php">My Courses</a></li>
                <li><a href="assignments.php">Assignments</a></li>
                <li><a href="result.php">Result</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <section class="overview">
                <h2>Update Your Profile</h2>
                <form action="update_profile.php" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($info['username']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($info['email']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone No</label>
                        <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($info['phone']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                    </div>
                    <div style="text-align: center; margin-top: 20px;">
                        <button type="submit" class="update-button">Update Profile</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
</body>
</html>
