<?php
date_default_timezone_set("Asia/Singapore");
$date_today=date('Y-m-d');
$table_name_2="tbl_subscriptions";
$column_2="subscription_id";

$table_name_2="tbl_subscription";

if ($date_today > $subscription_end)
{
    $subscription_editValues=array(
        "subscription_status" => "Expired"
    );
}
elseif ($date_today == $subscription_end)
{
    $subscription_editValues=array(
        "subscription_status" => "Last day"
    );
}
elseif ($date_today < $subscription_start) 
{
    $subscription_editValues=array(
        "subscription_status" => "Early bird"
    );
}
elseif (($date_today >= $subscription_start) AND ($date_today < $subscription_end)) 
{
    $subscription_editValues=array(
        "subscription_status" => "Active"
    );
}
else 
{
    $subscription_editValues=array(
        "subscription_status" => "?x"
    );
}
update_from($subscription_editValues, $subscription_id, $table_name_2, $column_2);
echo $subscription_status;

?>