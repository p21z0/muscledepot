<?php
session_start();
if ($_SESSION['user_username']=="") {
    header("Location: ../login_qr/user_logout_proc.php");
}

include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/user_change_pw/user_perfect_function.php");
$table_name="tbl_users";//update
$username=$_POST['username'];
$password=_hash_string($_POST['password']);

$user_data = get_where_custom($table_name, "username", $username);

    if ($user_data->num_rows != 0){
        foreach ($user_data as $key => $row) {
            $user_id=$row['user_id'];
            $password1 = $row['password'];
            $firstname=$row['firstname'];
            $lastname=$row['lastname'];
            $user_type=$row['user_type'];//update
            $firsttime_pw=$row['firsttime_pw'];
            
            // echo $password1.$firstname.$lastname;
            // print_r($user_data);
            
            if (($password1==$password)){
                $_SESSION['user_user_id']=$user_id;
                $_SESSION['user_username']=$username;
                $_SESSION['user_user_type']=$user_type;
                $_SESSION['user_firstname']=$firstname;
                $_SESSION['user_lastname']=$lastname;

                if (($firsttime_pw=="1")){
                    $_SESSION['firsttime_pw']= "1";
                    header("Location: ../user_change_pw/user_firsttime_pw");
                } else {
                    header("Location: ../login_qr/login_qr");
                }
                
            } elseif ($password1!=$password) {
                $_SESSION['login']=1;
                header("Location: user_login");
            }
            // echo $password1." ".$password;
            // echo $_SESSION['username'];
            print_r($_SESSION);
        } 
    } else {
        // insert error message here
        header("Location: user_login");
    }
    
?>