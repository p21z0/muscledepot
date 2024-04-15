<?php
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/users/user_manage.php");

?>

    <div class="row">
        <?php

        $table_name="tbl_users";
        $user_id=$_GET['id'];
        // $user_id="4";

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

        
    </div>

        <div class="card shadow mb-4 mx-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Personal Training Sessions</h6>
            </div>
            <div class="card-body">
            <?php
                        $total_sum=sum_where("tbl_subscription", "pt_count", "user_id", $user_id);
                        if ($total_sum==""){$total_sum="0";}
                        $used_pt_count=get_where_custom_count("tbl_pt", "user_id", $user_id);
                        $available_pt_count=$total_sum-$used_pt_count;
                        ?>
                        <div class="flex-container col-3">
                            <div class="card border-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Total PT sessions</div>
                                <div class="card-body text-primary">
                                    <h5 class="card-title"><?=$total_sum?></h5>
                                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                </div>
                            </div>
                            <div class="card border-danger mb-3" style="max-width: 18rem;">
                                <div class="card-header">Used PT sessions</div>
                                <div class="card-body text-danger">
                                    <h5 class="card-title"><?=$used_pt_count?></h5>
                                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                </div>
                            </div>
                            <div class="card border-info mb-3" style="max-width: 18rem;">
                                <div class="card-header">Available PT Sessions</div>
                                <div class="card-body text-info">
                                    <h5 class="card-title"><?=$available_pt_count?></h5>
                                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                </div>
                            </div>
                        </div>
                    <br><br>
                </div>
            <?php
            }
            ?>
            
                <a href="training_add.php?id=<?=$user_id?>" class="btn btn-primary col-1 mx-4">Record training</a>
                <div class="table-responsive mx-4">
                    <table class="table table-bordered" id="dataTable" width="98%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Date</th>
                                <th>Coach</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Date</th>
                                <th>Coach</th>
                                <th>Options</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php

                                // echo $date_today=date('Y-m-d');
                                $table_name="tbl_pt";
                                $user_data=get_where_custom($table_name, "user_id", $user_id);
                                
                                foreach ($user_data as $key => $row) {
                                    $pt_id=$row['pt_id'];
                                    $date_use=$row['date_use'];
                                    $coach=$row['coach'];      
                            ?>

                                <tr>
                                    <td><?= $pt_id?></td>
                                    <td><?= $date_use?></td>
                                    <td><?= $coach?></td>
                                    <td>
                                        <a href="training_edit.php?id=<?= $pt_id?>&id2=<?= $user_id?>" class="btn btn-warning btn-icon-split btn-md">
                                            <span class="icon text-red-50">
                                            <i class="far fa-edit"></i>
                                            </span>
                                            <span class="text">
                                                    Edit
                                                </span>
                                        </a>
                                        
                                        <a href="training_delete.php?id=<?= $pt_id?>&id2=<?= $user_id?>" class="btn btn-danger btn-icon-split btn-md">
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