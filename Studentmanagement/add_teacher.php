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

// Checking if the form is submitted
if (isset($_POST['add_teacher'])) {
    $username = mysqli_real_escape_string($data, $_POST['name']);
    $user_email = mysqli_real_escape_string($data, $_POST['email']);
    $user_phone = mysqli_real_escape_string($data, $_POST['phone']);
    $user_password = mysqli_real_escape_string($data, $_POST['password']);
    $t_description = mysqli_real_escape_string($data, $_POST['description']);
    
    // File upload handling
    $file = $_FILES['image']['name'];
    $dst = "./image/" . $file;
    $dst_db = "image/" . $file;
    
    move_uploaded_file($_FILES['image']['tmp_name'], $dst);

    // Insert into the database
    $sql = "INSERT INTO teacher (name, email, phone, password, description, image) 
            VALUES ('$username', '$user_email', '$user_phone', '$user_password', '$t_description', '$dst_db')";

    $result = mysqli_query($data, $sql);

    if ($result) {
        echo "<p style='text-align: center; color: green;'>Teacher added successfully!</p>";
    } else {
        echo "<p style='text-align: center; color: red;'>Error: " . mysqli_error($data) . "</p>";
    }
}
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
                <h1 style="text-align: center; padding: 20px; color: #333;">Add Teacher</h1>

                <div style="display: flex; justify-content: center; align-items: center;">
                    <form style="width: 300px; padding: 20px; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        
                        <!-- Teacher Name Field -->
                        <div style="margin-bottom: 15px;">
                            <label style="display: block; font-size: 14px; margin-bottom: 5px;">Teacher Name</label>
                            <input type="text" name="name" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        </div>

                        <!-- Email Field -->
                        <div style="margin-bottom: 15px;">
                            <label style="display: block; font-size: 14px; margin-bottom: 5px;">Email</label>
                            <input type="email" name="email" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        </div>

                        <!-- Phone Field -->
                        <div style="margin-bottom: 15px;">
                            <label style="display: block; font-size: 14px; margin-bottom: 5px;">Phone</label>
                            <input type="number" name="phone" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        </div>

                        <!-- Password Field -->
                        <div style="margin-bottom: 15px;">
                            <label style="display: block; font-size: 14px; margin-bottom: 5px;">Password</label>
                            <input type="password" name="password" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        </div>

                        <!-- Description Field -->
                        <div style="margin-bottom: 15px;">
                            <label style="display: block; font-size: 14px; margin-bottom: 5px;">Description</label>
                            <textarea name="description" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                        </div>

                        <!-- Image Upload Field -->
                        <div style="margin-bottom: 15px;">
                            <label style="display: block; font-size: 14px; margin-bottom: 5px;">Image</label>
                            <input type="file" name="image" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        </div>

                        <!-- Submit Button -->
                        <div style="text-align: center;">
                            <input type="submit" name="add_teacher" value="Add Teacher" style="padding: 10px 20px; font-size: 16px; color: #fff; background-color: #4CAF50; border: none; border-radius: 4px; cursor: pointer;">
                        </div>
                    
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
