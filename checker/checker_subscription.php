<?php
// echo "Checker subscription<br>";
// include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");

$table_name="tbl_subscription";
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

        //play outside
        date_default_timezone_set("Asia/Singapore");
        $date_today=date('Y-m-d');
        $column_2="subscription_id";

        $table_name_2="tbl_subscription";
        // if subscription_editedValues is same with subscription_status, don't update
        // how to check array for comparison
        if ($date_today > $subscription_end)
        {
            $status_change_checker="Expired";
            if (!($subscription_status==$status_change_checker)){
                // echo "hello";
            $subscription_editedValues=array("subscription_status" => "Expired");
            // print_r($subscription_editedValues);
            // echo " ".$subscription_id.":: ".$subscription_start." | ".$subscription_end."<br>";
            update_from($subscription_editedValues, $subscription_id, $table_name_2, $column_2);
            } else {
                // echo $subscription_end." | skip update | ".$subscription_status." - ".$status_change_checker."<br>";
            }
        }
        elseif ($date_today == $subscription_end)
        {
            $status_change_checker="Last day";
            if (!($subscription_status==$status_change_checker)){
            $subscription_editedValues=array("subscription_status" => "Last day");
            // print_r($subscription_editedValues);
            // echo " ".$subscription_id.":: ".$subscription_start." | ".$subscription_end."<br>";
            update_from($subscription_editedValues, $subscription_id, $table_name_2, $column_2);
            } else {
                // echo $subscription_end." | skip update | ".$subscription_status." - ".$status_change_checker."<br>";
            }
        }
        elseif ($date_today < $subscription_start) 
        {
            $status_change_checker="Early bird";
            if (!($subscription_status==$status_change_checker)){
            $subscription_editedValues=array("subscription_status" => "Early bird");
            // print_r($subscription_editedValues);
            // echo " ".$subscription_id.":: ".$subscription_start." | ".$subscription_end."<br>";
            update_from($subscription_editedValues, $subscription_id, $table_name_2, $column_2);
            } else {
                // echo $subscription_end." | skip update | ".$subscription_status." - ".$status_change_checker."<br>";
            }
            
        }
        elseif (($date_today >= $subscription_start) AND ($date_today < $subscription_end)) 
        {
            $status_change_checker="Active";
            if (!($subscription_status==$status_change_checker)){
            $subscription_editedValues=array("subscription_status" => "Active");
            // print_r($subscription_editedValues);
            // echo " ".$subscription_id.":: ".$subscription_start." | ".$subscription_end."<br>";
            update_from($subscription_editedValues, $subscription_id, $table_name_2, $column_2);
            } else {
                // echo $subscription_end." | skip update | ".$subscription_status." - ".$status_change_checker."<br>";
            }
        }
        else 
        {
            $status_change_checker="?x";
            if (!($subscription_status==$status_change_checker)){
            $subscription_editedValues=array("subscription_status" => "?x");
            // print_r($subscription_editedValues);
            // echo " ".$subscription_id.":: ".$subscription_start." | ".$subscription_end."<br>";
            update_from($subscription_editedValues, $subscription_id, $table_name_2, $column_2);
            } else {
                // echo $subscription_end." | skip update | ".$subscription_status." - ".$status_change_checker."<br>";
            }
        }
    }
?>