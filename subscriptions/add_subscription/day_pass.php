
<?php
// include ($_SERVER['DOCUMENT_ROOT']."/muscledepot/assets/css/sb-admin-2.min.css");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/a.php");

?>

<!-- copy user details section in user_subscription -->

<div align=center>
    <div class="card mb-4 w-75">
        <div class="card-header">
            ADD SUBSCRIPTION
        </div>
        <ul class="nav nav-tabs">
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
        </ul>
        <form method="post" action="<?=base_url()?>subscriptions/add_subscription/day_pass.php">
            <div class="" style="">
                <input type="text" name="sub_name" class="form-control form-control-user add-input" autocomplete=off placeholder="Subscription name" required>
                <input type="text" name="amount" class="form-control form-control-user add-input" autocomplete=off placeholder="Amount" required>
                <input type="text" name="startdate" class="form-control form-control-user add-input" autocomplete=off placeholder="Start date" required>
                <input type="date" name="enddate" class="form-control form-control-user add-input" autocomplete=off placeholder="End date" required>
                <input type="number" name="sub_description" class="form-control form-control-user add-input" autocomplete=off placeholder="Description" required>
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
            <a href="<?=base_url()?>users" class="btn btn-danger btn-icon-split" style=" margin-top:3%; margin-bottom: 5%">
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

echo base_url();
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/b.php");
// include ('MuscleDepot/must/a.php');
// include "../assets/footer.html";