<?php

session_start();
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");

$table_name = "tbl_pt";
$user_id=$_GET['id'];

$date_use=$_POST['date_use'];
$coach=$_POST['coach'];

    $pt_data=array(
        "user_id" => $user_id ,
        "date_use" => $date_use ,
        "coach" => $coach
    );

    echo insert($pt_data, $table_name);
    // echo "<br>";
    // include("../checker/countdown_subscription.php");
    // echo "--------------------------------------------------------------------<br>";
    // include("../checker/checker_subscription.php");
    // echo "--------------------------------------------------------------------<br>";


header("Location: training_manage.php?id=".urlencode($user_id));
?>
