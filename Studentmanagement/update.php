<?php
$host = 'localhost';
$user = 'root';
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

$id = $_GET['student_id'];

$sql = "SELECT * FROM user WHERE id='$id'"; 

$result = mysqli_query($data, $sql);

$info = $result->fetch_assoc();

if(isset($_POST['update'])){

    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $phone = $_POST['phone']; 
    $password = $_POST['password']; 

    $query = "UPDATE user SET username='$name', email='$email', phone='$phone', password='$password' WHERE id='$id'";
    $result2 = mysqli_query($data, $query);

    if($result2){
        echo "<p style='text-align: center; color: green;'>Update Successful</p>";
    } else {
        echo "<p style='text-align: center; color: red;'>Update Failed</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
                <li><a href="manage_users.php">Add Student</a></li>
                <li><a href="reports.php">View Student</a></li>
                <li><a href="settings.php">Add Teacher</a></li>
                <li><a href="view_teachers.php">View Teacher</a></li>
                <li><a href="settings.php">Add Course</a></li>
                <li><a href="settings.php">View Course</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <section class="overview">
               <h2 style="text-align: center;">Update Students</h2>

<div style="display: flex; justify-content: center; align-items: center; height: 80vh;">
   <form style="width: 300px; padding: 20px; background-color: #f3f8fb; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);" action="#" method="POST">
       <div style="margin-bottom: 15px;">   
            <label for="username" style="color: #1a73e8; font-weight: bold;">Username</label>
            <input type="text" id="username" name="name" value="<?php echo $info['username']; ?>" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #b3d7ff; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email" style="color: #1a73e8; font-weight: bold;">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $info['email']; ?>" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #b3d7ff; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="phone" style="color: #1a73e8; font-weight: bold;">Phone</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $info['phone']; ?>" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #b3d7ff; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password" style="color: #1a73e8; font-weight: bold;">Password</label>
            <input type="password" id="password" name="password" value="<?php echo $info['password']; ?>" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #b3d7ff; border-radius: 4px;">
        </div>

        <div style="text-align: center;">
            <button type="submit" name="update" style="padding: 10px 20px; font-size: 16px; background: linear-gradient(90deg, #007bff, #1a73e8); color: white; border: none; border-radius: 20px; cursor: pointer; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); transition: background 0.3s ease;">
                Update
            </button>
        </div>
    </form>
</div>
                
            </section>
        </main>
    </div>
</body>
</html>
