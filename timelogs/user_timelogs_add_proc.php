<?php

session_start();
include_once ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");

$table_name = "tbl_timelogs";

$time_day=$_POST['time_day'];
$time_hour=$_POST['time_hour'];

$time_day1 = date("Y-m-d", strtotime($time_day));
$time_hour2 = date("H:i:s", strtotime($time_hour));

$user_id=$_GET['id'];
$reference ="Manual";
$timelog_type="time in";

$timelog_data=array(
    "user_id" => $user_id ,
    "reference" => $reference ,
    "timelog_type" => $timelog_type ,
    "time_day" => $time_day1 ,
    "time_hour" => $time_hour2
);

echo insert($timelog_data, $table_name);

header("Location: user_timelogs?id=".urlencode($user_id));
?>
