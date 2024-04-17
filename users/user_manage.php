    <!-- NEED TO ADD IN TBL USER: LINK TO EDIT AND (DELETE FOR ADMIN ONLY) -->
    <!-- NEED TO ADD IN TBL SUBS: CRUD; PRINT, WHERE TBL_SUBS.USER_ID == TBL_USER.USER_ID -->
    <?php
// include ($_SERVER['DOCUMENT_ROOT']."/muscledepot/assets/css/sb-admin-2.min.css");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/a.php");

?>
<style>
        .flex-container {
            display: flex;
            justify-content: space-between; /* Align items along the main axis */
            align-items: center; /* Align items along the cross axis */
        }
        .flex-container-center {
            display: flex;
            justify-content: center; /* Align items along the main axis */
            align-items: center; /* Align items along the cross axis */
        }

        .flex-item {
            flex: 1; /* Grow and shrink x1 */
            text-align: right;
            padding-right: 1%;
            
        }

        .flex-item-2 {
            flex: 1; /* Grow and shrink x2 */
            align-self: flex-start;
            text-align: center;
            /* background: red; */
        }
        .flex-item-3 {
            flex: 3; /* Grow and shrink x2 */
            align-self: flex-start;
            text-align: left;
            /* background: red; */
        }

        #exluded-from-container {
        /* No specific flex properties applied */
        }

        /* The flip card container - set the width and height to whatever you want. We have added the border property to demonstrate that the flip itself goes out of the box on hover (remove perspective if you don't want the 3D effect */
        .flip-card {
        background-color: transparent;
        width: 500px;
        height: 500px;
        /* border: 1px solid #f1f1f1; */
        perspective: 1000px; /* Remove this if you don't want the 3D effect */
        margin-top: -200px;
        margin-left: 100px;
        text-align: right;
        
        }

        /* This container is needed to position the front and back side */
        .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.8s;
        transform-style: preserve-3d;
        }

        /* Do an horizontal flip when you move the mouse over the flip box container */
        .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
        }

        /* Position the front and back side */
        .flip-card-front, .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden; /* Safari */
        backface-visibility: hidden;
        }

        /* Style the front side (fallback if image is missing) */
        .flip-card-front {
        background-color: #bbb;
        color: black;
        width: 100%;
        height: 100%;
        overflow: hidden;
        }

        /* Style the back side */
        .flip-card-back {
        background-color: dodgerblue;
        color: white;
        transform: rotateY(180deg);
        }

        .icon {
        color: white;
        font-size: 10px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.01);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
        }
</style>

<script>
    function openInNewTab(url) {
        window.open(url, '_blank').focus();
    }
</script>

<div class="container-fluid">

<div class="card"  style="min-height: 400px; margin-top: 200px;">
    <!-- <img src="https://via.placeholder.com/1080x250" class="card-img-top " alt="..."> -->
    <div class="card-body">
        <?php

        $table_name="tbl_users";
        $user_id=$_GET['id'];

        $user_data=get_where_custom($table_name, "user_id", $user_id);

        foreach ($user_data as $key => $row){
            $user_id=$row['user_id'];
            $user_qr=$row['user_qr'];
            $user_pic=$row['user_pic'];
            $username=$row['username'];
            
            $firstname=$row['firstname'];
            $lastname=$row['lastname'];
            $birthdate=$row['birthdate'];
            $contact_no=$row['contact_no'];
                if ($contact_no==="0"){
                    $contact_no="N/A";
                } 
            $email_address=$row['email_address'];
                if ($email_address===""){
                    $email_address="N/A";
                }
            $user_type=$row['user_type'];
                if ($user_type == "1") {
                    $user_type = "Member";
                } elseif ($user_type == "0"){
                    $user_type = "Admin";
                } elseif ($user_type == "2"){
                    $user_type = "Non-member";
                } else {
                    $user_type = "Undetermined";
                }
            $gender=$row['gender'];
                if ($gender == "m") {
                    $gender = "Male";
                } elseif ($gender == "f"){
                    $gender = "Female";
                } else {
                    $gender = "Undetermined";
                }
            $user_status=$row['user_status'];
                if ($user_status == "1") {
                    $user_status = "Active";
                } elseif ($user_status == "0"){
                    $user_status = "Inactive";
                } else {
                    $user_status = "Undetermined";
                }
            $membership_expiry=$row['membership_expiry'];
            if ($membership_expiry==""){
                $membership_expiry="N/A";
            }
        ?>
            <div class="flex-container-center">
                <div class="flex-item">
                    <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-back">
                            <?php if($user_pic!=""){ ?>
                            <img src="../img/<?=$user_pic?>" id="image1" class="card-img-top dp-pic rounded" style="width: 500px; height: 500px;" alt="...">
                            <?php } else { ?>
                            <img src="../img/blank-profile.webp" id="image1" class="card-img-top dp-pic rounded" style="width: 500px; height: 500px;" alt="...">
                            <?php } ?>
                        </div>
                        <div class="flip-card-front">
                            <img src="../img/MuscleDep0t_Logo_Vertical Orientation_White.png" class="icon" style="width 10px;">
                            <img src="https://quickchart.io/qr?text=<?= $user_qr?>&light=ea5614&margin=1" id="image2" class="card-img-top dp-pic rounded" style="width: 500px; height: 500px;" alt="...">
                        </div>
                    </div>
                    </div>
                    
                    
                </div>                    
                <div class="flex-item-3">
                    <div class="user-details">

                    
                        <h2 class="card-title"><?= $firstname." ".$lastname ?></h2>
                        <p class="card-text org-desc-head">
                            <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. -->

                        </p>
                        <a href="subscription_add.php?id=<?=$user_id?>" class="btn btn-primary">Add subscription</a>
                        
                        <a href="../subscriptions/user_subscriptions?id=<?= $user_id?>" class="btn btn-success btn-icon-split btn-md">
                            <span class="icon text-red-50">
                                <i class="fa-solid fa-dumbbell"></i>
                            </span>
                            <span class="text">
                                Subscriptions
                            </span>
                        </a>

                        <a href="../training/training_manage?id=<?= $user_id?>" class="btn btn-info btn-icon-split btn-md">
                            <span class="icon text-red-50">
                                <i class="fa-solid fa-dumbbell"></i>
                            </span>
                            <span class="text">
                                Personal Training
                            </span>
                        </a>

                        <a href="../users/user_picture?id=<?= $user_id?>" class="btn btn-secondary btn-icon-split btn-md">
                            <span class="icon text-red-50">
                                <i class="fa-solid fa-dumbbell"></i>
                            </span>
                            <span class="text">
                                Change Picture
                            </span>
                        </a>

                        <a href="../mailing/send_qr_user?id=<?= $user_id?>" class="btn btn-dark btn-icon-split btn-md" onclick=openInNewTab('https://quickchart.io/qr?text=<?=$user_qr?>&light=ea5614&margin=1&size=700')>
                            <span class="icon text-red-50">
                                <i class="fa-solid fa-dumbbell"></i>
                            </span>
                            <span class="text">
                                Send QR
                            </span>
                        </a>

                        <a href="../users/user_edit?id=<?= $user_id?>" class="btn btn-warning btn-icon-split btn-md">
                            <span class="icon text-red-50">
                            <i class="far fa-edit"></i>
                            </span>
                            <span class="text">
                                    Edit
                                </span>
                            </a>
                    
                        <a href="../users/user_delete?id=<?= $user_id?>" class="btn btn-danger btn-icon-split btn-md">
                            <span class="icon text-red-50">
                            <i class="far fa-trash-alt"></i>
                            </span>
                            <span class="text">
                                Delete
                            </span>
                        </a>

                    <p class="card-text" id="exluded-from-container" style="margin-top: 20px">
                        Email address: <?=$email_address?><br>
                        Contact no: <?=$contact_no?><br>
                        Membership validity: <?=$membership_expiry?>
                    </p>
                </div>
                </div>

                <br>
                
        <?php
        }
        ?>
            </div>
        </div>
    </div>
</div>