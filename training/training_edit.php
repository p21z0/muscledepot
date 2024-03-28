
<?php
// include ($_SERVER['DOCUMENT_ROOT']."/muscledepot/assets/css/sb-admin-2.min.css");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/a.php");

    $id=$_GET['id'];
    $form_location = "training_edit_proc.php?id=".$id;

    $table_name = "tbl_pt";
    $column = "pt_id";
    $get_userData = get_where_custom($table_name, $column, $id);

    //fetch result and pass it  to an array
    foreach ($get_userData as $key => $row) {
        $user_id=$row['user_id'];
        $date_use=$row['date_use'];
        $coach=$row['coach'];
    }
?>

<div align=center>
    <div class="card mb-4 w-75">
        <div class="card-header">
            ADD NEW USER
        </div>

        <form method="post" action="<?=$form_location?>">

            <div class="" style="">
                <input type="date" name="date_use" value=<?=$date_use?> class="form-control form-control-user add-input" autocomplete=off placeholder="Date PT is used" required>
                <input type="text" name="coach" value=<?=$coach?> class="form-control form-control-user add-input" autocomplete=off placeholder="Coach assigned" required>
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
            <a href="<?=base_url()?>training/training_manage.php?id=<?=$user_id?>" class="btn btn-danger btn-icon-split" style=" margin-top:3%; margin-bottom: 5%">
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