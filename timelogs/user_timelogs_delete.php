<?php
$id = $_GET['id'];
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/a.php");

$log_id=$_GET['id'];
$user_id_2=$_GET['id2'];
?>

<div align=center class="mt-5">
        <!-- Begin Page Content -->
 
    <div class="container-fluid">

        <div class="card shadow w-50" style="border:none;">
            <div class="py-3 bordercolor" style="border:none;">
                <h1 class="m-0 headerblacked">DELETE RECORD</h1>
            </div>
                
            <div class="card-body">
                <h5 class="text-dark">Are you sure you want to delete this account?</h5>
                <br>
                <i><a href="user_timelogs_delete_proc?id=<?= $log_id?>&id2=<?= $user_id_2?>" class="btn btn-success btn-icon-split btn-md">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">
                        Continue
                    </span>
                </a>
                &nbsp;&nbsp;&nbsp;
                <a href="user_timelogs?id=<?= urlencode($user_id_2)?>" class="btn btn-danger btn-icon-split btn-md">
                    <span class="icon text-white-50">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                    <span class="text">
                        Cancel
                    </span>
                </a>
          
            </div>
        </div>
</div>
</div>
</div>
</div>