    <!-- NEED TO ADD IN TBL USER: LINK TO EDIT AND (DELETE FOR ADMIN ONLY) -->
    <!-- NEED TO ADD IN TBL SUBS: CRUD; PRINT, WHERE TBL_SUBS.USER_ID == TBL_USER.USER_ID -->
    <?php
// include ($_SERVER['DOCUMENT_ROOT']."/muscledepot/assets/css/sb-admin-2.min.css");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/a.php");

?>

<div class="container-fluid">

<div class="card"  style="min-height: 960px;">
    <img src="https://via.placeholder.com/1080x250" class="card-img-top " alt="...">
    <div class="card-body">
    <div class="row">
        <?php

        $table_name="tbl_users";
        $user_id=$_GET['id'];

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
            
                <h2 class="card-title"><?= $firstname." ".$lastname ?></h2>
                <p class="card-text org-desc-head">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                </p>
                <a href="subscription_add.php?id=<?=$user_id?>" class="btn btn-primary">Add subscription</a>
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
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Subscriptions</h6>
            </div>
            <div class="card-body">

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="user_subscriptions?id=<?= $user_id?>">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_subscriptions_active?id=<?= $user_id?>">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_subscriptions_lastday?id=<?= $user_id?>">Last day</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="user_subscriptions_earlybird?id=<?= $user_id?>">Early bird</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_subscriptions_expired?id=<?= $user_id?>">Expired</a>
                </li>
            </ul>
            <br>


                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Subscription Name</th>
                                <th>Price</th>
                                <th>Subscription Start</th>
                                <th>Subscription End</th>
                                <th>Subscription Status</th>
                                <th>Options</th>
                                <!-- <th>Subscription Type</th> -->
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Subscription Name</th>
                                <th>Price</th>
                                <th>Subscription Start</th>
                                <th>Subscription End</th>
                                <th>Subscription Status</th>
                                <th>Options</th>
                                <!-- <th>Subscription Type</th> -->
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                // echo $date_today=date('Y-m-d');
                                $table_name="tbl_subscription";
                                $user_data=get_where_double($table_name, "user_id", $user_id, "subscription_status", "Early bird");
                                foreach ($user_data as $key => $row) {
                                    $subscription_id=$row['subscription_id'];
                                    $subscription_name=$row['subscription_name'];
                                    $amount=$row['amount'];
                                    $user_id=$row['user_id'];
                                    $subscription_type=$row['subscription_type'];
                                    $subscription_start=$row['subscription_start'];
                                    $subscription_end=$row['subscription_end'];
                                    $subscription_status=$row['subscription_status'];
        
                            ?>

                                <tr>
                                    <td><?= $subscription_id?></td>
                                    <td><?= $subscription_name?></td>
                                    <td><?= $amount?></td>
                                    <td><?= $subscription_start?></td>
                                    <td><?= $subscription_end?></td>
                                    <td><?= $subscription_status?></td>
                                    <!-- <td><?= $subscription_status?></td> -->
                                    <td>
                                    <a href="subscription_edit?id=<?= $subscription_id?>&id2=<?= $user_id?>" class="btn btn-warning btn-icon-split btn-md">
                                        <span class="icon text-red-50">
                                        <i class="far fa-edit"></i>
                                        </span>
                                        <span class="text">
                                                Edit
                                            </span>
                                    </a>
                                    
                                    <a href="subscription_delete?id=<?= $subscription_id?>&id2=<?= $user_id?>" class="btn btn-danger btn-icon-split btn-md">
                                        <span class="icon text-red-50">
                                        <i class="far fa-trash-alt"></i>
                                        </span>
                                        <span class="text">
                                            Delete
                                        </span>
                                    </a>

                                    </td>
                                    <!-- <td><?php include ("checker_subscription.php");?></td> -->
                                </tr>

                            <?php
                            } ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <!-- /.container-fluid -->
          

<?php
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/b.php");
// include ('MuscleDepot/must/a.php');
// include "../assets/footer.html";