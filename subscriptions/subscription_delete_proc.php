<?php
    // session_start();
    include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");

    $table_name = "tbl_subscription";
    //get user ID from URL
	$id = $_GET['id'];
    $user_id_2 = $_GET['id2'];
    $column = "subscription_id";
    delete_from($id, $table_name, $column);
    // $_SESSION['alert_msg']=3;

     // ______________________________________________________________________________________________________________________
    // GETTING ENTRY ID
    
    // date_default_timezone_set('Asia/Singapore');

    // $table_name="logs";
    // $username= $_SESSION['username'];
    // $adminfirstname=$_SESSION['firstname'];
    // $adminlastname=$_SESSION['lastname'];
    // $user_type=$_SESSION['access'];
    // $xdate=date('Y-m-d');
    // $xtime=date('h:i:sa');
    // $action="Deleted in accounts(".$id.")";
    
    // $user_data=array(
    //     "username" => $username ,
    //     "firstname" => $adminfirstname ,
    //     "lastname" => $adminlastname ,
    //     "user_type" => $user_type ,
    //     "xdate" => $xdate ,
    //     "xtime" => $xtime ,
    //     "action" => $action 

    // );

    // echo insert($user_data, $table_name);
    
// ______________________________________________________________________________________________________________________

    header("Location: user_subscriptions.php?id=".urlencode($user_id_2));

?>