<?php

// Database Information
$hostname = 'localhost';
$username = 'ahmed';
$password = '';
$database = 'graduation';

// Database Connection
try {
    $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'Connection Failed '.$e->getMessage();
}

?>
