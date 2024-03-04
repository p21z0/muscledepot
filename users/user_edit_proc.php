<?php
    // session_start();
    include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");

    $table_name = 'tbl_users';
    $column = "user_id";
    
    // echo $_GET['id'];
	//get user ID from URL
	$id = $_GET['id'];
    
    $username=$_POST['username'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $birthdate=$_POST['birthdate'];
    $contact_no=$_POST['contact_no'];
    $gender=$_POST['gender'];
    $user_type=$_POST['user_type'];

	
    $user_editedValues=array(
        "username" => $username ,
        // "user_qr" => $user_qr,
        "firstname" => $firstname ,
        "lastname" => $lastname ,
        "birthdate" => $birthdate ,
        "contact_no" => $contact_no ,
        "gender" => $gender ,
        "user_type" => $user_type
		
	);

    update_from($user_editedValues, $id, $table_name, $column);
    // $_SESSION['alert_msg']=2;
    
	header("Location: index.php");
?>