<?php

include 'config/connection.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get Fields' Values From User
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = array();

    // Checking If There Is Any Empty Field
    if(empty($email)){
        $errors[] = 'يجب إدخال الايميل';
    }
    if(empty($password)){
        $errors[] = 'يجب إدخال كلمة المرور';
    }

    if(!empty($errors)) {
        $res = json_encode($errors);
        echo $res;
    }else{

        // Check Admin Authentication
        $stmt = $conn->prepare('SELECT * from admin WHERE email = ? AND password = ?');
        $stmt->execute([$email, md5($password)]);
        $result_items = $stmt->rowCount();
        if($result_items > 0) {
            $admin = $stmt->fetch();
            $_SESSION['AdminId'] = $admin['id'];
            
            // Return Success Message To The Page
            $res = array('msg' => 'success');
            echo json_encode($res);
        }else{

            // Return Error Message To The Page
            $res = array('msg' => 'fail');
            echo json_encode($res);
        }
    }

} else {

    // Redirection If The Request Method Is Not 'POST'
    header("Location: manage-login.php");
    exit();
}

?>