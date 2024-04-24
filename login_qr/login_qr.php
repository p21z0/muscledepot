    <!-- NEED TO ADD IN TBL USER: LINK TO EDIT AND (DELETE FOR ADMIN ONLY) -->
    <!-- NEED TO ADD IN TBL SUBS: CRUD; PRINT, WHERE TBL_SUBS.USER_ID == TBL_USER.USER_ID -->
    <?php
    session_start();
    if ($_SESSION['user_username']=="") {
		header("Location: ../login_qr/user_logout_proc.php");
	}

    if (isset($_SESSION['login'])){
        if ($_SESSION['firsttime_pw']=="1") {
            header("Location: ../user_change_pw/user_firsttime_pw");
        }
    }
// include ($_SERVER['DOCUMENT_ROOT']."/muscledepot/assets/css/sb-admin-2.min.css");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/user_change_pw/user_perfect_function.php");

?>

<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="<?=$_SERVER['DOCUMENT_ROOT']?>/MuscleDepot/assets/css/sb-admin-2.min.css" rel="stylesheet"> -->
    <!-- <link href="template/css/sb-admin-2.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="../template/css/sb-admin-2.min.css">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



<div class="container-fluid">

<div class="card"  style="min-height: 400px;">
    <!-- <img src="https://via.placeholder.com/1080x250" class="card-img-top " alt="..."> -->
    <div class="card-body">
    <div class="row">
        <?php

        $table_name="tbl_users";
        $user_id=$_SESSION['user_user_id'];

        $user_data=get_where_custom($table_name, "user_id", $user_id);

        foreach ($user_data as $key => $row){
            $user_id=$row['user_id'];
            $user_qr=$row['user_qr'];
            $user_pic=$row['user_pic'];
            $username=$row['username'];
            $user_type=$row['user_type'];
            $firstname=$row['firstname'];
            $lastname=$row['lastname'];
            $birthdate=$row['birthdate'];
            $gender=$row['gender'];
            $user_status=$row['user_status'];

            if ($user_type == "1") {
                $user_type = "Member";
            } elseif ($user_type == "0"){
                $user_type = "Admin";
            } else {
                $user_type = "Undetermined";
            }

            if ($gender == "m") {
                $gender = "Male";
            } elseif ($gender == "f"){
                $gender = "Female";
            } else {
                $gender = "Undetermined";
            }

            if ($user_status == "1") {
                $user_status = "Active";
            } elseif ($user_status == "0"){
                $user_status = "Inactive";
            } else {
                $user_status = "Undetermined";
            }

        ?>
            <div class="col-2">
                <!-- <img src="https://via.placeholder.com/250x250/ff0000/000000" class="card-img-top dp-pic" alt="..."> -->
                <img src="https://quickchart.io/qr?text=<?= $user_qr?>" class="card-img-top dp-pic" alt="...">
                
            </div>
            <div class="col-8 ml-4">
                <h4 class="card-title">Member Name</h4>
                <h2 class="card-title"><?= $firstname." ".$lastname ?></h2>
                <h4 class="card-title">Member ID</h4>
                <h2 class="card-title"><?= $user_id ?></h2>
                <a href="../user_change_pw/user_change_pw?id=<?= $user_id?>" class="btn btn-secondary btn-icon-split btn-md">
                            <span class="icon text-red-50">
                                <i class="fa-solid fa-dumbbell"></i>
                            </span>
                            <span class="text">
                                Change Password
                            </span>
                        </a>
                <a href="user_logout_proc" class="btn btn-secondary btn-icon-split btn-md">
                            <span class="icon text-red-50">
                                <i class="fa-solid fa-dumbbell"></i>
                            </span>
                            <span class="text">
                                Log Out
                            </span>
                </a>

                <p class="card-text org-desc-head">
                    <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. -->

                </p>
                <!-- <a href="" class="btn btn-info">View attendance</a> WIP-->

                <!-- not really needed here-->
                <!-- <a href="../users/user_edit.php?id=<?=$user_id?>" class="btn btn-warning">Edit details</a>
                <a href="../users/user_delete.php?id<?=$user_id?>" class="btn btn-danger">Delete User</a> -->

            </div>
        <?php
        }
        ?>
        
    </div>

    <div>
    </div>
</div>
    

    <!-- /.container-fluid -->
          

<?php
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/b.php");
// include ('MuscleDepot/must/a.php');
// include "../assets/footer.html";