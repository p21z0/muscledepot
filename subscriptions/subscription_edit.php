
<?php
// include ($_SERVER['DOCUMENT_ROOT']."/muscledepot/assets/css/sb-admin-2.min.css");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/a.php");

    $id=$_GET['id'];
    $form_location = "user_edit_proc.php?id=".$id;

    $table_name = "tbl_subscription";
    $column = "subscription_id";
    $get_userData = get_where_custom($table_name, $column, $id);

    //fetch result and pass it  to an array
    foreach ($get_userData as $key => $row) {
        $subscription_id=$row['subscription_id'];
        $subscription_name=$row['subscription_name'];
        $amount=$row['amount'];
        $pt_count=$row['pt_count'];
        $user_id=$row['user_id'];
        $subscription_type=$row['subscription_type'];
        $subscription_start=$row['subscription_start'];
        $subscription_end=$row['subscription_end'];
        $subscription_status=$row['subscription_status'];
    }
//  echo $firstname. $lastname;
?>

<div align=center>
    <div class="card mb-4 w-75">
        <div class="card-header">
            ADD NEW USER
        </div>

        <form method="post" action="<?=base_url()?>subscriptions/subscription_edit_proc.php?id=<?= $subscription_id?>&id2=<?= $user_id?>">
            <div class="" style="">
                <input type="text" name="sub_name" class="form-control form-control-user add-input" autocomplete=off placeholder="Subscription name" value="<?= $subscription_name?>" required>
                <input type="number" name="amount" class="form-control form-control-user add-input" autocomplete=off placeholder="Amount" value="<?= $amount?>" required>
                <input type="number" name="pt_count" class="form-control form-control-user add-input" autocomplete=off placeholder="Amount" value="<?= $pt_count?>" required>
                <input type="date" name="startdate" class="form-control form-control-user add-input" autocomplete=off placeholder="Start date" value="<?= $subscription_start?>" required>
                <input type="date" name="enddate" class="form-control form-control-user add-input" autocomplete=off placeholder="End date" value="<?=$subscription_end?>" required>
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
            <a href="<?=base_url()?>subscriptions/user_subscriptions.php?id=<?= $user_id?>" class="btn btn-danger btn-icon-split" style=" margin-top:3%; margin-bottom: 5%">
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