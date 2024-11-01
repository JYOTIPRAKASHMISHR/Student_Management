<?php

$host="localhost";

$user="root";

$password="";

$db='schoolproject';

$data=mysqli_connect($host,$user,$password,$db);


if (isset($_GET['student_id'])) {
    $user_id = $_GET['student_id'];

    $sql = "DELETE FROM user WHERE id = '$user_id'";
    $result = mysqli_query($data, $sql);

    if ($result) {
        header("location:reports.php");
        exit(); // Ensures the script stops after redirection
    }
}



?>