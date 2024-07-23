<?php

include 'config/connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get Fields' Values From User
    $fullname = $_POST['fullname'];
    $fullname_eng = $_POST['fullname_eng'];
    $year = $_POST['year'];
    $department = $_POST['department'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $doc_to = $_POST['doc_to'];

    $errors = array();

    // Checking If There Is Any Empty Field
    if(empty($fullname)){
        $errors[] = 'يجب إدخال الاسم الرباعي بالعربي';
    }
    if(empty($fullname_eng)){
        $errors[] = 'يجب إدخال الاسم بالانجليزي';
    }
    if(empty($year)){
        $errors[] = 'يجب ادخال سنة التخرج';
    }
    if(empty($department)){
        $errors[] = 'يجب تعيين القسم العلمي';
    }
    if(empty($address)){
        $errors[] = 'يجب كتابة العنوان';
    }
    if(empty($phone)){
        $errors[] = 'يجب كتابة رقم الموبايل';
    }
    if(empty($doc_to)){
        $errors[] = 'يجب تعيين الجهة المقصودة';
    }

    if(!empty($errors)) {
        $res = json_encode($errors);
        echo $res;
    }else{

        // Insertion Data Into Database
        $stmt = $conn->prepare('INSERT INTO graduates(fullname, fullname_eng, year, department, address, phone, document_to) values(?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$fullname, $fullname_eng, $year, $department, $address, $phone, $doc_to]);
        
        // Return Success Message To The Page
        $res = array('msg' => 'success');
        echo json_encode($res);
    }

} else {

    // Redirection If The Request Method Is Not 'POST'
    header("Location: index.php");
    exit();
}

?>