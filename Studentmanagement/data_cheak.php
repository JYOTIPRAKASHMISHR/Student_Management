<?php

session_start(); // Corrected to session_start()

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

// Connect to the database
$data = mysqli_connect($host, $user, $password, $db);

// Check if the connection was successful
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST['apply'])) {
    // Collect and sanitize form data
    $data_name = mysqli_real_escape_string($data, trim($_POST['name']));
    $data_email = mysqli_real_escape_string($data, trim($_POST['email']));
    $data_phone = mysqli_real_escape_string($data, trim($_POST['phone']));
    $data_message = mysqli_real_escape_string($data, trim($_POST['message']));

    // Prepare the SQL statement
    $sql = "INSERT INTO admission (name, email, phone, message) VALUES ('$data_name', '$data_email', '$data_phone', '$data_message')";

    // Execute the query
    if (mysqli_query($data, $sql)) {
        $_SESSION['message'] = "Your application was sent successfully.";
        header("Location: index.php"); // Use proper header for redirection
        exit(); // Good practice to call exit after header redirection
    } else {
        echo "Apply Failed: " . mysqli_error($data);
    }
}

// Close the database connection (optional, but good practice)
mysqli_close($data);

?>
