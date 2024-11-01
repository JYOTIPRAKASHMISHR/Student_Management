<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body background="login1.jpg" style="margin: 0; font-family: Arial, sans-serif; text-align: center;">
    <div style="width: 300px; margin: 100px auto; background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <form action="login_cheak.php" method="POST">
            <h2>Login</h2>
            <h4>
                <?php
                    session_start();
                    error_reporting(0);
                    echo $_SESSION['loginMessage'] ?? ''; // Use null coalescing to avoid errors
                ?>
            </h4>
            <div style="margin-bottom: 15px;">
                <label for="username">Username</label><br>
                <input type="text" id="username" name="username" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div>
                <input type="submit" name="submit" value="Login" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">
            </div>
        </form>
    </div>
</body>
</html>
