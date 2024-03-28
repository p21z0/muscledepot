<?php
echo "Countdown membership<br>";
// include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
date_default_timezone_set("Asia/Singapore");

$date = strtotime(date("Y-m-d H:i:s"));

$table_name="tbl_users";
$column="user_id";

$membership_data=get($table_name);
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

    $remaining = (strtotime($membership_expiry)) - time();
    $days_remaining = (floor($remaining/86400)+2);

        if ($days_remaining>30) {
            $status_change_checker="none";
            if (!($reminder_status==$status_change_checker)){
                $membership_editedValues=array("reminder_status" => "none");
                print_r($membership_editedValues);
                echo $membership_expiry."***".$days_remaining."<br>";
                update_from($membership_editedValues, $user_id, $table_name, $column);
            } else {    
                echo $membership_expiry." | skip update | ".$reminder_status." - ".$status_change_checker."<br>";
                echo (floor($remaining/86400)+2)."<br>";
            }
        } elseif (($days_remaining<=30) && ($days_remaining>7)){
            $status_change_checker="30";
            if (!($reminder_status==$status_change_checker)){
                $membership_editedValues=array("reminder_status" => "30");
                print_r($membership_editedValues);
                echo $membership_expiry."***".$days_remaining."<br>";
                update_from($membership_editedValues, $user_id, $table_name, $column);
            } else {
                echo $membership_expiry." | skip update | ".$reminder_status." - ".$status_change_checker."<br>";
                echo (floor($remaining/86400)+2)."<br>";
            }
        } elseif (($days_remaining<=7) && ($days_remaining>1)){
            $status_change_checker="7";
            if (!($reminder_status==$status_change_checker)){
                $membership_editedValues=array("reminder_status" => "7");
                print_r($membership_editedValues);
                echo $membership_expiry."***".$days_remaining."<br>";
                update_from($membership_editedValues, $user_id, $table_name, $column);
            } else {
                echo $membership_expiry." | skip update | ".$reminder_status." - ".$status_change_checker."<br>";
                echo (floor($remaining/86400)+2)."<br>";
            }
        } elseif (($days_remaining==1)){
            $status_change_checker="1";
            if (!($reminder_status==$status_change_checker)){
                $membership_editedValues=array("reminder_status" => "1");
                print_r($membership_editedValues);
                echo $membership_expiry."***".$days_remaining."<br>";
                update_from($membership_editedValues, $user_id, $table_name, $column);
            } else {
                echo $membership_expiry." | skip update | ".$reminder_status." - ".$status_change_checker."<br>";
                echo (floor($remaining/86400)+2)."<br>";    
            }
        }  elseif ($days_remaining<=0){
            $status_change_checker="0";
            if (!($reminder_status==$status_change_checker)){
                $membership_editedValues=array("reminder_status" => "0");
                print_r($membership_editedValues);
                echo $membership_expiry."***".$days_remaining."<br>";
                update_from($membership_editedValues, $user_id, $table_name, $column);
            } else {
                echo $membership_expiry." | skip update | ".$reminder_status." - ".$status_change_checker."<br>";
                echo (floor($remaining/86400)+2)."<br>";
            }
        }
    };
?>