
<?php
// include ($_SERVER['DOCUMENT_ROOT']."/muscledepot/assets/css/sb-admin-2.min.css");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/a.php");

$user_id=$_GET['id'];

?>

<!-- copy user details section in user_subscription -->

<div align=center>
    <div class="card mb-4 w-75">
        <div class="card-header">
            ADD SUBSCRIPTION
        </div>
        <!-- Future feature for pre built subscription type -->
        <!-- <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Daily</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Monthly</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Custom</a>
            </li>
        </ul> -->
        <form method="post" action="<?=base_url()?>timelogs/user_timelogs_add_proc?id=<?=$user_id?>">
            <div class="" style="">
                <input type="date" name="time_day" class="form-control form-control-user add-input" autocomplete=off placeholder="Date attended" required>
                <!-- <input type="date" name="time_hour" class="form-control form-control-user add-input" autocomplete=off placeholder="Time hour" required> -->
                <input type="time" name="time_hour" step="1" class="form-control form-control-user add-input" autocomplete=off placeholder="Time attended" required>
                <!-- <input type="text" name="sub_description" class="form-control form-control-user add-input" autocomplete=off placeholder="Description" required> -->
            </div>
            <br>
            <br>
            <!-- BUTTONS -->
            <button type="submit" class="btn btn-success btn-icon-split" style="margin-left:%; margin-top:3%; margin-bottom: 5%">
                <span class="icon text-white-50">
                    <i class="fas fa-user-plus"></i>
                </span>
                <span class="text">
                    NEXT
                </span>
            </button>
            
            &nbsp;&nbsp;
            <a href="<?=base_url()?>subscriptions/user_subscriptions.php?id=<?=$user_id?>" class="btn btn-danger btn-icon-split" style=" margin-top:3%; margin-bottom: 5%">
                <span class="icon text-white-50">
                    <i class="fas fa-ban"></i>
                </span>
                <span class="text">
                    CANCEL
                </span>
            </a>

        
        <form>

    </div>
</div>

<?php

// echo base_url();
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/b.php");
// include ('MuscleDepot/must/a.php');
// include "../assets/footer.html";