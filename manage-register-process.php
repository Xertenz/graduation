<?php

include 'config/connection.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get Fields' Values From User
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $errors = array();

    // Checking If There Is Any Empty Field
    if(empty($email)){
        $errors[] = 'يجب إدخال الايميل';
    }
    if(empty($username)){
        $errors[] = 'يجب إدخال اسم المستخدم';
    }
    if(empty($password)){
        $errors[] = 'يجب إدخال كلمة المرور';
    }

    if(!empty($errors)) {
        $res = json_encode($errors);
        echo $res;
    }else{

        // Check If 'email' Has Been Registered Previously
        $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ?");
        $stmt->execute([$email]);
        if($stmt->rowCount()) {
            $res = array('msg' => 'fail');
            echo json_encode($res);
        }else{

            // Insertion Data Into Database
            $stmt = $conn->prepare('INSERT INTO admin (email, username, password) VALUES (?, ?, ?)');
            $stmt->execute([$email, $username, md5($password)]);

            // Return Success Message To The Page
            $res = array('msg' => 'success');
            echo json_encode($res);
        }

    }

} else {

    // Redirection If The Request Method Is Not 'POST'
    header("Location: manage-login.php");
    exit();
}

?>