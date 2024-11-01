<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

// Establish database connection
$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if 'id' is set in the URL and delete the corresponding record
if (isset($_GET['id'])) {
    $teacher_id = intval($_GET['id']); // Ensure ID is an integer for security

    // Prepare the delete query
    $sql = "DELETE FROM teacher WHERE id = ?";
    $stmt = $data->prepare($sql);
    $stmt->bind_param("i", $teacher_id);

    // Execute and check if the record was deleted
    if ($stmt->execute()) {
        $_SESSION['message'] = "Teacher deleted successfully!";
    } else {
        $_SESSION['message'] = "Error deleting teacher: " . $data->error;
    }

    $stmt->close();
}

// Redirect back to the main page
header("Location: view_teacher.php");
exit();
?>
