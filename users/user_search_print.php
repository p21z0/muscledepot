
<?php
// include ($_SERVER['DOCUMENT_ROOT']."/muscledepot/assets/css/sb-admin-2.min.css");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
// include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/a.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="<?=$_SERVER['DOCUMENT_ROOT']?>/MuscleDepot/assets/css/sb-admin-2.min.css" rel="stylesheet"> -->
    <!-- <link href="template/css/sb-admin-2.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="../template/css/sb-admin-2.min.css">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

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

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <!-- <th>&nbsp;</th> -->
                                <th>Username</th>
                                <th>User type</th>
                                <th>Name</th>
                                <th>Birthdate</th>
                                <th>Gender</th>
                                <th>Privilege</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <!-- <th>&nbsp;</th> -->
                                <th>Username</th>
                                <th>User type</th>
                                <th>Name</th>
                                <th>Birthdate</th>
                                <th>Gender</th>
                                <th>Privilege</th>
                                <th>Status</th>
                                
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                        // echo ($_GET['search']."fguidifufhsdklfjghsdfkjgsdfklghsdflkjghdfsglkhjgrlkjghsloyighjrwloithyuilrtuwkhggkl");
                            if(isset($_GET['search'])){

                            
                                $table_name="tbl_users";
                                $search=$_GET['search'];
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
                                    <!-- <td><?= $user_pic?></td> -->
                                    <td><?= $username?></td>
                                    <td><?= $user_type?></td>
                                    <td><?= $firstname." ".$lastname?></td>
                                    <td><?= $birthdate?></td>
                                    <td><?= $gender?></td>
                                    <td><?= $user_type?></td>
                                    <td><?= $user_status?></td>
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
?>
<script>
    window.print();
</script>
