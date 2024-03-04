<?php
    session_start();
    include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");

    $table_name = "tbl_users";

    // user_type gender birthdate lastname firstname username
    $username=$_POST['username'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $birthdate=$_POST['birthdate'];
    $contact_no=$_POST['contact_no'];
    $gender=$_POST['gender'];
    $user_type=$_POST['user_type'];
    // $user_pic=$_POST['user_pic'];
    // $user_status=$_POST['user_status'];

    //reference number generator
    date_default_timezone_set('Asia/Singapore');
    $today = date("Ymd");
    $formYear = date("Y");
    $formMonth = date("m");
    $formDay = date("d");
    $rand = strtoupper(substr(uniqid(sha1(time())),0,10));
    echo $user_qr = $today. "-" . $rand;
    //add check for repeated timezone+rand

    $user_data=array(
        "username" => $username ,
        "user_qr" => $user_qr,
        "firstname" => $firstname ,
        "lastname" => $lastname ,
        "birthdate" => $birthdate ,
        "contact_no" => $contact_no ,
        "gender" => $gender ,
        "user_type" => $user_type
        // "contact" => $contact ,
        // "email" => $email ,
        // "acct_type" => $user_type
    );

    //add admin to reenter pw
    // add session for alert regarding success/fail
    echo insert($user_data, $table_name);


    header("Location: index.php");


    

?>
