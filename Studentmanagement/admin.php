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
                <li><a href="add_teacher.php">Add Teacher</a></li>
                <li><a href="view_teacher.php">View Teacher</a></li>
                <li><a href="settings.php">Add Course</a></li>
                <li><a href="settings.php">View Course</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <section class="overview">
                <h2>Overview</h2>
                <p>Welcome to the Admin Dashboard! This central hub is designed to streamline your workflow, 
                enabling you to manage students, teachers, and courses effortlessly. Stay informed with the latest updates, 
                track key performance indicators, and make data-driven decisions to enhance the educational experience. 
                Let’s keep everything organized and running smoothly!</p>
            </section>
        </main>
    </div>
</body>
</html>
