
<?php
// include ($_SERVER['DOCUMENT_ROOT']."/muscledepot/assets/css/sb-admin-2.min.css");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/a.php");

    $id=$_GET['id'];
    $form_location = "user_edit_proc.php?id=".$id;

    $table_name = "tbl_users";
    $column = "user_id";
    $get_userData = get_where_custom($table_name, $column, $id);

    //fetch result and pass it  to an array
    foreach ($get_userData as $key => $row) {
        $user_id=$row['user_id'];
        $username=$row['username'];
        $firstname=$row['firstname'];
        $lastname=$row['lastname'];
        $birthdate=$row['birthdate'];
        $contact_no=$row['contact_no'];
        $gender=$row['gender'];
        $user_type=$row['user_type'];
        $membership_expiry=$row['membership_expiry'];
    }
//  echo $firstname. $lastname;
?>

<div align=center>
    <div class="card mb-4 w-75">
        <div class="card-header">
            EDIT USER
        </div>

        <form method="post" action="<?=$form_location?>">

            <div class="" style="">

                <input type="text" name="username" value=<?=$username?> class="form-control form-control-user add-input" autocomplete=off placeholder="Username" required readonly>

                <!-- <input type="text" name="user_type" class="form-control form-control-user add-input" autocomplete=off placeholder="User type" required> -->

                <input type="text" name="firstname" class="form-control form-control-user add-input" autocomplete=off placeholder="First name" value="<?= $firstname?>" required>

                <input type="text" name="lastname" class="form-control form-control-user add-input" autocomplete=off placeholder="Last name" value="<?=$lastname ?>" required>

                <input type="date" name="birthdate" value=<?=$birthdate?> class="form-control form-control-user add-input" autocomplete=off placeholder="Birthdate" required>

                <input type="number" name="contact_no" value="0<?=$contact_no?>" class="form-control form-control-user add-input" autocomplete=off placeholder="Contact number (Mobile)" required>

                <!-- <input type="date" name="gender" class="form-control form-control-user add-input" autocomplete=off placeholder="Gender" required> -->


                <select type="text" name="gender" class="form-control form-control-user add-input" autocomplete=off required>
                <option value="">Gender</option>
                <option value="f">Female</option>
                <option value="m">Male</option>
                </select>

                <select type="text" name="user_type"  id="user_type" class="form-control form-control-user add-input" autocomplete=off required>
                <option value="">User type</option>
                <option value="0">Admin</option>
                <option value="1">Member</option>
                <option value="2">Non-member</option>
                </select>

                <input type="date" name="membership_expiry" id="membership_expiry" value="<?=$membership_expiry?>" class="form-control form-control-user add-input" autocomplete=off placeholder="Membership expiry">

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
            <a href="<?=base_url()?>subscriptions/user_subscriptions?id=<?=$id?>" class="btn btn-danger btn-icon-split" style=" margin-top:3%; margin-bottom: 5%">
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

<script>
  // Get references to the input elements
  const user_type = document.getElementById('user_type');
  const membership_expiry = document.getElementById('membership_expiry');

  // Function to handle the user_type change event
  function handleInputChange() {
    // If user_type value is not equal to "1", hide membership_expiry; otherwise, display it
    if (user_type.value !== '1') {
        membership_expiry.style.display = 'none';
    } else {
        membership_expiry.style.display = 'inline-block';
    }
  }

  // Attach the handleInputChange function to the user_type change event
  user_type.addEventListener('change', handleInputChange);

  // Call handleInputChange initially to set the initial state
  handleInputChange();
</script>
<?php

// echo base_url();
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/b.php");
// include ('MuscleDepot/must/a.php');
// include "../assets/footer.html";