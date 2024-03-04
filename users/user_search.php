
<?php
// include ($_SERVER['DOCUMENT_ROOT']."/muscledepot/assets/css/sb-admin-2.min.css");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/a.php");

?>

<div class="container-fluid">
        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-2 text-gray-800">Gym bros</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Gym bros</h6>
            </div>
            <div class="card-body">

                <form method=post action="user_search.php" autocomplete="off"
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search w-25">

                    <div class="input-group">
                        <input type="text" name="search" class="form-control bg-light border-0 small pb-2" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2" >

                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit" name="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <a href="user_add.php" class="btn btn-secondary btn-icon-split add-item" style="margin-top:-1px">
                    <span class="icon text-white-50">
                        <i class="fas fa-user-plus"></i>
                    </span>
                    <span class="text">
                        ADD USER
                    </span>
                </a>

                <button onclick="quorum_print()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-file-invoice fa-sm text-white-50 p-1"></i> Generate document </button>
                <script>
                    function quorum_print() {
                    window.open("<?= base_url() ?>users/user_search_print.php?search=<?=$_POST['search']?>");
                    } 
                </script>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Username</th>
                                <th>User type</th>
                                <th>Name</th>
                                <th>Birthdate</th>
                                <th>Gender</th>
                                <th>Privilege</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Username</th>
                                <th>User type</th>
                                <th>Name</th>
                                <th>Birthdate</th>
                                <th>Gender</th>
                                <th>Privilege</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if(isset($_POST['search'])){

                            
                                $table_name="tbl_users";
                                $search=$_POST['search'];
                                $orgs_count=all_users_search_count($search);
                                
                                if ($orgs_count==0)
                                {
                                    echo '<span class="ml-3"><i>No results for<b> "'.$search.'"</b></i></span>';
                                } else
                                {
                                    echo '<span class="ml-3"><i>Results for<b>  "'.$search.'"</b></i></span><br><br>';
                                }
                                // echo $orgs_count;
                                $orgs_data=all_users_search($search);

                                foreach ($orgs_data as $key => $row) {
                                    $user_id=$row['user_id'];
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

                                <tr>
                                    <td><?= $user_pic?></td>
                                    <td><?= $username?></td>
                                    <td><?= $user_type?></td>
                                    <td><?= $firstname." ".$lastname?></td>
                                    <td><?= $birthdate?></td>
                                    <td><?= $gender?></td>
                                    <td><?= $user_type?></td>
                                    <td><?= $user_status?></td>

                                    <td>
                                        <a href="user_change_password.php?id=<?= $user_id?>" class="btn btn-info btn-icon-split btn-md">
                                        <span class="icon text-red-50">
                                        <i class="fa-solid fa-key"></i>
                                        </span>
                                        <span class="text">
                                                Change Password
                                            </span>
                                        </a>

                                        <a href="user_edit.php?id=<?= $user_id?>" class="btn btn-warning btn-icon-split btn-md">
                                        <span class="icon text-red-50">
                                        <i class="far fa-edit"></i>
                                        </span>
                                        <span class="text">
                                                Edit
                                            </span>
                                        </a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="user_delete.php?id=<?= $user_id?>" class="btn btn-danger btn-icon-split btn-md">
                                    <span class="icon text-red-50">
                                    <i class="far fa-trash-alt"></i>
                                    </span>
                                    <span class="text">
                                        Delete
                                    </span>
                                        </a>
                                        </a>
                                    </td>
                                </tr>

                            <?php   }
                            } else {
                                echo "<i>No valid search field.</i><br><br>";
                            }?>
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