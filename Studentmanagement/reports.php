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

// SQL query to fetch data from the 'user' table
$sql = "SELECT * FROM user WHERE usertype='student'";
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
                <li><a href="view_teacher.php">View Teacher</a></li>
                <li><a href="add_course.php">Add Course</a></li>
                <li><a href="view_course.php">View Course</a></li>
            </ul>
        </aside>

        <main class="main-content">
        <div style="padding-top: 20px; text-align: center;">
            <h1>Student Data</h1>
            <table border="1" cellspacing="0" cellpadding="10" style="margin: 20px auto; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="padding: 10px; font-size: 15px;">Name</th>
                        <th style="padding: 10px; font-size: 15px;">Email</th>
                        <th style="padding: 10px; font-size: 15px;">Phone</th>
                        <th style="padding: 10px; font-size: 15px;">Message</th>
                        <th style="padding: 10px; font-size: 15px;">Delete</th>
                        <th style="padding: 10px; font-size: 15px;">Update</th>
                    </tr>
                </thead>

                <?php
                while ($info = $result->fetch_assoc()) {
                ?>
                <tbody>
                    <tr>
                        <td style="padding: 10px; font-size: 14px;">
                            <?php echo "{$info['username']}"; ?>
                        </td>
                        <td style="padding: 10px; font-size: 14px;">
                            <?php echo "{$info['email']}"; ?>
                        </td>
                        <td style="padding: 10px; font-size: 14px;">
                            <?php echo "{$info['phone']}"; ?>
                        </td>
                        <td style="padding: 10px; font-size: 14px;">
                            <?php echo "{$info['password']}"; ?>
                        </td>
                        <td style="padding: 10px; font-size: 14px;">
                            <a href="delete.php?student_id=<?= $info['id']; ?>">Delete</a>
                        </td>
                        <td style="padding: 10px; font-size: 14px;">
                            <a class="btn btn-primary" href="update.php?student_id=<?= htmlspecialchars($info['id']); ?>">Update</a>
                        </td>
                    </tr>
                </tbody>
                <?php
                }
                ?>
            </table>
        </div>
        </main>
    </div>
</body>
</html>
