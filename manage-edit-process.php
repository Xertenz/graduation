<?php

include 'config/connection.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get Fields' Values From User
    $adminId = $_SESSION['AdminId'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $new_password = empty($password) ? $_POST['oldpassword'] : md5($password);

    $errors = array();

    // Checking If There Is Any Empty Field
    if(empty($email)){
        $errors[] = 'يجب إدخال الايميل';
    }
    if(empty($username)){
        $errors[] = 'يجب إدخال اسم  المستخدم';
    }

    if(!empty($errors)) {
        $res = json_encode($errors);
        echo $res;
    }else{

        // Updating Admin Information
        $stmt = $conn->prepare('UPDATE admin SET email = ?, username = ?, password = ? WHERE id = ?');
        $stmt->execute([$email, $username, $new_password, $adminId]);

        // Return Message To The Page
        $res = array('msg' => 'success');
        echo json_encode($res);
    }

} else {

    // Redirection If The Request Method Is Not 'POST'
    header("Location: manage-login.php");
    exit();
}

?>