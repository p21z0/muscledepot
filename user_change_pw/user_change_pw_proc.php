<?php
session_start();
if ($_SESSION['user_username']=="") {
    header("Location: ../login_qr/user_logout_proc.php");
}
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/user_change_pw/user_perfect_function.php");
    $table_name = 'tbl_users';
    $column = "user_id";
    echo "Old password" . $oldpw = _hash_string($_POST['oldpw']);
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

        if ($password==$oldpw){
            $user_editedValues = array(
                "password" => _hash_string($newpw)
            );
            update_from($user_editedValues, $id, $table_name, $column);
            $_SESSION['alert_msg']=4;
            header("Location: user_change_pw.php");
        }elseif($password!=$oldpw){
            $_SESSION['alert_msg']=3;
            echo "<br>DB Password:".$password."<br>";
            echo "WRONG CURRENT PW";
            unset($_SESSION['firsttime_pw']);
            header("Location: user_change_pw.php?id=".$id);
            
        }
}if($newpw!=$newpw2){
    $_SESSION['alert_msg']=1;
    echo "WRONG NEW AT CONFIRM PW";
    header("Location: user_change_pw.php?id=".$id);
    
    
}
	//header("Location: account_manage.php");
?>