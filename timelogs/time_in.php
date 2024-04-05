<?php
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
date_default_timezone_set("Asia/Singapore");
include ("../checker/checker_user.php");
// echo $now = date("Y-m-d H:i:s");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  </head>
<body>
  <h1>TIME IN</h1>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <video id="preview" width="100%"></video>
      </div>
      <div class="col-md-6">
        
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>&nbsp;</th>
              <th>Name</th>
              <!-- <th>QR Code</th> -->
              <th>Status</th>
              <th>Time in</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>&nbsp;</th>
              <th>Name</th>
              <!-- <th>QR Code</th> -->
              <th>Status</th>
              <th>Time in</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
              $date_today=date('Y-m-d');
              // $timelogs_data=get_startswith("tbl_timelogs", "time_day", $date_today);
              $timelogs_data=get_where_double("tbl_timelogs", "time_day", $date_today, "timelog_type", "time in");
              // echo $date_today;

              foreach ($timelogs_data as $key => $row){
                $log_id=$row['log_id'];
                $user_id=$row['user_id'];
                $subscription_id=$row['subscription_id'];
                $time_day=$row['time_day'];
                // $time_out=$row['time_out'];
                $time_hour=$row['time_hour'];
                $reference=$row['reference'];

                $user_data=get_where_custom("tbl_users", "user_id", $user_id);

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
                    <td><?= $time_day." ".$time_hour?></td>
                  </tr>
            <?php
                }
              }
            ?>
          </tbody>
        </table>
        <form action="time_in_proc.php" method="post" class="scan qrcode" class="form-horizontal">
          <label for="">SCAN QR CODE</label>
          <input type="text" name="text" id="text" readonly placeholder="Scan QR code" class="form-control">
        </form>
      </div>
    </div>
  </div>

  <script>
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
    Instascan.Camera.getCameras().then(function(cameras){
      if(cameras.length>0){
        scanner.start(cameras[0]);
      } else {
        alert('No cameras found');
      }
    }).catch(function(e){
      console.error(e);
    });
    scanner.addListener('scan', function(c){
      document.getElementById('text').value=c;
      setTimeout("document.forms[0].submit();",3000);
    });
  </script>
</body>
</html>


  <!-- </body>
</html> -->