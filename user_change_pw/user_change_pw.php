<?php
session_start();
if ($_SESSION['user_username']=="") {
  header("Location: ../login_qr/user_logout_proc.php");
}

if (isset($_SESSION['login'])){
  if ($_SESSION['firsttime_pw']=="1") {
      header("Location: ../user_change_pw/user_firsttime_pw");
  }
}

include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/user_change_pw/user_perfect_function.php");
//get s ID from URL
$user_id=$_SESSION['user_user_id'];

$table_name = "tbl_users";
$column = "user_id";
$get_userData = get_where_custom($table_name, $column, $user_id);
//fetch result and pass it  to an array
foreach ($get_userData as $key => $row) {
	        $user_id=$row['user_id'];
          $oldpassword=$row['password'];
}
if (isset($_SESSION['alert_msg'])){
  if ($_SESSION['alert_msg']==3){
      echo "
          <div align=center>
          <div class='card mb-4 py-3 border-bottom-success bg-light text-dark'>
              <div class='card-body'>
              INCORRECT OLD PASSWORD
              </div>
          </div>
          </div>
          ";            
          
          
  }

  if ($_SESSION['alert_msg']==1){
      echo "
          <div align=center>
          <div class='card mb-4 py-3 border-bottom-success bg-light text-dark'>
              <div class='card-body'>
              YOUR NEW PASSWORD & CONFIRMATION PASSWORD DO NOT MATCH
              </div>
          </div>
          </div>
          ";
          
  }
  unset($_SESSION['alert_msg']);
}


?>
<script>
  function myFunction() {
    var x = document.getElementById("Inputoldpw");
    var y = document.getElementById("Inputnewpw");
    var z = document.getElementById("Inputconfirmpw");
    if (x.type === "password") {
      x.type = "text";
      y.type = "text";
      z.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
      z.type = "password";
    }
  }
</script>

<div align=center>
<div class="card-header bordercolor">
    <h1 class="headerblacked">CHANGE PASSWORD</h1>
</div>
<div class="card mb-4 w-100 bodyblacked mt-5">

<div class="container card shadow pb-8 mb-5">

<form class="bodyblacked2 card-body" method="post" action="user_change_pw_proc?id=<?= $user_id?>"><br>

  <div class="form-row mt-5">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Old Password</label>
      <input type="password" class="form-control" id="Inputoldpw" name="oldpw" required autocomplete=off>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">New Password</label>
      <input type="password" class="form-control" id="Inputnewpw" name="newpw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required autocomplete=off>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Confirm New Password</label>
      <input type="password" class="form-control" id="Inputconfirmpw" name="newpw2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required autocomplete=off>
      <input type="checkbox" style="margin-left: 200px; margin-top: 10px;" onclick="myFunction()">Show Password  
    </div>
</div>
    <br>
<br>
	<button type="submit" class="btn btn-success btn-icon-split" style="margin-left:%; margin-top: 5%;">
	<span class="icon text-white-50">
	<i class="fas fa-check"></i>
		</span>
		<span class="text">
			Continue
		</span>
	</button>
&nbsp;&nbsp;
	<a href="../login_qr/login_qr?id=<?= $user_id?>" class="btn btn-danger btn-icon-split" style=" margin-top:5%">
    <span class="icon text-white-50">
	<i class="fas fa-times"></i>
</span>
<span class="text">
    Cancel
</span>
</a>

	<br><br><br>
</form>
</div>
</div>
</div>
</div>



