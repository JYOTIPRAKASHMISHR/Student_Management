<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

// Establishing the database connection
$data = mysqli_connect($host, $user, $password, $db);

// Check the connection
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to fetch data from the 'admission' table
$sql = "SELECT * FROM admission";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <header class="header">
        <h1>Admin Dashboard</h1>
        <a href="logout.php" class="logout-button">Logout</a>
    </header>

    <div class="dashboard">
        <aside class="sidebar">
            <ul>
                <li><a href="admission.php">Admission</a></li>
                <li><a href="add_student.php">Add Student</a></li>
                <li><a href="reports.php">View Student</a></li>
                <li><a href="add_teacher.php">Add Teacher</a></li>
                <li><a href="view_teachers.php">View Teacher</a></li>
                <li><a href="add_course.php">Add Course</a></li>
                <li><a href="view_course.php">View Course</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <div style="padding-top: 20px; text-align: center;">
                <h1>Admission</h1>

                <!-- Admission Table -->
                <table border="1" cellspacing="0" cellpadding="10" style="margin: 20px auto; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="padding: 10px; font-size: 15px;">Name</th>
                            <th style="padding: 10px; font-size: 15px;">Email</th>
                            <th style="padding: 10px; font-size: 15px;">Phone</th>
                            <th style="padding: 10px; font-size: 15px;">Message</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    // Check if there are any results and display them in table rows
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($info = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td style='padding: 10px;'>{$info['name']}</td>";
                            echo "<td style='padding: 10px;'>{$info['email']}</td>";
                            echo "<td style='padding: 10px;'>{$info['phone']}</td>";
                            echo "<td style='padding: 10px;'>{$info['message']}</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' style='padding: 10px; text-align: center;'>No admissions found</td></tr>";
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
