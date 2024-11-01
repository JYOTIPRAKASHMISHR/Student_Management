<?php

session_start();        // Starts the session, allowing access to any session data if it exists
session_destroy();      // Destroys all data associated with the current session, effectively logging the user out
header("location:login.php");   // Redirects the user to the login page
exit();                 // Ensures no further code runs after the redirection

?>
