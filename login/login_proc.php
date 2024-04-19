<?php
session_start();

include "../must/perfect_function.php";
$table_name="tbl_users";//update
$username=$_POST['username'];
$password=_hash_string($_POST['password']);

$user_data = get_where_double($table_name, "username", $username, "user_type", "0");

    if ($user_data->num_rows != 0){
        foreach ($user_data as $key => $row) {
            $password1 = $row['password'];
            $firstname=$row['firstname'];
            $lastname=$row['lastname'];
            $user_type=$row['user_type'];//update
            
            // echo $password1.$firstname.$lastname;
            // print_r($user_data);
            if (($password1==$password)){
                $_SESSION['username']=$username;
                $_SESSION['user_type']=$user_type;
                $_SESSION['firstname']=$firstname;
                $_SESSION['lastname']=$lastname;
            
                include("../checker/countdown_subscription.php");
                // echo "--------------------------------------------------------------------<br>";
                include("../checker/checker_subscription.php");
                // echo "--------------------------------------------------------------------<br>";
                include("../checker/countdown_membership.php");
                // echo "--------------------------------------------------------------------<br>";
                include("../checker/checker_membership.php");
                // echo "--------------------------------------------------------------------<br>";
                include("../checker/checker_user.php");
                // echo "--------------------------------------------------------------------<br>";

                header("Location: ../users");//users ba ang home?
            } elseif ($password1!=$password) {
                $_SESSION['login']=1;
                header("Location: login.php");
            }
            // echo $password1." ".$password;
            // echo $_SESSION['username'];
            // print_r($_SESSION);
        } 
    } else {
        // insert error message here
        $_SESSION['login']=1;
        header("Location: login.php");
    }
    
?>