
<?php
// include ($_SERVER['DOCUMENT_ROOT']."/muscledepot/assets/css/sb-admin-2.min.css");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/a.php");

?>

<div align=center>
    <div class="card mb-4 w-75">
        <div class="card-header">
            ADD NEW USER
        </div>

        <form method="post" action="<?=base_url()?>users/user_add_proc.php">

            <div class="" style="">

                <input type="text" name="username" class="form-control form-control-user add-input" autocomplete=off placeholder="Username" required>

                <!-- <input type="text" name="user_type" class="form-control form-control-user add-input" autocomplete=off placeholder="User type" required> -->

                <input type="text" name="firstname" class="form-control form-control-user add-input" autocomplete=off placeholder="First name" required>

                <input type="text" name="lastname" class="form-control form-control-user add-input" autocomplete=off placeholder="Last name" required>

                <input type="date" name="birthdate" class="form-control form-control-user add-input" autocomplete=off placeholder="Birthdate" required>

                <input type="number" name="contact_no" class="form-control form-control-user add-input" autocomplete=off placeholder="Contact number (Mobile)" required>

                <!-- <input type="date" name="gender" class="form-control form-control-user add-input" autocomplete=off placeholder="Gender" required> -->


                <select type="text" name="gender" class="form-control form-control-user add-input" autocomplete=off required>
                <option value="">Gender</option>
                <option value="f">Female</option>
                <option value="m">Male</option>
                </select>

                <select type="text" name="user_type" class="form-control form-control-user add-input" autocomplete=off required>
                <option value="">User type</option>
                <option value="0">Admin</option>
                <option value="1">Member</option>
                </select>

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
            <a href="<?=base_url()?>users" class="btn btn-danger btn-icon-split" style=" margin-top:3%; margin-bottom: 5%">
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

echo base_url();
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/b.php");
// include ('MuscleDepot/must/a.php');
// include "../assets/footer.html";