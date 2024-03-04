<!---------------------------------------------------------------------------------------------------------------------------------->
       
<?php
// include ($_SERVER['DOCUMENT_ROOT']."/muscledepot/assets/css/sb-admin-2.min.css");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/a.php");

?>

<div class="container-fluid">

<div class="card"  style="min-height: 960px;">
    <img src="https://via.placeholder.com/1080x250" class="card-img-top " alt="...">
    <div class="card-body">
    <div class="row">
        <div class="col-2">
            <img src="https://via.placeholder.com/250x250/ff0000/000000" class="card-img-top dp-pic" alt="...">
        </div>
        <div class="col-8 ml-4">
        
            <h2 class="card-title">Lorem Ipsum</h2>
            <p class="card-text org-desc-head">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <a href="" class="btn btn-primary">Add event</a>
        </div>
    </div>

    <div>
        <h3>Events</h3>
        <form method=post action="" autocomplete="off"
            class="d-none d-sm-inline-block form-inline mr-auto md-3 my-2 my-md-0 mw-100 navbar-search w-25">
            <div class="input-group">
                <input type="text" name="search" class="form-control bg-light border-0 small pb-2" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2" required>

                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit" name="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Gym bros</h6>
            </div>
            <div class="card-body">

                <form method=post action="<?=base_url()?>organizations" autocomplete="off"
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
                    window.open("<?= base_url() ?>organizations/orgs_print");
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
                                $table_name="tbl_users";

                                $user_data=get($table_name);

                                foreach ($user_data as $key => $row) {
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

                            <?php   } ?>
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