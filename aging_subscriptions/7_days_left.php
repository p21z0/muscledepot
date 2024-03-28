    <!-- NEED TO ADD IN TBL USER: LINK TO EDIT AND (DELETE FOR ADMIN ONLY) -->
    <!-- NEED TO ADD IN TBL SUBS: CRUD; PRINT, WHERE TBL_SUBS.USER_ID == TBL_USER.USER_ID -->
    <?php
// include ($_SERVER['DOCUMENT_ROOT']."/muscledepot/assets/css/sb-admin-2.min.css");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/a.php");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/test/countdown.php");
$user_id="4";
?>

<div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aging Subscriptions</h6>
            </div>
            <div class="card-body">

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="last_day.php">Last day</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="3_days_left.php">3 days left</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="7_days_left.php">7 days left</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="user_subscriptions_earlybird.php?id=<?= $user_id?>">Early bird</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_subscriptions_expired.php?id=<?= $user_id?>">Expired</a>
                </li> -->
            </ul>
            <br>


                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Subscription Name</th>
                                <th>Price</th>
                                <th>Subscription Start</th>
                                <th>Subscription End</th>
                                <th>Subscription Status</th>
                                <th>Expiring in</th>
                                <th>Options</th>
                                <!-- <th>Subscription Type</th> -->
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Subscription Name</th>
                                <th>Price</th>
                                <th>Subscription Start</th>
                                <th>Subscription End</th>
                                <th>Subscription Status</th>
                                <th>Expiring in</th>
                                <th>Options</th>
                                <!-- <th>Subscription Type</th> -->
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                // echo $date_today=date('Y-m-d');
                                $table_name="tbl_subscription";
                                $user_data=get_where_custom($table_name, "reminder_status", "7");
                                foreach ($user_data as $key => $row) {
                                    $subscription_id=$row['subscription_id'];
                                    $subscription_name=$row['subscription_name'];
                                    $amount=$row['amount'];
                                    $user_id=$row['user_id'];
                                    $subscription_type=$row['subscription_type'];
                                    $subscription_start=$row['subscription_start'];
                                    $subscription_end=$row['subscription_end'];
                                    $subscription_status=$row['subscription_status'];

                                    $remaining = (strtotime($subscription_end)) - time();
                                    $days_remaining = floor($remaining / 86400) +2;
        
                            ?>

                                <tr>
                                    <td><?= $subscription_id?></td>
                                    <td><?= $subscription_name?></td>
                                    <td><?= $amount?></td>
                                    <td><?= $subscription_start?></td>
                                    <td><?= $subscription_end?></td>
                                    <td><?= $subscription_status?></td>
                                    <!-- <td><?= $subscription_status?></td> -->

                                    <?php if ($remaining>0){?>
                                        <td><?= $days_remaining?> days left</td>
                                    <?php } elseif ($remaining<0){?>
                                        <td class="text-danger font-weight-bold"><?= abs($days_remaining)?> days ago</td>
                                    <?php } ?>
                                    <td>
                                    <a href="subscription_edit.php?id=<?= $subscription_id?>&id2=<?= $user_id?>" class="btn btn-warning btn-icon-split btn-md">
                                        <span class="icon text-red-50">
                                        <i class="far fa-edit"></i>
                                        </span>
                                        <span class="text">
                                                Edit
                                            </span>
                                    </a>
                                    
                                    <a href="subscription_delete.php?id=<?= $subscription_id?>&id2=<?= $user_id?>" class="btn btn-danger btn-icon-split btn-md">
                                        <span class="icon text-red-50">
                                        <i class="far fa-trash-alt"></i>
                                        </span>
                                        <span class="text">
                                            Delete
                                        </span>
                                    </a>

                                    </td>
                                    <!-- <td><?php include ("checker_subscription.php");?></td> -->
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