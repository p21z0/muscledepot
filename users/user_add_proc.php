<?php
    session_start();
    include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");

    $table_name = "tbl_users";

    $username=$_POST['username'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $birthdate=$_POST['birthdate'];
    $email_address=$_POST['email_address'];
    $contact_no=$_POST['contact_no'];
    $gender=$_POST['gender'];
    $user_type=$_POST['user_type'];
    $membership_expiry=$_POST['membership_expiry'];


    //reference number generator
    date_default_timezone_set('Asia/Singapore');
    $today = date("Ymd");
    $formYear = date("Y");
    $formMonth = date("m");
    $formDay = date("d");
    $rand = strtoupper(substr(uniqid(sha1(time())),0,10));
    echo $user_qr = $today. "-" . $rand;

    //rand pass for 1st use generator
    $tmp_pw=_hash_string(uniqid(0,8));

    //add check for repeated timezone+rand

        $user_data=array(
            "username" => $username ,
            "password" => $tmp_pw ,
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

        // check if email is already in use
        $email_array = array();
        $username_array = array();

        // Iterate over each email address and username in tbl_users and add it to checker arrays
        $general_user_data=get("tbl_users");
        foreach ($general_user_data as $key => $row) {
            $general_email_address=$row['email_address'];
            $general_username=$row['username'];

            $email_array[] = $general_email_address;
            $username_array[] = $general_username;
        }

        // Flag to check if $var1 exists in array1
        $email_found = false;
        $username_found = false;

        // Compare $email_address with items in array1
        foreach ($email_array as $item) {
            if ($email_address === $item) {
                $email_found = true;
                // set session for alert here
                break; // Exit loop once a match is found
                header("Location: index.php");
            }
        }

        // Compare $username with items in array1
        foreach ($email_array as $item) {
            if ($username === $item) {
                $username_found = true;
                // set session for alert here
                break; // Exit loop once a match is found
                header("Location: index.php");
            }
        }

        // Check if $email_address was found in email_array
        if ((!$email_found) and (!$username_found)) {
            //passed
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
            
            //send success email alongside password
            // head canon: new col in tbl_users (isOTP) to track if PW needs to be updated on login. 

            // add session for alert regarding success/fail
            header("Location: index.php");
        }


    

?>
