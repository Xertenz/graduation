<?php

include 'config/connection.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get Admin ID From Session
    $adminId = $_SESSION['AdminId'];

    // Delete An Admin Based On ID
    $stmt = $conn->prepare('DELETE FROM admin WHERE id = ?');
    $stmt->execute([$adminId]);
    $res = array('msg' => 'success');
    echo json_encode($res);


} else {
    // Redirection If The Request Method Is Not 'POST'
    header("Location: manage-login.php");
    exit();
}

?>