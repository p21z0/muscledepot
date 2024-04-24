<?php
session_start();
if ($_SESSION['user_username']=="") {
    header("Location: ../login_qr/user_logout_proc.php");
}
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/user_change_pw/user_perfect_function.php");
    $table_name = 'tbl_users';
    $column = "user_id";
    $newpw = $_POST['newpw'];
    $newpw2 = $_POST['newpw2'];
    $id = $_GET['id'];
    $user_data = get_where_custom($table_name, $column, $id);
	foreach ($user_data as $key => $row) {
        $user_id=$row['user_id'];
        $password = $row['password'];
        $username = $row['username'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
    }
    
    // echo $id;
    // echo "<br>";
    // echo "databasepassword =" . $password1;
    // echo "<br>";
    // echo "new password =" . $currentpw;
    if ($newpw==$newpw2){


            $user_editedValues = array(
                "password" => _hash_string($newpw) ,
                "firsttime_pw" => "0"
            );
            update_from($user_editedValues, $id, $table_name, $column);

            $_SESSION['login']=3;
            header("Location: ../login_qr/user_login");

    } elseif($newpw!=$newpw2){
        $_SESSION['alert_msg']=1;
        echo "WRONG NEW AND CONFIRM PW";

        header("Location: user_firsttime_pw.php?id=".$id);
        
    }

	//header("Location: account_manage.php");
?>