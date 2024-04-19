<?php
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/users/user_manage.php");

?>

        <div class="card shadow mb-4 mx-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Attendance</h6>
            </div>
            <div class="card-body">
                <a href="user_timelogs_add?id=<?=$user_id?>" class="btn btn-primary">Add attendance</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Name</th>
                                <!-- <th>QR Code</th> -->
                                <th>Status</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Name</th>
                                <!-- <th>QR Code</th> -->
                                <th>Status</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Option</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                $date_today=date('Y-m-d');
                                $user_id=$_GET['id'];
                                $timelogs_data=get_where_custom("tbl_timelogs", "user_id", $user_id);

                                foreach ($timelogs_data as $key => $row) {
                                    $log_id=$row['log_id'];
                                    $user_id=$row['user_id'];
                                    $subscription_id=$row['subscription_id'];
                                    $time_day=$row['time_day'];
                                    // $time_out=$row['time_out'];
                                    $time_hour=$row['time_hour'];
                                    $reference=$row['reference'];

                                    $user_data=get_where_custom_desc("tbl_users", "user_id", $user_id, "user_id");

                                    foreach ($user_data as $key => $row){
                                    $firstname=$row['firstname'];
                                    $lastname=$row['lastname'];
                                    $user_status=$row['user_status'];

                                    if ($user_status=="1"){
                                        $user_status_print="Active";
                                    } else {
                                        $user_status_print="Inactive";
                                    }
                                ?>

                                    <tr>
                                        <td><?= $log_id?></td>
                                        <td><?= $firstname." ".$lastname?></td>
                                        <!-- <td><?= $reference?></td> -->
                                        <td><?= $user_status_print?></td>
                                        <td><?= $time_day?></td>
                                        <td><?=$time_hour?></td>
                                        <td>
                                        <!-- <a href="subscription_edit?id=<?= $subscription_id?>&id2=<?= $user_id?>" class="btn btn-warning btn-icon-split btn-md">
                                            <span class="icon text-red-50">
                                            <i class="far fa-edit"></i>
                                            </span>
                                            <span class="text">
                                                    Edit
                                                </span>
                                        </a> -->
                                        
                                        <a href="user_timelogs_delete?id=<?= $log_id?>&id2=<?= $user_id?>" class="btn btn-danger btn-icon-split btn-md">
                                            <span class="icon text-red-50">
                                            <i class="far fa-trash-alt"></i>
                                            </span>
                                            <span class="text">
                                                Delete
                                            </span>
                                        </a>

                                        </td>
                                        <!-- <td><?php//include ("checker_subscription.php");?></td> -->
                                    </tr>

                            <?php   
                                }
                            } ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

    <!-- /.container-fluid -->
          

<?php
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/b.php");
// include ('MuscleDepot/must/a.php');
// include "../assets/footer.html";