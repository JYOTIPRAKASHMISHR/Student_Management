<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

// Database connection
$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get teacher data based on the provided ID
if (isset($_GET['id'])) {
    $teacher_id = intval($_GET['id']);
    $sql = "SELECT * FROM teacher WHERE id = ?";
    $stmt = $data->prepare($sql);
    $stmt->bind_param("i", $teacher_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $teacher = $result->fetch_assoc();
}

// Update teacher details in the database when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    
    $update_sql = "UPDATE teacher SET name=?, email=?, phone=?, description=? WHERE id=?";
    $stmt = $data->prepare($update_sql);
    $stmt->bind_param("ssssi", $name, $email, $phone, $description, $teacher_id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Teacher updated successfully!";
        header("Location: view_teacher.php"); // Redirect back to main page after update
        exit();
    } else {
        $_SESSION['message'] = "Error updating teacher: " . $data->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Teacher</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
        }
        .form-container {
            width: 400px;
            padding: 2rem;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin: 0.5rem 0 0.2rem;
            color: #666;
        }
        input[type="text"], input[type="email"], input[type="tel"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border 0.3s;
        }
        input:focus, textarea:focus {
            border: 1px solid #3b82f6;
            outline: none;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #3b82f6;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background-color: #2563eb;
        }
        .message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Update Teacher</h2>
        <?php if (isset($_SESSION['message'])): ?>
            <p class="message"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
        <?php endif; ?>
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($teacher['name']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($teacher['email']); ?>" required>

            <label for="phone">Phone:</label>
            <input type="tel" name="phone" value="<?php echo htmlspecialchars($teacher['phone']); ?>" required>

            <label for="phone">Phone:</label>
            <input type="password" name="password" value="<?php echo htmlspecialchars($teacher['password']); ?>" required>

            <label for="description">About:</label>
            <textarea name="description" required><?php echo htmlspecialchars($teacher['description']); ?></textarea>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
