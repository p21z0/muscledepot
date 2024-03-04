<?php
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
date_default_timezone_set("Asia/Singapore");
echo $now = date("Y-m-d H:i:s");
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
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <video id="preview" width="100%"></video>
      </div>
      <div class="col-md-6">
        
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Log ID</th>
              <th>Name</th>
              <th>QR Code</th>
              <th>Time in</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Log ID</th>
              <th>Name</th>
              <th>QR Code</th>
              <th>Time in</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
              $date_today=date('Y-m-d');
              $timelogs_data=get_startswith("tbl_timelogs", "time_in", $date_today);
              // echo $date_today;

              foreach ($timelogs_data as $key => $row){
                $log_id=$row['log_id'];
                $user_id=$row['user_id'];
                $subscription_id=$row['subscription_id'];
                $time_in=$row['time_in'];
                $reference=$row['reference'];

                $user_data=get_where_custom("tbl_users", "user_id", $user_id);

                foreach ($user_data as $key => $row){
                  $firstname=$row['firstname'];
                  $lastname=$row['lastname'];
            ?>
                  <tr>
                    <td><?= $log_id?></td>
                    <td><?= $firstname." ".$lastname?></td>
                    <td><?= $reference?></td>
                    <td><?= $time_in?></td>
                  </tr>
            <?php
                }
              }
            ?>
          </tbody>
        </table>
        <form action="insert1.php" method="post" class="scan qrcode" class="form-horizontal">
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