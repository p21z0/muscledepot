<?php

session_start();
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");

$table_name = "tbl_subscription";
$user_id=$_GET['id'];
$header_location="Location: user_subscriptions.php?id=".urlencode($user_id);

$sub_name=$_POST['sub_name'];
$amount=$_POST['amount'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];

$user_id=$_GET['id'];
$amount =$_POST['amount'];
// $sub_description=$_POST['sub_description'];
$subscription_type="Custom";

echo $startdate."<br>".$enddate;

if ($enddate < $startdate)
{
    echo "bawal";
    // session for alerting
} else
{
    $subscription_data=array(
        "subscription_name" => $sub_name,
        "user_id" => $user_id ,
        "amount" => $amount ,
        "subscription_type" => $subscription_type,
        "subscription_start" => $startdate ,
        "subscription_end" => $enddate
    );

    echo insert($subscription_data, $table_name);
}

header("Location: user_subscriptions.php?id=".urlencode($user_id));
?>
