<?php
echo "Checker membership<br>";
// include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
date_default_timezone_set("Asia/Singapore");

$table_name="tbl_users";
$membership_data=get($table_name);
$column="user_id";

foreach ($membership_data as $key => $row) {
    $user_id=$row['user_id'];
    // $user_pic=$row['user_pic'];
    $username=$row['username'];
    $user_type=$row['user_type'];
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $birthdate=$row['birthdate'];
    $gender=$row['gender'];
    $user_status=$row['user_status'];
    $user_type=$row['user_type'];
    $membership_expiry=$row['membership_expiry'];
    $reminder_status=$row['reminder_status'];

    $date_today=date('Y-m-d');

    if (($user_type=="1") and ($date_today > $membership_expiry)){
        $membership_editedValues=array("user_type" => "2");
        echo " ".$user_id.":: ".$user_type." | ".$membership_expiry;
        print_r($membership_editedValues);
        echo "<br>";
        update_from($membership_editedValues, $user_id, $table_name, $column);
    } else {
        echo $user_id.":: skip update | ".$user_type." | ".$membership_expiry."<br>";
    }

};