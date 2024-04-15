<?php
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/a.php");

$user_id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Pic Test</title>

    <style>
        #my_camera{
            width: 480px;
            height: 360px;

        }

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
            text-align: center;
            padding-right: 3%;
        }

        .flex-item-2 {
            flex: 1; /* Grow and shrink x2 */
            align-self: flex-start;
            text-align: center;
            /* background: red; */
        }
        .flex-item-3 {
            flex: 1.5; /* Grow and shrink x2 */
            align-self: flex-start;
            text-align: left;
            /* background: red; */
        }
    </style>

</head>
<body onload="configure();">

    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Picture</h6>
            </div>
        <div class="card-body flex-container">
            <div class="flex-item border-right">
                <div class="flex-container-center">
                    <div id="my_camera"></div>
                </div>
                <div class="flex-container">
                    <div id="results" style="visibility: hidden; position: absolute;"></div><br>
                    <button type="button" class="pre_take_buttons btn btn-secondary btn-icon-split btn-md flex-item" onclick="previewSnap();" >
                        <i class="far fa-edit"></i>
                        </span>
                        <span class="text">
                                Capture
                            </span>
                        </a>
                    </button><br>
                    <button type="button" class="post_take_buttons btn btn-danger btn-icon-split btn-md flex-item" style="display: none; margin: 5px" onclick="previewCancel();" >
                        <i class="far fa-edit"></i>
                        </span>
                        <span class="text">
                                Cancel
                            </span>
                        </a>
                    </button>
                    <button type="button" class="post_take_buttons btn btn-success btn-icon-split btn-md flex-item" style="display: none;  margin: 5px" onclick="saveSnap();" >
                        <i class="far fa-edit"></i>
                        </span>
                        <span class="text">
                                Save
                            </span>
                        </a>
                    </button><br>
                </div>
            </div>
            
                <?php
                // fetch user details
                $user_data=get_where_custom("tbl_users", "user_id", $user_id);
                foreach ($user_data as $key => $row) {
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
                <div class="flex-item-2 ">
                    <!-- Insert HTML here -->
                    <div class="card-body text-left">
                        
                        <img src="https://quickchart.io/qr?text=<?= $user_qr?>" style="width: 200px; margin-right:15px;" class="card-img-top dp-pic border border-light-subtle float-left" alt="...">
                        <h2 class="card-title" style="color: #000;"><?=$firstname." ".$lastname ?></h2>
                        <p class="card-text">
                        Email address: <?=$email_address?><br>
                        Contact no: <?=$contact_no?><br>
                        Membership validity: <?=$membership_expiry?>
                        </p>
                        <a href="<?=base_url()?>subscriptions/user_subscriptions?id=<?=$user_id?>" class="btn btn-danger">Back</a>
                    </div>
                    
            <?php } ?>
            </div>
            <div class="flex-item-3">
                <?php
                    if ($user_pic!=""){ ?>
                    <td><img class="float-left rounded" alt="avatar1" style="" src="../img/<?= $user_pic?>" /></td>
                    <?php }
                    else { ?>
                    <td><img class="float-left rounded" alt="avatar2" style="" src="../img/blank-profile.webp" /></td>
                    <?php }
                ?>
            </div>
        </div>
    </div>
    <!-- Fix src file path -->
    <script type="text/javascript" src="../must/campic/webcam.min.js"></script>
    <script type="text/javascript">

        function configure()
        {
            Webcam.set({
                width: 480, 
                height: 360, 
                // crop_width: 480, 
                // crop_height: 360, 
                image_format:'jpeg', 
                jpeg_quality: 90
            });
        }

        Webcam.attach('#my_camera');

        function saveSnap()
        {
            Webcam.snap(function(data_uri)
            {
                document.getElementById('results').innerHTML= '<img id="webcam" src="'+data_uri+'">'
            });

            Webcam.reset();

            var base64image= document.getElementById("webcam").src;
            Webcam.upload(base64image, 'user_picture2.php?id=<?=$user_id?>', function(code, text)
            {
                // alert('Save successfully');
                // document.location.href="user_picture3.php"
            });

            Webcam.attach('#my_camera');
            // location.reload();
            setTimeout(function(){location.reload()}, 2000);
        }

        function previewSnap()
        {
            Webcam.freeze();
            document.getElementsByClassName('pre_take_buttons')[0].style.display = 'none';
			// document.getElementsByClassName('post_take_buttons').style.display = '';

            var post = document.getElementsByClassName('post_take_buttons');
            for (var i=0;i<post.length;i+=1){
                post[i].style.display = '';
            }

            // Webcam.attach('#my_camera');
        }

        function previewCancel() {
			Webcam.unfreeze();
			
			document.getElementsByClassName('pre_take_buttons')[0].style.display = '';
			// document.getElementsByClassName('post_take_buttons').style.display = '';

            var post = document.getElementsByClassName('post_take_buttons');
            for (var i=0;i<post.length;i+=1){
                post[i].style.display = 'none';
            }

            Webcam.attach('#my_camera');
		}


    </script>


</body>
</html>

<!-- user_picture 2 is proc page; user_picture 3 is for results
GOAL:
user picture requires user ID
sql updates where user ID == get[user ID]
move_uploaded file to a specific folder (not yet set)


-->