<?php

error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // It's generally better to avoid echoing connection success in production
    // echo "Connected successfully";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    // Use prepared statements for secure queries
    $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($data, $sql);

    if ($stmt) {
        // Bind parameters to the SQL query
        mysqli_stmt_bind_param($stmt, "ss", $name, $pass);
        
        // Execute the query
        mysqli_stmt_execute($stmt);
        
        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);

            if ($row["usertype"] == "student") {
                header("Location: studenthome.php");
                exit();
            } elseif ($row["usertype"] == "admin") {
                header("Location: admin.php");
                exit();
            } else {
                echo "User type is not recognized.";
            }
        } else {
            session_start();
            $message = "Username and password do not match";
            $_SESSION['loginMessage'] = $message;
            header("Location: login.php"); // Corrected: added closing quote
            exit(); // Ensure no further code is executed
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($data);
    }
}

// Close the database connection
mysqli_close($data);
?>
