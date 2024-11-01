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

// SQL query to fetch data from the 'teacher' table
$sql = "SELECT * FROM teacher";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
      <style>
        /* Table styling */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Image styling */
        .teacher-img {
            width: 80px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Header styling */
        .header {
            padding: 20px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
        }
    </style>
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
                <h1>View All Teacher Data</h1>
                <table>
                    <tr>
                        <th>Teacher</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Password</th>
                        <th>About Teacher</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>

                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td><?php echo htmlspecialchars($row['password']); ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td>
                                <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Teacher Image" style="width: 80px; height: auto;">
                            </td>
                          <td>
    <a href="delete_teacher.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this teacher?');">Delete</a>
</td>
<td>
    <a href="update_teacher.php?id=<?php echo $row['id']; ?>">Update</a>
</td>


                        </tr>
                    <?php endwhile; ?>

                </table>
            </div>
        </main>
    </div>
</body>
</html>
