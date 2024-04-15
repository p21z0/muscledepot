<?php
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/users/user_manage.php");

?>

        <div class="card shadow mb-4 mx-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Subscriptions</h6>
            </div>
            <div class="card-body">

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="user_subscriptions?id=<?= $user_id?>">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_subscriptions_active?id=<?= $user_id?>">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_subscriptions_lastday?id=<?= $user_id?>">Last day</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_subscriptions_earlybird?id=<?= $user_id?>">Early bird</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_subscriptions_expired?id=<?= $user_id?>">Expired</a>
                </li>
            </ul>
            <br>


                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Subscription Name</th>
                                <th>Price</th>
                                <th>PT</th>
                                <th>Subscription Start</th>
                                <th>Subscription End</th>
                                <th>Subscription Status</th>
                                <th>Options</th>
                                <!-- <th>Subscription Type</th> -->
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Subscription Name</th>
                                <th>Price</th>
                                <th>PT</th>
                                <th>Subscription Start</th>
                                <th>Subscription End</th>
                                <th>Subscription Status</th>
                                <th>Options</th>
                                <!-- <th>Subscription Type</th> -->
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                // echo $date_today=date('Y-m-d');
                                $table_name="tbl_subscription";
                                $user_data=get_where_custom($table_name, "user_id", $user_id);
                                foreach ($user_data as $key => $row) {
                                    $subscription_id=$row['subscription_id'];
                                    $subscription_name=$row['subscription_name'];
                                    $amount=$row['amount'];
                                    $pt_count=$row['pt_count'];
                                    $user_id=$row['user_id'];
                                    $subscription_type=$row['subscription_type'];
                                    $subscription_start=$row['subscription_start'];
                                    $subscription_end=$row['subscription_end'];
                                    $subscription_status=$row['subscription_status'];
        
                            ?>

                                <tr>
                                    <td><?= $subscription_id?></td>
                                    <td><?= $subscription_name?></td>
                                    <td><?= $amount?></td>
                                    <td><?= $pt_count?></td>
                                    <td><?= $subscription_start?></td>
                                    <td><?= $subscription_end?></td>
                                    <td><?= $subscription_status?></td>
                                    <td>
                                    <a href="subscription_edit?id=<?= $subscription_id?>&id2=<?= $user_id?>" class="btn btn-warning btn-icon-split btn-md">
                                        <span class="icon text-red-50">
                                        <i class="far fa-edit"></i>
                                        </span>
                                        <span class="text">
                                                Edit
                                            </span>
                                    </a>
                                    
                                    <a href="subscription_delete?id=<?= $subscription_id?>&id2=<?= $user_id?>" class="btn btn-danger btn-icon-split btn-md">
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
</div>

    <!-- /.container-fluid -->
          

<?php
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/b.php");
// include ('MuscleDepot/must/a.php');
// include "../assets/footer.html";