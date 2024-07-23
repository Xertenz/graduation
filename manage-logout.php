<?php

// Destroying Session And Redirecting To Login Page
session_start();
session_unset();
session_destroy();
header('Location: manage-login.php');

?>