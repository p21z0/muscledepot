<?php
    // session_start();
    include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");

    $table_name = 'tbl_subscription';
    $column = "subscription_id";
    
    
    // echo $_GET['id'];
	//get user ID from URL
	$id = $_GET['id'];
    $user_id_2 = $_GET['id2'];
    
    $sub_name=$_POST['sub_name'];
    $amount=$_POST['amount'];
    $startdate=$_POST['startdate'];
    $enddate=$_POST['enddate'];
	
    $user_editedValues=array(
        "subscription_name" => $sub_name,
        // "user_id" => $user_id ,
        "amount" => $amount ,
        // "subscription_type" => $subscription_type,
        "subscription_start" => $startdate ,
        "subscription_end" => $enddate
		
	);

    update_from($user_editedValues, $id, $table_name, $column);
    // $_SESSION['alert_msg']=2;
    
	header("Location: user_subscriptions.php?id=".urlencode($user_id_2));
?>