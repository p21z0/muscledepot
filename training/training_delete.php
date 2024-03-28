<?php
$id = $_GET['id'];
$user_id = $_GET['id2'];
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/a.php");
?>

<div align=center class="mt-5">
        <!-- Begin Page Content -->
 
        <div class="container-fluid">

        <div class="card shadow w-50" style="border:none;">
                <div class="py-3 bordercolor" style="border:none;">
                  <h1 class="m-0 headerblacked">DELETE TRAINING SESSION</h1>
                </div>
                
                <div class="card-body">
                  <h5 class="text-dark">Are you sure you want to delete this record?</h5>
           <br>
                <i><a href="training_delete_proc.php?id=<?= $id?>&id2=<?=$user_id?>" class="btn btn-success btn-icon-split btn-md">
                <span class="icon text-white-50">
                  
      <i class="fas fa-check"></i>
        </span>
        <span class="text">
          Continue
        </span>
            </a>
        &nbsp;&nbsp;&nbsp;
        <a href="training_manage.php?id=<?=$user_id?>" class="btn btn-danger btn-icon-split btn-md">
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