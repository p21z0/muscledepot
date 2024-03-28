<?php
echo "Countdown subscription<br>";
// include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
date_default_timezone_set("Asia/Singapore");

$date = strtotime(date("Y-m-d H:i:s"));

$table_name="tbl_subscription";
$column = "subscription_id";

$subscription_data=get($table_name);
foreach ($subscription_data as $key => $row) {
    $subscription_id=$row['subscription_id'];
    $subscription_name=$row['subscription_name'];
    $amount=$row['amount'];
    $user_id=$row['user_id'];
    $subscription_type=$row['subscription_type'];
    $subscription_start=$row['subscription_start'];
    $subscription_end=$row['subscription_end'];
    $subscription_status=$row['subscription_status'];
    $reminder_status=$row['reminder_status'];

    $remaining = (strtotime($subscription_end)) - time();
    $days_remaining = floor($remaining / 86400) +2;
        // if subscription_editedValues is same with reminder status, don't update
        // how to check array for comparison
        if ($days_remaining>7) {
            $status_change_checker="none";
            if (!($reminder_status==$status_change_checker)){
                $subscription_editedValues=array("reminder_status" => "none");
                print_r($subscription_editedValues);
                echo $subscription_end."***".$days_remaining."<br>";
                update_from($subscription_editedValues, $subscription_id, $table_name, $column);
            } else {
                echo $subscription_end." | skip update | ".$reminder_status." - ".$status_change_checker."<br>";
            }
            
        } elseif (($days_remaining<=7) && ($days_remaining>3)){
            $status_change_checker="7";
            if (!($reminder_status==$status_change_checker)){
                $subscription_editedValues=array("reminder_status" => "7");
                print_r($subscription_editedValues);
                echo $subscription_end."***".$days_remaining."<br>";
                update_from($subscription_editedValues, $subscription_id, $table_name, $column);
            }  else {
                echo $subscription_end." | skip update | ".$reminder_status." - ".$status_change_checker."<br>";
            }
        } elseif (($days_remaining<=3) && ($days_remaining>1)){
            $status_change_checker="3";
            if (!($reminder_status==$status_change_checker)){
                $subscription_editedValues=array("reminder_status" => "3");
                print_r($subscription_editedValues);
                echo $subscription_end."***".$days_remaining."<br>";
                update_from($subscription_editedValues, $subscription_id, $table_name, $column);
            } else {
                echo $subscription_end." | skip update | ".$reminder_status." - ".$status_change_checker."<br>";
            }
        } elseif (($days_remaining<=3) && ($days_remaining>=1)){
            $status_change_checker="1";
            if (!($reminder_status==$status_change_checker)){
                $subscription_editedValues=array("reminder_status" => "1");
                print_r($subscription_editedValues);
                echo $subscription_end."***".$days_remaining."<br>";
                update_from($subscription_editedValues, $subscription_id, $table_name, $column);
            } else {
                echo $subscription_end." | skip update | ".$reminder_status." - ".$status_change_checker."<br>";
            }
            // $subscription_editedValues=array("reminder_status" => "1");
        }  elseif ($days_remaining=0){
            $status_change_checker="zero";
            if (!($reminder_status==$status_change_checker)){
                $subscription_editedValues=array("reminder_status" => "zero");
                print_r($subscription_editedValues);
                echo $subscription_end."***".$days_remaining."<br>";
                update_from($subscription_editedValues, $subscription_id, $table_name, $column);
            } else {
                echo $subscription_end." | skip update | ".$reminder_status." - ".$status_change_checker."<br>";
            }
        } elseif ($days_remaining<=0){
            $status_change_checker="negative";
            if (!($reminder_status==$status_change_checker)){
                $subscription_editedValues=array("reminder_status" => "negative");
                print_r($subscription_editedValues);
                echo $subscription_end."***".$days_remaining."<br>";
                update_from($subscription_editedValues, $subscription_id, $table_name, $column);
            } else {
                echo $subscription_end." | skip update | ".$reminder_status." - ".$status_change_checker."<br>";
            }
        }
    };
?>

