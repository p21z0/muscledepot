<?php
    session_start();
    include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");

    $table_name = "tbl_users";

    // user_type gender birthdate lastname firstname username
    $username=$_POST['username'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $birthdate=$_POST['birthdate'];
    $email_address=$_POST['email_address'];
    $contact_no=$_POST['contact_no'];
    $gender=$_POST['gender'];
    $user_type=$_POST['user_type'];
    $membership_expiry=$_POST['membership_expiry'];
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
            "email_address" => $email_address ,
            "gender" => $gender ,
            "user_type" => $user_type ,
            "membership_expiry" => $membership_expiry
        );

        //add admin to reenter pw
        // add session for alert regarding success/fail
        echo insert($user_data, $table_name);

        include_once('../checker/checker_user.php');

        $latest_userdata=get_last($table_name, "user_id");
        foreach ($latest_userdata as $key => $row) {
            $user_id=$row['user_id'];
            $user_pic=$row['user_pic'];
            $username=$row['username'];
            $user_type=$row['user_type'];
            $firstname=$row['firstname'];
            $lastname=$row['lastname'];
            $birthdate=$row['birthdate'];

            $gender=$row['gender'];
    
            include_once('../mailing/send_user_success.php');
        }
        
        header("Location: index.php");


    

?>
